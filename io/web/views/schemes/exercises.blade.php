@extends('page.main')

@section('navigation')
    @include('partials.up-arrow', ['link' => '/'])
@endsection

@section('title')
    {{ $scheme->name }}
@endsection

@section('tabs')
    <div class="mdc-tab-bar" role="tablist" style="max-width: 500px;">
        <div class="mdc-tab-scroller">
            <div class="mdc-tab-scroller__scroll-area">
                <div class="mdc-tab-scroller__scroll-content">
                    <a href="/schemes/{{ $scheme->id }}" class="mdc-tab" role="tab" aria-selected="true" tabindex="0">
                        <span class="mdc-tab__content">
                            <span class="mdc-tab__text-label">Sessions</span>
                        </span>
                        <span class="mdc-tab-indicator">
                            <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                        </span>
                        <span class="mdc-tab__ripple"></span>
                    </a>
                    <a href="/schemes/{{ $scheme->id }}/exercises" class="mdc-tab mdc-tab--active" role="tab" aria-selected="false" tabindex="0">
                        <span class="mdc-tab__content">
                            <span class="mdc-tab__text-label">Exercises</span>
                        </span>
                        <span class="mdc-tab-indicator mdc-tab-indicator--active">
                            <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                        </span>
                        <span class="mdc-tab__ripple"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page')
    @if (count($scheme->exercises))
        <div class="mdc-card">
            <ul class="mdc-list mdc-list--two-line">
                @foreach ($scheme->exercises as $key => $exercise)
                    <li class="mdc-list-item" tabindex="0">
                        <span class="mdc-list-item__graphic" style="background-color: rgba(0,0,0,.3); color: #fff; border-radius: 50%; width: 40px; height: 40px;">
                            {{ $key + 1 }}
                        </span>
                        <span class="mdc-list-item__text" style="width: 100%;">
                            <a href="#">
                                <span style="width: 100%;" class="mdc-list-item__primary-text">{{ $exercise->name }}</span>
                                <span style="width: 100%;" class="mdc-list-item__secondary-text">{{ $exercise->sets }}x{{ $exercise->reps }}</span>
                            </a>
                        </span>
                        <a href="/schemes/{{ $scheme->id }}/remove/{{ $exercise->id }}" class="mdc-list-item__meta" aria-hidden="true">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
                                <path d="M0 0h24v24H0z" fill="none"/>
                            </svg>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <button class="mdc-fab" id="dialog-fab">
        <div class="mdc-fab__ripple"></div>
        <span class="mdc-fab__icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
                <path d="M0 0h24v24H0z" fill="none"/>
            </svg>
        </span>
    </button>


   <div class="mdc-dialog">
        <div class="mdc-dialog__container">
            <div class="mdc-dialog__surface"
            role="alertdialog"
            aria-modal="true"
            aria-labelledby="my-dialog-title"
            aria-describedby="my-dialog-content">
            <!-- Title cannot contain leading whitespace due to mdc-typography-baseline-top() -->
            <h2 class="mdc-dialog__title" id="my-dialog-title"><!--
            -->Add exercise<!--
        --></h2>
            <form action="/schemes/{{ $scheme->id }}/exercises" method="POST">
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
                <footer class="mdc-dialog__actions">
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
        </div>
        <div class="mdc-dialog__scrim"></div>
    </div>
@endsection