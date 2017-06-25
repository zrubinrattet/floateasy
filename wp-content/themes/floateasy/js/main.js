;(function ( $, window, document, undefined ) {

	$(document).ready(function(){
		




		/*
			Breakpoints
		*/
		var Breakpoint = {
			name : '',
			_init : function(){
				$(window).on('resize load', Breakpoint._resizeLoadHander);
			},
			_resizeLoadHander : function(){
				if( $(window).width() > 1024 && Breakpoint.name != 'desktop' ){
					Breakpoint.name = 'desktop';
					Breakpoint._dispatchEvent();
				}
				else if( $(window).width() <= 1024 && $(window).width() > 640 && Breakpoint.name != 'tablet' ){
					Breakpoint.name = 'tablet';	
					Breakpoint._dispatchEvent();
				}
				else if( $(window).width() < 641 && Breakpoint.name != 'mobile' ){		
					Breakpoint.name = 'mobile';		
					Breakpoint._dispatchEvent();
				}
			},
			_dispatchEvent : function(){
				$(document).trigger($.Event('breakpoint', {device: Breakpoint.name}));
				console.log(Breakpoint._dispatchEvent);
			}
		}
		Breakpoint._init();

		// $(document).on('breakpoint', function(e){
		// 	// run this code on page load or whenever you enter a new breakpoint
		// 	if(e.device == 'desktop'){

		// 	}
		// 	if(e.device !== 'tablet'){
				
		// 	}
		// });

		/*
			Swiper
		*/

		var mySwiper = new Swiper('.swiper-container', {
			centeredSlides: true,
			slidesPerView: 1,
			grabCursor: true,

			pagination: '.swiper-pagination',
			nextButton: '.swiper-button-next',
			prevButton: '.swiper-button-prev',
			paginationClickable: true,

			spaceBetween: 100,

			loop: true,

			preloadImages: false,
			lazyLoading: true,
		});



		/*
			FAQ Accordions:
		*/
		var FaqAccordion = {

			items : $('.faq-grid-item'),
			label : $('.faq-grid-item-header'),
			content : $('.faq-grid-item-content'),


			_init : function(){
				FaqAccordion.label.on('click', FaqAccordion._clickHandler);
			},
			_clickHandler : function(e){
				// get index of label
				var faqIndex = $(this).parent().index();
				// slideOpen that content index
				$(FaqAccordion.content[faqIndex]).slideToggle();
			},
		}
		FaqAccordion._init();


		var OSDetection = {
			_init : function(){
				if (navigator.userAgent.indexOf('Mac OS X') != -1) {
					$("html").addClass("mac");
				} 
				else {
					$("html").addClass("pc");
				}
			},
		}

		OSDetection._init();





		// // test for whitespace
		// var k = document.querySelectorAll('*');

		// for(var i = 0; i < k.length; i++){
		//     if( jQuery(k[i]).width() > jQuery('html').width() ){
		//         console.log(k[i]);
		//     }
		// }

		var FadeEffects = {
			elements : $('.fade-up, .fade-left, .fade-right, .fade-in'),
			_init : function(){
				$(window).on('resize load scroll', FadeEffects._resizeLoadScrollHandler);
			},
			_resizeLoadScrollHandler : function(){
				for(var i = 0; i < FadeEffects.elements.length; i++){
					if( $(window).scrollTop() + $(window).height() > $(FadeEffects.elements[i]).offset().top )	{
						$(FadeEffects.elements[i]).removeClass('fade-up fade-left fade-right fade-in');
					}
				}
			},
		}

		FadeEffects._init();

		var Galleries = {
			grids : $('.gallery-locations-location-grid.gallery'),
			locations : $('.gallery-locations-location'),
			_init : function(){
				baguetteBox.run(Galleries.grids.selector);
				$('iframe').on('load', function(){
					for(var i = 0; i < Galleries.locations.length; i++){
						$(Galleries.locations[i]).find(Galleries.grids.selector).masonry({
							itemSelector : Galleries.locations.selector + ':nth-child(' + (i+1) + ') ' + '.gallery-locations-location-grid-item',
						});
					}
				});
			},
		}
	
		Galleries._init();

		var LocationGallery = {
			grid : $('.location-main-gallery-grid'),
			_init : function(){
				if( LocationGallery.grid.length !== 0 ){
					baguetteBox.run(LocationGallery.grid.selector);
					$('iframe').on('load', function(){
						LocationGallery.grid.masonry({
							itemSelector : '.location-main-gallery-grid-item',
						});
					});
				}
			}
		}

		LocationGallery._init();
		


		var MobileNav = {
			currentDevice : null,
			barTint : $('.mobileheader-bar-tint'),
			menuToggle : $('.mobileheader-bar-menutoggle-icon'),
			menuTint : $('.mobileheader-tint'),
			menu : $('.mobileheader-menus'),
			dropdownitems : $('.mobileheader-menus-pages-menu-item.has-children'),
			_init : function(){
				$(window).on('resize load', MobileNav._resizeLoadHandler);
				
				$(window).on('scroll load', MobileNav._scrollHandler);	
				
				MobileNav.menuToggle.on('click', MobileNav._menuToggleHandler);
				MobileNav.dropdownitems.on('click', MobileNav._dropdownitemsClickHandler);
			},
			_dropdownitemsClickHandler : function(e){
				if( $(e.target).hasClass('expanded') ){
					$(e.target).find('.sub-menu').slideUp();
					$(e.target).removeClass('expanded');
				}
				else{
					MobileNav.dropdownitems.find('.sub-menu').slideUp();
					MobileNav.dropdownitems.removeClass('expanded');
					$(e.target).find('.sub-menu').slideDown();
					$(e.target).addClass('expanded');
				}
			},
			_resizeLoadHandler : function(e){
				if(e.type == 'load'){
					// phones
					if($(window).width() < 641){
						MobileNav.currentDevice = 'phone';
						MobileNav._doPhones();
					}
					// tablet
					else if($(window).width() < 1025 && $(window).width() > 640){
						MobileNav.currentDevice = 'tablet';
						MobileNav._doTablet();
					}
					// desktop
					else{
						MobileNav.currentDevice = 'desktop';
						MobileNav._doDesktop();
					}
				}
				// phones
				if($(window).width() < 641 && MobileNav.currentDevice != 'phone'){
					MobileNav.currentDevice = 'phone';
					MobileNav._doPhones();
				}
				// tablet
				else if( ($(window).width() < 1025 && $(window).width() > 640) && MobileNav.currentDevice != 'tablet' ){
					MobileNav.currentDevice = 'tablet';
					MobileNav._doTablet();
				}
				// desktop
				else if($(window).width() >= 1025 && MobileNav.currentDevice != 'desktop'){
					MobileNav.currentDevice = 'desktop';
					MobileNav._doDesktop();
				}
			},
			_doPhones : function(){

			},
			_doTablet : function(){

			},
			_doDesktop : function(){
				MobileNav._closeMenu();
			},
			_map : function(n,i,o,r,t){return i>o?i>n?(n-i)*(t-r)/(o-i)+r:r:o>i?o>n?(n-i)*(t-r)/(o-i)+r:t:void 0;},
			_scrollHandler : function(e){
				// MobileNav.barTint.css('opacity', MobileNav._map($(window).scrollTop(), 0, 100, 0, 1));
			},
			_menuToggleHandler : function(e){
				if(MobileNav.menuToggle.hasClass('fa-bars')){
					MobileNav._openMenu();
				}
				else{
					MobileNav._closeMenu();
				}
			},
			_closeMenu : function(){
				MobileNav.menuToggle.removeClass('fa-times');
				MobileNav.menuToggle.addClass('fa-bars');

				MobileNav.menu.removeClass('mobileheader-menus--show');
				MobileNav.menuTint.removeClass('mobileheader-tint--show');
				// remove accordion state
				MobileNav.dropdownitems.find('.sub-menu').slideUp();
				MobileNav.dropdownitems.removeClass('expanded');
			},
			_openMenu : function(){
				MobileNav.menuToggle.removeClass('fa-bars');
				MobileNav.menuToggle.addClass('fa-times');

				MobileNav.menu.addClass('mobileheader-menus--show');
				MobileNav.menuTint.addClass('mobileheader-tint--show');
			},
		};

		MobileNav._init();


		var DesktopNav = {
			dropdowns : $('.header-content-menus-pages-menu-item.has-children'),
			_init: function(){
				DesktopNav.dropdowns.hover(DesktopNav._mouseoverHandler, DesktopNav._mouseoutHandler);
			},
			_mouseoverHandler : function(e){
				if($(e.target).parents('.has-children').hasClass('hovered') == false){
					$(e.target).parents('.has-children').addClass('hovered');
				}
			},
			_mouseoutHandler : function(e){
				setTimeout(function(){
					$(e.target).parents('.has-children').removeClass('hovered');
				}, 300);
			},
		}
 
		DesktopNav._init();

		var HomeTestimonialsSlider = {
			slides : $('.hometestimonials-grid-item'),
			arrowLeft : $('.hometestimonials-grid-arrows-left'),
			arrowRight : $('.hometestimonials-grid-arrows-right'),
			arrows : $('.hometestimonials-grid-arrows i'),
			slideMax : null,
			currentSlide : 0,
			_init : function(){
				// if there are slides
				if(HomeTestimonialsSlider.slides.length != 0){
					HomeTestimonialsSlider.slideMax = HomeTestimonialsSlider.slides.length - 1;
					// if 1 slide
					if(HomeTestimonialsSlider.slideMax == 0){
						HomeTestimonialsSlider.arrows.addClass('grey');
					}
					$(window).on('load', HomeTestimonialsSlider._arrowsClickHandler);	
					HomeTestimonialsSlider.arrows.on('click', HomeTestimonialsSlider._arrowsClickHandler);	
				}
				else{
					$('.hometestimonials').hide();
				}
			},
			_arrowsClickHandler : function(e){
				if(e.target == HomeTestimonialsSlider.arrowLeft[0]){
					if(HomeTestimonialsSlider.currentSlide != 0){
						HomeTestimonialsSlider._updateCurrentSlide(-1);
					}
				}
				if(e.target == HomeTestimonialsSlider.arrowRight[0]){
					if(HomeTestimonialsSlider.currentSlide != HomeTestimonialsSlider.slideMax){
						HomeTestimonialsSlider._updateCurrentSlide(1);	
					}
				}
				// if more than 3 slides
				if(HomeTestimonialsSlider.slideMax >= 2){
					if(HomeTestimonialsSlider.currentSlide == 0){
						HomeTestimonialsSlider.arrowLeft.addClass('grey');
					}
					else if(HomeTestimonialsSlider.currentSlide != 0 && HomeTestimonialsSlider.currentSlide != HomeTestimonialsSlider.slideMax){
						HomeTestimonialsSlider.arrows.removeClass('grey');	
					}
					else if(HomeTestimonialsSlider.currentSlide == HomeTestimonialsSlider.slideMax){
						HomeTestimonialsSlider.arrowRight.addClass('grey');	
					}	
				}
				// if 2 slides
				if(HomeTestimonialsSlider.slideMax == 1){
					if(HomeTestimonialsSlider.currentSlide == 0){
						HomeTestimonialsSlider.arrowLeft.addClass('grey');
						HomeTestimonialsSlider.arrowRight.removeClass('grey');
					}
					else{
						HomeTestimonialsSlider.arrowRight.addClass('grey');
						HomeTestimonialsSlider.arrowLeft.removeClass('grey');	
					}
				}
			},
			_updateCurrentSlide : function(amount){
				$(HomeTestimonialsSlider.slides[HomeTestimonialsSlider.currentSlide]).hide();
				$(HomeTestimonialsSlider.slides[HomeTestimonialsSlider.currentSlide + amount]).show();
				HomeTestimonialsSlider.currentSlide += amount;
			}
		}

		if($('.hometestimonials').length > 0){
			HomeTestimonialsSlider._init();
		}



	});

})( jQuery, window, document );

window._initLocationsMap = function(){
	

	var latlangs = [];
	var infowindowstrings = [];
	if( typeof Locations !== 'undefined' ){
		Locations.forEach(function(el, index, parent){
			latlangs.push({lat: Number(el[0].lat), lng: Number(el[0].lng)});
			infowindowstrings.push(el[1].infowindow);
		});
	}

	var element = document.getElementById('locations-map');
	if(element != null){


		// build bounds & make center of map coords
		var bounds  = new google.maps.LatLngBounds();
		var map_center = [];
		var x = 0;
		var y = 0;
		var markers = [];

		var map = new google.maps.Map(element, {
	      zoom: 28,
	      mapTypeId: 'roadmap',
	      scrollwheel: false,
	      draggable: true,
	      streetViewControl: false,
	    });

		// create markers
		latlangs.forEach(function(el){

			x += Number(el.lat);
			y += Number(el.lng);

			markers.push(new google.maps.Marker({
			  position: el,
			  map: map,
			  icon: Home_URL + '/wp-content/themes/floateasy/library/img/marker.png',
			}));	

			bounds.extend(el);

		});

		// add infowindow content to markers
		markers.forEach(function(el, index){
			el.info = new google.maps.InfoWindow({
				content: infowindowstrings[index]
			});
		});

		map_center[0] = x / latlangs.length;
		map_center[1] = y / latlangs.length;

		map.setCenter({lat: map_center[0], lng: map_center[1]});

		google.maps.event.addListener(map, 'zoom_changed', function() {
		    zoomChangeBoundsListener = 
		        google.maps.event.addListener(map, 'bounds_changed', function(event) {
		            if (this.getZoom() > 15 && this.initialZoom == true) {
		                // Change max/min zoom here
		                this.setZoom(15);
		                this.initialZoom = false;
		            }
		        google.maps.event.removeListener(zoomChangeBoundsListener);
		    });
		});
		map.initialZoom = true;


	 	// zoom to bounds
	 	if(latlangs.length > 1){
	 		map.fitBounds(bounds);
	 		var listener = google.maps.event.addListener(map, "idle", function() { 
	 		  map.setZoom(map.getZoom() - 1); 
	 		  google.maps.event.removeListener(listener); 
	 		});
	 		
	 	}	
	    map.panToBounds(bounds);

	    // if click map - clear markers
	    map.addListener('click', function(){
	    	clearMarkers();
	    });

	    var sidebarItems = document.querySelectorAll('.locations-sidebar-grid-item');

	    // marker click handler
	    markers.forEach(function(el, index){
	    	el.addListener('click', function(){
	    		// clear all markers & change the active marker's icon
	    		clearMarkers();
	    		this.setOptions({
	    			icon : Home_URL + '/wp-content/themes/floateasy/library/img/marker-active.png'
	    		})
	    		// open active markers' infowindow
	    		this.info.open(map, this);
	    		// clear sidebar items & set active class 
	    		clearSidebars();
	    		sidebarItems[index].className += ' active';
	    		// animate sidebar to active sidebar item
	    		jQuery('.locations-sidebar').animate({
	    			scrollTop: sidebarItems[index].offsetTop,
    			}, 400);
	    	});
	    });

	    sidebarItems.forEach(function(el, index){
	    	el.addEventListener('click', function(e){
	    		// clear all markers of active class & open infowindows
	    		clearMarkers();
	    		// set active markers icon and open it's infowindow
	    		markers[index].info.open(map, markers[index]);
	    		markers[index].setOptions({
	    			icon : Home_URL + '/wp-content/themes/floateasy/library/img/marker-active.png'
	    		});
	    		// remove all active classes from sidebaritems
	    		clearSidebars();
	    		e.target.className += ' active';
	    	});
	    });

	    clearMarkers = function(){
	    	markers.forEach(function(el){
	    		el.setOptions({
	    			icon : Home_URL + '/wp-content/themes/floateasy/library/img/marker.png'
	    		});
	    		el.info.close();
	    	});
	    }

	    clearSidebars = function(){
	    	sidebarItems.forEach(function(el){
	    		if(el.className.indexOf(' active') != -1){
	    			el.className = el.className.replace(' active', '');	
	    		}
	    	});
	    }
		
	}
	
}

