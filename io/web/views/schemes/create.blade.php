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
            <input name="title" class="mdc-text-field__input" type="text">
            <span class="mdc-floating-label" id="my-label-id">Title</span>
            <div class="mdc-line-ripple"></div>
        </label>

        <br>
        <br>

        <label class="mdc-text-field" id="exercise-input">
            <div class="mdc-text-field__ripple"></div>
            <input name="exercise" class="mdc-text-field__input" type="text">
            <span class="mdc-floating-label" id="my-label-id">Exercise</span>
            <div class="mdc-line-ripple"></div>
        </label>

        <label class="mdc-text-field" id="sets-input">
            <div class="mdc-text-field__ripple"></div>
                <input name="sets" class="mdc-text-field__input" type="number">
                <span class="mdc-floating-label" id="my-label-id">Sets</span>
            <div class="mdc-line-ripple"></div>
        </label>

        <label class="mdc-text-field" id="reps-input">
            <div class="mdc-text-field__ripple"></div>
                <input name="reps" class="mdc-text-field__input" type="number">
                <span class="mdc-floating-label" id="my-label-id">Reps</span>
            <div class="mdc-line-ripple"></div>
        </label>
    </form>
    
@endsection