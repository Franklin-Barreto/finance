<?php
use FINANCE\Application;
use FINANCE\ServiceContainer;
use FINANCE\Plugins\RoutePlugin;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;


require_once __DIR__ . '/../vendor/autoload.php';

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);


$app->plugin(new RoutePlugin());

$app->get('/{name}', function (ServerRequestInterface $request) {
  // 
    $response = new Zend\Diactoros\Response();
    $response->getBody()->write("You asked for blog entry {$request->getAttribute('name')}.");
    echo $response->getBody();
});


$app->start();