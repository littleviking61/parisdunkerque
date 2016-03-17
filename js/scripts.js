(function( root, $, undefined ) {
	"use strict";

	$(function () {
		// DOM ready, take it away
		$(document).fitVids();
		var header = $('header.header');

		var sticky = new Waypoint.Sticky({
		  element: $(header)[0]
		});

		var waypoint = $("main > section[id]").waypoint({
		  handler: function(direction) {
		  	if(direction === 'up') {
		  		$('nav a[href="/#'+this.element.id+'"]', header).removeClass('active');
		  	}else{
		  		$('nav a[href="/#'+this.element.id+'"]', header).addClass('active');
		  	}
		  },
		  offset: '25%'
		})


		$('nav a[rel="nofollow"], li.top > a',header).click(function(e){

			if($('body').hasClass('home')) {
				e.preventDefault();
				var section = $(this).data('title');
				var url = '#'+section;
				if($(this).parent('li').hasClass('top')) $(window).scrollTo(0, 400);
				else {
					var position = $('#'+section).offset().top - header.outerHeight();
					$(window).scrollTo(position, 400);
				}

				history.replaceState({section: '#'+section}, 'Section' + section, url);
			}else{
				return true;
			}
		})

	});

} ( this, jQuery ));