@extends ( 'page.overview' )

@section ( 'title' )
    Exercises
@endsection

@section ( 'content' )
    <ul class="mdc-list">
        @foreach ( $exercises as $exercise )
            <li class="mdc-list-item">
                <span class="mdc-list-item__text">{{ $exercise->name }}</span>
                <a href="/remove/{{ $exercise->name }}" class="mdc-list-item__meta material-icons" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
                        <path d="M0 0h24v24H0z" fill="none"/>
                    </svg>
                </a>
            </li>
        @endforeach
    </ul>

    @include ( 'partials.link.fab', [ 'action' => 'add', 'link' => '/add' ] )
@endsection

@section ( 'js' )
    @parent
    
    {{-- <script>
        const exerciseList = mdc.list.MDCList.attachTo ( document.getElementById ( 'exercise-list' ) );
        const exerciseListItemRipples = exerciseList.listElements.map ( ( listItemEl ) => mdc.ripple.MDCRipple.attachTo ( listItemEl ) );
    </script> --}}
@endsection