<?php $__env->startSection( 'title' ); ?>
    Exercises
<?php $__env->stopSection(); ?>

<?php $__env->startSection( 'content' ); ?>
    <ul class="mdc-list">
        <?php $__currentLoopData = $exercises; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exercise): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="mdc-list-item">
                <span class="mdc-list-item__text"><?php echo e($exercise->name); ?></span>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

    <?php echo $__env->make( 'partials.link.fab', [ 'action' => 'add', 'link' => '/add' ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection( 'js' ); ?>
    ##parent-placeholder-93f8bb0eb2c659b85694486c41717eaf0fe23cd4##
    
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make( 'page.overview' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\aron\Documents\Projects\firestark\furystark\app\io\web\views/exercises/list.blade.php ENDPATH**/ ?>