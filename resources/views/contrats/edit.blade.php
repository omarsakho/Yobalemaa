@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Modifier le Contrat
                </div>
                <div class="card-body">
                    <form action="{{ route('contrats.update', $contrat->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="numero">Numéro</label>
                            <input type="text" name="numero" class="form-control" id="numero" value="{{ $contrat->numero }}">
                        </div>
                        <div class="form-group">
                            <label for="dateDebut">Date de Début</label>
                            <input type="date" name="dateDebut" class="form-control" id="dateDebut" value="{{ $contrat->dateDebut }}">
                        </div>
                        <div class="form-group">
                            <label for="dateFin">Date de Fin</label>
                            <input type="date" name="dateFin" class="form-control" id="dateFin" value="{{ $contrat->dateFin }}">
                        </div>
                        <div class="form-group">
                            <label for="salaire">Salaire</label>
                            <input type="text" name="salaire" class="form-control" id="salaire" value="{{ $contrat->salaire }}">
                        </div>
                        <div class="form-group">
                            <label for="chauffeur_id">Chauffeur</label>
                            <select name="chauffeur_id" class="form-control" id="chauffeur_id">
                                @foreach ($chauffeurs as $chauffeur)
                                <option value="{{ $chauffeur->id }}" {{ $contrat->chauffeur_id == $chauffeur->id ? 'selected' : '' }}>{{ $chauffeur->prenom }} {{ $chauffeur->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
