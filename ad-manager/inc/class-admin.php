<?php

namespace DFP\Plugins\AdManager;
/**
 * Class Admin
 * @package DFP\Plugins\AdManager
 */
class Admin
{
    /**
     * Unique plugin option page slug
     */
    const PARENT_SLUG = 'dfp_manager';

    /**
     * Settings class instance
     * @var Settings
     */
    private $settings;

    public function __construct()
    {
        add_action('admin_menu', array($this, 'add_links_to_sidebar'));
        //add_action('admin_enqueue_scripts', array($this, 'enqueue_date_picker'));
        $this->settings = new Settings();
    }

    /**
     * Register a page to display plugin options
     */
    public function add_links_to_sidebar()
    {
        $parent_hook_suffix = add_menu_page(
            'DFP', // page title
            'DFP',// menu title
            'manage_options',
            self::PARENT_SLUG,
            array($this->settings, 'load_page'),
            'dashicons-editor-video',
            80
        );

        $child_hook_suffix = add_submenu_page(
            self::PARENT_SLUG,
            'Settings', // page title
            'Settings', // menu text
            'manage_options',
            'dfp_options',
            array($this->settings, 'load_page')
        );
    }

}