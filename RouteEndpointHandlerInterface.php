<?php

namespace Bobkorinek\Duckie\Routing;

use Closure;

interface RouteEndpointHandlerInterface
{
    /**
     * @param mixed $routeEndpoint
     * @return Closure|null
     */
    public function createHttpEndpoint($routeEndpoint): ?Closure;
}