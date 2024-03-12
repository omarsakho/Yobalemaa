@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Ajouter un Contrat
                </div>
                <div class="card-body">
                    <form action="{{ route('contrats.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="numero">Numéro</label>
                            <input type="text" name="numero" class="form-control" id="numero" placeholder="Entrez le numéro du contrat">
                        </div>
                        <div class="form-group">
                            <label for="dateDebut">Date de Début</label>
                            <input type="date" name="dateDebut" class="form-control" id="dateDebut">
                        </div>
                        <div class="form-group">
                            <label for="dateFin">Date de Fin</label>
                            <input type="date" name="dateFin" class="form-control" id="dateFin">
                        </div>
                        <div class="form-group">
                            <label for="salaire">Salaire</label>
                            <input type="text" name="salaire" class="form-control" id="salaire" placeholder="Entrez le salaire">
                        </div>
                        <div class="form-group">
                            <label for="chauffeur_id">Chauffeur</label>
                            <select name="chauffeur_id" class="form-control" id="chauffeur_id">
                                @foreach ($chauffeurs as $chauffeur)
                                <option value="{{ $chauffeur->id }}">{{ $chauffeur->prenom }} {{ $chauffeur->nom }}</option>
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
