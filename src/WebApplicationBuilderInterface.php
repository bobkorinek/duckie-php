<?php

namespace Bobkorinek\Duckie;

use Bobkorinek\Duckie\Services\ServiceCollectionInterface;
use Closure;

interface WebApplicationBuilderInterface
{
    /**
     * @return ServiceCollectionInterface
     */
    public function services(): ServiceCollectionInterface;

    /**
     * @param MiddlewareInterface|Closure(HttpContext, Closure(HttpContext): HttpContext): HttpContext $middleware
     * @return self
     */
    public function use($middleware): self;

    /**
     * @param string $route
     * @param Closure(WebApplicationBuilderInterface): void $middlewareHandler
     * @return self
     */
    public function map(string $route, Closure $middlewareHandler): self;

    /**
     * @param string $route
     * @param mixed $endpoint
     * @return self
     */
    public function mapGet(string $route, $endpoint): self;

    /**
     * @return WebApplication
     */
    public function build(): WebApplication;
}
