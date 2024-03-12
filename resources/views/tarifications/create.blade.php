@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Nouvelle Tarification</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('tarifications.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="numero">Numéro</label>
                            <input type="text" class="form-control" id="numero" name="numero" required>
                        </div>

                        <div class="form-group">
                            <label for="location_id">Location</label>
                            <select name="location_id" class="form-control" id="location_id">
                                @foreach ($locations as $location)
                                    <option value="{{ $location->id }}" data-prix="{{ $location->prix_total }}">{{ $location->id }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="prix">Prix</label>
                            <input type="number" step="0.01" class="form-control" id="prix" name="prix" readonly required>
                        </div>

                        <div class="form-group">
                            <label for="date_paiement">Date de Paiement</label>
                            <input type="date" class="form-control" id="date_paiement" name="date_paiement" required>
                        </div>

                        <div class="form-group">
                            <label for="moyen_paiement">Moyen de Paiement</label>
                            <input type="text" class="form-control" id="moyen_paiement" name="moyen_paiement" required>
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
        // Récupération du prix de la première option sélectionnée par défaut
        var prixDefault = document.getElementById('location_id').options[0].getAttribute('data-prix');
        // Affichage du prix par défaut dans le champ de prix total
        document.getElementById('prix').value = prixDefault;

        // Ecoute des changements de sélection dans le menu déroulant
        document.getElementById('location_id').addEventListener('change', function() {
            // Récupération de l'option sélectionnée
            var selectedOption = this.options[this.selectedIndex];
            // Récupération du prix total de la location à partir de l'attribut data-prix
            var prixTotal = selectedOption.getAttribute('data-prix');
            // Mise à jour du champ de prix avec le prix total de la location sélectionnée
            document.getElementById('prix').value = prixTotal;
        });
    });
</script>
@endsection
