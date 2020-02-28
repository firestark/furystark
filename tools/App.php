<?php

namespace Firestark;

use Closure;
use Illuminate\Container\Container;

class App extends Container
{
    public function fulfill(string $feature)
    {
        list($status, $payload) = $this->make($feature);
        $task = $this['status']->match($status);
        return call_user_func_array($task, $payload);
    }

    public function binding(string $abstract, Closure $concrete)
    {
        $concrete = function ($container, array $parameters = []) use ($concrete)
		{
			return $container->call($concrete, $parameters);
		};

		$this->bind($abstract, $concrete);
    }

    public function share($abstract, $concrete = null)
    {
        $this->bind($abstract, $concrete, true);
    }
}