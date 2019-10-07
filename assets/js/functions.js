(function($) {

$(document).ready(function(){
    $('.responsive').slick({
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
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
        ]
    });

    $('.responsivelg').slick({
        dots: true,
        infinite: false,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 3,
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
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
        ]
    });
});

$(".toggle-mobile-search").on('click', function() {
    $(".search-input").fadeToggle();
});

$('#gift_send_from_name').blur(function() {
    $('#hidden_gift_send_from_name').val($('#gift_send_from_name').val());
});

$('#gift_send_to_name').blur(function() {
    $('#hidden_gift_send_to_name').val($('#gift_send_to_name').val());
});

$('#gift_send_to_message').blur(function() {
    $('#hidden_gift_send_to_message').val($('#gift_send_to_message').val());
});

$('#gift_send_to_email').blur(function() {
    $('#hidden_gift_send_to_email').val($('#gift_send_to_email').val());
});

$('#gift_send_from_email').blur(function() {
    $('#hidden_gift_send_from_email').val($('#gift_send_from_email').val());
});

$("#singleproductformbtn").click(function(){        
    $("#singleproductform").submit(); // Submit the form
});

      
})(jQuery);