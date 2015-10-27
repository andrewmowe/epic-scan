(function($, window, document) {
  "use strict";

  $(document).ready(function() {
	  var $target = $("#target"),
	  		video = $("#video-es").html();

	  if( $.browser.mobile ) {
	  	var isMobile = true;
	  } else {
	  	var isMobile = false;
	  	$target.html(video);
	  }

	  console.log(isMobile);

	});



}( window.jQuery, window, document ));
