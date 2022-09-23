

<?php $__env->startSection('content'); ?>
    <div class="hello">
        <?php echo e($msg); ?>

        <a href="<?= url('/msg') ?>">Reload with message!</a>
        <?php if(session()->has('success')): ?>
            <?php echo e(session('success')); ?>

        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Meu Computador\Documents\dev\php\homely\views/home.blade.php ENDPATH**/ ?>