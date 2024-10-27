<?php
/*
Plugin Name: Jeco Bootstrap Blocks
Description: Bootstrap components read to use as Wordpress Blocks
Version: 1.0
Author: Jesus Carrero
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('JECO_BOOTSTRAP_BLOCKS')) {

    /**
     * Class JECO_BOOTSTRAP_BLOCKS
     *
     * This class handles the functionality of the Jeco Blocks plugin.
     */
    class JECO_BOOTSTRAP_BLOCKS
    {
        /**
         * Plugin version number.
         *
         * @var string
         */
        public $version = '1.0.0';

        /**
         * JECO_BOOTSTRAP_BLOCKS constructor.
         *
         * Initialize hooks and constants.
         */
        public function __construct()
        {
            // Define constants for the plugin
            $this->define('JECO_BOOTSTRAP_BLOCKS_VERSION', $this->version);
            $this->define('JECO_BOOTSTRAP_BLOCKS_ROOT_URL', plugin_dir_url(__FILE__));
            $this->define('JECO_BOOTSTRAP_BLOCKS_ROOT_PATH', plugin_dir_path(__FILE__));
            $this->define('JECO_BOOTSTRAP_BLOCKS_INC_PATH', plugin_dir_path(__FILE__) . "inc/");

            // Check for ACF and include necessary files
            if (class_exists('ACF')) {
                $this->include_files();
                $this->init_hooks();
            } else {
                add_action('admin_notices', [$this, 'acf_missing_notice']);
            }
        }

        /**
         * Include necessary files for the plugin.
         *
         * @return void
         */
        public function include_files()
        {
            require_once plugin_dir_path(__FILE__) . 'inc/register-blocks.php';
            require_once plugin_dir_path(__FILE__) . 'inc/register-styles.php';
            require_once plugin_dir_path(__FILE__) . 'inc/register-editor-styles.php';
            require_once plugin_dir_path(__FILE__) . 'cli-commands/create-block.php';
        }

        /**
         * Initialize hooks for the plugin.
         *
         * This method sets up activation, deactivation hooks, cron jobs, and admin menu.
         *
         * @return void
         */
        public function init_hooks()
        {
            register_activation_hook(__FILE__, [$this, 'JECO_BOOTSTRAP_BLOCKS_activation']);
            register_deactivation_hook(__FILE__, [$this, 'JECO_BOOTSTRAP_BLOCKS_deactivation']);
        }

        /**
         * Activation function.
         *
         * This function is triggered when the plugin is activated.
         *
         * @return void
         */
        public function JECO_BOOTSTRAP_BLOCKS_activation()
        {
            // Any activation logic can go here, if needed
        }

        /**
         * Deactivation function.
         *
         * Placeholder for deactivation logic, such as unscheduling cron jobs.
         *
         * @return void
         */
        public function JECO_BOOTSTRAP_BLOCKS_deactivation() {}

        /**
         * Admin notice for missing ACF plugin.
         *
         * This function displays an admin notice if ACF is not active.
         *
         * @return void
         */
        public function acf_missing_notice()
        {
            echo '<div class="notice notice-error"><p><strong>Jeco Blocks:</strong> The Advanced Custom Fields (ACF) plugin is required for this plugin to function properly. Please install and activate ACF.</p></div>';
        }

        /**
         * Defines a constant if it is not already defined.
         *
         * @param string $name  The constant name.
         * @param mixed  $value The constant value.
         *
         * @return void
         */
        public function define($name, $value = true)
        {
            if (!defined($name)) {
                define($name, $value);
            }
        }
    }

    /**
     * Returns the one true instance of the JECO_BOOTSTRAP_BLOCKS class.
     *
     * This function ensures that the class is instantiated only once.
     *
     * @return JECO_BOOTSTRAP_BLOCKS
     */
    function JECO_BOOTSTRAP_BLOCKS()
    {
        global $JECO_BOOTSTRAP_BLOCKS;

        if (!isset($JECO_BOOTSTRAP_BLOCKS)) {
            $JECO_BOOTSTRAP_BLOCKS = new JECO_BOOTSTRAP_BLOCKS();
        }

        return $JECO_BOOTSTRAP_BLOCKS;
    }

    // Instantiate the plugin
    JECO_BOOTSTRAP_BLOCKS();
}
