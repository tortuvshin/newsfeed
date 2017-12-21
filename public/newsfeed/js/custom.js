/**
 *   1- Main menu
 *   2- Mobile menu
 *   3- Owl Carousel
 *   4- FlexSlider
 *   5- EI Slider
 *   6- Video wrapper
 *	 7- Validate form
 *   8- Google Map
 *   9- Search Box
 *   10- Flickr
 *   11- Back To Top
 *   12- Accordion
 *   13- Toggle Boxes
 *   14- Sticky Menu
 **/
 
"use strict";
var punica_variable = {
    "contact": {
        "address": "Lorem ipsum dolor sit amet, consectetur adipiscing elit",
        "marker": "/url image"
    },
    "i18n": {
        "VIEW": "View",
        "VIEWS": "Views",
        "validate": {
            "form": {
                "SUBMIT": "Submit",
                "SENDING": "Sending..."
            },
            "name": {
                "REQUIRED": "Please enter your name",
                "MINLENGTH": "At least {0} characters required"
            },
            "email": {
                "REQUIRED": "Please enter your email",
                "EMAIL": "Please enter a valid email"
            },
            "url": {
                "REQUIRED": "Please enter your url",
                "URL": "Please enter a valid url"
            },
            "message": {
                "REQUIRED": "Please enter a message",
                "MINLENGTH": "At least {0} characters required"
            }
        }
    }
};
var map;

/* =========================================================
1. Main Menu
============================================================ */

Modernizr.load([
  {
    load: 'newsfeed/js/superfish.js',
    complete: function () {

        //Main menu
        $('#main-menu').superfish({
            delay: 400,
            speed: 'fast',
            cssArrows: false
        });

    }
  }
]);


/* =========================================================
2. Mobile Menu
============================================================ */
Modernizr.load([
  {
    load: 'newsfeed/js/jquery.navgoco.js',
    complete: function () {

        $('#mobile-menu').navgoco({accordion: true});
        $( "#main-nav i" ).click(function(){
            $( "#mobile-menu" ).slideToggle( "slow" );
        });


        $('#secondary-mobile-menu').navgoco({accordion: true});
        $( "#secondary-nav .secondary-mobile-label" ).click(function(){
            $( "#secondary-mobile-menu" ).slideToggle( "slow" );
        });
    }
  }
]);


/* =========================================================
3. Owl Carousel
============================================================ */
if ($('.punica-fullwidth-carousel').length > 0) {

    Modernizr.load([
      {
        load: 'newsfeed/js/owl.carousel.js',
        complete: function () {
            $('.punica-fullwidth-carousel').owlCarousel({
                singleItem : true,
                stopOnHover: true,
                lazyLoad : true,
                navigation : false,
                pagination: false,
                navigationText : false,
                autoPlay: true
            });
        }
      }
    ]);
};

if ($('.punica-hotnews-carousel').length > 0) {

    Modernizr.load([
      {
        load: 'newsfeed/js/owl.carousel.js',
        complete: function () {
            $('.punica-hotnews-carousel').owlCarousel({
                items : 4,
                itemsDesktop : [979,3],
                itemsDesktopSmall : [799,2],
                itemsTablet : [639,1],
                lazyLoad : true,
                navigation : true,
                pagination: false,
                navigationText : false,
                addClassActive: true,
                afterAction: function(){
                    $(".first-item-0").removeClass("first-item-0");
                    $(".punica-hotnews-carousel").find(".active").eq(0).addClass("first-item-0");
                }
            });
        }
      }
    ]);
};

if ($('.punica-daily-carousel').length > 0) {

    Modernizr.load([
      {
        load: 'newsfeed/js/owl.carousel.js',
        complete: function () {
            $('.punica-daily-carousel').owlCarousel({
                singleItem : true,
                autoHeight: true,
                lazyLoad : true,
                navigation : true,
                pagination: false,
                navigationText : false
            });
        }
      }
    ]);
};

if ($('.punica-carousel-1').length > 0) {

    Modernizr.load([
      {
        load: 'newsfeed/js/owl.carousel.js',
        complete: function () {
            $('.punica-carousel-1').owlCarousel({
                singleItem : true,
                lazyLoad : true,
                navigation : true,
                pagination: false,
                navigationText : false
            });
        }
      }
    ]);
};

if ($('.punica-carousel-2').length > 0) {

    Modernizr.load([
      {
        load: 'newsfeed/js/owl.carousel.js',
        complete: function () {
            $('.punica-carousel-2').owlCarousel({
                items : 3,
                itemsDesktop : [1024,3],
                itemsDesktopSmall : [979,3],
                itemsTablet : [799,3],
                lazyLoad : true,
                navigation : true,
                pagination: false,
                navigationText : false,
                addClassActive: true,
                afterAction: function(){
                    $(".center-item").removeClass("center-item");
                    $(".punica-carousel-2").find(".active").eq(1).addClass("center-item");
                }
            });
        }
      }
    ]);
};

if ($('.punica-single-post-carousel').length > 0) {

    Modernizr.load([
      {
        load: 'newsfeed/js/owl.carousel.js',
        complete: function () {
            $('.punica-single-post-carousel').owlCarousel({
                singleItem : true,
                stopOnHover: true,
                lazyLoad : true,
                navigation : true,
                pagination: false,
                navigationText : false,
                autoPlay: true
            });
        }
      }
    ]);
};


/* =========================================================
4. Flex slider
============================================================ */
if ($('.punica-flex-1-widget').length > 0) {

    Modernizr.load([
      {
        load: 'newsfeed/js/$.flexslider-min.js',
        complete: function () {
            $('.punica-flex-carousel-1').flexslider({
                animation: "slide",
                controlNav: false,
                directionNav: false,
                animationLoop: false,
                slideshow: false,
                itemWidth: 90,
                itemMargin: 0,
                asNavFor: '.punica-flexslider-1'
            });

            $('.punica-flexslider-1').flexslider({
                animation: "slide",
                controlNav: false,
                directionNav: false,
                animationLoop: false,
                slideshow: false,
                prevText: "",
                nextText: "",
                sync: ".punica-flex-carousel-1",
                start: function(slider){
                  $('body').removeClass('loading');
                }
            });
        }
      }
    ]);
};

if ($('.punica-flex-2-widget').length > 0) {

    Modernizr.load([
      {
        load: 'newsfeed/js/$.flexslider-min.js',
        complete: function () {
            $('.punica-flexslider-2').flexslider({
                animation: "fade",
                controlNav: true,
                directionNav: false,
                animationLoop: false,
                slideshow: true,
                prevText: "",
                nextText: "",
                after: function(slider) {
                    $('.punica-flexslider-2 .flex-caption').animate({bottom:0}, 400)
                },
                before: function(slider) {
                    $('.punica-flexslider-2 .flex-caption').animate({ bottom:-105}, 400)
                }
            });
        }
      }
    ]);
};

/* =========================================================
5. EI slider
============================================================ */
if ($('.ei-slider').length > 0) {

    Modernizr.load([
        {
        load: 'newsfeed/js/jquery.eislideshow.js',
            complete: function () {
                $('#ei-slider').eislideshow({
                    animation           : 'center',
                    autoplay            : true,
                    slideshow_interval  : 3000,
                    titlesFactor        : 0
                });
            }
        }
    ]);
};

/* =========================================================
6. Video wrapper
============================================================ */
if ($(".video-wrapper").length > 0) {
    Modernizr.load([{
        load: 'newsfeed/js/fitvids.js',
        complete: function () {
            $(".video-wrapper").fitVids();
        }
    }]);
};


/* =========================================================
7. Validate form
============================================================ */

if ($('.comment-form,.contact-form').length > 0) {
    Modernizr.load([{
        load: ['news/feed/js/jquery.form.js', 'newsfeed/js/jquery.validate.js'],
        complete: function () {
            $('.comment-form,.contact-form').validate({
                // Add requirements to each of the fields
                rules: {
                    name: {
                        required: true,
                        minlength: 2
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    message: {
                        required: true,
                        minlength: 10
                    }
                },
                // Specify what error messages to display
                // when the user does something horrid
                messages: {
                    name: {
                        required: punica_variable.i18n.validate.name.REQUIRED,
                        minlength: $.format(punica_variable.i18n.validate.name.MINLENGTH)
                    },
                    email: {
                        required: punica_variable.i18n.validate.email.REQUIRED,
                        email: punica_variable.i18n.validate.email.EMAIL
                    },
                    message: {
                        required: punica_variable.i18n.validate.message.REQUIRED,
                        minlength: $.format(punica_variable.i18n.validate.message.MINLENGTH)
                    }
                },
                // Use Ajax to send everything to processForm.php
                submitHandler: function (form) {
                    $(".comment-form .input-submit,.contact-form .input-submit").attr("value", punica_variable.i18n.validate.form.SENDING);
                    $(form).ajaxSubmit({
                        success: function (responseText, statusText, xhr, $form) {
                            $("#response").html(responseText).hide().slideDown("fast");
                            $(".comment-form .input-submit,.contact-form .input-submit").attr("value", punica_variable.i18n.validate.form.SUBMIT);
                        }
                    });
                    return false;
                }
            });
        }
    }]);
}



/* =========================================================
8. Google Map
============================================================ */
var map;

if ($('.punica-map').length > 0) {
        var id_map = $('.punica-map').attr('id');
        var lat = parseFloat($('.punica-map').attr('data-latitude'));
        var lng = parseFloat($('.punica-map').attr('data-longitude'));
        var place = $('.punica-map').attr('data-place');

    map = new GMaps({
        el: '#'+id_map,
        lat: lat,
        lng: lng,
        zoomControl : true,
        zoomControlOpt: {
            style : 'SMALL',
            position: 'TOP_LEFT'
        },
        panControl : false,
        streetViewControl : false,
        mapTypeControl: false,
        overviewMapControl: false
    });
    map.addMarker({
        lat: lat,
        lng: lng,
        title: place
    });
};


/* =========================================================
9. Search box
============================================================ */
if ($('#sb-search').length > 0) {
    Modernizr.load([{
        load: ['newsfeed/js/uisearch.js', 'newsfeed/js/classie.js'],
        complete: function() {
            new UISearch(document.getElementById('sb-search'));
        }
    }]);
};

/* =========================================================
10. Flickr
============================================================ */
if ($('.punica-flickr-widget').length > 0) {

    Modernizr.load([{
        load: ['newsfeed/js/jflickrfeed.js', 'newsfeed/js/imgliquid.js'],
        complete: function () {
            $('.punica-flickr-widget ul').each(function () {
                $(this).jflickrfeed({
                    limit: 9,
                    qstrings: {
                        id: $(this).find('.flickr-wrap').attr('data-user')
                    },
                    itemTemplate: '<li class="flickr-badge-image">' + '<a target="blank" href="{{link}}" title="{{title}}" class="imgLiquid">' + '<img src="{{image_m}}" alt="{{title}}"  />' + '</a>' + '</li>'
                }, 
                function (data) {
                    $('.punica-flickr-widget .imgLiquid').imgLiquid();
                });
            });
        }
    }]);
}



$(document).ready(function(){

    /* =========================================================
    11. Back to top
    ============================================================ */

    // hide #back-top first
    $("#back-top").hide();

    // fade in #back-top
    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 200) {
                $('#back-top').fadeIn();
            } else {
                $('#back-top').fadeOut();
            }
        });

        // scroll body to 0px on click
        $('#back-top a').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    });

    /* =========================================================
    12. Accordion
    ========================================================= */
    var acc_wrapper=$('.acc-wrapper');
    if (acc_wrapper.length >0) 
    {
        
        $('.acc-wrapper .accordion-container').hide();
        $.each(acc_wrapper, function(index, item){
            $(this).find($('.accordion-title')).first().addClass('active').next().show();
            
        });
        
        $('.accordion-title').on('click', function(e) {
            punica_accordion_click($(this));
            e.preventDefault();
        });
        
        var titles = $('.accordion-title');
        
        $.each(titles,function(){
            punica_accordion_click($(this));
        });
    } 

    function punica_accordion_click (obj) {
        if( obj.next().is(':hidden') ) {
            obj.parent().find($('.active')).removeClass('active').next().slideUp(300);
            obj.toggleClass('active').next().slideDown(300);
                                
        }
    $('.accordion-title span').removeClass('fa-chevron-up').addClass('fa-chevron-down');
        if (obj.hasClass('active')) {
            obj.find('span').removeClass('fa-chevron-down');
            obj.find('span').addClass('fa-chevron-up');             
        }
    }


    /* =========================================================
    13. Toggle Boxes
    ============================================================ */
         
    $('.toggle-view li').click(function (event) {
      
        var text = $(this).children('.punica-panel');

        if (text.is(':hidden')) {
            $(this).addClass('active');
            text.slideDown('300');
            $(this).children('span').removeClass('fa-chevron-down');
            $(this).children('span').addClass('fa-chevron-up');                 
        } else {
            $(this).removeClass('active');
            text.slideUp('300');
            $(this).children('span').removeClass('fa-chevron-up');
            $(this).children('span').addClass('fa-chevron-down');               
        }
       
    });

});

/* =========================================================
14. Sticky menu
============================================================ */ 

Modernizr.load([{
	load: ['newsfeed/js/waypoints.js', 'newsfeed/js/waypoints-sticky.js'],
	complete: function () {
		$('#header-middle').waypoint('sticky');
	}
}]);