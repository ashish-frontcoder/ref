// Onclick scroll top smooth
$(".toTop").click(function (e) {
    e.preventDefault();
    $("html, body").animate({scrollTop: 0}, 1000);
});


// Target add class active on top and remove class on target end on scroll
$(window).scroll(function(){
    if($(window).scrollTop() >= $("#element").offset().top + $("#element").height() || $(window).scrollTop() < $("#element").offset().top)
        $('#element').removeClass('active');
    else
        $('#element').addClass('active');
});


// Create dynamic table of content list
$('.blog-detail-middle h2').each(function(){
    $(this).addClass('toc-item');
});

$(document).ready(function toc_builder() {
    var children = $(".entry-content").children(".toc-item");

    var html = "";
    for (i=0; i < children.length; i++){
        $(children[i]).prop('id','toc-item-'+i);
        html += "<li class=\"list-group-item\"><a href=\"#toc-item-" + i + "\">" + $(children[i]).html() + "</a></li>";
    }
    $("#BlogtableContent").html(html);
});


// Smooth scroll top on target click
$(document).ready(function() {
    $('a[href*=#]').bind('click', function(e) {
        e.preventDefault(); // prevent hard jump, the default behavior
        var target = $(this).attr("href"); // Set the target as variable
        // perform animated scrolling by getting top-position of target-element and set it as scroll target
        $('html, body').stop().animate({
            scrollTop: $(target).offset().top
        }, 600, function() {
            location.hash = target; //attach the hash (#jumptarget) to the pageurl
        });
        return false;
    });
});


// Assign active class to nav links while scolling
$(window).scroll(function() {
    var scrollDistance = $(window).scrollTop();

    // Show/hide menu on scroll
    //if (scrollDistance >= 850) {
    //		$('nav').fadeIn("fast");
    //} else {
    //		$('nav').fadeOut("fast");
    //}

    // Assign active class to nav links while scolling
    $('.toc-item').each(function(i) {
        if ($(this).position().top <= scrollDistance) {
            $('.list-group-item a.active').removeClass('active');
            $('.list-group-item a').eq(i).addClass('active');
        }
    });
}).scroll();


// Show hide next prev div on click jquery
$(document).ready(function () {
    $(".divs div").each(function (e) {
        if (e != 0) $(this).hide();
    });

    // setInterval(function(){},10 * 1000);
    $("#next").click(function () {
        if ($(".divs div:visible").next().length != 0)
            $(".divs div:visible").next().show().prev().hide();
        else {
            $(".divs div:visible").hide();

            $(".divs div:first").show();
        }

        return false;
    });

    $("#prev").click(function () {
        if ($(".divs div:visible").prev().length != 0)
            $(".divs div:visible").prev().show().next().hide();
        else {
            $(".divs div:visible").hide();

            $(".divs div:last").show();
        }

        return false;
    });
});


// https://lazy-loading.firebaseapp.com/lazy_loading_lib.html

//  <!-- Let's load this in-viewport image normally -->

{/* <img src="hero.jpg" alt="…">

<!-- Let's lazy-load the rest of these images -->
<img data-src="unicorn.jpg" alt="…" loading="lazy" class="lazyload">
<img data-src="cats.jpg" alt="…" loading="lazy" class="lazyload">
<img data-src="dogs.jpg" alt="…" loading="lazy" class="lazyload"> */}

  if ('loading' in HTMLImageElement.prototype) {
    const images = document.querySelectorAll('img[loading="lazy"]');
    images.forEach(img => {
      img.src = img.dataset.src;
    });
  } else {
    // Dynamically import the LazySizes library
    const script = document.createElement('script');
    script.src =
      'https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.1.2/lazysizes.min.js';
    document.body.appendChild(script);
  }


// Read more less jquery
$(document).ready(function () {
    var showChar = 50;

    var ellipsestext = "...";

    var moretext = "more";

    var lesstext = "less";

    $(".more").each(function () {
        var content = $(this).html();

        if (content.length > showChar) {
            var c = content.substr(0, showChar);

            var h = content.substr(showChar - 1, content.length - showChar);

            var html =
                c +
                '<span class="moreellipses">' +
                ellipsestext +
                '&nbsp;</span><span class="morecontent"><span>' +
                h +
                '</span>&nbsp;&nbsp;<a href="" class="morelink">' +
                moretext +
                "</a></span>";

            $(this).html(html);
        }
    });

    $(".morelink").click(function () {
        if ($(this).hasClass("less")) {
            $(this).removeClass("less");

            $(this).html(moretext);
        } else {
            $(this).addClass("less");

            $(this).html(lesstext);
        }

        $(this).parent().prev().toggle();

        $(this).prev().toggle();

        return false;
    });
});


// let regEx

// At least one letter (any case)
regEx = /(?=.*[a-zA-Z])/

// At least one letter and one number
regEx = /(?=.*\d)(?=.*[a-zA-Z])/

// At least one uppercase letter, one lowercase letter and one number
regEx = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/

// At least one uppercase letter, one lowercase letter, one number and one special character (symbol)
regEx = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W)/

// Email regular expression pattern
regEx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/