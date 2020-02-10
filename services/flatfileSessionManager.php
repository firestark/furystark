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
        if ( $this->has ( $session ) )
            return;

        $this->sessions [ $session->id ] = $session;
        $this->write ( );
    }

    function has ( session $session ) : bool
    {
        return isset ( $this->sessions [ $session->id ] );
    }

    private function write ( )
	{
		file_put_contents ( $this->file, serialize ( $this->sessions ) );
    }
}