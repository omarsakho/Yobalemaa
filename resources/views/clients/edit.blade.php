@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Modifier un Client</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('clients.update', $client->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="prenom">Prénom</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $client->prenom }}" required>
                        </div>

                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" value="{{ $client->nom }}" required>
                        </div>

                        <div class="form-group">
                            <label for="age">Âge</label>
                            <input type="number" class="form-control" id="age" name="age" value="{{ $client->age }}" required>
                        </div>

                        <div class="form-group">
                            <label for="tel">Téléphone</label>
                            <input type="text" class="form-control" id="tel" name="tel" value="{{ $client->tel }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $client->email }}" required>
                        </div>

                        <div class="form-group">
                            <label for="adresse">Adresse</label>
                            <input type="text" class="form-control" id="adresse" name="adresse" value="{{ $client->adresse }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
