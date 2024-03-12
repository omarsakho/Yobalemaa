<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion de Parc et Location de Voiture</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            color: #374151;
            margin: 0;
            padding: 0;
            background-image: url('assets/images/4.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            position: relative;
        }
        header {
            background-color: rgba(0, 0, 0, 0.5); /* Ajoute une opacité pour améliorer la lisibilité du texte */
            color: #ffffff;
            padding: 20px 0;
            text-align: center;
            width: 100%;
            position: fixed;
            top: 0;
            z-index: 999;
        }
        header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
        }
        .container {
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding-top: 100px; /* Ajuste la position verticale du contenu */
            padding-bottom: 100px; /* Ajout de marge en bas pour le footer */
        }
        .content {
            text-align: center;
            margin-bottom: 40px;
        }
        .content p {
            font-size: 18px;
            line-height: 1.6;
        }
        .btn-container {
            display: flex;
            justify-content: center;
        }
        .btn {
            display: inline-block;
            padding: 12px 24px;
            margin: 0 10px;
            background-color: #1e40af;
            color: #ffffff;
            text-decoration: none;
            border-radius: 25px;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #3b82f6;
        }
        .footer {
            text-align: center;
            padding-top: 20px;
            color: #ffffff;
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }
        .footer p {
            font-size: 14px;
            color: #6b7280;
        }
    </style>
</head>
<body>
    <header>
        <h1>Gestion de Parc et Location de Voiture</h1>
    </header>
    <div class="container">
        <div class="content">
            <p>Bienvenue dans votre application de gestion de parc et de location de voitures.</p>
            <p>Location de voitures pour tous les types de voyages</p>
        </div>

        <div class="btn-container">
            <a href="{{ route('login') }}" class="btn">Se connecter</a>
            <a href="{{ route('register') }}" class="btn">S'inscrire</a>
        </div>
    </div>

    <div class="footer">
        <p>&copy; {{ date('Y') }} Gestion de Parc et Location de Voiture. Tous droits réservés.</p>
    </div>
</body>
</html>
