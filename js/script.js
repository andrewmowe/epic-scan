(function($, window, document) {
  "use strict";

  $(document).ready(function() {

  	// vars for home hero bg video
	  var $target = $("#target"),
	  		video = $("#video-es").html();

		if( $target.length > 0 ) {
			bgVideoSet($target, video);
		}

	});


	// detect mobile and display video if not
	function bgVideoSet(target, video) {

	  if( $.browser.mobile ) {
	  	var isMobile = true;
	  } else {
	  	var isMobile = false;
	  	target.html(video);
	  }

	}

}( window.jQuery, window, document ));