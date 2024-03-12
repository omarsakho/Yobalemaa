@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Liste des Locations
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Prénom</th>
                                    <th>Nom</th>
                                    <th>Téléphone</th>
                                    <th>EMail</th> 
                                    <th>Lieu de Départ</th>
                                    <th>Lieu d'Arrivée</th>
                                    <th>Heure de Début</th>
                                    <th>Heure de Fin</th>
                                    <th>Véhicule</th>
                                    <th>Actions</th>
                                    <th>Validation</th> 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($locations as $location)
                                <tr>
                                    <th scope="row">{{ $location->id }}</th>
                                    <td>{{ $location->prenom }}</td>
                                    <td>{{ $location->nom }}</td>
                                    <td>{{ $location->tel }}</td>
                                    <td>{{ $location->email }}</td> 
                                    <td>{{ $location->lieu_depart }}</td>
                                    <td>{{ $location->lieu_arrivee }}</td>
                                    <td>{{ $location->heure_debut }}</td>
                                    <td>{{ $location->heure_fin }}</td>
                                    <td>{{ $location->vehicule->marque }}</td>
                                    <td>
                                        <a href="{{ route('locations.show', $location->id) }}" class="btn btn-primary btn-sm">Voir</a>
                                        <form action="{{ route('locations.destroy', $location->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette location ?')">Supprimer</button>
                                        </form>
                                    </td>
                                    <td>
                                        @if (!$location->validated)
                                            <a href="{{ route('locations.confirm-validation', $location->id) }}" class="btn btn-warning btn-sm">Valider</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
