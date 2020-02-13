<!doctype html>
<html lang="en-GB">

<head>
    <meta charset="utf-8">
    <title>Furystark</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css">
    <link rel="stylesheet" href="/resources/css/main.css">
</head>

<body class="mdc-typography">
    <header class="mdc-top-app-bar mdc-elevation--z2" style="position: relative;">
        <div class="mdc-top-app-bar__row">
            <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
                @yield ( 'navigation' )
                <span class="mdc-top-app-bar__title">@yield ( 'title' )</span>
            </section>
            <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end">                
                        
                @include ( 'partials.account' )
            </section>
        </div>
    </header>



    

    <main>
        @yield ( 'page' )
    </main>

    @if ( sess::has ( 'message' ) )
        <div class="mdc-snackbar mdc-snackbar--leading">
            <div class="mdc-snackbar__surface">
                <div class="mdc-snackbar__label"
                    role="status"
                    aria-live="polite">
                    {{ sess::get ( 'message' ) }}
                </div>
            </div>
        </div>
    @endif


    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
    <script>        
        @if ( sess::has ( 'message' ) )
            const snackbar = mdc.snackbar.MDCSnackbar.attachTo ( document.querySelector ( '.mdc-snackbar' ) );
            snackbar.open ( );
        @endif
    </script>
    @yield ( 'js' )
</body>

</html>