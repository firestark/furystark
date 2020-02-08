@extends ( 'master' )

@section ( 'page' )
    <ul>
        @foreach ( $schemes as $scheme )
            <li><a href="/{{ $scheme->id }}?person={{ $person->name }}">{{ $scheme->name }}</a></li>
        @endforeach
    </ul>
@endsection