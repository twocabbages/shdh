(function ($) {
	"use strict";

 	function clientCarosule () {
		if ($('#clients .owl-carousel').length) {
			$('#clients .owl-carousel').owlCarousel({
				loop: true,
				margin: 40,
				nav: true,
				dots: false,
				autoWidth: true,
				navText: [
					'<i class="fa fa-angle-left"></i>',
					'<i class="fa fa-angle-right"></i>'
				],
				autoplayHoverPause: true,
				responsive: {
					0:{
						items:1
					},
					480:{
						items:2
					},
					600:{
						items:3
					},
					1000:{
						items:5
					}
				}
			});
		}
	}
// add your custom functions
	function testimonialsCarosuleGardener () {
		if ($('#testimonials-gardener .owl-carousel').length) {
			$('#testimonials-gardener .owl-carousel').owlCarousel({
				loop: true,
				margin: 0,
				nav: true,
				dots: false,
				autoplay: true,
				navText: [
					'<i class="fa fa-angle-left"></i>',
					'<i class="fa fa-angle-right"></i>'
				],
				autoplayHoverPause: true,
				responsive: {
					0:{
						items:1
					},
					480:{
						items:1
					},
					600:{
						items:1
					},
					1000:{
						items:1
					}
				}
			});
		}
	}


// Gallery masonary style
	function galleryMasonaryLayout () {
		if ($('.masonary-gallery').length) {
			$('.masonary-gallery').isotope({
				layoutMode:'masonry'
			});
		}
	}
// Google Map
	function gMap () {
		if ($('.google-map').length) {
			$('.google-map').each(function () {
				// getting options from html
				var mapName = $(this).attr('id');
				var mapLat = $(this).data('map-lat');
				var mapLng = $(this).data('map-lng');
				var iconPath = $(this).data('icon-path');
				var mapZoom = $(this).data('map-zoom');
				var mapTitle = $(this).data('map-title');

				// if zoom not defined the zoom value will be 15;
				if (!mapZoom) {
					var mapZoom = 15;
				};
				// init map
				var map;
				map = new GMaps({
					div: '#'+mapName,
					scrollwheel: false,
					lat: mapLat,
					lng: mapLng,
					zoom: mapZoom
				});
				// if icon path setted then show marker
				if(iconPath) {
					map.addMarker({
						icon: iconPath,
						lat: mapLat,
						lng: mapLng,
						title: mapTitle
					});
				}
			});
		};
	}
// revolution slider
	function revolutionSliderActiver () {
		if ($('.rev_slider_wrapper #slider1').length) {
			$("#slider1").revolution({
				sliderType:"standard",
				sliderLayout:"auto",
				delay:5000,
				navigation: {
					arrows:{enable:true}
				},
				gridwidth:1170,
				gridheight:705
			});
		};
	}
// Adding hover effect to gallery
	function galleryHover () {
		// hover effect for normal gallery
		if ($('.normal-gallery').length) {
			$('.normal-gallery .content-wrap').each(function () {
				$(this).parent().parent().addClass('mix');
			});
		};

	}
// gallery filter activation
	function GalleryFilter () {

		if ($('#image-gallery-mix').length) {
			$('.gallery-filter').find('li').each(function () {
				$(this).addClass('filter');
			});
			$('#image-gallery-mix').mixItUp();
		};
		if($('.gallery-filter.masonary').length){
			$('.gallery-filter.masonary span').on('click', function(){
				var selector = $(this).parent().attr('data-filter');
				$('.gallery-filter.masonary span').parent().removeClass('active');
				$(this).parent().addClass('active');
				$('#image-gallery-isotope').isotope({ filter: selector });
				return false;
			});
		}
	}
// Mobile Navigation
	function mobileNavToggler () {
		if ($('.mainmenu-navigation .navigation').length) {
			$('.mainmenu-navigation .navigation .nav-header button').on('click', function () {
				$('.mainmenu-navigation .navigation .nav-footer').slideToggle();
				return false;
			});
			$('.mainmenu-navigation .navigation li.dropdown').children('a').append(function () {
				return '<button class="dropdown-expander"><i class="fa fa-bars"></i></button>';
			});
			$('.mainmenu-navigation .navigation .nav-footer .dropdown-expander').on('click', function () {
				$(this).parent().parent().children('.sub-menu').slideToggle();
				console.log($(this).parents('li'));
				return false;
			});

		}
	}
// wow activator
	function wowActivator () {
		var wow = new WOW ({
			offset: 0
		});
		wow.init();
	}
// gallery fancybox activator
	function GalleryFancyboxActivator () {
		var galleryFcb = $('.fancybox');
		if(galleryFcb.length){
			galleryFcb.fancybox({
				openEffect  : 'elastic',
				closeEffect : 'elastic',
				helpers : {
					media : {}
				}
			});
		}
	}
//Contact Form Validation
	function contactFormValidation () {
		if($('.contact-form').length){
			$('.contact-form').validate({ // initialize the plugin
				rules: {
					name: {
						required: true
					},
					email: {
						required: true,
						email: true
					},
					message: {
						required: true
					},
					subject: {
						required: true
					}
				},
				submitHandler: function (form) {
					// sending value with ajax request
					$.post($(form).attr('action'), $(form).serialize(), function (response) {
						$(form).parent('div').append(response);
						$(form).find('input[type="text"]').val('');
						$(form).find('input[type="email"]').val('');
						$(form).find('textarea').val('');
					});
					return false;
				}
			});
		}
	}
	function CounterNumberChanger () {
		var timer = $('.timer');
		if(timer.length) {
			timer.appear(function () {
				timer.countTo();
			})
		}

	}
	function customTabProductPageTab () {
		if ($('.product-details-tab-title').length) {
			var tabWrap = $('.product-details-tab-content');
			var tabClicker = $('.product-details-tab-title ul li');

			tabWrap.children('div').hide();
			tabWrap.children('div').eq(0).show();
			tabClicker.on('click', function() {
				var tabName = $(this).data('tab-name');
				tabClicker.removeClass('active');
				$(this).addClass('active');
				var id = '#'+ tabName;
				tabWrap.children('div').not(id).hide();
				tabWrap.children('div'+id).fadeIn('500');
				return false;
			});
		}
	}
	function stickyHeader () {
		if ($('.stricky').length) {
			var strickyScrollPos = $('.stricky').next().offset().top;
			if($(window).scrollTop() > strickyScrollPos) {
				$('.stricky').removeClass('slideIn animated');
				$('.stricky').addClass('stricky-fixed slideInDown animated');
			}
			else if($(this).scrollTop() <= strickyScrollPos) {
				$('.stricky').removeClass('stricky-fixed slideInDown animated');
				$('.stricky').addClass('slideIn animated');
			}
		};
	}
	function responsiveVideo () {
		if ($('.video-wrapper').length) {
			$('.video-wrapper').fitVids();
		};
	}
// add your custom functions
	function teamCarosule () {
		if ($('#dedicated-team-area .owl-carousel').length) {
			$('#dedicated-team-area .owl-carousel').owlCarousel({
				loop: true,
				margin: 30,
				nav: true,
				dots: false,
				navText: [
					'<i class="fa fa-angle-left"></i>',
					'<i class="fa fa-angle-right"></i>'
				],
				autoplay: true,
				autoplayTimeout: 3000,
				autoplayHoverPause: true,
				responsive: {
					0:{
						items:1
					},
					480:{
						items:1
					},
					600:{
						items:2
					},
					1000:{
						items:3
					},
					1200:{
						items:4
					}
				}
			});
		}
	}




	function videoGallery () {
		if ($('.video-gallery').length) {
			var slider = $('.video-gallery').bxSlider({
				width: 600,
				video: true,
				onSlideNext: function() {
					$("#video-popup-modal iframe").attr("src", $("#video-popup-modal iframe").attr("src"));
				},
				onSlidePrev: function() {
					$("#video-popup-modal iframe").attr("src", $("#video-popup-modal iframe").attr("src"));
				},
				useCSS: false
			});
			$(".modal-backdrop, #video-popup-modal .close, #video-popup-modal .btn").on("click", function() {
				$("#video-popup-modal iframe").attr("src", $("#video-popup-modal iframe").attr("src"));
			});
			$('#video-popup-modal').on('show.bs.modal', function (e) {
				slider.reloadSlider();
			});
			$('#video-popup-modal').on('hide.bs.modal', function (e) {
				$("#video-popup-modal iframe").attr("src", $("#video-popup-modal iframe").attr("src"));
			});
		};
	}






// Dom Ready Function
	jQuery(document).on('ready', function () {
		(function ($) {
			// add your functions
			clientCarosule();
			galleryMasonaryLayout();
			revolutionSliderActiver();
			galleryHover();
			GalleryFilter();
			mobileNavToggler();
			wowActivator();
			contactFormValidation();
			GalleryFancyboxActivator();
			customTabProductPageTab();
			testimonialsCarosuleGardener();
			responsiveVideo();
			teamCarosule();
		})(jQuery);
	});
// window on load functino
	jQuery(window).on('load', function () {
		(function ($) {
			// add your functions
			CounterNumberChanger();
			videoGallery();
		})(jQuery);
	});
// window on scroll functino
	jQuery(window).on('scroll', function () {
		(function ($) {
			// add your functions
			stickyHeader();
		})(jQuery);
	});

})(jQuery);