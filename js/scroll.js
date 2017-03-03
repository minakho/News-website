$('a[href^="#"]').click(function(){
	var the_id = $(this).attr("href");

	$('html, body').animate({
		scrollTop:$(the_id).offset().top
	}, 'slow');
	return false;
});

$(document).ready(function() {
    var btt = $('.scroll-top');
    
    $(window).on('scroll', function() {
       var self = $(this),
           height = self.height(),
           top = self.scrollTop();
        
        if(top > height) {
            if (!btt.is(':visible')){
                btt.show();
            } 
        } else {
            btt.hide();
        }
    });
});

$(function(){
    $(window).scroll(function(){
        var scroll = $(window).scrollTop();
        
        if (scroll > 10){
            $('.navbar').removeClass('navbar-default').addClass("navbar-default-2");
        }
        else{
            $('.navbar').removeClass("navbar-default-2").addClass("navbar-default");
        }
    });
});


