/*Owl Init*/
jQuery(document).ready(function($) {
	"use strict";
	
	/*owl carousel*/
	$("#owl_demo_1").owlCarousel({
		navigation : true, // Show next and prev buttons
		autoplay:true,
		loop:true,
		slideSpeed : 300,
		paginationSpeed : 400,
		items : 1, 
	});
	$('#owl_demo_2').owlCarousel({
		margin:20,
		nav:true,
		autoplay:true,
		responsive:{
			0:{
				items:1
			},
			480:{
				items:2
			},
			800:{
				items:4
			},
			
		}
	});
	$('#owl_demo_3').owlCarousel({
		margin:20,
		nav:true,
		loop:true,
		dots: false,
		autoplay:true,
		responsive:{
			0:{
				items:1
			},
			480:{
				items:2
			},
			800:{
				items:3
			},
		}
	});
	$('#owl_demo_3a').owlCarousel({
		margin:20,
		nav:false,
		loop:true,
		dots: false,
		autoplay:true,
		responsive:{
			0:{
				items:1
			},
			480:{
				items:2
			},
			800:{
				items:3
			},
		}
	});
});