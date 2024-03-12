@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Liste des Véhicules
                    <a href="{{ route('vehicules.create') }}" class="btn btn-primary btn-sm float-end">Ajouter un vehicule</a>
                </div>

                <div class="card-body">
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Marque</th>
                                <th>Modèle</th>
                                <th>Date</th>
                                <th>Kilométrage</th>
                                <th>Statut</th>
                                <th>Image</th>
                                <th>Catégorie</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vehicules as $vehicule)
                                <tr>
                                    <td>{{ $vehicule->marque }}</td>
                                    <td>{{ $vehicule->modele }}</td>
                                    <td>{{ $vehicule->date }}</td>
                                    <td>{{ $vehicule->kilometrage }}</td>
                                    <td>{{ $vehicule->statut }}</td>
                                    <td><img src="{{ asset('images/' . $vehicule->image) }}" alt="Image" style="max-width: 300px;"></td>
                                    <td>{{ $vehicule->categorie }}</td>
                                    <td>
                                        <a href="{{ route('vehicules.edit', $vehicule->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                                        <form action="{{ route('vehicules.destroy', $vehicule->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce véhicule ?')">Supprimer</button>
                                        </form>
                                        <a href="{{ route('vehicules.show', $vehicule->id) }}" class="btn btn-info btn-sm">Détails</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $vehicules->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
