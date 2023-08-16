<?php

namespace Bobkorinek\Duckie\Routing;

use Bobkorinek\Duckie\Http\Request;

class Route
{
    /**
     * @var string
     */
    private string $pattern;

    /**
     * @var string
     */
    private string $regex;

    /**
     * @var mixed
     */
    private $endpoint;

    /**
     * @param string $pattern
     * @param mixed $endpoint
     */
    public function __construct(string $pattern, $endpoint)
    {
        $this->pattern = $pattern;
        $this->endpoint = $endpoint;
    }

    public function handleRequest(Request $request): bool
    {
        $match = $this->
    }

    /**
     * @return mixed
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }
}