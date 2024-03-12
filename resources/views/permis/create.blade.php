@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Créer un Permis</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('permis.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="numero">Numéro</label>
                            <input type="text" class="form-control" id="numero" name="numero">
                        </div>

                        <div class="form-group">
                            <label for="categorie">Catégorie</label>
                            <select class="form-control" id="categorie" name="categorie">
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="dateObtention">Date d'obtention</label>
                            <input type="date" class="form-control" id="dateObtention" name="dateObtention">
                        </div>

                        <div class="form-group">
                            <label for="dateExpiration">Date d'expiration</label>
                            <input type="date" class="form-control" id="dateExpiration" name="dateExpiration">
                        </div>

                        <div class="form-group">
                            <label for="restriction">Restriction</label>
                            <input type="text" class="form-control" id="restriction" name="restriction">
                        </div>

                        <button type="submit" class="btn btn-primary">Créer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
