<?php

namespace WPS;

use WPS\DependencyManagement\Container;

class Plugin
{
    protected string $name;
    protected string $version;
    protected string $description;
    protected Container $container;

    public function __construct(string $name, string $version, string $description)
    {
        $this->name = $name;
        $this->version = $version;
        $this->description = $description;
        $this->container = new Container();
    }

    public function init()
    {
        // Initialize the plugin
    }

    public function get_name()
    {
        return $this->name;
    }

    public function get_version()
    {
        return $this->version;
    }

    public function get_description()
    {
        return $this->description;
    }

    public function getContainer(): Container
    {
        return $this->container;
    }
}