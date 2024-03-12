@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Détails du Client</div>

                <div class="card-body">
                    <p><strong>Prénom :</strong> {{ $client->prenom }}</p>
                    <p><strong>Nom :</strong> {{ $client->nom }}</p>
                    <p><strong>Âge :</strong> {{ $client->age }}</p>
                    <p><strong>Email :</strong> {{ $client->email }}</p>
                    <p><strong>Tel :</strong> {{ $client->tel }}</p>
                    <p><strong>Adresse :</strong> {{ $client->adresse }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
