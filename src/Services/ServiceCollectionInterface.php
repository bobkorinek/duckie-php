<?php

namespace Bobkorinek\Duckie\Services;

interface ServiceCollectionInterface
{
    /**
     * @param string $service
     * @param mixed $serviceDefinition
     * @return mixed
     */
    public function set(string $service, $serviceDefinition = null);
}