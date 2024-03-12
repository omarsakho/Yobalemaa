<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chauffeur;
use App\Models\Permis;

class ChauffeurController extends Controller
{
    // Afficher la liste des chauffeurs
    public function index()
    {
        $chauffeurs = Chauffeur::all();
        return view('chauffeurs.index', compact('chauffeurs'));
    }

    public function create()
    {
        $permis = Permis::all();
        return view('chauffeurs.create', compact('permis'));
    }


    // Enregistrer un nouveau chauffeur
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'prenom' => 'required',
            'nom' => 'required',
            'experience' => 'required|integer',
            'permis_id' => 'required|unique:chauffeurs',
        ]);

        // Créer un nouveau chauffeur avec les données validées
        Chauffeur::create($validatedData);

        // Rediriger avec un message de succès
        return redirect()->route('chauffeurs.index')->with('success', 'Chauffeur créé avec succès!');
    }

    // Afficher les détails d'un chauffeur
    public function show(Chauffeur $chauffeur)
    {
        return view('chauffeurs.show', compact('chauffeur'));
    }

    // Afficher le formulaire d'édition d'un chauffeur
    public function edit(Chauffeur $chauffeur)
    {
        return view('chauffeurs.edit', compact('chauffeur'));
    }

    // Mettre à jour les informations d'un chauffeur
    public function update(Request $request, Chauffeur $chauffeur)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'prenom' => 'required',
            'nom' => 'required',
            'experience' => 'required|integer',
            'permis_id' => 'required|unique:chauffeurs,permis_id,'.$chauffeur->id,
        ]);

        // Mettre à jour les informations du chauffeur
        $chauffeur->update($validatedData);

        // Rediriger avec un message de succès
        return redirect()->route('chauffeurs.index')->with('success', 'Chauffeur mis à jour avec succès!');
    }

    // Supprimer un chauffeur
    public function destroy(Chauffeur $chauffeur)
    {
        $chauffeur->delete();

        // Rediriger avec un message de succès
        return redirect()->route('chauffeurs.index')->with('success', 'Chauffeur supprimé avec succès!');
    }
}
