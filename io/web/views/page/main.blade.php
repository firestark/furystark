@extends ( 'master' )


@section ( 'content' )
    <header class="mdc-top-app-bar mdc-elevation--z2" style="position: relative;">
        <div class="mdc-top-app-bar__row">
            <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
                @yield ( 'navigation' )
                <span class="mdc-top-app-bar__title">@yield ( 'title' )</span>
            </section>
            <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end">                
                
                @include ( 'partials.theme-switcher' )
                @include ( 'partials.account' )
            </section>
        </div>
    </header>    

    <main>
        @yield ( 'page' )
    </main>

@endsection