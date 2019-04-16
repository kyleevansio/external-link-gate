<?php
/**
 * External Link Gate Settings
 */

class ExternalLinkGateSettings {

    /**
     * Options
     */
    protected $options;

    /**
     * Setup settings
     */
    public function setup() {

        // Register settings
        add_action( 'admin_init', array( $this, 'register_settings' ) );

        // Add settings page
        add_action( 'admin_menu', array( $this, 'add_settings_page' ) );

    }

    /**
     * Register Settings
     */
    public function register_settings() {

        // Register setting
        register_setting( 'external-link-gate', 'external-link-gate' );

        // Register settings section
        add_settings_section(
            'external-link-gate-main',
            __( 'External Link Gate Settings', 'external_link_gate' ),
            array( $this, 'main_settings_section' ),
            'external-link-gate'
        );

        // Register Fields
        add_settings_field(
            'title',
            __( 'Title', 'external_link_gate' ),
            array( $this, 'title_field' ),
            'external-link-gate',
            'external-link-gate-main'
        );

        add_settings_field(
            'content',
            __( 'Message', 'external_link_gate' ),
            array( $this, 'content_field' ),
            'external-link-gate',
            'external-link-gate-main'
        );

    }

    /**
     * Add Settings Page
     */
    public function add_settings_page() {

        add_options_page(
            __( 'External Link Gate', 'external_link_gate' ),
            __( 'External Link Gate', 'external_link_gate' ),
            'manage_options',
            'external-link-gate',
            array( $this, 'settings_page' )
        );

    }

    /**
     * Settings Page Output
     */
    public function settings_page() {

        $this->options = get_option( 'external-link-gate' );

        ?>

        <div class="wrap">

            <form method="post" action="options.php">

                <?php settings_fields( 'external-link-gate' ); ?>

                <?php do_settings_sections( 'external-link-gate' ); ?>

                <?php submit_button(); ?>

            </form>

        </div> <!-- /.wrap -->

        <?php

    }

    /**
     * Main Settings Section
     */
    public function main_settings_section() {

        echo '<p>Main Settings</p>';

    }

    /**
     * Title Field
     */
    public function title_field() {

        $title = ( isset( $this->options['title'] ) ) ? $this->options['title'] : '';

        echo '<input type="text" name="external-link-gate[title]" value="' . esc_attr( $title ) . '" class="widefat">';

    }

    /**
     * Content Field
     */
    public function content_field() {

        $content = ( isset( $this->options['content'] ) ) ? $this->options['content'] : '';

        wp_editor( $content, 'external-link-gate-content', array(
            'media_buttons' => false,
            'textarea_name' => 'external-link-gate[content]',
        ) );

    }

}
