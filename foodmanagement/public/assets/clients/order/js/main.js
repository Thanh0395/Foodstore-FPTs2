(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();


    // Initiate the wowjs
    new WOW().init();


    // Fixed Navbar
    $(window).scroll(function () {
        if ($(window).width() < 992) {
            if ($(this).scrollTop() > 45) {
                $('.fixed-top').addClass('bg-white shadow');
            } else {
                $('.fixed-top').removeClass('bg-white shadow');
            }
        } else {
            if ($(this).scrollTop() > 45) {
                $('.fixed-top').addClass('bg-white shadow').css('top', -45);
            } else {
                $('.fixed-top').removeClass('bg-white shadow').css('top', 0);
            }
        }
    });


    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 100, 'easeInOutExpo');
        return false;
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        margin: 25,
        loop: true,
        center: true,
        dots: false,
        nav: true,
        navText: [
            '<i class="bi bi-chevron-left"></i>',
            '<i class="bi bi-chevron-right"></i>'
        ],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            }
        }
    });


})(jQuery);

// {{-- Compare --}}
const storageKey = 'commpareID';
var listcompareExist = JSON.parse(localStorage.getItem(storageKey));
var listcompare = [];
if (listcompareExist) {
    listcompare = listcompareExist;
}
var length = listcompare.length;
document.getElementById('comparecount').innerHTML = length;

function addcompare(F_id) {
    var length = listcompare.length + 1; //+1 de clik so tang
    if (length > 4) alert('Only compare maximun 4 foods');
    else {
        for (var i = 0; i < length; i++) {
            if (listcompare[i] == F_id) {
                alert('This foods is already in the compare table');
                return false;
            }
        }
        listcompare.push(F_id);
        localStorage.setItem(storageKey, JSON.stringify(listcompare));
        document.getElementById('comparecount').innerHTML = length;
    }
}


// {{-- /Compare --}}
