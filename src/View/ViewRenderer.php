<?php
declare(strict_types = 1);
namespace FINANCE\View;

use Psr\Http\Message\ResponseInterface;
use Twig\Environment;
use Zend\Diactoros\Response;

class ViewRenderer implements ViewRendererInterface
{

    private $twigEnvironment;

    public function __construct(Environment $twigEnvironment)
    {
        $this->twigEnvironment = $twigEnvironment;
    }

    public function render(string $template, array $context = []): ResponseInterface
    {
        $result = $this->twigEnvironment->render($template, $context);
        $response = new Response();
        $response->getBody()->write($result);
        return $response;
    }
}