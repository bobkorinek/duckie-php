<?php

namespace Bobkorinek\Duckie\Http;

class Request
{
    /**
     * @var string
     */
    private string $path;

    /**
     * @var string
     */
    private string $basePath;

    /**
     * @var RouteData
     */
    private RouteData $routeData;

    /**
     * @var string[]
     */
    private array $parameters;

    /**
     * @var array
     */
    private array $headers;

    public function __construct()
    {
        $this->routeData = new RouteData();
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     * @return $this
     */
    public function setPath(string $path): self
    {
        $this->path = $path;
        return $this;
    }

    /**
     * @return string
     */
    public function getBasePath(): string
    {
        return $this->basePath;
    }

    /**
     * @param string $basePath
     * @return $this
     */
    public function setBasePath(string $basePath): self
    {
        $this->basePath = $basePath;
        return $this;
    }

    /**
     * @return RouteData
     */
    public function getRouteData(): RouteData
    {
        return $this->routeData;
    }

    /**
     * @param RouteData $routeData
     * @return void
     */
    public function setRouteData(RouteData $routeData): void
    {
        $this->routeData = $routeData;
    }

    /**
     * @return string[]
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * @param array $parameters
     * @return void
     */
    public function setParameters(array $parameters): void
    {
        $this->parameters = $parameters;
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param array $headers
     * @return void
     */
    public function setHeaders(array $headers): void
    {
        $this->headers = $headers;
    }
}