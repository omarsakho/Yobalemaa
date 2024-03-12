<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'prenom' => 'required',
            'nom' => 'required',
            'age' => 'required|integer',
            'tel' => 'required|unique:clients',
            'email' => 'required|email',
            'adresse' => 'required',
        ]);

        Client::create($request->all());

        return redirect()->route('clients.index')
            ->with('success', 'Client ajouté avec succès.');
    }

    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'prenom' => 'required',
            'nom' => 'required',
            'age' => 'required|integer',
            'tel' => 'required|unique:clients,tel,' . $client->id, 
            'email' => 'required|email',
            'adresse' => 'required',
        ]);

        $client->update($request->all());

        return redirect()->route('clients.index')
            ->with('success', 'Client modifié avec succès.');
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients.index')
            ->with('success', 'Client supprimé avec succès.');
    }
}
