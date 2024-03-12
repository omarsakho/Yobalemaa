@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Confirmation de Validation</div>

                <div class="card-body">
                    <p>Êtes-vous sûr de vouloir valider cette location ?</p>
                    <form action="{{ route('locations.validate', $location) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-primary">Valider la Location</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
