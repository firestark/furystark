<?php $__env->startSection( 'title' ); ?>
    <?php echo e($scheme->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection( 'content' ); ?>
    <form action="/exercises" method="POST">
        <div class="mdc-text-field">
            <input name="name" type="text" id="name-field" class="mdc-text-field__input" value="<?php echo e($scheme->name); ?>">
            <label class="mdc-floating-label" for="name-field">Name</label>
            <div class="mdc-line-ripple"></div>
        </div>

        <?php echo $__env->make( 'partials.form.fab', [ 'action' => 'save' ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </form>

    <div style="margin-top: 32px;">
        <button class="mdc-button" id="add-routine-button">
            <span class="mdc-button__label">Add routine</span>
        </button>
        <ul id="routine-list" class="mdc-list mdc-list--two-line">
            <?php $__currentLoopData = $scheme->routines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $routine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="mdc-list-item" tabindex="0">
                    <span class="mdc-list-item__text">
                        <span class="mdc-list-item__primary-text"><?php echo e($routine->exercise->name); ?></span>
                        <span class="mdc-list-item__secondary-text"><?php echo e($routine->sets); ?> x <?php echo e($routine->reps); ?></span>
                    </span>

                    <a href="/schemes/<?php echo e($scheme->id); ?>remove/<?php echo e($routine->id); ?>" class="mdc-list-item__meta material-icons" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
                            <path d="M0 0h24v24H0z" fill="none"/>
                        </svg>
                    </a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>


    <div class="mdc-dialog"
        role="alertdialog"
        aria-modal="true"
        aria-labelledby="my-dialog-title"
        aria-describedby="my-dialog-content">
        
        <div class="mdc-dialog__container">
            <div class="mdc-dialog__surface">
                <!-- Title cannot contain leading whitespace due to mdc-typography-baseline-top() -->
                <h2 class="mdc-dialog__title" id="my-dialog-title"><!--
                -->Add routine<!--
            --></h2>
                <form action="/exercises" method="POST">
                    <div class="mdc-dialog__content" id="my-dialog-content">
                        <div class="mdc-select" style="display: block;">
                            <i class="mdc-select__dropdown-icon"></i>
                            <select class="mdc-select__native-control">
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
                    </div>
                    <footer class="mdc-dialog__actions">
                        <button type="button" class="mdc-button mdc-dialog__button" data-mdc-dialog-action="no">
                            <span class="mdc-button__label">Cancel</span>
                        </button>
                        <button type="button" class="mdc-button mdc-dialog__button" data-mdc-dialog-action="yes">
                            <span class="mdc-button__label">Add</span>
                        </button>
                    </footer>
                </form>
            </div>
        </div>
        <div class="mdc-dialog__scrim"></div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection( 'js' ); ?>
    ##parent-placeholder-93f8bb0eb2c659b85694486c41717eaf0fe23cd4##
    
    <script>
        const routineList = mdc.list.MDCList.attachTo ( document.getElementById ( 'routine-list' ) );
        routineList.listElements.map ( ( listItemEl ) => mdc.ripple.MDCRipple.attachTo ( listItemEl ) );

        const dialog = mdc.dialog.MDCDialog.attachTo ( document.querySelector ( '.mdc-dialog' ) );

        const button = document.getElementById ( 'add-routine-button' );
        button.onclick = function ( )
        {
            dialog.open ( );
        }

        const select = new mdc.select.MDCSelect.attachTo ( document.querySelector ( '.mdc-select' ) );
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make( 'page.overview' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\aron\Documents\Projects\firestark\furystark\app\io\web\views/schemes/edit.blade.php ENDPATH**/ ?>