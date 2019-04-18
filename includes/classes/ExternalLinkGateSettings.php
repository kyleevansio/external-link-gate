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
            '',
            '',
            'external-link-gate'
        );

        // Register Fields
        add_settings_field(
            'title',
            __( 'Title', 'external_link_gate' ),
            array( $this, 'text_field' ),
            'external-link-gate',
            'external-link-gate-main',
            array(
                'id' => 'title',
                'label_for' => 'external-link-gate-title',
            )
        );

        add_settings_field(
            'content',
            __( 'Message', 'external_link_gate' ),
            array( $this, 'content_field' ),
            'external-link-gate',
            'external-link-gate-main'
        );

        add_settings_field(
            'continue_button_text',
            __( 'Continue Button Text', 'external_link_gate' ),
            array( $this, 'text_field' ),
            'external-link-gate',
            'external-link-gate-main',
            array(
                'id' => 'continue_button_text',
                'label_for' => 'external-link-gate-continue-button-text',
            )
        );

        add_settings_field(
            'cancel_button_text',
            __( 'Cancel Button Text', 'external_link_gate' ),
            array( $this, 'text_field' ),
            'external-link-gate',
            'external-link-gate-main',
            array(
                'id' => 'cancel_button_text',
                'label_for' => 'external-link-gate-cancel-button-text',
            )
        );

        add_settings_field(
            'open_new_tab',
            __( 'Open Continue Button in New Tab', 'external_link_gate' ),
            array( $this, 'checkbox_field' ),
            'external-link-gate',
            'external-link-gate-main',
            array(
                'id' => 'open_new_tab',
            )
        );

        add_settings_field(
            'show_url',
            __( 'Show URL', 'external_link_gate' ),
            array( $this, 'checkbox_field' ),
            'external-link-gate',
            'external-link-gate-main',
            array(
                'id' => 'show_url',
            )
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

        $this->options = elg_get_options();

        ?>

        <div class="wrap">

            <h1><?php _e( 'External Link Gate Settings', 'external_link_gate' ); ?></h1>

            <form method="post" action="options.php">

                <?php settings_fields( 'external-link-gate' ); ?>

                <?php do_settings_sections( 'external-link-gate' ); ?>

                <?php submit_button(); ?>

            </form>

        </div> <!-- /.wrap -->

        <?php

    }

    /**
     * Basic text field
     *
     * @param array
     */
    public function text_field( $args ) {

        if ( empty( $args['id'] ) ) {
            return;
        }

        $value = ( isset( $this->options[ $args['id'] ] ) ) ? $this->options[ $args['id'] ] : '';
        $id = ( !empty( $args['label_for'] ) ) ? $args['label_for'] : 'external-link-gate-' . $args['id'];

        echo '<input type="text" name="external-link-gate[' . esc_attr( $args['id'] ) . ']" value="' . esc_attr( $value ) . '" id="' . esc_attr( $id ) . '" class="widefat">';

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

    /**
     * Checkbox field
     *
     * @param array $args
     */
    public function checkbox_field( $args ) {

        if ( empty( $args['id'] ) ) {
            return;
        }

        $checked = ( !empty( $this->options[ $args['id'] ] ) ) ? 'checked' : '';

        echo '<input type="checkbox" name="external-link-gate[' . esc_attr( $args['id'] ) . ']" value="on" ' . $checked . '>';

    }

}
