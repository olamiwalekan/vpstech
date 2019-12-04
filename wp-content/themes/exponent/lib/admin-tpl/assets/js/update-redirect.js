(function($){
	"use strict";
	function go_to() {
		$( document ).on('wp-theme-update-success', function(){
			window.location.href = be_redirect.url;
		})
	}
    $(document).on( 'ready', function() {
    	go_to();
    });
})(jQuery);
