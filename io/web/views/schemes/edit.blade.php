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
        <button class="mdc-button" id="add-routine-button">
            <span class="mdc-button__label">Add routine</span>
        </button>
        <ul id="routine-list" class="mdc-list mdc-list--two-line">
            @foreach ( $scheme->routines as $routine )
                <li class="mdc-list-item" tabindex="0">
                    <span class="mdc-list-item__text">
                        <span class="mdc-list-item__primary-text">{{ $routine->exercise->name }}</span>
                        <span class="mdc-list-item__secondary-text">{{ $routine->sets }} x {{ $routine->reps }}</span>
                    </span>

                    <a href="/schemes/{{ $scheme->id }}remove/{{ $routine->id }}" class="mdc-list-item__meta material-icons" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
                            <path d="M0 0h24v24H0z" fill="none"/>
                        </svg>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>


    <div class="mdc-dialog"
        role="alertdialog"
        aria-modal="true"
        aria-labelledby="my-dialog-title"
        aria-describedby="my-dialog-content">
        
        <div class="mdc-dialog__container">
            <div class="mdc-dialog__surface">
                <!-- Title cannot contain leading whitespace due to mdc-typography-baseline-top() -->
                <h2 class="mdc-dialog__title" id="my-dialog-title"><!--
                -->Add routine<!--
            --></h2>
                <form action="/exercises" method="POST">
                    <div class="mdc-dialog__content" id="my-dialog-content">
                        <div class="mdc-select" style="display: block;">
                            <i class="mdc-select__dropdown-icon"></i>
                            <select class="mdc-select__native-control">
                                <option value="" disabled selected></option>
                                
                                @foreach ( $exercises as $exercise )
                                    <option value="{{ $exercise->name }}">
                                        {{ $exercise->name }}
                                    </option>
                                @endforeach                                
                            </select>
                            <label class="mdc-floating-label">Exercise</label>
                            <div class="mdc-line-ripple"></div>
                        </div>

                        <div class="mdc-text-field">
                            <input name="sets" type="number" id="sets-field" class="mdc-text-field__input">
                            <label class="mdc-floating-label" for="sets-field">Sets</label>
                            <div class="mdc-line-ripple"></div>
                        </div>

                        <div class="mdc-text-field">
                            <input name="reps" type="number" id="reps-field" class="mdc-text-field__input">
                            <label class="mdc-floating-label" for="reps-field">Reps</label>
                            <div class="mdc-line-ripple"></div>
                        </div>
                    </div>
                    <footer class="mdc-dialog__actions">
                        <button type="button" class="mdc-button mdc-dialog__button" data-mdc-dialog-action="no">
                            <span class="mdc-button__label">Cancel</span>
                        </button>
                        <button type="button" class="mdc-button mdc-dialog__button" data-mdc-dialog-action="yes">
                            <span class="mdc-button__label">Add</span>
                        </button>
                    </footer>
                </form>
            </div>
        </div>
        <div class="mdc-dialog__scrim"></div>
    </div>

@endsection

@section ( 'js' )
    @parent
    
    <script>
        const routineList = mdc.list.MDCList.attachTo ( document.getElementById ( 'routine-list' ) );
        routineList.listElements.map ( ( listItemEl ) => mdc.ripple.MDCRipple.attachTo ( listItemEl ) );

        const dialog = mdc.dialog.MDCDialog.attachTo ( document.querySelector ( '.mdc-dialog' ) );

        const button = document.getElementById ( 'add-routine-button' );
        button.onclick = function ( )
        {
            dialog.open ( );
        }

        const select = new mdc.select.MDCSelect.attachTo ( document.querySelector ( '.mdc-select' ) );
    </script>
@endsection