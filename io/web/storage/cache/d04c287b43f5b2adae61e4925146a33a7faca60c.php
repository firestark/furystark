<?php $__env->startSection( 'title' ); ?>
    Add exercise
<?php $__env->stopSection(); ?>

<?php $__env->startSection( 'content' ); ?>

    <form action="/" method="POST">
        <div class="mdc-text-field">
            <input name="name" type="text" id="name-field" class="mdc-text-field__input">
            <label class="mdc-floating-label" for="name-field">Name</label>
            <div class="mdc-line-ripple"></div>
        </div>

        <?php echo $__env->make( 'partials.form.fab', [ 'action' => 'save' ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </form>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection( 'js' ); ?>
    ##parent-placeholder-93f8bb0eb2c659b85694486c41717eaf0fe23cd4##
    
    <script>
        

        mdc.textField.MDCTextField.attachTo ( document.querySelector ( '.mdc-text-field' ) );
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make( 'page.overview' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\aron\Documents\Projects\firestark\furystark\app\io\web\views/exercises/add.blade.php ENDPATH**/ ?>