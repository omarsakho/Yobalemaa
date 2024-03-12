<?php

namespace App\Http\Controllers;

use App\Models\Permis;
use Illuminate\Http\Request;

class PermisController extends Controller
{
    public function index()
    {
        $permis = Permis::all();
        return view('permis.index', compact('permis'));
    }

    public function create()
    {
        return view('permis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required|unique:permis',
            'categorie' => 'required',
            'dateObtention' => 'required|date',
            'dateExpiration' => 'required|date',
            'restriction' => 'nullable',
        ]);

        Permis::create($request->all());

        return redirect()->route('permis.index')->with('success', 'Permis ajouté avec succès.');
    }

    public function show(Permis $permis)
    {
        return view('permis.show', compact('permis'));
    }

    public function edit(Permis $permis)
    {
        return view('permis.edit', compact('permis'));
    }

    public function update(Request $request, Permis $permis)
    {
        $request->validate([
            'numero' => 'required|unique:permis,numero,' . $permis->id,
            'categorie' => 'required',
            'dateObtention' => 'required|date',
            'dateExpiration' => 'required|date',
            'restriction' => 'nullable',
        ]);

        $permis->update($request->all());

        return redirect()->route('permis.index')->with('success', 'Permis mis à jour avec succès.');
    }

    public function destroy(Permis $permis)
    {
        $permis->delete();

        return redirect()->route('permis.index')->with('success', 'Permis supprimé avec succès.');
    }
}
