

<?php $__env->startSection('title','Contact'); ?>

<?php $__env->startSection('content'); ?>

<h1>Contactez-nous</h1>

<p>Email : <?php echo e($contacts['email']); ?></p>

<p>Téléphone : <?php echo e($contacts['telephone']); ?></p>

<p>Adresse : <?php echo e($contacts['adresse']); ?></p>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\projetlaravel\first-project\resources\views/contact.blade.php ENDPATH**/ ?>