<?php $__env->startSection('content'); ?>
<div class="container" style="max-width: 700px; margin: 0 auto; padding: 2rem;">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>📋 Mes Tâches</h2>
        <a href="<?php echo e(route('tasks.create')); ?>" class="btn btn-primary">+ Nouvelle tâche</a>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <?php $__empty_1 = true; $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="card mb-2">
            <div class="card-body d-flex justify-content-between">
                <div>
                    <h5 class="<?php echo e($task->completed ? 'text-decoration-line-through text-muted' : ''); ?>">
                        <?php echo e($task->title); ?>

                    </h5>
                    <p class="text-muted mb-0"><?php echo e($task->description); ?></p>
                </div>
                <div class="d-flex gap-2 align-items-start">

                    
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $task)): ?>
                        <a href="<?php echo e(route('tasks.edit', $task)); ?>"
                           class="btn btn-sm btn-outline-primary">Modifier</a>
                    <?php endif; ?>

                    
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $task)): ?>
                        <form action="<?php echo e(route('tasks.destroy', $task)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Supprimer ?')">
                                Supprimer
                            </button>
                        </form>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p>Aucune tâche. <a href="<?php echo e(route('tasks.create')); ?>">Créer votre première tâche</a></p>
    <?php endif; ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\projetlaravel\first-project\resources\views/tasks/index.blade.php ENDPATH**/ ?>