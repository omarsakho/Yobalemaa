@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- Div pour la carte Leaflet -->
        <div id="map" style="height: 400px; margin-top: 20px;"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1 class="mt-2">Formulaire de Location</h1>
                </div>

                <div class="card-body">
                    <form action="{{ route('locations.store') }}" method="POST">
                        @csrf

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="form-group">
                            <label for="prenom">Prénom</label>
                            <input type="text" name="prenom" class="form-control" id="prenom">
                        </div>
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" name="nom" class="form-control" id="nom">
                        </div>
                        <div class="form-group">
                            <label for="age">Âge</label>
                            <input type="number" name="age" class="form-control" id="age">
                        </div>
                        <div class="form-group">
                            <label for="tel">Téléphone</label> 
                            <input type="text" name="tel" class="form-control" id="tel"> 
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email"> 
                        </div>
                        <div class="form-group">
                            <label for="adresse">Adresse</label>
                            <input type="text" name="adresse" class="form-control" id="adresse">
                        </div>
                        <div class="form-group">
                            <label for="lieu_depart">Lieu de Départ</label>
                            <input type="text" name="lieu_depart" class="form-control" id="lieu_depart">
                        </div>
                        <div class="form-group">
                            <label for="lieu_arrivee">Lieu d'Arrivée</label>
                            <input type="text" name="lieu_arrivee" class="form-control" id="lieu_arrivee">
                        </div>
                        <div class="form-group">
                            <label for="heure_debut">Heure de Début</label>
                            <input type="datetime-local" name="heure_debut" class="form-control" id="heure_debut">
                        </div>
                        <div class="form-group">
                            <label for="heure_fin">Heure de Fin</label>
                            <input type="datetime-local" name="heure_fin" class="form-control" id="heure_fin">
                        </div>
                        <div class="form-group">
                            <label for="vehicule_id">Véhicule</label>
                            <select name="vehicule_id" class="form-control" id="vehicule_id">
                                <option value="" disabled selected>Sélectionner un véhicule</option>
                                @foreach ($vehicules as $vehicule)
                                    <option value="{{ $vehicule->id }}" data-prixheure="{{ $vehicule->prix_par_heure }}">{{ $vehicule->marque }} - {{ $vehicule->modele }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="prixtotal">Prix Total</label>
                            <input type="text" name="prixtotal" class="form-control" id="prixtotal" readonly>
                        </div>
                        <div class="form-group">
                            <label for="distance">Distance entre les villes (km)</label>
                            <input type="text" name="distance" class="form-control" id="distance" readonly>
                        </div>
                        <button type="submit" class="btn btn-primary">Valider la Location</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Script pour calculer et préremplir le champ prixtotal
    document.getElementById('heure_debut').addEventListener('change', function() {
        var heureDebut = new Date(this.value);
        var heureFin = new Date(document.getElementById('heure_fin').value);
        var duree = (heureFin - heureDebut) / 1000 / 3600; // Conversion de la durée en heures
        var prixParHeure = parseFloat(document.getElementById('vehicule_id').selectedOptions[0].getAttribute('data-prixheure'));
        var prixtotal = duree * prixParHeure;

        document.getElementById('prixtotal').value = prixtotal.toFixed(2); // Mettre à jour le champ prixtotal
    });

    document.getElementById('vehicule_id').addEventListener('change', function() {
        var heureDebut = new Date(document.getElementById('heure_debut').value);
        var heureFin = new Date(document.getElementById('heure_fin').value);
        var duree = (heureFin - heureDebut) / 1000 / 3600; // Conversion de la durée en heures
        var prixParHeure = parseFloat(this.selectedOptions[0].getAttribute('data-prixheure'));
        var prixtotal = duree * prixParHeure;

        document.getElementById('prixtotal').value = prixtotal.toFixed(2); // Mettre à jour le champ prixtotal
    });

    // Fonction pour calculer la distance entre les villes
    function calculateDistance() {
        var lieuDepart = document.getElementById('lieu_depart').value;
        var lieuArrivee = document.getElementById('lieu_arrivee').value;

        // Effacer les anciens marqueurs de la carte
        map.eachLayer(function(layer) {
            if (layer instanceof L.Marker) {
                map.removeLayer(layer);
            }
        });

        // Appel à l'API de géocodage de OpenStreetMap (Nominatim)
        var urlDepart = 'https://nominatim.openstreetmap.org/search?format=json&q=' + encodeURIComponent(lieuDepart);
        var urlArrivee = 'https://nominatim.openstreetmap.org/search?format=json&q=' + encodeURIComponent(lieuArrivee);

        // Effectuer la requête pour les lieux de départ et d'arrivée
        Promise.all([
            fetch(urlDepart).then(response => response.json()),
            fetch(urlArrivee).then(response => response.json())
        ]).then(function(results) {
            var coordsDepart = results[0][0].lat + ',' + results[0][0].lon;
            var coordsArrivee = results[1][0].lat + ',' + results[1][0].lon;

            // Ajouter un marqueur pour le lieu de départ
            L.marker([results[0][0].lat, results[0][0].lon]).addTo(map)
                .bindPopup('Lieu de départ: ' + lieuDepart)
                .openPopup();

            // Ajouter un marqueur pour le lieu d'arrivée
            L.marker([results[1][0].lat, results[1][0].lon]).addTo(map)
                .bindPopup('Lieu d\'arrivée: ' + lieuArrivee)
                .openPopup();

            // Appel à l'API de calcul de distance
            var urlDistance = 'https://router.project-osrm.org/route/v1/driving/' + coordsDepart + ';' + coordsArrivee + '?overview=false';
            fetch(urlDistance)
                .then(response => response.json())
                .then(function(data) {
                    var distance = data.routes[0].distance / 1000; // La distance est en mètres, nous la convertissons en kilomètres
                    document.getElementById('distance').value = distance.toFixed(2);
                })
                .catch(function(error) {
                    console.log('Erreur lors du calcul de la distance : ', error);
                });
        }).catch(function(error) {
            console.log('Erreur lors de la récupération des coordonnées : ', error);
        });
    }

    // Événements pour calculer la distance et afficher les marqueurs sur la carte lorsque les lieux de départ et d'arrivée sont modifiés
    document.getElementById('lieu_depart').addEventListener('input', calculateDistance);
    document.getElementById('lieu_arrivee').addEventListener('input', calculateDistance);

    // Initialiser la carte Leaflet
    var map = L.map('map').setView([51.505, -0.09], 13); // Définir la vue de la carte

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Ajouter un marqueur à la carte
    L.marker([51.5, -0.09]).addTo(map)
        .bindPopup('Un exemple de marqueur.')
        .openPopup();
</script>
@endsection
