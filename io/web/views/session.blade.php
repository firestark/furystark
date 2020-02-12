@extends ( 'master' )

@section ( 'navigation' )
    @include ( 'partials.up-arrow', [ 'link' => '/' ] )
@endsection

@section ( 'title' )
    {{ $scheme->exercises [ $round - 1 ]->name }} set {{ $set }}
@endsection

@section ( 'page' )
    <form action="/session/{{ $session->id }}" method="POST">
        <input type="hidden" name="exercise" value="{{ $exercise }}">
        <input type="hidden" name="round" value="{{ $round }}">
        <input type="hidden" name="set" value="{{ $set }}">

        <div class="mdc-text-field mdc-text-field--with-trailing-icon" id="exercise-field">
            <input type="number" step="0.1" id="kg" name="kg" class="mdc-text-field__input">
            <label class="mdc-floating-label" for="kg">Weight</label>
            <i class="mdc-text-field__icon" tabindex="0">KG</i>
            <div class="mdc-line-ripple"></div>
        </div>

        <button type="submit" class="mdc-button mdc-button--raised">
            <span class="mdc-button__label">Next</span>
        </button>
    </form>

@endsection


@section ( 'js' )
    @parent
    
    <script>
        mdc.textField.MDCTextField.attachTo ( document.getElementById ( 'exercise-field' ) );
    </script>    
@endsection