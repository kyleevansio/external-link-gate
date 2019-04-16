<?php
/**
 * Main External Link Gate class
 */

class ExternalLinkGate {

    /**
     * Setup plugin
     */
    public function setup() {

        // Enqueue scripts and styles
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

        // Load modal template
        add_action( 'wp_footer', array( $this, 'load_modal' ) );

    }

    /**
     * Enquue scripts and styles
     */
    public function enqueue_scripts() {

        // Public styles
        wp_enqueue_style( 'external-link-gate-styles', EXTERNALLINKGATE_URL . 'assets/css/public.css', array(), EXTERNALLINKGATE_VERSION );

        // Public scripts
        wp_enqueue_script( 'external-link-gate-scripts', EXTERNALLINKGATE_URL . 'assets/js/public.js', array( 'jquery' ), EXTERNALLINKGATE_VERSION );

    }

    /**
     * Load modal template
     */
    public function load_modal() {

        include EXTERNALLINKGATE_PATH . 'includes/templates/modal.php';

    }

}
