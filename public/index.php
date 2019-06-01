<?php
use FINANCE\Application;
use FINANCE\ServiceContainer;
use FINANCE\Plugins\RoutePlugin;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use FINANCE\Plugins\ViewPlugin;
use FINANCE\View\ViewRenderer;

require_once __DIR__ . '/../vendor/autoload.php';

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new RoutePlugin());
$app->plugin(new ViewPlugin());

$app->get('/{name}', function (ServerRequestInterface $request) use ($app) {
    //
    /**@var ViewRenderer $view*/
    $view = $app->service('view.renderer');
    echo $view->render('test.html.twig', [
        'name' => $request->getAttribute('name')
    ])
        ->getBody();
});

$app->start();