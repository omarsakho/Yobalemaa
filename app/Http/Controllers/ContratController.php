<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contrat;
use App\Models\Chauffeur;


class ContratController extends Controller
{
    public function index()
    {
        $contrats = Contrat::all();
        return view('contrats.index', compact('contrats'));
    }

    public function create()
    {
        $chauffeurs = Chauffeur::all();
        return view('contrats.create', ['chauffeurs' => $chauffeurs]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required|unique:contrats',
            'dateDebut' => 'required|date',
            'dateFin' => 'required|date|after:dateDebut',
            'salaire' => 'required|numeric',
            'chauffeur_id' => 'required|exists:chauffeurs,id',
        ]);

        Contrat::create($request->all());
        return redirect()->route('contrats.index')->with('success', 'Contrat créé avec succès.');
    }

    public function show(Contrat $contrat)
    {
        return view('contrats.show', compact('contrat'));
    }

    public function edit(Contrat $contrat)
    {
        return view('contrats.edit', compact('contrat'));
    }

    public function update(Request $request, Contrat $contrat)
    {
        $request->validate([
            'numero' => 'required|unique:contrats,numero,' . $contrat->id,
            'dateDebut' => 'required|date',
            'dateFin' => 'required|date|after:dateDebut',
            'salaire' => 'required|numeric',
            'chauffeur_id' => 'required|exists:chauffeurs,id',
        ]);

        $contrat->update($request->all());
        return redirect()->route('contrats.index')->with('success', 'Contrat mis à jour avec succès.');
    }

    public function destroy(Contrat $contrat)
    {
        $contrat->delete();
        return redirect()->route('contrats.index')->with('success', 'Contrat supprimé avec succès.');
    }

}
