@extends ( 'master' )

@section ( 'title' )
    My schemes
@endsection

@section ( 'page' )
    <ul class="mdc-list">
        @foreach ( $schemes as $scheme )
            <li class="mdc-list-item">
                <span 
                    class="mdc-list-item__graphic" 
                    aria-hidden="true">
                    <a href="/{{ $scheme->id }}?person={{ $person->name }}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                            <path d="M8 5v14l11-7z"/>
                            <path d="M0 0h24v24H0z" fill="none"/>
                        </svg>
                    </a>
                </span>
                
                

                <span class="mdc-list-item__text">
                    <a href="/{{ $scheme->id }}?person={{ $person->name }}">{{ $scheme->name }}</a>
                </span>

                <a href="#" class="mdc-list-item__meta" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                        <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/>
                        <path d="M0 0h24v24H0z" fill="none"/>
                    </svg>
                </a>
            </li>
        @endforeach
    </ul>
@endsection