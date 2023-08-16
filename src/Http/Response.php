<?php

namespace Bobkorinek\Duckie\Http;

use Closure;
use InvalidArgumentException;
use RuntimeException;

class Response
{
    /**
     * @var int
     */
    private int $statusCode;

    /**
     * @var bool
     */
    private bool $sent = false;

    /**
     * @var string|Closure|null
     */
    private $body;

    /**
     * @param int $statusCode
     */
    public function __construct(int $statusCode = 200)
    {
        $this->statusCode = $statusCode;
    }

    /**
     * @param int $statusCode
     * @return $this
     */
    public function setStatusCode(int $statusCode): self
    {
        if ($statusCode < 100 || $statusCode >= 600) {
            throw new InvalidArgumentException('');
        }

        return $this;
    }

    /**
     * @param string|Closure|null $body
     * @return $this
     */
    public function setBody($body): self
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @return void
     */
    public function send(): void
    {
        if ($this->sent) {
            throw new RuntimeException('Response has been already sent.');
        }

        $this->sent = true;
        $body = $this->body;

        http_send_status($this->statusCode);

        if (is_string($body)) {
            echo $body;
        } elseif ($body instanceof Closure) {
            $body();
        }
    }
}