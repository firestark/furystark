@extends ( 'page.overview' )

@section ( 'title' )
    Exercises
@endsection

@section ( 'content' )
    <ul class="mdc-list">
        @foreach ( $exercises as $exercise )
            <li class="mdc-list-item">
                <span class="mdc-list-item__text">{{ $exercise->name }}</span>
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