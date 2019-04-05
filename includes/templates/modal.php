<?php
/**
 * Modal template
 */

?>

<div class="elg-modal-container" id="elg-modal-container">

    <div class="elg-modal" id="elg-modal" role="dialog">

        <button class="elg-close-modal-button js-elg-close-modal">
            <span class="elg-screen-reader-text"><?php _e( 'Close', 'external_link_gate' ); ?></span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="elg-icon" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z"/></svg>
        </button>

        <h3 class="elg-modal-title"><?php _e( 'You are about to leave this site', 'external_link_gate' ); ?></h3>

        <div class="elg-modal-content">

            <p><?php _e( 'You just clicked a link that goes away from our site. Do you wish to continue?', 'external_link_gate' ); ?></p>

        </div> <!-- /.elg-modal-content -->

        <div class="elg-modal-controls">

            <a href="#" class="elg-button elg-button-confirm"><?php _e( 'Continue to Site', 'external_link_gate' ); ?></a>

            <button class="elg-cancel-button js-elg-close-modal"><?php _e( 'Cancel', 'external_link_gate' ); ?></button>

            <p><?php _e( 'URL: <span class="elg-url"></span>', 'external_link_gate' ); ?></p>

        </div> <!-- /.elg-modal-controls -->

    </div> <!-- /#elg-modal -->

</div> <!-- /#elg-modal-container -->
