@extends ( 'master' )

@section ( 'page' )
    <h1>{{ $scheme->name }}</h1>

    @foreach ( $scheme->exercises as $exercise )
        <h2>{{ $exercise->name }}</h2>

        @for ( $i = 1; $i <= $exercise->sets; $i++ )
            {{ $i }} <input type="number">
        @endfor
    @endforeach


@endsection