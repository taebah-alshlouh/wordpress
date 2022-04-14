jQuery(document).ready(function($){
"use scrict";
    
    var rtlval;
    if( $('body').hasClass("rtl") ){
       rtlval = true;
    } else {
       rtlval = false;
    }

    // Preloader
    $(window).load(function(){
        setTimeout(function () {
            $('.ta-preloader').fadeOut();
        }, 300);
    });
    
    // Menu
    $('#primary-menu .menu-item-has-children > a, #primary-menu .page_item_has_children > a').after('<button class="child-menu-toggle"><svg viewBox="0 0 192 512"><path fill="currentColor" d="M166.9 264.5l-117.8 116c-4.7 4.7-12.3 4.7-17 0l-7.1-7.1c-4.7-4.7-4.7-12.3 0-17L127.3 256 25.1 155.6c-4.7-4.7-4.7-12.3 0-17l7.1-7.1c4.7-4.7 12.3-4.7 17 0l117.8 116c4.6 4.7 4.6 12.3-.1 17z" class=""></path></svg></button>');

    $('.menu-item-has-children .child-menu-toggle, .page_item_has_children .child-menu-toggle').click(function(){
        $(this).toggleClass('active');
        $(this).siblings('.sub-menu').slideToggle();
        $(this).siblings('.children').slideToggle();
    });
    
    // Toggle Menu

    $('.menu-toggle').click(function(){

        $('header#masthead').addClass('ta-active-menu');
        $('.ta-main-menu-wraper').css({left:0});

    });

    $('button#ta-close-menu').click(function(){
        $('header#masthead').removeClass('ta-active-menu');
        $('.ta-main-menu-wraper').css({left:-300});
        $('.menu-toggle').focus();
    });

    // Toggle Search
    $('.ta-search-toggle, a#ta-search-close ').click(function(){

        $('.ta-header-search').toggleClass('ta-search-show');
        $('.ta-header-search-main').toggleClass('show');
        $('.ta-search-toggle').focus();

    });

    // Toggle offcanvas

    $('.ta-offcanvas-toggle').click(function(){

        $('.ta-offcanvas-container').toggleClass('ta-offcanvas-active');

    });

    //Sickey Sidebar
    $('#secondary, #primary').theiaStickySidebar({
        additionalMarginTop: 30
    });
    
    $('.archive-masonry').imagesLoaded(function () {

        // Masonry
        $('.archive-masonry').masonry({
            itemSelector: '.ta-match-height',
        });

    });

    $('.block-post-widget').imagesLoaded(function () {

        $('.block-post-widget').masonry({
            itemSelector: '.block-post-widget-item',
        });

    });

    $('.ta-match-height').imagesLoaded(function () {

        // Match Height
        $('.ta-match-height').matchHeight();

    });

    // Show and hide scroll to top button
    $(window).scroll(function(){

        if($(window).scrollTop() > 300){

            $('#ta-go-top').removeClass('ta-off');

        }else{

            $('#ta-go-top').addClass('ta-off');

        }

    });

    // Scroll To Top
    $('#ta-go-top').click(function(){

        $('html,body').animate({scrollTop:0},800);

    });


    // Banner 1 Slider
    $('.action-banner-1').slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          dots: true,
          rtl: rtlval,
    });

    // Banner 1 Nav
    $('.ta-banner-nav-loop').click(function(){

        var goTo = $(this).closest('.ta-banner-nav-loop').attr('index-data');
        $('.action-banner-1').slick('slickGoTo', goTo);

    });

    // Banner 2 Slider
    $('.action-banner-2').slick({
        centerPadding: '150px',
        slidesToShow: 3,
        arrows: true,
        dots: false,
        rtl: rtlval,
        nextArrow: '<span class="ta-next-arrow"><svg viewBox="0 0 256 512" class="svg-inline--fa fa-chevron-right fa-w-8 fa-3x"><path fill="currentColor" d="M17.525 36.465l-7.071 7.07c-4.686 4.686-4.686 12.284 0 16.971L205.947 256 10.454 451.494c-4.686 4.686-4.686 12.284 0 16.971l7.071 7.07c4.686 4.686 12.284 4.686 16.97 0l211.051-211.05c4.686-4.686 4.686-12.284 0-16.971L34.495 36.465c-4.686-4.687-12.284-4.687-16.97 0z" class=""></path></svg></span>',
        prevArrow: '<span class="ta-prev-arrow"><svg viewBox="0 0 256 512" class="svg-inline--fa fa-chevron-left fa-w-8 fa-3x"><path fill="currentColor" d="M238.475 475.535l7.071-7.07c4.686-4.686 4.686-12.284 0-16.971L50.053 256 245.546 60.506c4.686-4.686 4.686-12.284 0-16.971l-7.071-7.07c-4.686-4.686-12.284-4.686-16.97 0L10.454 247.515c-4.686 4.686-4.686 12.284 0 16.971l211.051 211.05c4.686 4.686 12.284 4.686 16.97-.001z" class=""></path></svg></span>',
        responsive: [
            {
                breakpoint: 900,
                settings: {
                    centerMode: true,
                    centerPadding: '80px',
                    slidesToShow: 1
                }
            },
        ]
    });

    // Sidebar Gallery Slide
    $('ul.wp-block-gallery.columns-1, .wp-block-gallery.columns-1 .blocks-gallery-grid, .gallery-columns-1').slick({
        slidesToShow: 1,
        arrows: true,
        dots: false,
        rtl: rtlval,
        nextArrow: '<span class="ta-next-arrow"><svg viewBox="0 0 256 512" class="svg-inline--fa fa-chevron-right fa-w-8 fa-3x"><path fill="currentColor" d="M17.525 36.465l-7.071 7.07c-4.686 4.686-4.686 12.284 0 16.971L205.947 256 10.454 451.494c-4.686 4.686-4.686 12.284 0 16.971l7.071 7.07c4.686 4.686 12.284 4.686 16.97 0l211.051-211.05c4.686-4.686 4.686-12.284 0-16.971L34.495 36.465c-4.686-4.687-12.284-4.687-16.97 0z" class=""></path></svg></span>',
        prevArrow: '<span class="ta-prev-arrow"><svg viewBox="0 0 256 512" class="svg-inline--fa fa-chevron-left fa-w-8 fa-3x"><path fill="currentColor" d="M238.475 475.535l7.071-7.07c4.686-4.686 4.686-12.284 0-16.971L50.053 256 245.546 60.506c4.686-4.686 4.686-12.284 0-16.971l-7.071-7.07c-4.686-4.686-12.284-4.686-16.97 0L10.454 247.515c-4.686 4.686-4.686 12.284 0 16.971l211.051 211.05c4.686 4.686 12.284 4.686 16.97-.001z" class=""></path></svg></span>',
    });

    
    $('.focus-on-last-menu').focus(function(){
        var winsize = $(window).width();
        if( winsize < 1024 && $('.site-header').hasClass('ta-active-menu') ){
            $('#primary-menu li:last-child a').focus();
        }
    });

});

// Skip link and keyboarnavigation

// Search Start

const searchInput = document.querySelector('.ta-search-toggle');
const searchToggleClass1 = document.getElementsByClassName("ta-header-search");
const searchToggleClass2 = document.getElementsByClassName("ta-header-search-main");
const searchToggleClass3 = document.getElementById('ta-header-search');
const searchToggleClass4 = document.getElementsByClassName('ta-search-show');
const searchToggleClass5 = document.getElementById('ta-search-close');
const searchToggleClass6 = document.querySelectorAll('.focus-on-input');
const searchToggleClass7 = document.querySelectorAll('.focus-on-close');
const searchToggleClass8 = document.querySelector('.menu-toggle');
const searchToggleClass9 = document.getElementById('ta-close-menu');
const searchToggleClass10 = document.getElementsByClassName('site-header');
const searchToggleClass11 = document.querySelectorAll('.ta-main-menu-wraper');
const searchToggleClass13 = document.querySelectorAll('.focus-on-close-menu')
const searchToggleClass14 = document.querySelector(".ta-offcanvas-toggle");
const searchToggleClass15 = document.querySelector(".ta-offcanvas-toggle-close");
const searchToggleClass16 = document.getElementsByClassName('ta-offcanvas-container');
const searchToggleClass17 = document.querySelectorAll('.focus-on-offcanvas-close');
const searchToggleClass18 = document.querySelectorAll('.focus-on-last-widget');

if (searchInput !== null) {
    
    searchInput.addEventListener('click', (event) => {
        setTimeout(function() {
            document.querySelectorAll('.ta-header-search input.search-field')[0].focus();
        }, 100);
    });

}

if (searchToggleClass5.length > 0) {
    searchToggleClass5.addEventListener('click', (event) => {
        setTimeout(function() {
            document.querySelectorAll('.ta-search-toggle')[0].focus();
        }, 100);
    });

}

if (searchToggleClass14 !== null) {

    searchToggleClass14.addEventListener('click', (event) => {
        setTimeout(function() {
            document.querySelectorAll('.ta-offcanvas-toggle-close')[0].focus();
        }, 100);
    });

}

if (searchToggleClass15 !== null) {
    
    searchToggleClass15.addEventListener('click', (event) => {
        setTimeout(function() {
            document.querySelectorAll('.ta-offcanvas-toggle')[0].focus();
        }, 100);
});

}

if (searchToggleClass8 !== null ) {
    
    searchToggleClass8.addEventListener('click', (event) => {
        setTimeout(function() {
            searchToggleClass9.focus();
        }, 100);
    });

}

if (searchToggleClass13.length > 0) {

    searchToggleClass13[0].addEventListener('focus', (event) => {
        searchToggleClass9.focus();
});

}


document.onkeydown = function(evt) {
    
    evt = evt || window.event;
    
    if (evt.keyCode == 27) {

        if( searchToggleClass1.length > 0 ){
            
            if(  searchToggleClass3.classList.contains('ta-search-show') ){

                searchToggleClass1[0].classList.toggle("ta-search-show");
                searchToggleClass2[0].classList.toggle("show");

                setTimeout(function() {

                    document.querySelectorAll('.ta-search-toggle')[0].focus();

                }, 100);
                
            }

            

        }

        if( searchToggleClass10.length > 0 ){

            if(  searchToggleClass10[0].classList.contains('ta-active-menu') ){
                searchToggleClass10[0].classList.toggle("ta-active-menu");
                searchToggleClass11[0].style.left = "-300px";
                setTimeout(function() {
                    searchToggleClass8.focus();
                }, 100);
            }
        }

        if( searchToggleClass16.length > 0 ){

            if(  searchToggleClass16[0].classList.contains('ta-offcanvas-active') ){
                searchToggleClass16[0].classList.toggle("ta-offcanvas-active");
                setTimeout(function() {
                    setTimeout(function() {
                        document.querySelectorAll('.ta-offcanvas-toggle')[0].focus();
                    }, 100);
                }, 100);
            }
        }

    }

    if (searchToggleClass7.length > 0) {

        searchToggleClass7[0].addEventListener('focus', (event) => {
            searchToggleClass5.focus();
        });
    
    }

    if (searchToggleClass6.length > 0) {

        searchToggleClass6[0].addEventListener('focus', (event) => {
            document.querySelectorAll('.ta-header-search input.search-field')[0].focus();
        });

    }

    if (searchToggleClass17.length > 0) {

        searchToggleClass17[0].addEventListener('focus', (event) => {
            document.querySelectorAll('.ta-offcanvas-container button.ta-offcanvas-toggle')[0].focus();
        });

    }

    if (searchToggleClass18.length > 0) {

        searchToggleClass18[0].addEventListener('focus', (event) => {
            document.querySelectorAll('.focus-on-last-widget-1')[0].focus();
        });

    }

};
// Responsive Menu End