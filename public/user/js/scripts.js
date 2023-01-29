$(document).ready(function() {	 
		$("#c-slider3").owlCarousel({
			items : 1,
			nav:true,
			margin: 0,
			
			itemsDesktop : [1199,1],
			navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
			itemsDesktopSmall : [979,2]
		});		
    });




	
//portfolio tab	
	let modalId = $('#image-gallery');

$(document)
  .ready(function () {

    loadGallery(true, 'a.thumbnail');

    //This function disables buttons when needed
    function disableButtons(counter_max, counter_current) {
      $('#show-previous-image, #show-next-image')
        .show();
      if (counter_max === counter_current) {
        $('#show-next-image')
          .hide();
      } else if (counter_current === 1) {
        $('#show-previous-image')
          .hide();
      }
    }

    /**
     *
     * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
     * @param setClickAttr  Sets the attribute for the click handler.
     */

    function loadGallery(setIDs, setClickAttr) {
      let current_image,
        selector,
        counter = 0;

      $('#show-next-image, #show-previous-image')
        .click(function () {
          if ($(this)
            .attr('id') === 'show-previous-image') {
            current_image--;
          } else {
            current_image++;
          }

          selector = $('[data-image-id="' + current_image + '"]');
          updateGallery(selector);
        });

      function updateGallery(selector) {
        let $sel = selector;
        current_image = $sel.data('image-id');
        $('#image-gallery-title')
          .text($sel.data('title'));
        $('#image-gallery-image')
          .attr('src', $sel.data('image'));
        disableButtons(counter, $sel.data('image-id'));
      }

      if (setIDs == true) {
        $('[data-image-id]')
          .each(function () {
            counter++;
            $(this)
              .attr('data-image-id', counter);
          });
      }
      $(setClickAttr)
        .on('click', function () {
          updateGallery($(this));
        });
    }
  });

// build key actions
$(document)
  .keydown(function (e) {
    switch (e.which) {
      case 37: // left
        if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
          $('#show-previous-image')
            .click();
        }
        break;

      case 39: // right
        if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
          $('#show-next-image')
            .click();
        }
        break;

      default:
        return; // exit this handler for other keys
    }
    e.preventDefault(); // prevent the default action (scroll / move caret)
  });

//Filter Button

$(document).ready(function(){

  $(".filter-button").click(function(){
      var value = $(this).attr('data-filter');
      
      if(value == "todo")
      {
          //$('.filter').removeClass('hidden');
          $('.filter').show('1000');
      }
      else
      {
          $('.filter[filter-item="'+value+'"]').removeClass('hidden');
          $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
          $(".filter").not('.'+value).hide('3000');
          $('.filter').filter('.'+value).show('3000');
          
      }
  });

});





(function($) {
	$(document).ready(function() {
		"use strict";
		
	// DROPDOWN TOGGLE 
    $('.site-navigation .inner ul li a').on('click', function (e) {
      $(this).parent().children('.site-navigation .inner ul li ul').toggle();
      return true;
    });
		
		
	// DATA BACKGROUND IMAGE
			var pageSection = $(".bg-image");
			pageSection.each(function(indx){
				if ($(this).attr("data-background")){
					$(this).css("background-image", "url(" + $(this).data("background") + ")");
				}
			});
		
		
		// HAMBURGER MENU
		$('.hamburger').on('click', function(e) {
			if ($(".site-navigation").hasClass("active")) {
				$(".hamburger").toggleClass("open");
				$("body").toggleClass("overflow");
				$(".site-navigation").removeClass("active");
				$(".site-navigation").css("transition-delay", "0.9s");
				$(".site-navigation .inner").css("transition-delay", "0s");
				$(".site-navigation .bottom").css("transition-delay", "0.1s");
				$(".site-navigation .layers span:nth-child(1)").css("transition-delay", "0.35s");
				$(".site-navigation .layers span:nth-child(2)").css("transition-delay", "0.50s");
				$(".site-navigation .layers span:nth-child(3)").css("transition-delay", "0.65s");
			} else
			{
				$(".site-nagivation").addClass('active');
				$(".hamburger").toggleClass("open");
				$("body").toggleClass("overflow");
				$(".site-navigation").toggleClass("active");
				$(".site-navigation").css("transition-delay", "0s");
				$(".site-navigation .inner").css("transition-delay", "0.65s");
				$(".site-navigation .bottom").css("transition-delay", "0.80s");
				
			}
			$(this).toggleClass("active");
		});
		
		
		
		
		// PAGE TRANSITION
			$('body a').on('click', function(e) {
				var target = $(this).attr('target');
				var fancybox = $(this).data('fancybox');
				var url = this.getAttribute("href"); 
				if ( target != '_blank' && typeof fancybox == 'undefined' && url.indexOf('#') < 0  ){
					e.preventDefault(); 
						var url = this.getAttribute("href"); 
						if( url.indexOf('#') != -1 ) {
							var hash = url.substring(url.indexOf('#'));

					if( $('body ' + hash ).length != 0 ){
					$('.page-transition').removeClass("active");

					}
					}
					else {
					$('.page-transition').toggleClass("active");
					setTimeout(function(){
					window.location = url;
					},1300); }}
			});



	// SWITHER
			$('.switcher .holder').on('click', function(e) {
			$(this).toggleClass("switch");
			$('.pricing-block').toggleClass("change");
			});

	


	// PARALLAX
			$.stellar({
				horizontalScrolling: false,
				verticalOffset: 0,
				responsive:true
			});
		
		
		
		
	// CONTACT FORM INPUT LABEL
			function checkForInput(element) {
			  const $label = $(element).siblings('span');
			  if ($(element).val().length > 0) {
				$label.addClass('label-up');
			  } else {
				$label.removeClass('label-up');
			  }
			}

			// The lines below are executed on page load
			$('input, textarea').each(function() {
			  checkForInput(this);
			});

			// The lines below (inside) are executed on change & keyup
			$('input, textarea').on('change keyup', function() {
			  checkForInput(this);  
			});
		
		


		
		});
	// END DOCUMENT READY


	var swiper = new Swiper('.carousel-slider', {
		  slidesPerView: 'auto',
		  spaceBetween: 5,
				centeredSlides: true,
				loop: true,
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
				},
		  pagination: {
			el: '.swiper-pagination',
			clickable: true,
		  }
		});
	
	
	var swipers = new Swiper('.testimonials-slider', {
		  slidesPerView: 'auto',
		  spaceBetween: 5,
				centeredSlides: true,
				loop: true,
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
				},
		  pagination: {
			el: '.swiper-pagination',
			clickable: true,
		  }
		});
	
	
	
	var swiper = new Swiper('.simple-slider', {
      slidesPerView: 1,
      spaceBetween: 0,
			centeredSlides: true,
			loop: true,
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
			}
    });
	
	
	
	// COUNTER
			 $(document).scroll(function(){
				$('.odometer').each( function () {
					var parent_section_postion = $(this).closest('section').position();
					var parent_section_top = parent_section_postion.top;
					if ($(document).scrollTop() > parent_section_top - 300) {
						if ($(this).data('status') == 'yes') {
							$(this).html( $(this).data('count') );
							$(this).data('status', 'no')
						}
					}
				});
			});
	
	



	// WOW ANIMATION 
			wow = new WOW(
			{
				animateClass: 'animated',
				offset:       50
			}
			);
			wow.init();
	
	
	 if ($(window).width() < 980) {
		 window.addEventListener('load', function () {
    $("body").addClass("page-loaded");
});
	 }
	
	
	// PRELOADER
$(window).load(function() {
  $("body").addClass("page-loaded");
});
	
	
	
})(jQuery);




