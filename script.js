
function permissionAboard(el) {
    var windowHeight = $(window).height();
    $(el).each(function(){
        var thisPos = $(this).offset().top;

        var topOfWindow = $(window).scrollTop();
        if (topOfWindow + windowHeight - 150 > thisPos ) {
            $(this).addClass("moveOn");
        }
        else{
            $(this).removeClass("moveOn");
        }
    });
}

function scrollSmooth(){
    if($('.smoothTarget').length){
        $(".smoothTarget").on('click', function() {
            var target = $(this).attr('data-target');
           // animate
           $('html, body').animate({
               scrollTop: $(target).offset().top
             }, 800);

        });
    }

    if($('.smoothHash').length){
        $(".smoothHash").on('click', function(event) {
          if ($(this).attr('href') !== "") {
            event.preventDefault();
            
            var hash = $(this).attr('href');

            $('html, body').animate({
              scrollTop: $(hash).offset().top
            }, 800, function(){
         
              window.location.hash = hash;
            });
          }
          
        });

    }

}

function btnTsotAnim(){
    if($('.ace-btn-tsot-anim').length > 0){
       $('.ace-btn-tsot-anim').each(function(){
        var btnTsotElem = $(this);
        $(btnTsotElem).find('.ace-btn-tsot1 .ace-btn-tsot').each(function(index){
            $(this).css({
                'transition-delay' : 0.03*(index) + 's'
            });
        });
        $(btnTsotElem).find('.ace-btn-tsot2 .ace-btn-tsot').each(function(index){
            $(this).css({
                'transition-delay' : 0.03*(index) + 's'
            });
        });
       }); 
    }
}

function toggleFAQ() {
  const faqTogg = this.getAttribute('aria-expanded');

  for (i = 0; i < faqs.length; i++) {
    faqs[i].setAttribute('aria-expanded', 'false');
  }

  if (faqTogg == 'false') {
    this.setAttribute('aria-expanded', 'true');
  }
}
const faqs = document.querySelectorAll('.ace-tfn-faqs button');

faqs.forEach((faq) => faq.addEventListener('click', toggleFAQ));




window.onscroll = function() {
	permissionAboard('.comeAboard');
    // scrollTop();
    stickyHead();
};

$(document).ready(function(){
	permissionAboard('.comeAboard');
    // scrollTop();
    scrollSmooth();
    btnTsotAnim();
    stickyHead();
});

// if($(window).width() < 992){
//     $('.ace-tfn-bann-award-mob').html($('.ace-tfn-bann-award-desk').html());

//     setTimeout(function(){
//         $('.ace-tfn-bann-award-desk').html('');
//     },300);
// }


/*if($('.homeReviewSlider').length > 0){
    var swiper = new Swiper(".homeReviewSlider", {
        autoplay: {
            delay: 5000,
        },        
        slidesPerView: 1,
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        }
    });
}*/

if($('.homeReviewSlider').length > 0){
    var swiper = new Swiper(".homeReviewSlider", {
    // paginationClickable: true,
    // effect: 'coverflow',
    loop: true,
    // height: 'auto',
    centeredSlides: true,
    // slidesPerView: 'auto',
    /*coverflowEffect: {
        rotate: 0,
        stretch: 0,
        depth: 0,
        modifier: 1,
        slideShadows: false,
    },*/
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    speed: 1000,
    slideNextClass: "ace-home-testi-next",
    slidePrevClass: "ace-home-testi-prev",
    /*slideDuplicateNextClass: "ace-home-testi-next",
    slideDuplicatePrevClass: "ace-home-testi-prev",*/
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    pagination: {
        el: ".swiper-pagination",
        // dynamicBullets: true,
        clickable: true,
    },
    /*pagination: {
        el: '.swiper-pagination',
        type: 'custom',
        renderCustom: function (swiper, current, total) {
        return '<span class="swiperCurrent">' + current + '<div class="ace-testi-pro-bar">' + '<span class="ace-testi-bar-left"><span class="ace-testi-bar-elem"></span></span>' + '<span class="ace-testi-bar-right"><span class="ace-testi-bar-elem"></span></span>' + '</div>' + '</span>' + '<span class="swiperDash"></span>' + total; 
        }
    },*/
    // coverflowEffect: {
    //     rotate: 0,
    //     stretch: 100,
    //     depth: 20,
    //     modifier: 0.5,
    //     slideShadows : false,
    // },
    breakpoints: {
        640: {
            slidesPerView: 1,
            pagination: true,
            navigation: false,
            // effect: "fade",
        },
        768: {
            slidesPerView: 1,
            pagination: true,
            navigation: false,
            // effect: "fade",
        },
        1024: {
            slidesPerView: 4,
            pagination: false,
        },
    }
    });
}

function stickyHead(){
    var scroll = $(window).scrollTop();
    var sticPoint = 1;
    if (scroll >= sticPoint) {
      $("header.ace-top-menu").addClass("fixed");
      $(".top-right-menu .ace-btn-nav").addClass("ace-btn-second-outline-alt").removeClass("ace-btn-second-outline");
    }
    else {
      $("header.ace-top-menu").removeClass("fixed");
      $(".top-right-menu .ace-btn-nav").addClass("ace-btn-second-outline").removeClass("ace-btn-second-outline-alt");
    }
}

$(".toTop").click(function (e) {
    e.preventDefault();
    $("html, body").animate({scrollTop: 0}, 1000);
});