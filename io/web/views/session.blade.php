@extends ( 'master' )

@section ( 'navigation' )
    @include ( 'partials.up-arrow', [ 'link' => '/' ] )
@endsection

@section ( 'title' )
    {{ $scheme->exercises [ 0 ]->name }} set 1
@endsection

@section ( 'page' )
    {{-- @foreach ( $scheme->exercises as $exercise )
        <h2>{{ $exercise->name }}</h2>

        @for ( $i = 1; $i <= $exercise->sets; $i++ )
            {{ $i }} <input type="number">
        @endfor
    @endforeach --}}

    

    <form action="">
        <div class="mdc-text-field mdc-text-field--with-trailing-icon" id="exercise-field">
            <input type="number" step="0.1" id="my-text-field" class="mdc-text-field__input">
            <label class="mdc-floating-label" for="my-text-field">Weight</label>
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