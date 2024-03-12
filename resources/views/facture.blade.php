<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        .container {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            margin: 0 auto;
            max-width: 800px;
        }
        .card-header {
            background-color: #17a2b8;
            color: #fff;
            padding: 10px 20px;
            border-radius: 8px 8px 0 0;
        }
        .card-body {
            padding: 20px;
        }
        .card-text {
            margin-bottom: 10px;
        }
        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mt-4">Facture</h2>

        <div class="card mt-4">
            <div class="card-header">
                <h3 class="mb-0">Détails de la Location</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p class="card-text"><strong>Client:</strong> {{ $tarification->location->client->prenom }} {{ $tarification->location->client->nom }}</p>
                        <p class="card-text"><strong>Adresse du Client:</strong> {{ $tarification->location->client->adresse }}</p>
                        <p class="card-text"><strong>Lieu de Départ:</strong> {{ $tarification->location->lieu_depart }}</p>
                        <p class="card-text"><strong>Lieu d'Arrivée:</strong> {{ $tarification->location->lieu_arrivee }}</p>
                        <p class="card-text"><strong>Heure de Début:</strong> {{ $tarification->location->heure_debut }}</p>
                        <p class="card-text"><strong>Heure de Fin:</strong> {{ $tarification->location->heure_fin }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="card-text"><strong>Véhicule:</strong> {{ $tarification->location->vehicule->marque }} {{ $tarification->location->vehicule->modele }}</p>
                        <p class="card-text"><strong>Prix:</strong> {{ $tarification->prix }}</p>
                        <p class="card-text"><strong>Date de Paiement:</strong> {{ $tarification->date_paiement }}</p>
                        <p class="card-text"><strong>Moyen de Paiement:</strong> {{ $tarification->moyen_paiement }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
