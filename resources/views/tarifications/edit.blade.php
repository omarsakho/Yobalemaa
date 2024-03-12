@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modifier Tarification</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('tarifications.update', $tarification->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="numero">Numéro</label>
                            <input type="text" class="form-control" id="numero" name="numero" value="{{ $tarification->numero }}" required>
                        </div>

                        <div class="form-group">
                            <label for="location_id">Location</label>
                            <select name="location_id" class="form-control" id="location_id">
                                @foreach ($locations as $location)
                                    <option value="{{ $location->id }}" data-prix="{{ $location->prix_total }}" {{ $tarification->location_id == $location->id ? 'selected' : '' }}>{{ $location->id }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="prix">Prix</label>
                            <input type="number" step="0.01" class="form-control" id="prix" name="prix" value="{{ $tarification->prix }}" readonly required>
                        </div>

                        <div class="form-group">
                            <label for="date_paiement">Date de Paiement</label>
                            <input type="date" class="form-control" id="date_paiement" name="date_paiement" value="{{ $tarification->date_paiement }}" required>
                        </div>

                        <div class="form-group">
                            <label for="moyen_paiement">Moyen de Paiement</label>
                            <input type="text" class="form-control" id="moyen_paiement" name="moyen_paiement" value="{{ $tarification->moyen_paiement }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var prixSelected = document.getElementById('location_id').options[document.getElementById('location_id').selectedIndex].getAttribute('data-prix');
        document.getElementById('prix').value = prixSelected;

        document.getElementById('location_id').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var prixTotal = selectedOption.getAttribute('data-prix');
            document.getElementById('prix').value = prixTotal;
        });
    });
</script>
@endsection
