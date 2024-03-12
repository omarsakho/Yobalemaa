@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="mb-0">Modifier un Chauffeur</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('chauffeurs.update', $chauffeur->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $chauffeur->prenom }}">
                        </div>
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" value="{{ $chauffeur->nom }}">
                        </div>
                        <div class="mb-3">
                            <label for="experience" class="form-label">Expérience</label>
                            <input type="number" class="form-control" id="experience" name="experience" value="{{ $chauffeur->experience }}">
                        </div>
                        <div class="mb-3">
                            <label for="permis_id" class="form-label">Permis</label>
                            <input type="text" class="form-control" id="permis_id" name="permis_id" value="{{ $chauffeur->permis_id }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
