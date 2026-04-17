<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Produits</title>
    <style>
        body {
            font-family: Arial;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
        }
        h1 {
            color: #FF2D20;
        }
        .produit {
            background: #f9f9f9;
            padding: 15px;
            margin: 10px 0;
            border-left: 4px solid #FF2D20;
        }
    </style>
</head>
<body>
<h1>Liste des articles</h1>
@if (count($articles) > 0)
@foreach ($articles as $article)
<div class="article">
    <h3>nom article : {{$article['nomarticle'] }}</h3>
    <p>Prix : {{ $article['prix'] }} </p>
    <p>description: {{ $article['description'] }} </p>
</div>
@endforeach
@else
<p>Aucun article disponible.</p>
@endif
</body>
</html>

