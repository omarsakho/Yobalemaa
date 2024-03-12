@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Liste des Permis
                    <a href="{{ route('permis.create') }}" class="btn btn-primary btn-sm float-end">Ajouter un Permis</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Numéro</th>
                                <th>Catégorie</th>
                                <th>Date d'obtention</th>
                                <th>Date d'expiration</th>
                                <th>Restriction</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permis as $permis)
                            <tr>
                                <td>{{ $permis->id }}</td>
                                <td>{{ $permis->numero }}</td>
                                <td>{{ $permis->categorie }}</td>
                                <td>{{ $permis->dateObtention }}</td>
                                <td>{{ $permis->dateExpiration }}</td>
                                <td>{{ $permis->restriction }}</td>
                                <td>
                                    <a href="{{ route('permis.show', $permis->id) }}" class="btn btn-primary btn-sm">Voir</a>
                                    <a href="{{ route('permis.edit', $permis->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                                    <form action="{{ route('permis.destroy', $permis->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce permis ?')">Supprimer</button>
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
