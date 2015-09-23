// A $( document ).ready() block.
$(document).ready(function () {
    console.log("ready!");
    $('#slider1').anythingSlider({
//			theme : 'metallic',
        expand: true,
        mode: "vertical",
        easing: "swing",
        buildArrows: false, // If true, builds the forwards and backwards buttons
        buildNavigation: false, // If true, builds a list of anchor links to link to each panel
        buildStartStop: false,
        hashTags: false,
        delay: 6000,
        animationTime: 0,
        delayBeforeAnimate: 1000,
        autoPlay: true

    });
    $('#slider1').anythingSliderFx(
            {}, // no fx animation, it's all css baby!
            {
                stopRepeat: false, // fx option to prevent repeating animation on startup/clicking the same slide (default is false)
                dataAnimate: 'data-animate' // data attribute containing the in and out animation.css class names to use
            }
    );
    // Initialize video extension
    // see https://developers.google.com/youtube/player_parameters?hl=en#Parameters for a list of parameters
    $('#slider1').anythingSliderVideo({
        // video id prefix; suffix from $.fn.anythingSliderVideo.videoIndex
        videoId: 'asvideo',
        // auto load YouTube api script
        youtubeAutoLoad: true,
        // see: https://developers.google.com/youtube/player_parameters#Parameters
        youtubeParams: {
            modestbranding: 1,
            iv_load_policy: 3,
            fs: 1
        }
    });

    //	Scrolled by user interaction
    $('#foo2').carouFredSel({
        auto: false,
        prev: '#prev2',
        next: '#next2',
        pagination: "#pager2",
        scroll: 2,
        mousewheel: true,
        swipe: {
            onMouse: true,
            onTouch: true
        }
    });

    $(window).scroll(function () {
        console.log('haciendo Scroll');
        var actual = $(window).scrollTop();
        console.log(actual);
        if (actual === 0) {
            $('header.menu').css('background', 'none');
            $('header.menu').css('box-shadow', '0px 0px 0px #ccc');
        } else {
            $('header.menu').css('background', 'rgba(255,255,255,0.95)');
            $('header.menu').css('box-shadow', '1px 2px 5px #ccc');
        }
    });
});
$('#busqueda').mouseenter(function () {
    console.log('entro');
    $('#busqueda').addClass('lupa-desplegada');
    $('.search-form').slideDown();
});
$('.content-form').mouseleave(function () {
    console.log('salio');
    $('#busqueda').removeClass('lupa-desplegada');
    $('.search-form').slideUp();
});

$('#boton-categoria').click(function () {
    $('#menu-categorias').toggle(function () {
        $('#menu-categorias').animate(
                {
                    left: ["100%", "swing"]
                },
        300
                );  
//         $('header.menu-movil').css('height','auto');
//         $('header.menu-movil').css('overflow','auto');
    });
});
$('#boton-usuario').click(function () {
    $('#menu-usuario').toggle(function () {
        $('#menu-usuario').animate(
                {
                    left: ["100%", "swing"]
                },
        300
                );
//         $('header.menu-movil').css('height','auto');
//         $('header.menu-movil').css('overflow','auto');
    });
});
$('#boton-carrito').click(function () {
    $('#menu-carrito').toggle(function () {
        $('#menu-carrito').animate(
                {
                    left: ["100%", "swing"]
                },
        300
                );
//         $('header.menu-movil').css('height','auto');
//         $('header.menu-movil').css('overflow','auto');
    });
});
$(window).load(function() {
    var dstoy = $('#stoy').attr('data-url');
    switch (dstoy) {
        case 'index':
            console.log("index");
            $('body').addClass('body-naranja');

            break;
       
    }

});
