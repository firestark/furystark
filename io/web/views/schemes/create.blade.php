@extends('page.main')

@section('navigation')
    @include('partials.up-arrow', ['link' => '/'])
@endsection

@section('title')
    Create scheme
@endsection

@section('page')
    <form action="/schemes" method="POST" style="padding: 16px;">
        <label class="mdc-text-field" id="title-input">
            <div class="mdc-text-field__ripple"></div>
            <input name="title" class="mdc-text-field__input" type="text">
            <span class="mdc-floating-label" id="my-label-id">Title</span>
            <div class="mdc-line-ripple"></div>
        </label>

        <h2 class="mdc-typography--headline6">Exercises</h2>

        @for ($i = 0; $i < 8; $i++)
            <div style="margin-bottom: 32px;">
                <label class="mdc-text-field" id="exercise-input">
                    <div class="mdc-text-field__ripple"></div>
                    <input name="exercise[{{ $i }}][name]" class="mdc-text-field__input" type="text">
                    <span class="mdc-floating-label" id="my-label-id">Exercise {{ $i +1 }}</span>
                    <div class="mdc-line-ripple"></div>
                </label>

                <label class="mdc-text-field" id="sets-input">
                    <div class="mdc-text-field__ripple"></div>
                        <input name="exercise[{{ $i }}][sets]" class="mdc-text-field__input" type="number">
                        <span class="mdc-floating-label" id="my-label-id">Sets</span>
                    <div class="mdc-line-ripple"></div>
                </label>

                <label class="mdc-text-field" id="reps-input">
                    <div class="mdc-text-field__ripple"></div>
                        <input name="exercise[{{ $i }}][reps]" class="mdc-text-field__input" type="number">
                        <span class="mdc-floating-label" id="my-label-id">Reps</span>
                    <div class="mdc-line-ripple"></div>
                </label>
            </div>
        @endfor

        @include('partials.form.fab', ['action' => 'save'])
    </form>
@endsection