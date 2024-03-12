@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="mb-0">Ajouter un Chauffeur</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('chauffeurs.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="prenom" name="prenom">
                        </div>
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom">
                        </div>
                        <div class="mb-3">
                            <label for="experience" class="form-label">Expérience</label>
                            <input type="number" class="form-control" id="experience" name="experience">
                        </div>
                        <div class="mb-3">
                            <label for="permis_id" class="form-label">Permis</label>
                            <select class="form-select" id="permis_id" name="permis_id">
                                @foreach ($permis as $perm)
                                    <option value="{{ $perm->id }}">{{ $perm->numero }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
