<!doctype html>
<html lang="en-GB">

<head>
    <meta charset="utf-8">
    <title>Furystark</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="stylesheet" href="/dist/css/{{ Sess::get('theme', 'light') }}.css">
</head>

<body class="mdc-typography mdc-theme--background">
    @yield('content')

    @if (Sess::has('message'))
        <div class="mdc-snackbar mdc-snackbar--leading">
            <div class="mdc-snackbar__surface">
                <div class="mdc-snackbar__label"
                    role="status"
                    aria-live="polite">
                    {{ Sess::get('message', '') }}
                </div>
            </div>
        </div>
    @endif

    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
    <script src="/dist/js/bundle.js"></script>
    @yield('js')
</body>

</html>