@extends ( 'master' )

@section ( 'navigation' )
    @include ( 'partials.up-arrow', [ 'link' => '/' ] )
@endsection

@section ( 'title' )
    {{ $scheme->name }}
@endsection

@section ( 'page' )
    <ul class="mdc-list">
        @foreach ( $sessions as $session )
            <li class="mdc-list-item">
                {{-- <span 
                    class="mdc-list-item__graphic" 
                    aria-hidden="true">
                    <a href="/{{ $scheme->id }}/start?person={{ $person->name }}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                            <path d="M8 5v14l11-7z"/>
                            <path d="M0 0h24v24H0z" fill="none"/>
                        </svg>
                    </a>
                </span> --}}
                
                

                <span class="mdc-list-item__text">
                    <a href="/session/{{ $session->id }}?person={{ $person->name }}">{{ $session->id }}</a>
                </span>

                <a href="/session/{{ $session->id }}/remove" class="mdc-list-item__meta" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                        <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
                        <path d="M0 0h24v24H0z" fill="none"/>
                    </svg>
                </a>
            </li>
        @endforeach
    </ul>
@endsection