<div class="form-field form-field--with-helper"> 
    <div class="mdc-text-field mdc-text-field--with-leading-icon" id="title-field">
        <span class="material-icons mdc-text-field__icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="none" d="M0 0h24v24H0V0z"/>
                <path d="M5 5.5C5 6.33 5.67 7 6.5 7h4v10.5c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5V7h4c.83 0 1.5-.67 1.5-1.5S18.33 4 17.5 4h-11C5.67 4 5 4.67 5 5.5z"/>
            </svg>
        </span>    
        <input 
            type="text" 
            id="title" name="title"
            class="mdc-text-field__input"
            value="{{ $value ?? '' }}"
            required
            maxlength="24">
        <label class="mdc-floating-label {{ ( isset ( $value ) ) ?  'mdc-floating-label--float-above' : '' }}" for="title">Title</label>
        <div class="mdc-line-ripple"></div>
    </div>

    <div class="mdc-text-field-helper-line">
        <div class="mdc-text-field-character-counter">0 / 24</div>
    </div>
</div>
@section ( 'js' )
    @parent
    
    <script>
        mdc.textField.MDCTextField.attachTo ( document.getElementById ( 'title-field' ) );
    </script>    
@endsection