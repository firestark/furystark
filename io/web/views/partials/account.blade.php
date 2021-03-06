<div class="mdc-menu-surface--anchor" style="position: relative; right: 16px;">
    <button id="accountButton" class="mdc-icon-button mdc-top-app-bar__action-item">
        @include('partials.avatar')
    </button>

    <div class="mdc-menu mdc-menu-surface" id="avatar-menu">
        <ul class="mdc-list mdc-list--linked" role="menu" aria-hidden="true" aria-orientation="vertical" tabindex="-1" style="min-width: 240px;">
            <a href="/logout">
                <li class="mdc-list-item" role="menuitem">
                    <span class="mdc-list-item__text">Logout</span>
                </li>
            </a>
        </ul>
    </div>
</div>

@section('js')
    <script>
        const menu = mdc.menu.MDCMenu.attachTo(document.querySelector('.mdc-menu'));
        accountButton.onclick = function() { menu.open = ! menu.open; }
    </script>
@endsection