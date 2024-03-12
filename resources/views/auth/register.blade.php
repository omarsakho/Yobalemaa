@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-3xl text-green-500 text-center">Completez vos informations</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name" class="font-semibold text-gray-700">Nom d'utilisateur</label>
                            <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" autocomplete="name" placeholder="Nom d'utilisateur" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="font-semibold text-gray-700">Email</label>
                            <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="email" placeholder="Votre email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="font-semibold text-gray-700">Mot de passe</label>
                            <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" autocomplete="password" placeholder="Votre mot de passe" autofocus>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation" class="font-semibold text-gray-700">Confirmation du mot de passe</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}" autocomplete="password_confirmation" placeholder="Retapez votre mot de passe" autofocus>
                        </div>

                        <div class="form-group">
                            <label class="font-semibold text-gray-700">Je veux être :</label>
                            <!--<div class="form-check">
                                <input class="form-check-input @error('role_id') is-invalid @enderror" type="radio" value="1" id="utilisateur" name="role_id">
                                <label class="form-check-label" for="utilisateur">
                                    administrateur
                                </label>
                            </div>
                            -->
                            <div class="form-check">
                                <input class="form-check-input @error('role_id') is-invalid @enderror" type="radio" value="2" id="utilisateur" name="role_id">
                                <label class="form-check-label" for="utilisateur">
                                    Utilisateur
                                </label>
                            </div>
                            @error('role_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Créer mon compte</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
