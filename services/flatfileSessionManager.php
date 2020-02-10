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

    private function write ( )
	{
		file_put_contents ( $this->file, serialize ( $this->sessions ) );
    }
}