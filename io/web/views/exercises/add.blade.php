@extends ( 'page.overview' )

@section ( 'title' )
    Add exercise
@endsection

@section ( 'content' )

    <form action="/" method="POST">
        <div class="mdc-text-field">
            <input name="name" type="text" id="name-field" class="mdc-text-field__input">
            <label class="mdc-floating-label" for="name-field">Name</label>
            <div class="mdc-line-ripple"></div>
        </div>

        @include ( 'partials.form.fab', [ 'action' => 'save' ] )
    </form>
    
@endsection

@section ( 'js' )
    @parent
    
    <script>
        {{-- const exerciseList = mdc.list.MDCList.attachTo ( document.getElementById ( 'exercise-list' ) );
        const exerciseListItemRipples = exerciseList.listElements.map ( ( listItemEl ) => mdc.ripple.MDCRipple.attachTo ( listItemEl ) ); --}}

        mdc.textField.MDCTextField.attachTo ( document.querySelector ( '.mdc-text-field' ) );
    </script>
@endsection