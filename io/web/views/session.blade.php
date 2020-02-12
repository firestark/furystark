@extends ( 'master' )

@section ( 'navigation' )
    @include ( 'partials.up-arrow', [ 'link' => '/' ] )
@endsection

@section ( 'title' )
    {{ $scheme->name }}
@endsection

@section ( 'page' )

    <ul>
        @foreach ( $scheme->exercises as $exercise )
            <li>
                {{ $exercise->name }}
                <ul>
                    @for ( $i = 1; $i <= $exercise->sets; $i++ )
                        <li>
                            Set {{ $i }}
                            <input type="number" name="test">
                        </li>
                    @endfor
                </ul>
            </li>
        @endforeach
    </ul>
@endsection


{{-- @section ( 'js' )
    @parent
    
    <script>
        mdc.textField.MDCTextField.attachTo ( document.getElementById ( 'exercise-field' ) );
    </script>    
@endsection --}}