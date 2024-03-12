@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Liste des Chauffeurs
                    <a href="{{ route('chauffeurs.create') }}" class="btn btn-primary btn-sm float-end">Ajouter un chauffeur</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Prénom</th>
                                <th>Nom</th>
                                <th>Expérience</th>
                                <th>Permis</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($chauffeurs as $chauffeur)
                            <tr>
                                <td>{{ $chauffeur->id }}</td>
                                <td>{{ $chauffeur->prenom }}</td>
                                <td>{{ $chauffeur->nom }}</td>
                                <td>{{ $chauffeur->experience }}</td>
                                <td>{{ $chauffeur->permis->numero }}</td>
                                <td>
                                    <a href="{{ route('chauffeurs.edit', $chauffeur->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                                    <form action="{{ route('chauffeurs.destroy', $chauffeur->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce chauffeur ?')">Supprimer</button>
                                    </form>
                                    <a href="{{ route('chauffeurs.show', $chauffeur->id) }}" class="btn btn-info btn-sm">Détails</a>
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
@endsection
