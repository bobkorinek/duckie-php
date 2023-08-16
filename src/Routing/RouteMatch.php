<?php

namespace Bobkorinek\Duckie\Routing;

use Bobkorinek\Duckie\Http\Request;
use Bobkorinek\Duckie\Http\RouteData;

class RouteMatch
{
    /**
     * @var Route
     */
    private Route $route;

    /**
     * @var string
     */
    private string $matchedPath;

    /**
     * @var string
     */
    private string $remainingPath;

    /**
     * @var RouteData
     */
    private RouteData $routeData;

    /**
     * @param Route $route
     * @param string $matchedPath
     * @param string $remainingPath
     * @param RouteData $routeData
     */
    public function __construct(Route $route, string $matchedPath, string $remainingPath, RouteData $routeData)
    {
        $this->route = $route;
        $this->matchedPath = $matchedPath;
        $this->remainingPath = $remainingPath;
        $this->routeData = $routeData;
    }

    /**
     * @param Request $request
     * @return void
     */
    public function alterRequest(Request $request): void
    {
        $request->setPath($this->remainingPath)
            ->setBasePath($request->getBasePath() . $this->matchedPath)
            ->getRouteData()->merge($this->routeData);
    }

    /**
     * @return Route
     */
    public function getRoute(): Route
    {
        return $this->route;
    }

    /**
     * @return string
     */
    public function getMatchedPath(): string
    {
        return $this->matchedPath;
    }

    /**
     * @return string
     */
    public function getRemainingPath(): string
    {
        return $this->remainingPath;
    }

    /**
     * @return RouteData
     */
    public function getRouteData(): RouteData
    {
        return $this->routeData;
    }
}