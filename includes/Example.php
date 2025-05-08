<?php

namespace WPS;

use WPS\Services\DummyServiceInterface;

class Example
{
    private $dummyService;

    public function __construct(DummyServiceInterface $dummyService)
    {
        $this->dummyService = $dummyService;
    }

    public function run(): string
    {
        return $this->dummyService->getMessage();
    }
}