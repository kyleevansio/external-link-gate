<?php
/**
 * Modal template
 */

$options = get_option( 'external-link-gate' );

$title = ( isset( $options['title'] ) ) ? $options['title'] : '';
$content = ( isset( $options['content'] ) ) ? $options['content'] : '';

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

            <p><?php echo $content; ?></p>

        </div> <!-- /.elg-modal-content -->

        <div class="elg-modal-controls">

            <a href="#" target="_blank" class="elg-button elg-button-confirm"><?php _e( 'Continue to Site', 'external_link_gate' ); ?></a>

            <button class="elg-cancel-button js-elg-close-modal"><?php _e( 'Cancel', 'external_link_gate' ); ?></button>

        </div> <!-- /.elg-modal-controls -->

        <footer class="elg-footer">
            <p><?php _e( 'URL: <span class="elg-url"></span>', 'external_link_gate' ); ?></p>
        </footer>

    </div> <!-- /#elg-modal -->

</div> <!-- /#elg-modal-container -->
