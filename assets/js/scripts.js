jQuery(document).foundation();
/*
These functions make sure WordPress
and Foundation play nice together.
*/
jQuery(document).ready(function() {
  jQuery("li.kurv").removeClass("opens-right").addClass("opens-left");
/*
jQuery(function () {
    jQuery("div.bestSelling").slice(0, 8).show();
    jQuery("#loadMore").on('click', function (e) {
        e.preventDefault();
        //var total = jQuery( "div.bestSelling" ).length;

        jQuery("div.bestSelling:hidden").slice(0, 4).slideDown();
        if (jQuery("div.bestSelling:hidden").length == 0) {
            jQuery("#loadMore").fadeOut('fast');
        }
        jQuery('html,body').animate({
            scrollTop: jQuery(this).offset().top
        }, 1500);
    });
});*/

jQuery('a[href=#top]').click(function () {
    jQuery('body,html').animate({
        scrollTop: 0
    }, 600);
    return false;
});

jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 50) {
        jQuery('.totop a').fadeIn();
    } else {
        jQuery('.totop a').fadeOut();
    }
});
jQuery('.home-slider, .mini-slider').slick({
  autoplay: true
});
jQuery('#homeProductGrid, #productCategoryGrid, #brandGrid').slick({
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});
jQuery('#bestSellingProducts').slick({
  autoplay: true,
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

  // Remove empty P tags created by WP inside of Accordion and Orbit
  jQuery('.accordion p:empty, .orbit p:empty').remove();
  // Makes sure last grid item floats left
  jQuery('.archive-grid .columns').last().addClass( 'end' );
  // Adds Flex Video to YouTube and Vimeo Embeds
  jQuery('iframe[src*="youtube.com"], iframe[src*="vimeo.com"]').each(function() {

    if ( jQuery(this).innerWidth() / jQuery(this).innerHeight() > 1.5 ) {
      jQuery(this).wrap("<div class='widescreen flex-video'/>");
    } else {
      jQuery(this).wrap("<div class='flex-video'/>");
    }
  });
  jQuery("div#homeProductGrid, div#bestProductGrid, div#productCategoryGrid, div#brandGrid, div#bestSellingProducts").addClass("tricky");
  (function($) {
    window.fnames = new Array();
    window.ftypes = new Array();
    fnames[0]='EMAIL'; ftypes[0]='email'; fnames[1]='FNAME'; ftypes[1]='text'; fnames[2]='LNAME'; ftypes[2]='text';
  }(jQuery));
  
  var $mcj = jQuery.noConflict(true);
  $mcj.extend($mcj.validator.messages, {
    required: "Dette felt er påkrævet.",
    remote: "Ret venligst dette felt.",
    email: "Indtast venligst en gyldig e-mail-adresse.",
  }); 

  if ( jQuery("input#shipping_method_0_smartsend_gls_pickup").length ) {
   jQuery("input#shipping_method_0_smartsend_gls_pickup").prop("checked", true);
  }
  
});