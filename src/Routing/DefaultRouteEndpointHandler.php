<?php

namespace Bobkorinek\Duckie\Routing;

use Bobkorinek\Duckie\HttpContext;
use Closure;

class DefaultRouteEndpointHandler implements RouteEndpointHandlerInterface
{
    /**
     * @inheritDoc
     */
    public function createHttpEndpoint($routeEndpoint): ?Closure
    {
        if ($routeEndpoint instanceof Closure) {
            return $routeEndpoint;
        } elseif (is_array($routeEndpoint)) {
            $endpointClassName = $routeEndpoint[0] ?? '';
            $endpointMethod = $routeEndpoint[1] ?? '';

            return function (HttpContext $context) use ($endpointClassName, $endpointMethod) {
                $endpointObj = new $endpointClassName();

                $endpointObj->$endpointMethod($context);
            };
        }

        return null;
    }
}