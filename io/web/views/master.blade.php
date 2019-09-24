<!doctype html>
<html lang="en-GB" data-theme="{{ session::has ( 'theme' ) ? session::get ( 'theme' ) : 'light' }}">

<head>
    <meta charset="utf-8">
    <title>Furystark</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css">
    <link rel="stylesheet" href="/resources/styles/bundle.css">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    @yield ( 'style' )
</head>

<body class="mdc-typography">

    <header class="mdc-top-app-bar">
        <div class="mdc-top-app-bar__row">
            <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
            <button class="mdc-top-app-bar__navigation-icon mdc-icon-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M0 0h24v24H0z" fill="none"/>
                    <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/>
                </svg>
            </button>
            <span class="mdc-top-app-bar__title">Title</span>
            </section>
        </div>
    </header>
  
    @yield ( 'page' )

    @if ( session::has ( 'message' ) )
        <div class="mdc-snackbar mdc-snackbar--leading">
            <div class="mdc-snackbar__surface">
                <div class="mdc-snackbar__label"
                    role="status"
                    aria-live="polite">
                    {{ session::get ( 'message' ) }}
                </div>
            </div>
        </div>
    @endif

    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
    <script src="/resources/bundle.js" async></script>
    
    <script>        
        @if ( session::has ( 'message' ) )
            const snackbar = mdc.snackbar.MDCSnackbar.attachTo ( document.querySelector ( '.mdc-snackbar' ) );
            snackbar.open ( );
        @endif
    </script>
    
    @yield ( 'js' )  
</body>

</html>