@extends('page.main')

@section('navigation')
    @include('partials.up-arrow', ['link' => '/schemes/' . $schemeId . '/exercises'])
@endsection

@section('title')
    Add exercise
@endsection

@section('page')
    <div class="mdc-card" style="padding: 16px; position: static;">
        <form action="/schemes/{{ $schemeId }}/exercises" method="POST">
            <label class="mdc-text-field" id="exercise-input">
                <div class="mdc-text-field__ripple"></div>
                <input name="exercise" class="mdc-text-field__input" type="text" required>
                <span class="mdc-floating-label" id="my-label-id">Exercise</span>
                <div class="mdc-line-ripple"></div>
            </label>
            <label class="mdc-text-field" id="sets-input">
                <div class="mdc-text-field__ripple"></div>
                    <input name="sets" class="mdc-text-field__input" type="number" required>
                    <span class="mdc-floating-label" id="my-label-id">Sets</span>
                <div class="mdc-line-ripple"></div>
            </label>

            <label class="mdc-text-field" id="reps-input">
                <div class="mdc-text-field__ripple"></div>
                    <input name="reps" class="mdc-text-field__input" type="number" required>
                    <span class="mdc-floating-label" id="my-label-id">Reps</span>
                <div class="mdc-line-ripple"></div>
            </label>
            @include('partials.form.fab', ['action' => 'save'])
        </form>
    </div>
@endsection