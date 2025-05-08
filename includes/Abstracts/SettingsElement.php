<?php

namespace WPS\Abstracts;

abstract class SettingsElement {

    /**
     * Settings Element id.
     *
     * @var string $id Settings Element id.
     */

    protected string $id = '';
    /**
     * Settings Element type.
     *
     * @var string $type Settings Element type.
     */
    protected string $type = '';


    /**
     * Settings Element title.
     *
     * @var string $title Settings Element title.
     */

    protected string $title = '';

    /**
     * Settings Element description.
     *
     * @var string $description Settings Element description.
     */

    protected string $description = '';


    /**
     * Settings Element default value.
     *
     * @var mixed $default Settings Element default value.
     */

    protected mixed $default = null;

    /**
     * Settings Element data.
     *
     * @var mixed $value Settings Element data.
     */
    protected mixed $value = null;
    /**
     * Settings dynamic hook key to generate unique hooks.
     *
     * @var string $hook_key Settings dynamic hook key.
     */

    public string $hook_key = '';

    /**
     * Settings dynamic dependency key
     *
     * @var string $dependency_key Settings dynamic dependency key
     */

    public string $dependency_key = '';

    /**
     * Constructor
     *
     * @param string $id Settings Element id.
     */

    public function __construct( string $id ) {
        $this->id = $id;
    }






}