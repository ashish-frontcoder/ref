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