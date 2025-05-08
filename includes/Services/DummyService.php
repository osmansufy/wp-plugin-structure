<?php

namespace WPS\Services;

class DummyService implements DummyServiceInterface
{
    public function getMessage(): string
    {
        return 'Hello from DummyService!';
    }
}
