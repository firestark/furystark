<?php $__env->startSection( 'title' ); ?>
    Schemes
<?php $__env->stopSection(); ?>

<?php $__env->startSection( 'content' ); ?>
    <ul class="mdc-list">
        <?php $__currentLoopData = $schemes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scheme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="mdc-list-item">
                <a href="/schemes/<?php echo e($scheme->id); ?>">
                    <span class="mdc-list-item__text"><?php echo e($scheme->name); ?></span>
                    <a href="/remove/<?php echo e($scheme->id); ?>" class="mdc-list-item__meta material-icons" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
                            <path d="M0 0h24v24H0z" fill="none"/>
                        </svg>
                    </a>
                </a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

    <?php echo $__env->make( 'partials.link.fab', [ 'action' => 'add', 'link' => '/schemes/add' ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make( 'page.overview' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\aron\Documents\Projects\firestark\furystark\app\io\web\views/schemes/list.blade.php ENDPATH**/ ?>