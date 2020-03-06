@extends('master')


@section('content')
    <div style="display: flex; height: 100%; width: 100%;">
        <aside class="mdc-drawer">
            <div class="mdc-drawer__header">
                <h3 class="mdc-drawer__title">{{ User::name() }}</h3>
                <h6 class="mdc-drawer__subtitle"></h6>
            </div>
            <div class="mdc-drawer__content">
                <nav class="mdc-list">
                    <a class="mdc-list-item mdc-list-item--activated" href="/" aria-current="page" style="display: flex;">
                        <svg class="mdc-list-item__graphic" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                            <path d="M0 0h24v24H0z" fill="none"/>
                            <path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/>
                        </svg>
                        <span class="mdc-list-item__text">Schemes</span>
                    </a>
                    {{-- <a class="mdc-list-item" href="#">
                        <i class="material-icons mdc-list-item__graphic" aria-hidden="true">send</i>
                        <span class="mdc-list-item__text">Outgoing</span>
                    </a>
                    <a class="mdc-list-item" href="#">
                        <i class="material-icons mdc-list-item__graphic" aria-hidden="true">drafts</i>
                        <span class="mdc-list-item__text">Drafts</span>
                    </a> --}}
                </nav>
            </div>
        </aside>

        <div class="mdc-drawer-app-content" style="width: 100%;">
            <header class="mdc-top-app-bar mdc-elevation--z2" style="position: relative;">
                <div class="mdc-top-app-bar__row">
                    <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
                        @yield('navigation')
                        <span class="mdc-top-app-bar__title">@yield('title')</span>
                    </section>
                    <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end">                
                        
                        <span style="color: white;">
                            @include('partials.theme-switcher')
                        </span>
                        @include('partials.account')
                    </section>
                </div>
                @if (View::hasSection('tabs'))
                    <div class="mdc-top-app-bar__row mdc-top-app-bar__tab-row">
                        @yield('tabs')
                    </div>
                @endif
            </header>

            <main>
                @yield('page')
            </main>
        </div>
    </div>
@endsection