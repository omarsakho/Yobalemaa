<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Location;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\LocationCreated;
use App\Mail\LocationValidated;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('locations.index', compact('locations'));
    }

    public function create()
    {
        $vehicules = Vehicule::where('statut', 'Disponible')->get();
        $duree = null;
        return view('locations.create', compact('vehicules', 'duree'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'prenom' => 'required',
            'nom' => 'required',
            'age' => 'required|numeric',
            'tel' => 'required', 
            'email' => 'required|email', 
            'adresse' => 'required',
            'lieu_depart' => 'required',
            'lieu_arrivee' => 'required',
            'heure_debut' => 'required',
            'heure_fin' => 'required',
            'vehicule_id' => 'required',
            'distance' => 'required|numeric',
        ]);

        // Vérifier si le client existe déjà
        $client = Client::where('tel', $request->tel)->first();
        $client = Client::where('email', $request->email)->first();

        // Si le client existe déjà, utilisez-le pour créer la location
        if ($client) {
            // Mettre à jour les informations du client
            $client->update([
                'prenom' => $request->prenom,
                'nom' => $request->nom,
                'age' => $request->age,
                'adresse' => $request->adresse,
            ]);
        } else {
            // Si le client n'existe pas, créez-le d'abord
            $client = Client::create([
                'prenom' => $request->prenom,
                'nom' => $request->nom,
                'age' => $request->age,
                'tel' => $request->tel, 
                'email' => $request->email, 
                'adresse' => $request->adresse,
            ]);
        }

        // Calculer la durée de la location en heures
        $heure_debut = new \DateTime($request->heure_debut);
        $heure_fin = new \DateTime($request->heure_fin);
        $duree = $heure_fin->diff($heure_debut)->format('%h');

        // Récupérer le véhicule choisi
        $vehicule = Vehicule::findOrFail($request->vehicule_id);

        // Calculer le prix total de la location en utilisant la méthode du modèle Vehicule
        $prix_total = $vehicule->calculerPrixLocation($duree);

        // Créer la location avec les informations du client et la distance calculée
        $location = Location::create([
            'prenom' => $client->prenom,
            'nom' => $client->nom,
            'age' => $client->age,
            'tel' => $client->tel, 
            'email' => $client->email, 
            'adresse' => $client->adresse,
            'lieu_depart' => $request->lieu_depart,
            'lieu_arrivee' => $request->lieu_arrivee,
            'heure_debut' => $request->heure_debut,
            'heure_fin' => $request->heure_fin,
            'vehicule_id' => $request->vehicule_id,
            'client_id' => $client->id,
            'prix_total' => $prix_total,
            'validated' => false,
            'distance' => $request->distance,
        ]);

        // Envoyer un e-mail d'attente au client
        Mail::to($client->email)->send(new LocationCreated($location));

        // Mettre à jour le statut des véhicules
        $this->updateVehicleStatus();

        return redirect()->route('home')->with('success', 'Location créée avec succès.');
    }

    private function updateVehicleStatus()
    {
        // Récupérer les locations en cours dont la date de fin est dépassée
        $expiredLocations = Location::where('heure_fin', '<=', now())
            ->where('validated', true)
            ->get();

        foreach ($expiredLocations as $location) {
            // Mettre à jour le statut du véhicule associé à "Disponible"
            $location->vehicule->update(['statut' => 'Disponible']);

            // Marquer la location comme terminée
            $location->update(['validated' => true]);
        }
    }

    public function show(Location $location)
    {
        return view('locations.show', compact('location'));
    }

    public function edit(Location $location)
    {
        $vehicules = Vehicule::where('statut', 'Disponible')->get();
        return view('locations.edit', compact('location', 'vehicules'));
    }

    public function update(Request $request, Location $location)
    {
        $request->validate([
            // Validation des champs
        ]);

        $location->update($request->all());

        return redirect()->route('locations.index')->with('success', 'Location mise à jour avec succès.');
    }

    public function destroy(Location $location)
    {
        // Mettre à jour le statut du véhicule à "Disponible"
        $vehicule = $location->vehicule;
        $vehicule->update(['statut' => 'Disponible']);

        $location->delete();

        return redirect()->route('locations.index')->with('success', 'Location supprimée avec succès.');
    }

    public function validateLocation(Location $location)
    {
        // Vérifier si le statut du véhicule associé à la location est "Disponible"
        if ($location->vehicule->statut === 'Disponible') {
            // Mettre à jour le statut de la location à validée
            $location->update(['validated' => true]);

            // Mettre à jour le statut du véhicule à "Indisponible"
            $location->vehicule->update(['statut' => 'Indisponible']);

            // Calculer la nouvelle distance en multipliant par 2
            $nouvelleDistance = $location->distance * 2;

            // Ajouter la nouvelle distance au kilométrage du véhicule
            $location->vehicule->increment('kilometrage', $nouvelleDistance);

            // Envoyer un email de confirmation de validation de la location
            Mail::to($location->client->email)->send(new LocationValidated($location));

            return redirect()->route('locations.index')->with('success', 'Location validée avec succès.');
        } else {
            return redirect()->back()->with('error', 'Le véhicule associé à cette location n\'est pas disponible.');
        }
    }

    public function confirmValidation(Location $location)
    {
        return view('locations.confirm-validation', compact('location'));
    }
}
