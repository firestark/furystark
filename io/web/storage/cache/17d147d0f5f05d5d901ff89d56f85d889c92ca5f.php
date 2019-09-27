<?php $__env->startSection( 'title' ); ?>
    <span id="title" contenteditable="true"><?php echo e($scheme->name); ?></span>
<?php $__env->stopSection(); ?>

<?php $__env->startSection( 'content' ); ?>
    <form id="scheme_name" action="/schemes/<?php echo e($scheme->id); ?>" method="POST" style="display:none;">
        <div class="mdc-text-field">
            <input name="name" type="text" id="name_field" class="mdc-text-field__input" value="<?php echo e($scheme->name); ?>">
            <label class="mdc-floating-label" for="name_field">Name</label>
            <div class="mdc-line-ripple"></div>
        </div>

        <?php echo $__env->make( 'partials.form.fab', [ 'action' => 'save' ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </form>

    <ul id="routine-list" class="mdc-list mdc-list--two-line">
        <?php $__currentLoopData = $scheme->routines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $routine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="mdc-list-item" tabindex="0">
                <span class="mdc-list-item__text">
                    <span class="mdc-list-item__primary-text"><?php echo e($routine->exercise->name); ?></span>
                    <span class="mdc-list-item__secondary-text"><?php echo e($routine->sets); ?> x <?php echo e($routine->reps); ?></span>
                </span>

                <a href="/schemes/<?php echo e($scheme->id); ?>/routines/<?php echo e($routine->id); ?>/remove" class="mdc-list-item__meta material-icons" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
                        <path d="M0 0h24v24H0z" fill="none"/>
                    </svg>
                </a>    
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>


    <?php echo $__env->make( 'partials.link.fab', [ 'link' => "/schemes/{$scheme->id}/routines/add", 'action' => 'add' ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection( 'js' ); ?>
    ##parent-placeholder-93f8bb0eb2c659b85694486c41717eaf0fe23cd4##
    
    <script>
        const routineList = mdc.list.MDCList.attachTo ( document.getElementById ( 'routine-list' ) );
        routineList.listElements.map ( ( listItemEl ) => mdc.ripple.MDCRipple.attachTo ( listItemEl ) );

        document.getElementById ( 'title' ).addEventListener ( 'blur', function ( ) 
        {
            name_field.value = this.innerHTML
            scheme_name.submit ( );
        } );
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make( 'page.overview' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\aron\Documents\Projects\firestark\furystark\app\io\web\views/schemes/edit.blade.php ENDPATH**/ ?>