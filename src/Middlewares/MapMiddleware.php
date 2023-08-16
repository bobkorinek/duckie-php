<?php

namespace Bobkorinek\Duckie\Middlewares;

use Bobkorinek\Duckie\HttpContext;
use Bobkorinek\Duckie\MiddlewareInterface;
use Bobkorinek\Duckie\WebApplication;
use Bobkorinek\Duckie\WebApplicationBuilder;
use Bobkorinek\Duckie\WebApplicationBuilderInterface;
use Closure;

class MapMiddleware implements MiddlewareInterface
{
    /**
     * @var string
     */
    private string $route;

    /**
     * @var Closure(WebApplicationBuilderInterface): void
     */
    private Closure $middlewareHandler;

    /**
     * @param string $route
     * @param Closure(WebApplicationBuilderInterface): void $middlewareHandler
     */
    public function __construct(string $route, Closure $middlewareHandler)
    {
        $this->route = $route;
        $this->middlewareHandler = $middlewareHandler;
    }


    /**
     * @inheritDoc
     */
    public function handle(HttpContext $httpContext, Closure $next): void
    {
        if ($this->routeMatches($httpContext->getRequest()->getPath())) {
            $subAppBuilder = new WebApplicationBuilder();

            $this->executeHandler($subAppBuilder);

            $subAppBuilder->build()->handleContext($httpContext);
        } else {
            $next($httpContext);
        }
    }

    /**
     * @param WebApplicationBuilderInterface $applicationBuilder
     * @return void
     */
    private function executeHandler(WebApplicationBuilderInterface $applicationBuilder): void
    {
        $handler = $this->middlewareHandler;

        $handler($applicationBuilder);
    }

    /**
     * @param string $route
     * @return bool
     */
    private function routeMatches(string $route): bool
    {
        return str_contains($route, $this->route);
    }
}