<?php

class flatfileSessionManager implements session\manager
{
    private $sessions, $file;

    function __construct ( string $file, array $sessions )
    {
        $this->file = $file;
        $this->sessions = $sessions;
    }

    function add ( session $session )
    {
        if ( $this->has ( $session->id ) )
            return;

        $this->sessions [ $session->id ] = $session;
        $this->write ( );
    }

    function has ( $id ) : bool
    {
        return isset ( $this->sessions [ $id ] );
    }

    function find ( $id ) : session
    {
        return $this->sessions [ $id ];
    }

    function findBelongingTo ( scheme $scheme ) : array
    {
        foreach ( $this->sessions as $session )
            if ( $session->scheme === $scheme->id )
                $sessions [ ] = $session;

        return $sessions ?? [ ];
    }

    function update ( session $session )
    {
        if ( ! $this->has ( $session->id ) )
            throw new exception ( "A session with id: {$session->id} does not exist." );

        $this->sessions [ $session->id ] = $session;
        $this->write ( );
    }

    function remove ( session $session )
    {
        unset ( $this->sessions [ $session->id ] );
        $this->write ( );
    }

    private function write ( )
	{
		file_put_contents ( $this->file, serialize ( $this->sessions ) );
    }
}