@extends('page.main')

@section('title')
    My schemes
@endsection

@section('page')
    <ul class="mdc-list mdc-list--two-line">
        @foreach ($schemes as $scheme)
            <li class="mdc-list-item" tabindex="0">
                <a href="/{{ $scheme->id }}/start" class="mdc-list-item__graphic" >
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                        <path d="M8 5v14l11-7z"/>
                        <path d="M0 0h24v24H0z" fill="none"/>
                    </svg>
                </a>
                <span class="mdc-list-item__text" style="width: 100%;">
                    <a href="/{{ $scheme->id }}">
                        <span style="width: 100%;" class="mdc-list-item__primary-text">{{ $scheme->name }}</span>
                        <span style="width: 100%;" class="mdc-list-item__secondary-text">{{ $scheme->createdAt->format('F Y') }}</span>
                    </a>
                </span>
                <a href="/schemes/{{ $scheme->id }}/remove" class="mdc-list-item__meta" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                        <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
                        <path d="M0 0h24v24H0z" fill="none"/>
                    </svg>
                </a>
            </li>
        @endforeach
    </ul>


    @include('partials.link.fab', ['link' => "/schemes/create", 'action' => 'add'])
@endsection