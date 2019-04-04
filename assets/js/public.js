jQuery(function($){

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
        $( this ).attr( 'href', window.location.host + '?elg=1&elg_url=' + encodeURIComponent( url ) );
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
     * Close modal when close button is clicked
     */
    $( document ).on( 'click', '.js-elg-close-modal', function(e) {

        e.preventDefault();

        closeModal();

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

    }

    /**
     * Close Modal
     */
    function closeModal() {

        $( 'body' ).removeClass( 'elg-modal-open' );
        $( '#elg-modal-container' ).removeClass( 'is-open' );

    }

});
