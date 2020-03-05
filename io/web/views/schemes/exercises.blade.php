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
                    <a href="/schemes/{{ $scheme->id }}/remove/?" class="mdc-list-item__meta" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                            <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
                            <path d="M0 0h24v24H0z" fill="none"/>
                        </svg>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

   @include('partials.link.fab', ['link' => "/schemes/{{ $scheme->id }}/exercises/add", 'action' => 'add'])
@endsection