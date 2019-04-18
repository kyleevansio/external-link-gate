jQuery(function($){

    var isModalOpen = false,
        currentUrlParams = new URLSearchParams( window.location.search ),
        siteRegex = new RegExp( window.location.host + '/' );

    /**
     * Apply appropriate class to external links
     */
    $( 'a' ).each( function() {

        var url = this.href;

		if ( siteRegex.test( url ) ) {
			return;
		}

        var siteURL = new URL( window.location.href );
        var siteURLParams = new URLSearchParams( siteURL.search );

        $( this ).addClass( 'js-elg-open-modal' );
        $( this ).data( 'url', url );

        siteURLParams.set( 'elg', '1' );
        siteURLParams.set( 'elg_url', encodeURIComponent( url ) );

        siteURL.search = siteURLParams.toString();

        $( this ).attr( 'href', siteURL.href );

    } );

    /**
     * Open modal when external links are clicked
     */
    $( document ).on( 'click', '.js-elg-open-modal', function(e) {

        e.preventDefault();

        openModal( $( this ).data( 'url' ) );

    } );

    /**
     * Open modal if the page has been reloaded with the right query parameters
     */
    if ( currentUrlParams.has( 'elg' ) && currentUrlParams.has( 'elg_url' ) ) {

        openModal( decodeURIComponent( currentUrlParams.get( 'elg_url' ) ) );

    }

    /**
     * Close modal when close button is clicked
     */
    $( document ).on( 'click', '.js-elg-close-modal', function(e) {

        e.preventDefault();

        closeModal();

    } );

    /**
     * Close modal when confirm link is clicked
     */
    $( document ).on( 'click', '.elg-button-confirm', function(e) {

        closeModal();

    } );

    /**
     * Close modal on escape key
     */
    $( document ).on( 'keyup', function(e) {

        if ( e.keyCode === 27 && isModalOpen ){

            closeModal();

        }

    } );

    /**
     * Open Modal
     *
     * @param string url
     */
    function openModal( url ) {

        $( '.elg-button-confirm' ).attr( 'href', url );
        $( '.elg-url' ).text( url );

        $( 'body' ).addClass( 'elg-modal-open' );
        $( '#elg-modal-container' ).addClass( 'is-open' );

        $( '.elg-close-modal-button' ).focus();

        isModalOpen = true;

    }

    /**
     * Close Modal
     */
    function closeModal() {

        $( 'body' ).removeClass( 'elg-modal-open' );
        $( '#elg-modal-container' ).removeClass( 'is-open' );

        if ( currentUrlParams.has( 'elg' ) && currentUrlParams.has( 'elg_url' ) ) {

            currentUrlParams.delete( 'elg' );
            currentUrlParams.delete( 'elg_url' );

            window.location.search = currentUrlParams.toString();

        }

        isModalOpen = false;

    }

    /**
     * Trap focus in modal
     */
    $( 'body' ).on( 'keyup', function(e){

        if ( e.keyCode === 9 && isModalOpen ) {

            if ( $.contains( document.getElementById( 'elg-modal-container' ), e.target ) ) {
                return;
            }

            if ( e.shiftKey ) {

                // Focus on last item in modal
                $( '.elg-cancel-button' ).focus();

            } else {

                // Focus on first item in modal
                $( '.elg-close-modal-button' ).focus();

            }

        }

    } );

});
