<?php
declare(strict_types = 1);
namespace FINANCE\Plugins;

use Aura\Router\RouterContainer;
use FINANCE\ServiceContainerInterface;
use Psr\Http\Message\RequestInterface;
use Zend\Diactoros\ServerRequestFactory;
use Interop\Container\ContainerInterface;

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
        $request = $this->getResquest();

        $container->add('routing.matcher', $matcher);
        $container->add('routing', $map);
        $container->add('routing.generator', $generator);
        $container->add(RequestInterface::class, $request);
        $container->addLazy('route', function(ContainerInterface $container){
            $matcher = $container->get('routing.matcher');
            $request = $container->get(RequestInterface::class);
            $matcher->match($request);
        });
    }

    protected function getResquest(): RequestInterface
    {
        return ServerRequestFactory::fromGlobals($_SERVER, $_GET, $_POST, $_COOKIE, $_FILES);
    }
}

