<div class="mdc-menu-surface--anchor" style="position: relative; right: 16px;">
    <button id="accountButton" class="mdc-icon-button mdc-top-app-bar__action-item">
        @include ( 'partials.avatar' )
    </button>

    <div class="mdc-menu mdc-menu-surface" id="avatar-menu">
        <ul class="mdc-list mdc-list--linked" role="menu" aria-hidden="true" aria-orientation="vertical" tabindex="-1" style="min-width: 240px;">
            @if ( app::make ( person::class )->name === 'Aron' )
                <a href="/person/Martijn">
                    <li class="mdc-list-item" role="menuitem">
                        <span class="mdc-list-item__text">Martijn</span>
                    </li>
                </a>
            @else
                <a href="/person/Aron">
                    <li class="mdc-list-item" role="menuitem">
                        <span class="mdc-list-item__text">Aron</span>
                    </li>
                </a>
            @endif
        </ul>
    </div>
</div>

@section ( 'js' )
    <script>
        const menu = mdc.menu.MDCMenu.attachTo ( document.querySelector ( '.mdc-menu' ) );
        accountButton.onclick = function ( ) { menu.open = ! menu.open; }
    </script>
@endsection