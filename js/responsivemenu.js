jQuery(document).ready(function( $ ) {
    $('.mmenu-open').click(function() {
        $('nav.mmenu').addClass('mmenu-open');
        $('body').css({'overflow': 'hidden', 'height': '100%'});
    });
    $('html, .menu-close').click(function() {
        $('nav.mmenu').removeClass('mmenu-open');
        $('body').css({'overflow': 'auto', 'height': 'auto'});
    });
    $('nav.mmenu, .mmenu-open').click(function(e) {
        e.stopPropagation();
    });
    $('.sub-toggle').click(function() {
        $(this).closest('li').toggleClass('submenu-open');
        $(this).next('ul').toggleClass('submenu-open');
    });

    var toppostion = $('.mmenu-open').position().top;
	$(window).scroll(function() {
		if ($(document).scrollTop() > toppostion) {
			$('.mmenu-open').addClass('mmenu-fixed');
		}
        if ($(document).scrollTop() <= toppostion) {
			$('.mmenu-open').removeClass('mmenu-fixed');
		}
    });
});
