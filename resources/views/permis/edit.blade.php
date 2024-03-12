@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modifier le Permis</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('permis.update', $permis->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="numero">Numéro</label>
                            <input type="text" class="form-control" id="numero" name="numero" value="{{ $permis->numero }}">
                        </div>

                        <div class="form-group">
                            <label for="categorie">Catégorie</label>
                            <select class="form-control" id="categorie" name="categorie">
                                <option value="A" @if($permis->categorie == 'A') selected @endif>Catégorie A</option>
                                <option value="B" @if($permis->categorie == 'B') selected @endif>Catégorie B</option>
                                <option value="C" @if($permis->categorie == 'C') selected @endif>Catégorie C</option>
                                <option value="D" @if($permis->categorie == 'D') selected @endif>Catégorie D</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="dateObtention">Date d'obtention</label>
                            <input type="date" class="form-control" id="dateObtention" name="dateObtention" value="{{ $permis->dateObtention }}">
                        </div>

                        <div class="form-group">
                            <label for="dateExpiration">Date d'expiration</label>
                            <input type="date" class="form-control" id="dateExpiration" name="dateExpiration" value="{{ $permis->dateExpiration }}">
                        </div>

                        <div class="form-group">
                            <label for="restriction">Restriction</label>
                            <input type="text" class="form-control" id="restriction" name="restriction" value="{{ $permis->restriction }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
