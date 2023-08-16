<?php

namespace Bobkorinek\Duckie;

use Closure;

interface MiddlewareInterface
{
    /**
     * @param HttpContext $httpContext
     * @param Closure(HttpContext): void $next $next
     * @return void
     */
    public function handle(HttpContext $httpContext, Closure $next): void;
}