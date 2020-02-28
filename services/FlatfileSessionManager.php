<?php

class FlatfileSessionManager implements session\manager
{
    private $sessions, $file;

    public function __construct(string $file, array $sessions)
    {
        $this->file = $file;
        $this->sessions = $sessions;
    }

    public function add(session $session)
    {
        if ( $this->has($session->id))
            return;

        $this->sessions[$session->id] = $session;
        $this->write();
    }

    public function has($id): bool
    {
        return isset($this->sessions[$id]);
    }

    public function find($id): session
    {
        return $this->sessions[$id];
    }

    public function findBelongingTo(scheme $scheme): array
    {
        foreach ($this->sessions as $session)
            if ($session->scheme === $scheme->id)
                $sessions[] = $session;

        return $sessions ?? [];
    }

    public function update(session $session)
    {
        if (! $this->has($session->id))
            throw new exception("A session with id: {$session->id} does not exist.");

        $this->sessions[$session->id] = $session;
        $this->write();
    }

    public function remove(session $session)
    {
        unset($this->sessions[$session->id]);
        $this->write();
    }

    private function write()
	{
		file_put_contents($this->file, serialize($this->sessions));
    }
}