@extends ( 'master' )

@section ( 'navigation' )
    @include ( 'partials.up-arrow', [ 'link' => '/' ] )
@endsection

@section ( 'title' )
    {{ $scheme->name }}
@endsection

@section ( 'page' )
    <form action="/session/{{ $session->id }}" method="POST">
    
        @foreach ( $scheme->exercises as $exercise )
            <h2 class="mdc-typography--subtitle1">{{ $exercise->name }}</h2>
            @for ( $i = 1; $i <= $exercise->sets; $i++ )
                <div class="mdc-text-field">
                    <input type="text" id="{{ $exercise->id }}-{{ $i }}" class="mdc-text-field__input" name="exercises[{{ $exercise->id }}][{{ $i }}]">
                    <label for="{{ $exercise->id }}-{{ $i }}" class="mdc-floating-label">Set {{ $i }}</label>
                    <div class="mdc-line-ripple"></div>
                </div>
            @endfor
        @endforeach

        @include ( 'partials.form.fab', [ 'action' => 'save' ] )
    </form>
@endsection


@section ( 'js' )
    @parent
    
    <script>
        document.querySelectorAll ( '.mdc-text-field' ).forEach( ( input ) => {
            mdc.textField.MDCTextField.attachTo ( input );
        });
    </script>    
@endsection