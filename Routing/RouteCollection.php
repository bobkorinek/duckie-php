<?php

namespace Bobkorinek\Duckie\Routing;

use Bobkorinek\Duckie\Http\Request;

class RouteCollection
{
    /**
     * @var Route[]
     */
    private array $routes = [];

    /**
     * @param string $urlPath
     * @return RouteMatch|null
     */
    public function match(string $urlPath): ?RouteMatch
    {
        foreach ($this->routes as $route) {
            $result = $route->match($urlPath);

            if ($result) {
                return $result;
            }
        }

        return null;
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function handleRequest(Request $request): bool
    {
    }

    public function any(string $pattern, $endpoint): self
    {

        return $this;
    }

    public function get(string $pattern, $endpoint): self
    {

        return $this;
    }

    public function post(string $pattern, $endpoint): self
    {

        return $this;
    }

    public function delete(string $pattern, $endpoint): self
    {

        return $this;
    }

    public function put(string $pattern, $endpoint): self
    {
        return $this;
    }
}