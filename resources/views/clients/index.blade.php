@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Liste des Clients
                    <a href="{{ route('clients.create') }}" class="btn btn-success btn-sm float-end">Ajouter un client</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Prénom</th>
                                <th>Nom</th>
                                <th>Âge</th>
                                <th>Tel</th>
                                <th>Email</th>
                                <th>Adresse</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                            <tr>
                                <td>{{ $client->id }}</td>
                                <td>{{ $client->prenom }}</td>
                                <td>{{ $client->nom }}</td>
                                <td>{{ $client->age }}</td>
                                <td>{{ $client->tel }}</td>
                                <td>{{ $client->email }}</td>
                                <td>{{ $client->adresse }}</td>
                                <td>
                                    <a href="{{ route('clients.show', $client->id) }}" class="btn btn-primary btn-sm">Voir</a>
                                    <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?')">Supprimer</button>
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
