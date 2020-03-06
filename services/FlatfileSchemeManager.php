<?php

class FlatfileSchemeManager implements Scheme\Manager
{
    private $file = '';
    private $schemes = [];

    public function __construct(String $file, Array $schemes)
    {
        $this->file = $file;

        foreach ($schemes as $scheme)
            $this->schemes[$scheme->id] = $scheme;
    }

    public function all(): Array
    {
        return $this->schemes;
    }

    public function has($id): Bool
    {
        return isset($this->schemes[$id]);
    }

    public function find($id): Scheme
    {
        return $this->schemes[$id];
    }

    public function add(Scheme $scheme)
    {
        $this->schemes[$scheme->id] = $scheme;
        $this->write();
    }

    public function update(Scheme $scheme)
    {
        $this->schemes[$scheme->id] = $scheme;
        $this->write();
    }

    public function remove(Scheme $scheme)
    {
        unset($this->schemes[$scheme->id]);
        $this->write();
    }

    private function write()
	{
		file_put_contents($this->file, serialize($this->schemes));
    }
}