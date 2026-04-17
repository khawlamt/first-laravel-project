

<?php $__env->startSection('title','Services'); ?>

<?php $__env->startSection('content'); ?>

<h1>Nos services</h1>

<?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div style="background:#f5f5f5;padding:20px;margin-bottom:10px">

<h3><?php echo e($service['nom']); ?></h3>

<p>Prix : <?php echo e($service['prix']); ?></p>

</div>


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\projetlaravel\first-project\resources\views/services.blade.php ENDPATH**/ ?>