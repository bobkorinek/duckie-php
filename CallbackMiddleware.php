<?php

namespace Bobkorinek\Duckie\Middlewares;

use Bobkorinek\Duckie\HttpContext;
use Bobkorinek\Duckie\MiddlewareInterface;
use Closure;

class CallbackMiddleware implements MiddlewareInterface
{
    /**
     * @var Closure(HttpContext, Closure(HttpContext): HttpContext): HttpContext
     */
    private Closure $callback;

    /**
     * @param Closure $callback
     */
    public function __construct(Closure $callback)
    {
        $this->callback = $callback;
    }

    /**
     * @inheritDoc
     */
    public function handle(HttpContext $httpContext, Closure $next): HttpContext
    {
        $callback = $this->callback;

        return $callback($httpContext, $next);
    }
}