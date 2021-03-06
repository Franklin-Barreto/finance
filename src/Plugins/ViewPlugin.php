<?php
namespace FINANCE\Plugins;

use FINANCE\ServiceContainerInterface;
use Psr\Container\ContainerInterface;
use FINANCE\View\ViewRenderer;

class ViewPlugin implements PluginInterface
{

    public function register(ServiceContainerInterface $container)
    {
        $container->addLazy('twig', function (ContainerInterface $container) {
            $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../../templates');
            $twig = new \Twig\Environment($loader);
            return $twig;
        });

        $container->addLazy('view.renderer', function (ContainerInterface $container) {
            $twigEnvironment = $container->get('twig');
            return new ViewRenderer($twigEnvironment);
        });
    }
}

