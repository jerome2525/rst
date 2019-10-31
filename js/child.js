jQuery(document).ready(function($){
      
   	$('.slick-activate .fl-post-feed').slick({
   		autoplay: true,
		autoplaySpeed: 2000,
		slidesToShow: 4,
		slidesToScroll: 1,
		prevArrow:"<button type='button' class='btn-arrows arrow-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
		nextArrow:"<button type='button' class='btn-arrows arrow-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
	  	responsive: [
		  	{
		      breakpoint: 1600,
		      settings: {
		        arrows: true,
		        slidesToShow: 3
		      }
		    },
		    {
		      breakpoint: 1280,
		      settings: {
		        arrows: true,
		        slidesToShow: 2
		      }
		    },
		    {
		      breakpoint: 768,
		      settings: {
		        arrows: true,
		        slidesToShow: 2
		      }
		    },
		    {
		      breakpoint: 480,
		      settings: {
		        arrows: true,
		        slidesToShow: 1
		      }
		    }
	  	]
	}).on('afterChange', function(event, slick, currentSlide, nextSlide){
        $('.slick-slide .fl-post-feed-post').matchHeight();
    });


    $('.same-height').matchHeight();
 	$('.slick-slide .fl-post-feed-post').matchHeight();
 	$('.grid-activate .fl-post-feed').addClass('grids');
 	if ( typeof window.FLBuilderConfig === 'undefined' || window.FLBuilderConfig === null ) {
		$('header.fl-builder-content').addClass('fl-sticky-on-mobile')
	}

	if ( getParameterByName('zip_search').length > 0 ) { 
			$('html, body').animate({
		        scrollTop: $('#wpsl-wrap').offset().top
		    }, 2000);
			setTimeout(
			function() {
				$('#wpsl-search-btn').trigger('click');
			}, 3000);	
	} 

  
});

function getParameterByName( name ) {
    name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
    var regexS = "[\\?&]" + name + "=([^&#]*)";
    var regex = new RegExp(regexS);
    var results = regex.exec(window.location.search);
    if(results == null)
    return "";
    else
    return decodeURIComponent(results[1].replace(/\+/g, " "));
} 
