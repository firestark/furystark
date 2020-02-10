<div class="mdc-menu-surface--anchor" style="position: relative; right: 16px;">
    <button id="accountButton" class="mdc-icon-button mdc-top-app-bar__action-item">
        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
            <path d="M0 0h24v24H0z" fill="none"/>
        </svg>
    </button>

    <div class="mdc-menu mdc-menu-surface" id="avatar-menu">
        <ul class="mdc-list mdc-list--linked" role="menu" aria-hidden="true" aria-orientation="vertical" tabindex="-1" style="min-width: 240px;">
            <a href="/?person=Martijn">
                <li class="mdc-list-item" role="menuitem">
                    <span class="mdc-list-item__text">Martijn</span>
                </li>
            </a>
            <a href="/?person=Aron">
                <li class="mdc-list-item" role="menuitem">
                    <span class="mdc-list-item__text">Aron</span>
                </li>
            </a>
        </ul>
    </div>
</div>

@section ( 'js' )
    <script>
        const menu = mdc.menu.MDCMenu.attachTo ( document.querySelector ( '.mdc-menu' ) );
        accountButton.onclick = function ( ) { menu.open = ! menu.open; }
    </script>
@endsection