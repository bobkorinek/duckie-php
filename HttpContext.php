<?php

namespace Bobkorinek\Duckie;

use Bobkorinek\Duckie\Http\Request;
use Bobkorinek\Duckie\Http\Response;
use Closure;

class HttpContext
{
    /**
     * @var Request
     */
    private Request $request;

    /**
     * @var Response
     */
    private Response $response;

    /**
     * @var null|Closure(HttpContext): void
     */
    private ?Closure $endpoint;

    /**
     * @param Request $request
     * @param Response $response
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }

    /**
     * @return Response
     */
    public function getResponse(): Response
    {
        return $this->response;
    }

    /**
     * @return null|Closure(HttpContext): void
     */
    public function getEndpoint():?Closure
    {
        return $this->endpoint;
    }

    /**
     * @param Closure|null $endpoint
     * @return $this
     */
    public function setEndpoint(?Closure $endpoint): self
    {
        $this->endpoint = $endpoint;
        return $this;
    }
}