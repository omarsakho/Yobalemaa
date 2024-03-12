@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Modifier la Location</h1>
    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('locations.update', $location->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="numero" class="form-label">Numéro</label>
                    <input type="text" name="numero" class="form-control" id="numero" value="{{ $location->numero }}" required>
                </div>
                <div class="mb-3">
                    <label for="client_id" class="form-label">Client</label>
                    <select name="client_id" class="form-control" id="client_id" required>
                        @foreach ($clients as $client)
                        <option value="{{ $client->id }}" @if($client->id == $location->client_id) selected @endif>{{ $client->prenom }} {{ $client->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="lieu_depart" class="form-label">Lieu de Départ</label>
                    <input type="text" name="lieu_depart" class="form-control" id="lieu_depart" value="{{ $location->lieu_depart }}" required>
                </div>
                <div class="mb-3">
                    <label for="lieu_arrivee" class="form-label">Lieu d'Arrivée</label>
                    <input type="text" name="lieu_arrivee" class="form-control" id="lieu_arrivee" value="{{ $location->lieu_arrivee }}" required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="heure_debut" class="form-label">Heure de Début</label>
                        <input type="datetime-local" name="heure_debut" class="form-control" id="heure_debut" value="{{ date('Y-m-d\TH:i', strtotime($location->heure_debut)) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="heure_fin" class="form-label">Heure de Fin</label>
                        <input type="datetime-local" name="heure_fin" class="form-control" id="heure_fin" value="{{ date('Y-m-d\TH:i', strtotime($location->heure_fin)) }}" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="vehicule_id" class="form-label">Véhicule</label>
                    <select name="vehicule_id" class="form-control" id="vehicule_id" required>
                        @foreach ($vehicules as $vehicule)
                        <option value="{{ $vehicule->id }}" @if($vehicule->id == $location->vehicule_id) selected @endif>{{ $vehicule->marque }} - {{ $vehicule->modele }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Modifier</button>
            </form>
        </div>
    </div>
</div>
@endsection
