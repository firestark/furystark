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
    <ul class="mdc-list mdc-list--two-line">
        @foreach ($scheme->exercises as $exercise)
            <li class="mdc-list-item" tabindex="0">
                {{-- <a href="/schemes/{{ $scheme->id }}/start" class="mdc-list-item__graphic" >
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                        <path d="M8 5v14l11-7z"/>
                        <path d="M0 0h24v24H0z" fill="none"/>
                    </svg>
                </a> --}}
                <span class="mdc-list-item__text" style="width: 100%;">
                    <a href="#">
                        <span style="width: 100%;" class="mdc-list-item__primary-text">{{ $exercise->name }}</span>
                        <span style="width: 100%;" class="mdc-list-item__secondary-text">{{ $exercise->sets }}x{{ $exercise->reps }}</span>
                    </a>
                </span>
                <a href="/schemes/{{ $scheme->id }}/remove/?" class="mdc-list-item__meta" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                        <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
                        <path d="M0 0h24v24H0z" fill="none"/>
                    </svg>
                </a>
            </li>
        @endforeach
    </ul>


    {{-- <form action="/schemes" method="POST" style="padding: 16px;">
        <label class="mdc-text-field" id="title-input">
            <div class="mdc-text-field__ripple"></div>
            <input name="title" class="mdc-text-field__input" type="text" value="{{ $scheme->name }}">
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
    </form> --}}
@endsection