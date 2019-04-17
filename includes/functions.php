<?php
/**
 * Functions
 */

/**
 * Retrieve options with defaults
 */
function elg_get_options() {

    $defaults = array(
        'title' => __( 'You are leaving our site', 'external_link_gate' ),
        'content' => __( 'The linked you clicked on goes to a third party site. Are you sure you wish to continue?', 'external-link-gate' ),
        'continue_button_text' => __( 'Continue to site', 'external-link-gate' ),
        'cancel_button_text' => __( 'Cancel', 'external-link-gate' ),
        'open_new_tab' => true,
        'show_url' => false,
    );

    $saved = get_option( 'external-link-gate' );

    if ( !$saved ) {
        return $defaults;
    }

    return array_merge( $defaults, $saved );

}
