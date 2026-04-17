<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo $__env->yieldContent('title', 'Todo App'); ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5/...">
</head>
<body class="bg-light">
<div class="container py-4">
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <?php echo $__env->yieldContent('content'); ?>
</div>
</body></html>
<?php /**PATH C:\projetlaravel\first-project\resources\views/layouts/app.blade.php ENDPATH**/ ?>