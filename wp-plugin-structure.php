<?php

/*
 * Plugin Name: WP Plugin Structure
 *
 * Description: A simple WordPress plugin structure with a focus on modularity and extensibility.
 *
 * Version: 1.0.0
 */

// If this file is called directly, abort.
if (! defined('WPINC')) {
    die;
}

// Define plugin constants
define('WP_PLUGIN_STRUCTURE_VERSION', '1.0.0');

// Autoload dependencies
require_once __DIR__ . '/vendor/autoload.php';

use WPS\Services\DummyServiceProvider;
use WPS\Services\DummyServiceInterface;

/**
 * Initialize the plugin
 */

$plugin = new \WPS\Plugin(
    'wp-plugin-structure',
    '1.0.0',
    'A simple WordPress plugin structure with a focus on modularity and extensibility.'
);

$container = $plugin->getContainer();
$container->addServiceProvider(new DummyServiceProvider());

$plugin->init();

// Get the service directly
$dummyService = $container->get(DummyServiceInterface::class);