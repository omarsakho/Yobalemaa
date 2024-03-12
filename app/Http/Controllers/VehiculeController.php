<?php

namespace App\Http\Controllers;

use App\Models\Chauffeur;
use App\Models\Vehicule;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    public function index()
    {
        $vehicules = Vehicule::paginate(10);
        return view('vehicules.index', compact('vehicules'));
    }

    public function create()
    {
        $chauffeurs = Chauffeur::all();
        return view('vehicules.create', compact('chauffeurs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'marque' => 'required',
            'modele' => 'required',
            'date' => 'required|date',
            'kilometrage' => 'required|numeric',
            'statut' => 'required',
            'nbre_de_place' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'categorie' => 'required',
            'chauffeur_id' => 'required|exists:chauffeurs,id',
            'prix_par_heure' => 'required|numeric',
        ]);

        // Handle file upload if image is provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }

        $vehicule = new Vehicule([
            'marque' => $request->get('marque'),
            'modele' => $request->get('modele'),
            'date' => $request->get('date'),
            'kilometrage' => $request->get('kilometrage'),
            'statut' => $request->get('statut'),
            'nbre_de_place' => $request->get('nbre_de_place'),
            'image' => isset($imageName) ? $imageName : null,
            'categorie' => $request->get('categorie'),
            'chauffeur_id' => $request->get('chauffeur_id'),
            'prix_par_heure' => $request->get('prix_par_heure'),
        ]);

        $vehicule->save();

        return redirect('/vehicules')->with('success', 'Véhicule ajouté avec succès');
    }


    public function edit($id)
    {
        $vehicule = Vehicule::findOrFail($id);
        $chauffeurs = Chauffeur::all();
        return view('vehicules.edit', compact('vehicule', 'chauffeurs'));
    }

    public function show($id)
    {
        $vehicule = Vehicule::findOrFail($id);
        return view('vehicules.show', compact('vehicule'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'marque' => 'required',
            'modele' => 'required',
            'date' => 'required|date',
            'kilometrage' => 'required|numeric',
            'statut' => 'required',
            'nbre_de_place' => 'required|integer',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'categorie' => 'required',
            'chauffeur_id' => 'required|exists:chauffeurs,id',
            'prix_par_heure' => 'required|numeric',
        ]);

        $vehicule = Vehicule::findOrFail($id);

        // Handle file upload if new image is provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            // Supprimer l'ancienne image si elle existe
            if ($vehicule->image) {
                unlink(public_path('images/' . $vehicule->image));
            }
            $vehicule->image = $imageName;
        }

        $vehicule->marque = $request->get('marque');
        $vehicule->modele = $request->get('modele');
        $vehicule->date = $request->get('date');
        $vehicule->kilometrage = $request->get('kilometrage');
        $vehicule->statut = $request->get('statut');
        $vehicule->nbre_de_place = $request->get('nbre_de_place');
        $vehicule->categorie = $request->get('categorie');
        $vehicule->chauffeur_id = $request->get('chauffeur_id');
        $vehicule->prix_par_heure = $request->get('prix_par_heure');

        $vehicule->save();

        return redirect('/vehicules')->with('success', 'Véhicule mis à jour avec succès');
    }

    public function destroy($id)
    {
        $vehicule = Vehicule::findOrFail($id);
        // Supprimer l'image associée au véhicule s'il en existe une
        if ($vehicule->image) {
            unlink(public_path('images/' . $vehicule->image));
        }
        $vehicule->delete();

        return redirect('/vehicules')->with('success', 'Véhicule supprimé avec succès');
    }
}

