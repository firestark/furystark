@extends('master')

@section('style')
    <style>
        .mdc-snackbar {
            bottom: 8px;
        }
    </style>
@endsection

@section('content')

    <span style="position: absolute; right: 16px; top: 16px;">
        @include('partials.theme-switcher')
    </span>

    <main style="display: grid; height: 100vh;">
        <section id="login" class="mdc-card">
            <form action="{{ request::getUri()->getPath() }}" method="POST">
                
                <label class="mdc-text-field mdc-text-field--with-leading-icon" id="username-input">
                    <i class="mdc-text-field__icon mdc-text-field__icon--leading" tabindex="0" role="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="none" d="M0 0h24v24H0V0z"/>
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
                        </svg>
                    </i>
                    <input type="text" id="username" name="username" class="mdc-text-field__input" required autocomplete="on" tabindex="1">
                    <span class="mdc-floating-label" id="my-label-id">Username</span>
                    <div class="mdc-line-ripple"></div>
                </label>

                <label class="mdc-text-field mdc-text-field--with-leading-icon" id="password-input">
                    <i class="mdc-text-field__icon mdc-text-field__icon--leading" tabindex="0" role="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="none" d="M0 0h24v24H0V0z"/>
                            <path d="M12 13c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm6-5h-1V6c0-2.76-2.24-5-5-5-2.28 0-4.27 1.54-4.84 3.75-.14.54.18 1.08.72 1.22.53.14 1.08-.18 1.22-.72C9.44 3.93 10.63 3 12 3c1.65 0 3 1.35 3 3v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm0 11c0 .55-.45 1-1 1H7c-.55 0-1-.45-1-1v-8c0-.55.45-1 1-1h10c.55 0 1 .45 1 1v8z"/>
                        </svg>
                    </i>
                    <input type="password" id="password" name="password" class="mdc-text-field__input" required tabindex="2">
                    <span class="mdc-floating-label" id="my-label-id">Password</span>
                    <div class="mdc-line-ripple"></div>
                </label>

                <div style="display: flex; align-items: center; justify-content: flex-end; margin-top: 24px;">
                    <button type="submit" class="mdc-button mdc-button--raised">
                        <span class="mdc-button__label">login</span>
                    </button>
                </div>
            </form>
        </section>
    </main>

@endsection

@section('js')
    <script>
        mdc.textField.MDCTextField.attachTo(document.getElementById('username-input'));
        mdc.textField.MDCTextField.attachTo(document.getElementById('password-input'));
        
        mdc.ripple.MDCRipple.attachTo(document.querySelector('.mdc-button'));
    </script>
@endsection