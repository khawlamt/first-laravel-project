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
<?php if(count($articles) > 0): ?>
<?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="article">
    <h3>nom article : <?php echo e($article['nomarticle']); ?></h3>
    <p>Prix : <?php echo e($article['prix']); ?> </p>
    <p>description: <?php echo e($article['description']); ?> </p>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
<p>Aucun article disponible.</p>
<?php endif; ?>
</body>
</html>

<?php /**PATH C:\projetlaravel\first-project\resources\views/blog.blade.php ENDPATH**/ ?>