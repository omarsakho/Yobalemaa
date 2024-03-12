@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Détails du Permis</div>

                <div class="card-body">
                    <p><strong>Numéro:</strong> {{ $permis->numero }}</p>
                    <p><strong>Catégorie:</strong> {{ $permis->categorie }}</p>
                    <p><strong>Date d'obtention:</strong> {{ $permis->dateObtention }}</p>
                    <p><strong>Date d'expiration:</strong> {{ $permis->dateExpiration }}</p>
                    <p><strong>Restriction:</strong> {{ $permis->restriction }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
