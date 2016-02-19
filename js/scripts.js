(function( root, $, undefined ) {
	"use strict";

	$(function () {
		// DOM ready, take it away
		$(document).fitVids();

		var sticky = new Waypoint.Sticky({
		  element: $('header.header')[0]
		})

		$('a[rel="nofollow"], li.top > a','.header nav').click(function(e){

			if($('body').hasClass('home')) {
				e.preventDefault();
				var section = $(this).data('title');
				var url = '#'+section;
				if($(this).parent('li').hasClass('top')) $(window).scrollTo(0, 400);
				else $(window).scrollTo('#'+section, 400);

				history.replaceState({section: '#'+section}, 'Section' + section, url);
			}else{
				return true;
			}
		})

	});

} ( this, jQuery ));