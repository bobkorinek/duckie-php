<?php

namespace Bobkorinek\Duckie\Middlewares;

use Bobkorinek\Duckie\HttpContext;
use Bobkorinek\Duckie\MiddlewareInterface;
use Bobkorinek\Duckie\Routing\DefaultRouteEndpointHandler;
use Bobkorinek\Duckie\Routing\RouteCollection;
use Bobkorinek\Duckie\Routing\RouteEndpointHandlerInterface;
use Closure;

class RoutingMiddleware implements MiddlewareInterface
{
    /**
     * @var RouteCollection
     */
    private RouteCollection $routes;

    /**
     * @var RouteEndpointHandlerInterface|DefaultRouteEndpointHandler
     */
    private RouteEndpointHandlerInterface $routeEndpointHandler;

    /**
     * @param RouteCollection $routes
     * @param RouteEndpointHandlerInterface|null $routeEndpointHandler
     */
    public function __construct(RouteCollection $routes, ?RouteEndpointHandlerInterface $routeEndpointHandler = null)
    {
        $this->routes = $routes;
        $this->routeEndpointHandler = $routeEndpointHandler ?: new DefaultRouteEndpointHandler();
    }

    /**
     * @inheritDoc
     */
    public function handle(HttpContext $httpContext, Closure $next): void
    {
        $match = $this->routes->match($httpContext->getRequest()->getPath());

        if ($match) {
            $match->alterRequest($httpContext->getRequest());

            $httpEndpoint = $this->routeEndpointHandler->createHttpEndpoint(
                $match->getRoute()->getEndpoint()
            );
            $httpContext->setEndpoint($httpEndpoint);
        }

        $next($httpContext);
    }
}