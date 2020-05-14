@extends('page.main')

@section('title')
    Add an exercise
@endsection

@section('page')
    <div class="mdc-card">
        <form action="/schemes/{{ $schemeId }}/exercises" method="POST">
            <div class="mdc-dialog__content" id="my-dialog-content">
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
            </div>
            <footer>
                <button type="button" class="mdc-button mdc-dialog__button" data-mdc-dialog-action="no">
                    <div class="mdc-button__ripple"></div>
                    <span class="mdc-button__label">Cancel</span>
                </button>
                <button type="submit" class="mdc-button mdc-dialog__button">
                    <div class="mdc-button__ripple"></div>
                    <span class="mdc-button__label">Add</span>
                </button>
            </footer>
        </form>
    </div>
@endsection