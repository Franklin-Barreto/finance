<?php
declare(strict_types = 1);
namespace FINANCE;

use Xtreamwayz\Pimple\Container;

class ServiceContainer implements ServiceContainerInterface
{

    private $container;

    public function __construct()
    {
        $this->container = new Container();
    }

    public function add(string $name, $service): void
    {
        $this->container[$name] = $service;
    }

    public function addLazy(string $name, callable $callable): void
    {
        $this->container[$name] = $this->container->factory($callable);
    }

    public function get(string $name) {
        return $this->container->get($name);
    }

    public function has(string $name): bool
    {
        return $this->container->has($name);
    }
}