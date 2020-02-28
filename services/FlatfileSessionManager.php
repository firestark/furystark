<?php

class FlatfileSessionManager implements Session\Manager
{
    private $sessions, $file;

    public function __construct(String $file, Array $sessions)
    {
        $this->file = $file;
        $this->sessions = $sessions;
    }

    public function add(Session $session)
    {
        if ( $this->has($session->id))
            return;

        $this->sessions[$session->id] = $session;
        $this->write();
    }

    public function has($id): Bool
    {
        return isset($this->sessions[$id]);
    }

    public function find($id): Session
    {
        return $this->sessions[$id];
    }

    public function findBelongingTo(scheme $scheme): Array
    {
        foreach ($this->sessions as $session)
            if ($session->scheme === $scheme->id)
                $sessions[] = $session;

        return $sessions ?? [];
    }

    public function update(Session $session)
    {
        if (! $this->has($session->id))
            throw new exception("A session with id: {$session->id} does not exist.");

        $this->sessions[$session->id] = $session;
        $this->write();
    }

    public function remove(Session $session)
    {
        unset($this->sessions[$session->id]);
        $this->write();
    }

    private function write()
	{
		file_put_contents($this->file, serialize($this->sessions));
    }
}