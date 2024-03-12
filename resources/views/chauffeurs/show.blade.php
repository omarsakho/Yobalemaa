@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-info text-white">
            <h1 class="mb-0">Détails du Chauffeur</h1>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th scope="row">Prénom</th>
                        <td>{{ $chauffeur->prenom }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Nom</th>
                        <td>{{ $chauffeur->nom }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Expérience</th>
                        <td>{{ $chauffeur->experience }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Permis</th>
                        <td>{{ $chauffeur->permis_id }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="text-right">
                <a href="{{ route('chauffeurs.edit', $chauffeur->id) }}" class="btn btn-success">Editer</a>
                <form action="{{ route('chauffeurs.destroy', $chauffeur->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce chauffeur ?')">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
