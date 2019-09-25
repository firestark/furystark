<button type="submit" class="mdc-fab">
    <span class="mdc-fab__icon">
        @if ( $action === 'save' )
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
            </svg>
        @endif
    </span>
</button>

@section ( 'js' )
    @parent
    
    <script>
        mdc.ripple.MDCRipple.attachTo ( document.querySelector ( '.mdc-fab' ) );
    </script>    
@endsection