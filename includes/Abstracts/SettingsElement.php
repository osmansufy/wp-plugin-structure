<?php

namespace WPS\Abstracts;

abstract class SettingsElement
{

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
     * Settings Element icon.
     *      
     * @var string $icon Settings Element icon.
     */

    public string $icon = '';

    /**
     * Settings Element dependencies.
     *
     * @var array $dependencies Settings Element dependencies.
     */

    public array $dependencies = [];

    /**
     * Constructor
     *
     * @param string $id Settings Element id.
     */

    public function __construct(string $id)
    {
        $this->id = $id;
    }
    /**
     * Is the element support children?
     *
     * @var bool $support_children Has children.
     */
    protected bool $support_children = true;

    /**
     * Get the children.
     *
     * @return array
     */
    protected array $children = [];
    /**
     * Check is the settings element support children.
     *
     * @return bool
     */
    public function is_support_children(): bool
    {
        return $this->support_children;
    }
    /**
     * Get the children of the settings elements.
     *
     * @return SettingsElement[]
     */
    public function get_children(): array
    {
        $children = array();

        /**
         * An array containing the filtered list of child elements or objects.
         * This variable is intended to store a subset of children
         * after applying specific filtering criteria.
         *
         * @since 4.0.0
         *
         * @param array           $children
         * @param SettingsElement $this
         */
        $filtered_children = apply_filters($this->get_hook_key() . '_children', $this->children, $this); // phpcs:ignore.

        foreach ($filtered_children as $child) {
            $child->set_hook_key($this->get_hook_key() . '_' . $child->get_id());
            $child->set_dependency_key(trim($this->get_dependency_key() . '.' . $child->get_id(), '. '));
            $children[$child->get_id()] = $child;
        }

        return $children;
    }

    /**
     * Set Children.
     *
     * @param array $children Children.
     *
     * @return SettingsElement
     * @throws Exception If children are not attachable.
     */
    public function set_children(array $children): SettingsElement
    {
        if (! $this->is_support_children()) {
            throw new \Exception(sprintf(__('Settings %s Does not support adding any children.', 'wps'), esc_html($this->get_type())));
        }

        $this->children = $children;

        return $this;
    }

    /**
     * Populate The settings array.
     *
     * @return array
     */
    public function populate(): array
    {
        $children = array();
        if ($this->is_support_children()) {
            foreach ($this->get_children() as $child) {
                $children[] = $child->populate();
            }
        }

        $populated_data = array(
            'id'             => $this->get_id(),
            'type'           => $this->get_type(),
            'title'          => $this->get_title(),
            'icon'           => $this->get_icon(),
            'display'        => true, // to manage element display action from dependencies.
            'hook_key'       => $this->get_hook_key(),
            'children'       => $children,
            'description'    => $this->get_description(),
            'dependency_key' => $this->get_dependency_key(),
            'dependencies'   => $this->get_dependencies(),
        );

        /**
         * Filters the populated data for a settings element.
         * This filter allows modification of the complete array of populated data
         * before it's returned from the populate method. The data includes all element
         * properties such as ID, type, title, children, dependencies, etc.
         *
         * @since 4.0.0
         *
         * @param array           $populated_data The array containing all element data.
         * @param SettingsElement $this           The current settings element instance.
         *
         * @return array Modified populated data.
         */
        return apply_filters($this->get_hook_key() . '_populate', $populated_data, $this);
    }

    /**
     * Get the id.
     *
     * @return string
     */
    public function get_id(): string
    {
        return $this->id;
    }

    /**
     * Get the type.
     *
     * @return string
     */
    public function get_type(): string
    {
        return $this->type;
    }

    /**
     * Get the title.
     *
     * @return string
     */
    public function get_title(): string
    {
        return $this->title;
    }

    /**
     * Get the description.
     *
     * @return string
     */
    public function get_description(): string
    {
        return $this->description;
    }

    /**
     * Get the icon.
     *
     * @return string
     */
    public function get_icon(): string
    {
        return $this->icon;
    }

    /**
     * Get the dependencies.
     *
     * @return array
     */
    public function get_dependencies(): array
    {
        return $this->dependencies;
    }

    /**
     * Get the hook key.
     *
     * @return string
     */
    public function get_hook_key(): string
    {
        return $this->hook_key;
    }

    /**
     * Get the dependency key.
     *
     * @return string
     */
    public function get_dependency_key(): string
    {
        return $this->dependency_key;
    }
}