jQuery(function($){

    var isModalOpen = false;

    /**
     * Apply appropriate class to external links
     */
    $( 'a' ).each( function() {

        var url = this.href;

		var site = new RegExp( window.location.host + '/' );

		if ( site.test( url ) ) {
			return;
		}

        $( this ).addClass( 'js-elg-open-modal' );
        $( this ).attr( 'href', window.location.href + '?elg=1&elg_url=' + encodeURIComponent( url ) );
        $( this ).data( 'url', url );

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
	if ( getURLParameter( 'elg' ) && getURLParameter( 'elg_url' ) ) {

		openModal( decodeURIComponent( getURLParameter( 'elg_url' ) ) );

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

        isModalOpen = true;

    }

    /**
     * Close Modal
     */
    function closeModal() {

        $( 'body' ).removeClass( 'elg-modal-open' );
        $( '#elg-modal-container' ).removeClass( 'is-open' );

        isModalOpen = false;

    }

    /**
	 * Get URL parameter
	 *
	 * @param string sParam
	 */
	function getURLParameter( sParam ) {

		var sPageURL = window.location.search.substring( 1 );
		var sURLVariables = sPageURL.split( '&' );

		for ( var i = 0; i < sURLVariables.length; i++ ) {

			var sParameterName = sURLVariables[i].split( '=' );

			if ( sParameterName[0] == sParam ) {

				return sParameterName[1];

			}

		}

	}

});
