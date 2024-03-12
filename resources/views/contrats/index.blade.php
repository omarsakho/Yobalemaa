@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Liste des Contrats
                    <a href="{{ route('contrats.create') }}" class="btn btn-primary btn-sm float-end">Ajouter un contrat</a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Numéro</th>
                                <th>Date de Début</th>
                                <th>Date de Fin</th>
                                <th>Salaire</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contrats as $contrat)
                            <tr>
                                <td>{{ $contrat->numero }}</td>
                                <td>{{ $contrat->dateDebut }}</td>
                                <td>{{ $contrat->dateFin }}</td>
                                <td>{{ $contrat->salaire }}</td>
                                <td>
                                    <a href="{{ route('contrats.show', $contrat->id) }}" class="btn btn-info btn-sm">Voir</a>
                                    <a href="{{ route('contrats.edit', $contrat->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                                    <form action="{{ route('contrats.destroy', $contrat->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce contrat ?')">Supprimer</button>
                                    </form>
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
