<?php $__env->startSection( 'title' ); ?>
    Add routine
<?php $__env->stopSection(); ?>

<?php $__env->startSection( 'content' ); ?>
    <form action="/schemes/<?php echo e($id); ?>/routines" method="POST">
        <div class="mdc-select" style="display: block;">
            <i class="mdc-select__dropdown-icon"></i>
            <select class="mdc-select__native-control" name="exercise">
                <option value="" disabled selected></option>
                
                <?php $__currentLoopData = $exercises; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exercise): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($exercise->name); ?>">
                        <?php echo e($exercise->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                
            </select>
            <label class="mdc-floating-label">Exercise</label>
            <div class="mdc-line-ripple"></div>
        </div>

        <div class="mdc-text-field">
            <input name="sets" type="number" id="sets-field" class="mdc-text-field__input">
            <label class="mdc-floating-label" for="sets-field">Sets</label>
            <div class="mdc-line-ripple"></div>
        </div>

        <div class="mdc-text-field">
            <input name="reps" type="number" id="reps-field" class="mdc-text-field__input">
            <label class="mdc-floating-label" for="reps-field">Reps</label>
            <div class="mdc-line-ripple"></div>
        </div> 

        <?php echo $__env->make( 'partials.form.fab', [ 'action' => 'save' ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection( 'js' ); ?>
    ##parent-placeholder-93f8bb0eb2c659b85694486c41717eaf0fe23cd4##
    
    <script>
        const select = new mdc.select.MDCSelect.attachTo ( document.querySelector ( '.mdc-select' ) );
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make( 'page.overview' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\aron\Documents\Projects\firestark\furystark\app\io\web\views/schemes/routines/add.blade.php ENDPATH**/ ?>