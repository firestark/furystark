@extends ( 'page.overview' )

@section ( 'title' )
    {{ $scheme->name }}
@endsection

@section ( 'content' )
    <form action="/exercises" method="POST">
        <div class="mdc-text-field">
            <input name="name" type="text" id="name-field" class="mdc-text-field__input" value="{{ $scheme->name }}">
            <label class="mdc-floating-label" for="name-field">Name</label>
            <div class="mdc-line-ripple"></div>
        </div>

        @include ( 'partials.form.fab', [ 'action' => 'save' ] )
    </form>

    <div style="margin-top: 32px;">
        <a href="/schemes/{{ $scheme->id }}/routines/add" class="mdc-button">
            <span class="mdc-button__label">Add routine</span>
        </a>
        <ul id="routine-list" class="mdc-list mdc-list--two-line">
            @foreach ( $scheme->routines as $routine )
                <li class="mdc-list-item" tabindex="0">
                    <span class="mdc-list-item__text">
                        <span class="mdc-list-item__primary-text">{{ $routine->exercise->name }}</span>
                        <span class="mdc-list-item__secondary-text">{{ $routine->sets }} x {{ $routine->reps }}</span>
                    </span>

                    <a href="/schemes/routines{{ $scheme->id }}remove/{{ $routine->id }}" class="mdc-list-item__meta material-icons" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
                            <path d="M0 0h24v24H0z" fill="none"/>
                        </svg>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>


    

@endsection

@section ( 'js' )
    @parent
    
    <script>
        const routineList = mdc.list.MDCList.attachTo ( document.getElementById ( 'routine-list' ) );
        routineList.listElements.map ( ( listItemEl ) => mdc.ripple.MDCRipple.attachTo ( listItemEl ) );
    </script>
@endsection