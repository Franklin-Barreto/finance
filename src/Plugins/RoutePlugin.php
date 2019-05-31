<?php
namespace FINANCE\Plugins;

use Aura\Router\RouterContainer;
use FINANCE\ServiceContainerInterface;

class RoutePlugin implements PluginInterface
{

    public function __construct()
    {}

    public function register(ServiceContainerInterface $container)
    {
        $routerContainer = new RouterContainer();
        $map = $routerContainer->getMap();
        $matcher = $routerContainer->getMatcher();
        $generator = $routerContainer->getGenerator();

        $container->add('routing.matcher', $matcher);
        $container->add('routing', $map);
        $container->add('routing.generator', $generator);
    }
}

