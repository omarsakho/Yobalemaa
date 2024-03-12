@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-4">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0">Détails de la Location</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Client:</strong> {{ $tarification->location->client->prenom }} {{ $tarification->location->client->nom }}</p>
                    <p><strong>Adresse du Client:</strong> {{ $tarification->location->client->adresse }}</p>
                    <p><strong>Lieu de Départ:</strong> {{ $tarification->location->lieu_depart }}</p>
                    <p><strong>Lieu d'Arrivée:</strong> {{ $tarification->location->lieu_arrivee }}</p>
                    <p><strong>Heure de Début:</strong> {{ $tarification->location->heure_debut }}</p>
                    <p><strong>Heure de Fin:</strong> {{ $tarification->location->heure_fin }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Véhicule:</strong> {{ $tarification->location->vehicule->marque }} {{ $tarification->location->vehicule->modele }}</p>
                    <p><strong>Prix:</strong> {{ $tarification->prix }}</p>
                    <p><strong>Date de Paiement:</strong> {{ $tarification->date_paiement }}</p>
                    <p><strong>Moyen de Paiement:</strong> {{ $tarification->moyen_paiement }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4 d-flex justify-content-between">
        <a href="{{ route('tarifications.index') }}" class="btn btn-primary">Retour</a>
        <a href="{{ route('tarifications.printInvoicePDF', $tarification->id) }}" class="btn btn-success">Imprimer</a>
    </div>
</div>
@endsection
