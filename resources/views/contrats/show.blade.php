@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Détails du Contrat
                </div>
                <div class="card-body">
                    <p><strong>Numéro:</strong> {{ $contrat->numero }}</p>
                    <p><strong>Date de Début:</strong> {{ $contrat->dateDebut }}</p>
                    <p><strong>Date de Fin:</strong> {{ $contrat->dateFin }}</p>
                    <p><strong>Salaire:</strong> {{ $contrat->salaire }}</p>
                    <p><strong>Chauffeur:</strong> {{ $contrat->chauffeur->prenom }} {{ $contrat->chauffeur->nom }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
