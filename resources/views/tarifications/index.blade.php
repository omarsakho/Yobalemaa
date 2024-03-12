@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Liste des Tarifications
                    <a href="{{ route('tarifications.create') }}" class="btn btn-primary btn-sm float-end">Ajouter une Tarification</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Numéro</th>
                                    <th>Location</th>
                                    <th>Prix</th>
                                    <th>Date de Paiement</th>
                                    <th>Moyen de Paiement</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tarifications as $tarification)
                                <tr>
                                    <th scope="row">{{ $tarification->id }}</th>
                                    <td>{{ $tarification->numero }}</td>
                                    <td>{{ $tarification->location->id }}</td>
                                    <td>{{ $tarification->prix }}</td>
                                    <td>{{ $tarification->date_paiement }}</td>
                                    <td>{{ $tarification->moyen_paiement }}</td>
                                    <td>
                                        <a href="{{ route('tarifications.show', $tarification->id) }}" class="btn btn-primary btn-sm">Voir</a>
                                        <a href="{{ route('tarifications.edit', $tarification->id) }}" class="btn btn-secondary btn-sm">Modifier</a>
                                        <form action="{{ route('tarifications.destroy', $tarification->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette tarification ?')">Supprimer</button>
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
</div>
@endsection
