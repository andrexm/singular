<?php $__env->startSection('content'); ?>
    <?php if(session()->has("error")): ?>
        <div>
            <?php echo e(session()->flash("error")); ?>

        </div>
    <?php endif; ?>

    <?php if(!auth()->guest()): ?>
        <?php echo e("Olá, " . auth()->activeUser()->first_name . "!"); ?>

    <?php endif; ?>

    <form action="/login" method="post">
        <?php echo csrf(); ?>

        <input type="text" name="email" /><br>
        <input type="password" name="password" /><br>
        <button>Enviar</button>
    </form>

    <div>
        <a href="logout">Logout</a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/andre/dev/singular/views/login.blade.php ENDPATH**/ ?>