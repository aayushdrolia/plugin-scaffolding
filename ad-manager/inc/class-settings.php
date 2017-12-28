<?php

namespace DFP\Plugins\AdManager;


class Settings
{

    use LoadsView;
    /**
     * Constants
     */
    const PLUGIN_OPTION_GROUP = 'dfp_options';

    public function __construct()
    {
        // Register setting
        add_action('admin_init', array($this, 'register_plugin_settings'));

        // To save default options upon activation
        register_activation_hook(plugin_basename(DFP_BASE_FILE), array($this, 'do_upon_plugin_activation'));

    }

    /**
     * Returns default plugin db options
     * @return array
     */
    public function get_default_options()
    {
        return array(
            'plugin_ver' => DFP_PLUGIN_VERSION,
            'network_key' => '',
        );
    }

    /**
     * Save default settings upon plugin activation
     */
    public function do_upon_plugin_activation()
    {

        if (false == get_option('dfp_options')) {
            add_option('dfp_options', $this->get_default_options());
        }
    }

    /**
     * Register plugin settings, using WP settings API
     */
    public function register_plugin_settings()
    {
        register_setting(self::PLUGIN_OPTION_GROUP, 'dfp_options', array($this, 'validate_form_post'));
    }

    /**
     * Load plugin option page view
     */
    public function load_page()
    {
        $this->loadView('settings', [
            'db' => get_option('dfp_options'),
            'option_group' => self::PLUGIN_OPTION_GROUP,
        ]);
    }

    /**
     * Validate form $_POST data
     * @param $in array
     * @return array Validated array
     */
    public function validate_form_post($in)
    {
        $out = array();
        $errors = array();
        //always store plugin version to db
        $out['plugin_ver'] = esc_attr(DFP_PLUGIN_VERSION);;

        if (!empty($in['network_key'])) {
            $out['network_key'] = sanitize_text_field($in['network_key']);
        } else {
            $errors[] = 'Network Key is required.';
            $out['network_key'] = '';
        }

        // Show all form errors in a single notice
        if (!empty($errors)) {
            add_settings_error('dfp_options', 'dfp_error', implode('<br>', $errors));
        } else {
            add_settings_error('dfp_options', 'dfp_updated', 'Settings saved.', 'updated');
        }

        return $out;
    }
}