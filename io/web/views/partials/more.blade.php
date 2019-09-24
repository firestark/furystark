<div id="demo-menu" class="mdc-menu-surface--anchor">
    <button id="menuButton" class="mdc-top-app-bar__action-item">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path d="M0 0h24v24H0z" fill="none"/>
            <path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
        </svg>
    </button>

    <div class="mdc-menu mdc-menu-surface" id="avatar-menu">
        <ul class="mdc-list mdc-list--linked" role="menu" aria-hidden="true" aria-orientation="vertical" tabindex="-1" style="min-width: 240px;">
            <li class="mdc-list-item" role="menuitem">
                <a href="/logout">
                    <span class="mdc-list-item__text">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</div>

@section ( 'js' )
    <script>
        const menu = mdc.menu.MDCMenu.attachTo ( document.querySelector ( '.mdc-menu' ) );
        menuButton.onclick = function ( ) { menu.open = ! menu.open; }
    </script>
@endsection