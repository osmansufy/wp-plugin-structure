<?php

namespace WPS\Abstracts;

abstract class Field extends SettingsElement
{

    /**
     * Is children Supported.
     *
     * @var bool $supports_children Is children Supported.
     */

    protected bool $supports_children = false;

    /**
     * Input Type.
     *
     * @var string $input_type The Input Type.
     */

    protected string $input_type = 'text';

    /**
     * The Settings Element Type.
     *
     * @var string $type Type Field.
     */

    protected string $type = 'field';


    /**
     * Map for the Input Type.
     *
     * @var string[] $field_map Map for the Input Type.
     * 
     * @since 1.0.0
     * 
     */

    protected array $field_map = [
        'text' => 'input',
        'textarea' => 'textarea',
        'select' => 'select',
    ];

    /**
     * Constructor.
     *
     * @since 1.0.0
     */

    public function __construct(string $id, string $type = 'text')
    {
        parent::__construct($id);
        $this->input_type = $type;
    }

    /**
     * Get input field.
     *
     *
     * @return SettingsElement 
     * 
     * @since 1.0.0
     * 
     */

    public function get_input(): SettingsElement
    {
        return new $this->field_map[$this->input_type]($this->id);
    }

    /**
     * Populate the object.
     *
     * @since 1.0.0
     * 
     */

    public function populate(): array
    {
        $data = parent::populate();

        $data['variant'] = $this->input_type;
        $data['value']   = $this->escape_element($this->get_value());

        return $data;
    }

    /**
     * Escape the element.
     * 
     * @param mixed $data The data to escape.
     * @since 1.0.0
     * 
     */

    public function escape_element(mixed $data): mixed
    {
        return apply_filters($this->get_hook_key() . '_escape_element', $data, $this);
    }

    /**
     * Get the value for the element.
     *
     * @since 1.0.0
     * 
     */

    public function get_value()
    {
        $value = $this->value;

        if (!$value && method_exists($this, 'get_default')) {
            $value = $this->get_default();
        }

        return $value;
    }

    /**
     * Get Default.
     *
     * @return string
     */
    public function get_default(): string
    {
        return $this->default;
    }
}