<!doctype html>
<html lang="en-GB" data-theme="{{ Sess::get('theme', 'light') }}">

<head>
    <meta charset="utf-8">
    <title>Furystark</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css">
    <link rel="stylesheet" href="/dist/resources/styles/bundle.css">
</head>

<body class="mdc-typography">
    @yield('content')

    @if (Sess::has('message'))
        <div class="mdc-snackbar mdc-snackbar--leading">
            <div class="mdc-snackbar__surface">
                <div class="mdc-snackbar__label"
                    role="status"
                    aria-live="polite">
                    {{ Sess::get('message') }}
                </div>
            </div>
        </div>
    @endif

    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
    <script>        
        @if (Sess::has('message'))
            const snackbar = mdc.snackbar.MDCSnackbar.attachTo(document.querySelector('.mdc-snackbar'));
            snackbar.open();
        @endif
    </script>
    @yield('js')
</body>

</html>