<?php
/**
 * Plugin Name: External Link Gate
 * Description: Create a warning for third party links
 * Version: 0.1.0
 * Author: Kyle Evans
 * Author URI: https://kyleevans.io
 */

// Global constants
define( 'EXTERNALLINKGATE_VERSION', '0.1.0' );
define( 'EXTERNALLINKGATE_URL', plugin_dir_url( __FILE__ ) );
define( 'EXTERNALLINKGATE_PATH', plugin_dir_path( __FILE__ ) );

// Functions
require_once EXTERNALLINKGATE_PATH . 'includes/functions.php';

// Classes
require_once EXTERNALLINKGATE_PATH . 'includes/classes/ExternalLinkGate.php';
require_once EXTERNALLINKGATE_PATH . 'includes/classes/ExternalLinkgateSettings.php';

// Setup plugin
$external_link_gate = new ExternalLinkGate();
$external_link_gate->setup();
