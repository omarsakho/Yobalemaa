@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modifier le véhicule</div>

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

                    <form method="post" action="{{ route('vehicules.update', $vehicule->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="marque">Marque:</label>
                            <input type="text" class="form-control" id="marque" name="marque" value="{{ old('marque', $vehicule->marque) }}">
                        </div>
                        <div class="form-group">
                            <label for="modele">Modèle:</label>
                            <input type="text" class="form-control" id="modele" name="modele" value="{{ old('modele', $vehicule->modele) }}">
                        </div>
                        <div class="form-group">
                            <label for="date">Date:</label>
                            <input type="date" class="form-control" id="date" name="date" value="{{ old('date', $vehicule->date) }}">
                        </div>
                        <div class="form-group">
                            <label for="kilometrage">Kilométrage:</label>
                            <input type="number" class="form-control" id="kilometrage" name="kilometrage" value="{{ old('kilometrage', $vehicule->kilometrage) }}">
                        </div>
                        <div class="form-group">
                            <label for="statut">Statut:</label>
                            <select class="form-control" id="statut" name="statut">
                                <option value="Disponible" {{ $vehicule->statut == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                                <option value="Indisponible" {{ $vehicule->statut == 'Indisponible' ? 'selected' : '' }}>Indisponible</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nbre_de_place">Nombre de places:</label>
                            <input type="number" class="form-control" id="nbre_de_place" name="nbre_de_place" value="{{ old('nbre_de_place', $vehicule->nbre_de_place) }}">
                        </div>
                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                            <img src="{{ asset('images/' . $vehicule->image) }}" alt="Image">
                        </div>
                        <div class="form-group">
                            <label for="categorie">Catégorie:</label>
                            <select class="form-control" id="categorie" name="categorie">
                                <option value="A" {{ $vehicule->categorie == 'A' ? 'selected' : '' }}>A</option>
                                <option value="B" {{ $vehicule->categorie == 'B' ? 'selected' : '' }}>B</option>
                                <option value="C" {{ $vehicule->categorie == 'C' ? 'selected' : '' }}>C</option>
                                <option value="D" {{ $vehicule->categorie == 'D' ? 'selected' : '' }}>D</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="chauffeur_id">Chauffeur:</label>
                            <select class="form-control" id="chauffeur_id" name="chauffeur_id">
                                <option value="">Sélectionner un chauffeur</option>
                                @foreach($chauffeurs as $chauffeur)
                                    @if ($chauffeur->permis->categorie >= $vehicule->categorie)
                                        <option value="{{ $chauffeur->id }}" {{ $vehicule->chauffeur_id == $chauffeur->id ? 'selected' : '' }}>{{ $chauffeur->nom }} {{ $chauffeur->prenom }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="prix_par_heure">Prix par heure:</label>
                            <input type="text" class="form-control" id="prix_par_heure" name="prix_par_heure" value="{{ old('prix_par_heure', $vehicule->prix_par_heure) }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Modifier Véhicule</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
