<?php

app::bind ( 'credentials', function ( $app ) : \firestark\credentials
{
    if ( guard::stamped ( ) )
        return guard::current ( );

    return new firestark\credentials (
        input::get ( 'username', '' ),
        input::get ( 'password', '' )
    );
} );