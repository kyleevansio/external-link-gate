<?php
/**
 * Modal template
 */

$options = get_option( 'external-link-gate' );

$title = ( isset( $options['title'] ) ) ? $options['title'] : '';
$content = ( isset( $options['content'] ) ) ? $options['content'] : '';
$continue_button_text = ( isset( $options['continue_button_text'] ) ) ? $options['continue_button_text'] : '';
$cancel_button_text = ( isset( $options['cancel_button_text'] ) ) ? $options['cancel_button_text'] : '';
$open_new_tab = ( !empty( $options['open_new_tab'] ) ) ? true : false;

?>

<div class="elg-modal-container" id="elg-modal-container">

    <div class="elg-modal" id="elg-modal" role="dialog">

        <button class="elg-close-modal-button js-elg-close-modal">
            <span class="elg-screen-reader-text"><?php _e( 'Close', 'external_link_gate' ); ?></span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="elg-icon" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z"/></svg>
        </button>

        <header class="elg-header">

            <h3 class="elg-modal-title"><?php echo esc_html( $title ); ?></h3>

        </header>

        <div class="elg-modal-content">

            <p><?php echo wpautop( wp_kses_post( $content ) ); ?></p>

        </div> <!-- /.elg-modal-content -->

        <div class="elg-modal-controls">

            <a href="#" <?php if ( $open_new_tab ) echo 'target="_blank"'; ?> class="elg-button elg-button-confirm"><?php echo esc_html( $continue_button_text ); ?></a>

            <button class="elg-cancel-button js-elg-close-modal"><?php echo esc_html( $cancel_button_text ); ?></button>

        </div> <!-- /.elg-modal-controls -->

        <footer class="elg-footer">
            <p><?php _e( 'URL: <span class="elg-url"></span>', 'external_link_gate' ); ?></p>
        </footer>

    </div> <!-- /#elg-modal -->

</div> <!-- /#elg-modal-container -->
