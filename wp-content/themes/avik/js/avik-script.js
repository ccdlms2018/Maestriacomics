/**
 * avik-script.js
 *
 * author    Denis Franchi
 * package   Avik
 * version   1.3.2
 */

/* TABLE OF CONTENT

1 - Carousel brands
2 - Writing text Who we are
2/Bis - Writing text Services
3 - Menu
4 - Switch custom logo
5 - Ancor link scroll
6 - AOS Animate
7 - Slider
8 - Scrol To Top
9 - Preloader
10 - Carousel featured image
11 - Portfolio
12 - Popup image

*/

(function($){

/* ------------------------------------------------------------------------- *
##  1 Carousel Brands */
/* ------------------------------------------------------------------------- */

$(document).ready(function(){
    $('.avik-brands').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
        breakpoint: 768,
        settings: {
        slidesToShow: 4
        }
        }, {
        breakpoint: 520,
        settings: {
        slidesToShow: 3
        }
        }]
     });
 });


/* ------------------------------------------------------------------------- *
##  2 Writing text Who we are */
/* ------------------------------------------------------------------------- */

$(function(){

    $("#typed").typed({
        stringsElement: $('#typed-strings'),
        typeSpeed: 120,
        backDelay: 900,
        loop: true,
        contentType: 'html',
        loopCount: false,
        callback: function(){ foo(); },
        resetCallback: function() { newTyped(); }
});

        $(".reset").click(function(){
        $("#typed").typed('reset');
});

});

    function newTyped(){ /* A new typed object */ }

    function foo(){ console.log("Callback"); }


/* ------------------------------------------------------------------------- *
##  2/Bis Writing text Services */
/* ------------------------------------------------------------------------- */

    $(function(){

        $("#avikservices").typed({
            stringsElement: $('#avikservices-strings'),
            typeSpeed: 120,
            backDelay: 900,
            loop: true,
            contentType: 'html',
            loopCount: false,
            callback: function(){ foo(); },
            resetCallback: function() { newAvikservices(); }
    });

            $(".reset").click(function(){
            $("#avikservices").avikservices('reset');
    });

    });

        function newAvikservices(){ /* A new typed object */ }

        function foo(){ console.log("Callback"); }


/* ------------------------------------------------------------------------- *
##  3 Menu */
/* ------------------------------------------------------------------------- */

jQuery(window).scroll(function() {

    if (jQuery(document).scrollTop() >  720) {
     jQuery('.avik-nav-front-page ').removeClass('hide-menu');

    } else {
    jQuery('.avik-nav-front-page ').addClass('hide-menu');
}

});

$(function() {
    // Custom color menu active
    $('.navbar a').click(function() {
    $('.navbar a').removeClass('active');
    $(this).addClass('active');
});
});


/* ------------------------------------------------------------------------- *
##  4 Switch custom logo */
/* ------------------------------------------------------------------------- */


jQuery(window).scroll(function() {
    if (jQuery(document).scrollTop() > 720) {
    jQuery('.avik-custom-logo-body').removeClass('logo2');
    } else {
    jQuery('.avik-custom-logo-body').addClass('logo2 ');
}
});

jQuery(window).scroll(function() {
    if (jQuery(document).scrollTop() > 720) {
    jQuery('.avik-custom-logo-header').addClass('logo1');
    } else {
    jQuery('.avik-custom-logo-header').removeClass('logo1 ');
}
});

/* ------------------------------------------------------------------------- *
##  5 Ancor link scroll */
/* ------------------------------------------------------------------------- */

// Select all links with hashes
$('a[href*="#"]')
// Remove links that don't actually link to anything
.not('[href="#"]')
.not('[href="#0"]')
.click(function(event) {
    // On-page links
    if (
    location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
    &&
    location.hostname == this.hostname
) {
 // Figure out element to scroll to
 var target = $(this.hash);
    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
 // Does a scroll target exist?
 if (target.length) {
 // Only prevent default if animation is actually gonna happen
    event.preventDefault();
    $('html, body').animate({
    scrollTop: target.offset().top
    }, 1000, function() {
 // Callback after animation
 // Must change focus!
    var $target = $(target);
    $target.focus();
    if ($target.is(":focus")) { // Checking if the target was focused
    return false;
    } else {
    $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
    $target.focus(); // Set focus again
};
});
}
}
});

/* ------------------------------------------------------------------------- *
##  6 AOS Animate */
/* ------------------------------------------------------------------------- */

AOS.init({
    duration: 1000
  });


/* ------------------------------------------------------------------------- *
##  7 Slider */
/* ------------------------------------------------------------------------- */

//Copyright (c) 2018 by Manu K (https://codepen.io/manukn/pen/geoaxM)

//Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

//The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
var $window = $(window);
var $body = $('body');
var Slideshow = function () {
    function Slideshow() {
        var _this = this;
        var userOptions = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};
        _classCallCheck(this, Slideshow);
        var defaultOptions = {
            $el: $('.slideshow'),
            showArrows: false,
            showPagination: true,
            duration: 10000,
            autoplay: true
        };
        var options = Object.assign({}, defaultOptions, userOptions);
        this.$el = options.$el;
        this.maxSlide = this.$el.find($('.js-slider-home-slide')).length;
        this.showArrows = this.maxSlide > 1 ? options.showArrows : false;
        this.showPagination = options.showPagination;
        this.currentSlide = 1;
        this.isAnimating = false;
        this.animationDuration = 1200;
        this.autoplaySpeed = options.duration;
        this.interval;
        this.$controls = this.$el.find('.js-slider-home-button');
        this.autoplay = this.maxSlide > 1 ? options.autoplay : false;
        this.$el.on('click', '.js-slider-home-next', function (event) {
            return _this.nextSlide();
        });
        this.$el.on('click', '.js-slider-home-prev', function (event) {
            return _this.prevSlide();
        });
        this.$el.on('click', '.js-pagination-item', function (event) {
            if (!_this.isAnimating) {
                _this.preventClick();
                _this.goToSlide(event.target.dataset.slide);
            }
        });
        this.init();
    }
    _createClass(Slideshow, [{
        key: 'init',
        value: function init() {
            this.goToSlide(1);
            if (this.autoplay) {
                this.startAutoplay();
            }
        }
    }, {
        key: 'preventClick',
        value: function preventClick() {
            var _this2 = this;

            this.isAnimating = true;
            this.$controls.prop('disabled', true);
            clearInterval(this.interval);

            setTimeout(function () {
                _this2.isAnimating = false;
                _this2.$controls.prop('disabled', false);
                if (_this2.autoplay) {
                    _this2.startAutoplay();
                }
            }, this.animationDuration);
        }
    }, {
        key: 'goToSlide',
        value: function goToSlide(index) {
            this.currentSlide = parseInt(index);

            if (this.currentSlide > this.maxSlide) {
                this.currentSlide = 1;
            }

            if (this.currentSlide === 0) {
                this.currentSlide = this.maxSlide;
            }

            var newCurrent = this.$el.find('.js-slider-home-slide[data-slide="' + this.currentSlide + '"]');
            var newPrev = this.currentSlide === 1 ? this.$el.find('.js-slider-home-slide').last() : newCurrent.prev('.js-slider-home-slide');
            var newNext = this.currentSlide === this.maxSlide ? this.$el.find('.js-slider-home-slide').first() : newCurrent.next('.js-slider-home-slide');

            this.$el.find('.js-slider-home-slide').removeClass('is-prev is-next is-current');
            this.$el.find('.js-pagination-item').removeClass('is-current');

            if (this.maxSlide > 1) {
                newPrev.addClass('is-prev');
                newNext.addClass('is-next');
            }

            newCurrent.addClass('is-current');
            this.$el.find('.js-pagination-item[data-slide="' + this.currentSlide + '"]').addClass('is-current');
        }
    }, {
        key: 'nextSlide',
        value: function nextSlide() {
            this.preventClick();
            this.goToSlide(this.currentSlide + 1);
        }
    }, {
        key: 'prevSlide',
        value: function prevSlide() {
            this.preventClick();
            this.goToSlide(this.currentSlide - 1);
        }
    }, {
        key: 'startAutoplay',
        value: function startAutoplay() {
            var _this3 = this;

            this.interval = setInterval(function () {
                if (!_this3.isAnimating) {
                    _this3.nextSlide();
                }
            }, this.autoplaySpeed);
        }
    }, {
        key: 'avikdestro',
        value: function avikdestro() {
            this.$el.off();
        }
    }]);
    return Slideshow;
}();
(function () {
    var loaded = false;
    var maxLoad = 3000;

    function load() {
        var options = {
            showPagination: true
        };

        var slideShow = new Slideshow(options);
    }

    function addLoadClass() {
        $body.addClass('is-loaded');

        setTimeout(function () {
            $body.addClass('is-animated');
        }, 600);
    }

    $window.on('load', function () {
        if (!loaded) {
            loaded = true;
            load();
        }
    });

    setTimeout(function () {
        if (!loaded) {
            loaded = true;
            load();
        }
    }, maxLoad);
    addLoadClass();
})();

/* ------------------------------------------------------------------------- *
##  8 Scrol to top */
/* ------------------------------------------------------------------------- */


jQuery(document).ready(function() {
    var btn = $('#avik-scrol-to-top');
  $(window).scroll(function() {
     if ($(window).scrollTop() > 300) {
        btn.addClass('show');
   } else {
        btn.removeClass('show');
  }
  });
        btn.on('click', function(e) {
        e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
  });
  });


/* ------------------------------------------------------------------------- *
##  9 Preloader */
/* ------------------------------------------------------------------------- */

var loader = $(".loader");
var wHeight = $(window).height();
var wWidth = $(window).width();
var o = 0;

    loader.css({
    top: wHeight / 2 - 2.5,
    left: wWidth / 2 - 200
})
do {
    loader.animate({
    width: o
}, 10)
    o += 3;
} while (o <= 400)
     if (o === 402) {
    loader.animate({
    left: 0,
    width: '100%'
})
    loader.animate({
    top: '0',
    height: '100vh'
})
}
    setTimeout(function() {
    $(".avik-loader").fadeOut('fast');
    (loader).fadeOut('fast');
}, 3500);

/* ------------------------------------------------------------------------- *
##  10 Carousel featured image */
/* ------------------------------------------------------------------------- */

jQuery(document).ready(function() {
jQuery("#avik-slider").owlCarousel({
       autoPlay: 3000, //Set AutoPlay to 3 seconds
       items : 4,
       itemsDesktop : [1199,3],
       itemsDesktopSmall : [979,3]
});
});

}(jQuery));


/* ------------------------------------------------------------------------- *
##  11 Portfolio */
/* ------------------------------------------------------------------------- */

avikfilterSelection("all")
function avikfilterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("column");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
  avikRemoveClass(x[i], "show");
  if (x[i].className.indexOf(c) > -1) avikAddClass(x[i], "show");
  }
}

function avikAddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
  if (arr1.indexOf(arr2[i]) == -1) {
  element.className += " " + arr2[i];
    }
  }
}

function avikRemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
  while (arr1.indexOf(arr2[i]) > -1) {
  arr1.splice(arr1.indexOf(arr2[i]), 1);
    }
  }
  element.className = arr1.join(" ");
}

/* ------------------------------------------------------------------------- *
##  12  Popup image */
/* ------------------------------------------------------------------------- */


jQuery(document).ready(function($) {

    jQuery('.popup').live('click', function(){

    newwindow=window.open($(this).attr('href'),'','height=450,width=700');

    if (window.focus) {newwindow.focus()}

    return false;

});

});
