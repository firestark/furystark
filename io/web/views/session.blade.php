@extends ( 'master' )

@section ( 'navigation' )
    @include ( 'partials.up-arrow', [ 'link' => '/' ] )
@endsection

@section ( 'title' )
    {{ $scheme->name }} session
@endsection

@section ( 'page' )
    <form action="/session/{{ $session->id }}" method="POST" style="display: grid;">
        <div class="mdc-data-table">
            <table class="mdc-data-table__table" aria-label="Dessert calories">
                <thead>
                    <tr class="mdc-data-table__header-row">
                        <th class="mdc-data-table__header-cell" role="columnheader" scope="col">Exercise</th>
                        <th class="mdc-data-table__header-cell mdc-data-table__header-cell--numeric" role="columnheader" scope="col">Set 1</th>
                        <th class="mdc-data-table__header-cell mdc-data-table__header-cell--numeric" role="columnheader" scope="col">Set 2</th>
                        <th class="mdc-data-table__header-cell mdc-data-table__header-cell--numeric" role="columnheader" scope="col">Set 3</th>
                        <th class="mdc-data-table__header-cell mdc-data-table__header-cell--numeric" role="columnheader" scope="col">Set 4</th>
                    </tr>
                </thead>
                <tbody class="mdc-data-table__content">
                    @foreach ( $scheme->exercises as $exercise )
                        <tr class="mdc-data-table__row">
                            <td class="mdc-data-table__cell">{{ $exercise->name }}</td>

                            @for ( $i = 1; $i <= $exercise->sets; $i++ )
                                <td class="mdc-data-table__cell mdc-data-table__cell--numeric">
                                    <input
                                        step="0.5"
                                        type="number" 
                                        id="{{ $exercise->id }}-{{ $i }}" 
                                        name="exercises[{{ $exercise->id }}][{{ $i }}]" 
                                        value="{{ $session->getCompletion ( $exercise->id, $i ) ?? '0' }}">
                                </td>
                            @endfor
                            @if ( $exercise->sets === 3 )
                                <td class="mdc-data-table__cell mdc-data-table__cell--numeric" style="color: rgba(0,0,0,.6);">
                                    n/a
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @include ( 'partials.form.fab', [ 'action' => 'save' ] )
    </form>
@endsection


@section ( 'js' )
    @parent
    
    <script>
        mdc.dataTable.MDCDataTable.attachTo ( document.querySelector ( '.mdc-data-table' ) );
    </script>    
@endsection