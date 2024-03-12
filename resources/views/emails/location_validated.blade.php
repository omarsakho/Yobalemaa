<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location Validée</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            color: #007bff;
            margin-top: 0;
        }
        p, ul {
            margin-bottom: 20px;
        }
        li {
            list-style: none;
            margin-bottom: 10px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Location Validée</h1>
        <p>Votre demande de location a été validée avec succès.</p>

        <h2>Détails de la location :</h2>
        <ul>
            <li><strong>Prénom :</strong> {{ $location->prenom }}</li>
            <li><strong>Nom :</strong> {{ $location->nom }}</li>
            <li><strong>Téléphone :</strong> {{ $location->tel }}</li>
            <li><strong>Email :</strong> {{ $location->email }}</li>
            <li><strong>Lieu de départ :</strong> {{ $location->lieu_depart }}</li>
            <li><strong>Lieu d'arrivée :</strong> {{ $location->lieu_arrivee }}</li>
            <li><strong>Heure de début :</strong> {{ $location->heure_debut }}</li>
            <li><strong>Heure de fin :</strong> {{ $location->heure_fin }}</li>
            <li><strong>Véhicule :</strong> {{ $location->vehicule->marque }} - {{ $location->vehicule->modele }}</li>
            <li><strong>Prix total :</strong> {{ $location->prix_total }}</li>
        </ul>
        
        <p>Merci de nous faire confiance.</p>
    </div>
</body>
</html>
