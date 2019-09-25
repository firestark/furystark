<button type="submit" class="mdc-fab">
    <span class="mdc-fab__icon">
        <?php if( $action === 'save' ): ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
            </svg>
        <?php endif; ?>
    </span>
</button>

<?php $__env->startSection( 'js' ); ?>
    ##parent-placeholder-93f8bb0eb2c659b85694486c41717eaf0fe23cd4##
    
    <script>
        mdc.ripple.MDCRipple.attachTo ( document.querySelector ( '.mdc-fab' ) );
    </script>    
<?php $__env->stopSection(); ?><?php /**PATH C:\Users\aron\Documents\Projects\firestark\furystark\app\io\web\views/partials/form/fab.blade.php ENDPATH**/ ?>