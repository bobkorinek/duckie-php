<?php

namespace Bobkorinek\Duckie\Middlewares;

use Bobkorinek\Duckie\HttpContext;
use Bobkorinek\Duckie\MiddlewareInterface;
use Closure;
use RuntimeException;

class EndpointMiddleware implements MiddlewareInterface
{
    /**
     * @inheritDoc
     */
    public function handle(HttpContext $httpContext, Closure $next): void
    {
        $endpoint = $httpContext->getEndpoint();

        if ($endpoint === null) {
            throw new RuntimeException('No endpoint was found at the end of the request pipeline.');
        }

        $endpoint($httpContext);
    }
}