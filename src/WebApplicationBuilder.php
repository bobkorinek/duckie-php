<?php

namespace Bobkorinek\Duckie;

use Bobkorinek\Duckie\Services\ServiceCollectionInterface;
use Closure;

class WebApplicationBuilder implements WebApplicationBuilderInterface
{

    public function __construct()
    {
    }

    /**
     * @inheritDoc
     */
    public function services(): ServiceCollectionInterface
    {
        // TODO: Implement services() method.
    }

    /**
     * @inheritDoc
     */
    public function use($middleware): WebApplicationBuilderInterface
    {
        // TODO: Implement use() method.
    }

    /**
     * @inheritDoc
     */
    public function build(): WebApplication
    {
        // TODO: Implement build() method.
    }
}