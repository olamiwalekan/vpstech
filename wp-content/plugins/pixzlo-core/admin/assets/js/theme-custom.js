(function( $ ) {
 
    "use strict";

	$( document ).ready(function() {

		//Custom Font Delete Event
		$( ".pixzlo-cus-font-del" ).click(function() {
			var font_id = $(this).data('font');
			font_id = font_id.replace("'", "");
			font_id = font_id.replace("'", "");
			var parent_tr = $(this).parents('tr');
			var cur = this;
			
			$( cur ).replaceWith( "<p>" + pixzlo_core_admin_ajax_var.process + "</p>" );
			
			$.ajax({
				type: "post",
				dataType : "json",
				url: pixzlo_core_admin_ajax_var.admin_ajax_url,
				data : {action: "pixzlo_custom_font_del", font_id : font_id, f_nounce: pixzlo_core_admin_ajax_var.font_nonce},
				error: function(data){
					alert(pixzlo_core_admin_ajax_var.font_del_pbm);
				},
				success: function(data){
					if( data.type == "success" ) {
						$( parent_tr ).remove();
					}else{
						alert(data.res);
					}
				}
			});
			return false;
		});
		
		// Star Rating
		if( $("ul.star-rating").length ){

			$("ul.star-rating > li").hover(function() {
				var index = $( this ).index();
				var parent = $( this ).parent( "ul.star-rating" );
				var i;
				
				//Reset
				$( parent ).find( "li > span" ).removeClass( "fa-star" ).addClass( "fa-star-o" );
				
				if( index != 0 ){
					for( i = 1; i <= index; i++ ){
						$( parent ).find( "li:eq("+ i +") > span" ).removeClass( "fa-star-o" ).addClass( "fa-star" );
					}
				}
				
				$( parent ).next( ".pixzlo-meta-rating-value" ).val( index );
				
			});
			
		} // Star rating exists
		
		// Meta Star Rating
		if( $("ul.pixzlo-meta-rating").length ){
		
			$( "ul.pixzlo-meta-rating" ).each(function( index ) {
				var meta_val = $( this ).next( ".pixzlo-meta-rating-value" ).val();
				if( meta_val ){
					//Reset
					$( this ).find( "li > span" ).removeClass( "fa-star" ).addClass( "fa-star-o" );
					var index = meta_val;
					
					if( index != 0 ){
						var i;
						for( i = 1; i <= index; i++ ){
							$( this ).find( "li:eq("+ i +") > span" ).removeClass( "fa-star-o" ).addClass( "fa-star" );
						}
					}
				}
			});
		
		} // Meta star rating exists
		
	});
	
})(jQuery);