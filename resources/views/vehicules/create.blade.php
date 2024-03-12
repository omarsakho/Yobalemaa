@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Créer un véhicule</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Erreur !</strong> Veuillez corriger les erreurs ci-dessous :
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="post" action="{{ route('vehicules.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="marque">Marque:</label>
                            <input type="text" class="form-control" id="marque" name="marque" value="{{ old('marque') }}">
                        </div>
                        <div class="form-group">
                            <label for="modele">Modèle:</label>
                            <input type="text" class="form-control" id="modele" name="modele" value="{{ old('modele') }}">
                        </div>
                        <div class="form-group">
                            <label for="date">Date:</label>
                            <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}">
                        </div>
                        <div class="form-group">
                            <label for="kilometrage">Kilométrage:</label>
                            <input type="number" class="form-control" id="kilometrage" name="kilometrage" value="{{ old('kilometrage') }}">
                        </div>
                        <div class="form-group">
                            <label for="statut">Statut:</label>
                            <select class="form-control" id="statut" name="statut">
                                <option value="">Sélectionner un statut</option>
                                <option value="Disponible">Disponible</option>
                                <option value="Indisponible">Indisponible</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nbre_de_place">Nombre de places:</label>
                            <input type="number" class="form-control" id="nbre_de_place" name="nbre_de_place" value="{{ old('nbre_de_place') }}">
                        </div>
                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>
                        <div class="form-group">
                            <label for="categorie">Catégorie:</label>
                            <select class="form-control" id="categorie" name="categorie">
                                <option value="">Sélectionner une catégorie</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="chauffeur_id">Chauffeur:</label>
                            <select class="form-control" id="chauffeur_id" name="chauffeur_id">
                                <option value="">Sélectionner un chauffeur</option>
                                @foreach($chauffeurs as $chauffeur)
                                    <option value="{{ $chauffeur->id }}">{{ $chauffeur->nom }} {{ $chauffeur->prenom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="prix_par_heure">Prix par heure:</label>
                            <input type="number" step="0.01" class="form-control" id="prix_par_heure" name="prix_par_heure" value="{{ old('prix_par_heure') }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter Véhicule</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
