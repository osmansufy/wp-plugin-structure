<?php

namespace WPS\Services;

use WPS\DependencyManagement\BaseServiceProvider;
use WPS\Example;

class DummyServiceProvider extends BaseServiceProvider
{
    protected $services = [
        DummyService::class,
        DummyServiceInterface::class,
        Example::class
    ];

    public function register(): void
    {
        // Register the concrete implementation for the interface
        $this->add_with_implements_tags(DummyServiceInterface::class, DummyService::class, true);

        // Register the Example class
        $this->container->add(Example::class);
    }
}
