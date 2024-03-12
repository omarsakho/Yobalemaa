@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mt-4">Informations sur la Location</h2>

    <div class="card mt-4">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0">Détails de la Location</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <strong>Prénom:</strong> {{ $location->prenom }}
                    </div>
                    <div class="mb-3">
                        <strong>Nom:</strong> {{ $location->nom }}
                    </div>
                    <div class="mb-3">
                        <strong>Âge:</strong> {{ $location->age }}
                    </div>
                    <div class="mb-3">
                        <strong>Tel:</strong> {{ $location->tel }}
                    </div>
                    <div class="mb-3">
                        <strong>Email:</strong> {{ $location->email }}
                    </div>
                    <div class="mb-3">
                        <strong>Adresse:</strong> {{ $location->adresse }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <strong>Véhicule:</strong> {{ $location->vehicule->marque }} - {{ $location->vehicule->modele }}
                    </div>
                    <div class="mb-3">
                        <strong>Lieu de Départ:</strong> {{ $location->lieu_depart }}
                    </div>
                    <div class="mb-3">
                        <strong>Lieu d'Arrivée:</strong> {{ $location->lieu_arrivee }}
                    </div>
                    <div class="mb-3">
                        <strong>Heure de Début:</strong> {{ $location->heure_debut }}
                    </div>
                    <div class="mb-3">
                        <strong>Heure de Fin:</strong> {{ $location->heure_fin }}
                    </div>
                    <div class="mb-3">
                        <strong>Prix Total:</strong> {{ $location->prix_total }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a href="{{ route('locations.index') }}" class="btn btn-primary mt-4">Retour à la liste des locations</a>
</div>
@endsection
