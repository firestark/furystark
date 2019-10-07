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

    <div class="mdc-dialog"
        role="alertdialog"
        aria-modal="true"
        aria-labelledby="my-dialog-title"
        aria-describedby="my-dialog-content">
        
        <div class="mdc-dialog__container">
            <div class="mdc-dialog__surface">
                <!-- Title cannot contain leading whitespace due to mdc-typography-baseline-top() -->
                <h2 class="mdc-dialog__title" id="my-dialog-title"><!--
                -->Add new scheme<!--
            --></h2>
                <form action="/schemes" method="POST">
                    <div class="mdc-dialog__content" id="my-dialog-content">
                        <div class="mdc-text-field">
                            <input name="name" type="text" id="my-text-field" class="mdc-text-field__input" autocomplete="off">
                            <label class="mdc-floating-label" for="my-text-field">Name</label>
                            <div class="mdc-line-ripple"></div>
                        </div>
                    </div>
                    <footer class="mdc-dialog__actions">
                        <button type="button" class="mdc-button mdc-dialog__button" data-mdc-dialog-action="no">
                            <span class="mdc-button__label">Cancel</span>
                        </button>
                        <button type="submit" class="mdc-button mdc-dialog__button" data-mdc-dialog-action="yes">
                            <span class="mdc-button__label">Add</span>
                        </button>
                    </footer>
                </form>
            </div>
        </div>
        <div class="mdc-dialog__scrim"></div>
    </div>

    <button id="add_scheme" class="mdc-fab">
        <span class="mdc-fab__icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
                <path d="M0 0h24v24H0z" fill="none"/>
            </svg>
        </span>
    </button>
<?php $__env->stopSection(); ?>


<?php $__env->startSection( 'js' ); ?>
    <script>
        const dialog = new mdc.dialog.MDCDialog.attachTo ( document.querySelector ( '.mdc-dialog' ) );
        add_scheme.onclick = function ( )
        {
            dialog.open ( );
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make( 'page.overview' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/aron/Documents/firestark/furystark/io/web/views/schemes/list.blade.php ENDPATH**/ ?>