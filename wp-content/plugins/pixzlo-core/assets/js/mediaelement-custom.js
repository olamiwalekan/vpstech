$( document ).ready(function() {
	if( $('.pixzlo-custom-video').length ){
		var mediaElements = document.querySelectorAll('video, audio'), i, total = mediaElements.length;
		
		for (i = 0; i < total; i++) {
			new MediaElementPlayer(mediaElements[i], {
				stretching: 'auto',
				pluginPath: '../build/',
				success: function (media) {
					var renderer = document.getElementById(media.id + '-rendername');
		
					media.addEventListener('loadedmetadata', function () {
						var src = media.originalNode.getAttribute('src').replace('&amp;', '&');
						if (src !== null && src !== undefined) {
							renderer.querySelector('.src').innerHTML = '<a href="' + src + '" target="_blank">' + src + '</a>';
							renderer.querySelector('.renderer').innerHTML = media.rendererName;
							renderer.querySelector('.error').innerHTML = '';
						}
					});
		
					media.addEventListener('error', function (e) {
						renderer.querySelector('.error').innerHTML = '<strong>Error</strong>: ' + e.message;
					});
				}
			});
		}
	}

	$( ".onclick-custom-video" ).click(function() {

		var parent = $(this).parent('.post-video-wrap');
		var video = '<video width="100%" height="450" preload="true" style="max-width:100%;"><source src="'+ $(this).data("url") +'" type="video/mp4"></video>';
		$(this).fadeOut(300);
		$(this).replaceWith( video );
		
		//var mediaElements = parent.find('video');
		return false;
		
	});
});