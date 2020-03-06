@extends('page.main')

@section('title')
    My schemes
@endsection

@section('page')
    @if (count($schemes))
        <div class="mdc-card">
            <ul class="mdc-list mdc-list--two-line">
                @foreach ($schemes as $scheme)
                    <li class="mdc-list-item" tabindex="0">
                        <a href="/schemes/{{ $scheme->id }}/start" class="mdc-list-item__graphic" >
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                <path d="M8 5v14l11-7z"/>
                                <path d="M0 0h24v24H0z" fill="none"/>
                            </svg>
                        </a>
                        <span class="mdc-list-item__text" style="width: 100%;">
                            <a href="/schemes/{{ $scheme->id }}">
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
        </div>
    @endif

    <button class="mdc-fab" id="add-schemes-fab">
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
            -->Add scheme<!--
        --></h2>
            <form action="/schemes" method="POST">
                <div class="mdc-dialog__content" id="my-dialog-content">
                    <label class="mdc-text-field" id="title-input">
                        <div class="mdc-text-field__ripple"></div>
                        <input name="title" class="mdc-text-field__input" type="text">
                        <span class="mdc-floating-label" id="my-label-id">Title</span>
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
                        <span class="mdc-button__label">Save</span>
                    </button>
                </footer>
            </form>
            </div>
        </div>
        <div class="mdc-dialog__scrim"></div>
    </div>
@endsection

@section('js')
    @parent

    <script>
        const addSchemesFab = document.getElementById('add-schemes-fab');

        addSchemesFab.onclick = () => {
            app.dialog.open(document.querySelector('.mdc-dialog'));
        };
    </script>
@endsection