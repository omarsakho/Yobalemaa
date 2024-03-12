@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg">
                <div class="card-header">
                    <h3 class="mb-0">Détails du véhicule</h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="details-item">
                                <p class="mb-2"><strong>Marque:</strong> {{ $vehicule->marque }}</p>
                                <p class="mb-2"><strong>Modèle:</strong> {{ $vehicule->modele }}</p>
                                <p class="mb-2"><strong>Date:</strong> {{ $vehicule->date }}</p>
                                <p class="mb-2"><strong>Kilométrage:</strong> {{ $vehicule->kilometrage }}</p>
                                <p class="mb-2"><strong>Statut:</strong> {{ $vehicule->statut }}</p>
                                <p class="mb-2"><strong>Nombre de places:</strong> {{ $vehicule->nbre_de_place }}</p>
                                <p class="mb-2"><strong>Catégorie:</strong> {{ $vehicule->categorie }}</p>
                                <p class="mb-2"><strong>Prix par heure:</strong> {{ $vehicule->prix_par_heure }}</p>
                            </div>
                        </div>
                        <div class="col-lg-6 text-center">
                            <div class="image-container mt-3">
                                @if($vehicule->image)
                                    <img src="{{ asset('images/' . $vehicule->image) }}" alt="Image du véhicule" class="img-fluid rounded">
                                @else
                                    <p class="text-muted">Aucune image disponible</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <a href="javascript:history.back()" class="btn btn-secondary float-end">Retour</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
