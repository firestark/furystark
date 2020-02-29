@extends('page.main')

@section('navigation')
    @include('partials.up-arrow', ['link' => '/'])
@endsection

@section('title')
    Create scheme
@endsection

@section('page')
    <form action="" style="padding: 16px;">
        <label class="mdc-text-field" id="title-input">
            <div class="mdc-text-field__ripple"></div>
                <input class="mdc-text-field__input" type="text" aria-labelledby="my-label-id">
                <span class="mdc-floating-label" id="my-label-id">Title</span>
            <div class="mdc-line-ripple"></div>
        </label>
    </form>
    
@endsection


@section('js')
    @parent

    <script>
        mdc.textField.MDCTextField.attachTo(document.getElementById('title-input'));
    </script>
@endsection