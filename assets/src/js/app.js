jQuery(document).ready(function ($) {

    /** Drop down menu making link active (check nav walker) **/

    $('.navbar-nav.dropdown').hover(function () {
        $(this).find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();
    }, function () {
        $(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp();
    });
    $('.navbar-nav .dropdown > a').click(function () {
        location.href = this.href;
    });
    // Bootstrap menu magic
    $(window).on('load resize', function() {
        if ($(window).width() < 1200) {
            $(".dropdown-toggle").attr('data-toggle', 'dropdown');
        } else {
            $(".dropdown-toggle").removeAttr('data-toggle dropdown');
        }
    });

    $(window).on('load resize', function() {
        if ($(window).width() > 991) {
           $('.footer-various, .footer-social').removeClass('col-sm-offset-2')
        } else {
            $('.footer-various, .footer-social').addClass('col-sm-offset-2')
        }
    });




   /*
    * Mmenu
    */

    $("#menu").mmenu({
        extensions 	: [ "position-bottom", "fullscreen", "theme-black", "listview-50", "fx-panels-slide-up", "fx-listitems-drop", "border-offset" ],
        navbar 		: {
            title 		: ""
        },
        "autoHeight": true
    });



    var api = $("#menu").data( "mmenu" );
    $('#menu').removeAttr('style');
    $('.mobile-menu-btn').click(function (e) {
         mmChange();
    });
    api.bind('close:finish', function () {
        $('.js-hamburger').removeClass('is-active');
        $('.extra-bar').show('fast', function() {  $(this).animate({ "top": '25px' }) } );

    });
    api.bind('open:finish', function () {
        $('.js-hamburger').addClass('is-active');
        $('.extra-bar').animate({"top": '100px'},200, function() {
            // Animation complete.
            $(this).hide()
        });

    });
    function mmChange() {

            $('.mobile-menu-btn').toggleClass('mobile-menu-close');


         if($('.mobile-menu-btn').hasClass('mobile-menu-close')) {
             $('.js-hamburger').addClass('is-active');

        }else {
                $('.js-hamburger').removeClass('is-active');
                api.close();
        }

    }





    /*
    * -/ init carousel for home page -/
  */


    var arrowLeft = '<i class="fas fa-arrow-left"></i>',
        arrowRight ='<i class="fas fa-arrow-right"></i>';

    $('.hero-slider').slick({
        arrows: false,
        infinite: false,
        autoplay: true,
        autoplaySpeed: 3000,
        fade: true,
        pauseOnHover:false,
        cssEase: 'linear'
    });





    /** Drop down menu making link active (check nav walker) **/
    $('.navbar .dropdown').hover(function() {
        $(this).find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();
    }, function() {
        $(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp();
    });
    $('.navbar .dropdown > a').click(function() {
        location.href = this.href;
    });







    // loading animation
    $(".animsition").animsition({
        inClass: 'fade-in',
        outClass: 'fade-out',
        inDuration: 1500,
        outDuration: 800,
        linkElement: '.animsition-link',
        // e.g. linkElement: 'a:not([target="_blank"]):not([href^="#"])'
        loading: true,
        loadingParentElement: 'body', //animsition wrapper element
        loadingClass: 'animsition-loading',
        loadingInner: '', // e.g '<img src="loading.svg" />'
        timeout: true,
        timeoutCountdown: 5000,
        onLoadEvent: true,
        browser: [ 'animation-duration', '-webkit-animation-duration'],
        // "browser" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
        // The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
        overlay : false,
        overlayClass : 'animsition-overlay-slide',
        overlayParentElement : 'body',
        transition: function(url){ window.location.href = url; }
    });






    // make images same height


    var maxHeightName = 0;
    $('.woocommerce-loop-product__title').each(function(){
        var currheightName = $(this).height();

        if (currheightName > maxHeightName) {
            maxHeightName = currheightName;
        }
        console.log($(this));
    });
    $('.woocommerce-loop-product__title').each(function(){
        $(this).css({'height' : maxHeightName});
    });


    $('.active').delay(500).queue(function(next){
        $(this).addClass('active-load');
        next();
    });

    $('.cat-name').addClass('cat-load ');

    $('option').on('click', function() {
       $(this).css({'color': 'black'});
    })


   /*
    * SELECT
    */









});

