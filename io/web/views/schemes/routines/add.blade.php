@extends ( 'page.overview' )

@section ( 'title' )
    Add routine
@endsection

@section ( 'content' )
    <form action="/schemes/{{ $id }}/routines" method="POST">
        <div class="mdc-select" style="display: block;">
            <i class="mdc-select__dropdown-icon"></i>
            <select class="mdc-select__native-control" name="exercise">
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

        @include ( 'partials.form.fab', [ 'action' => 'save' ] )
    </form>
@endsection

@section ( 'js' )
    @parent
    
    <script>
        const select = new mdc.select.MDCSelect.attachTo ( document.querySelector ( '.mdc-select' ) );
    </script>
@endsection