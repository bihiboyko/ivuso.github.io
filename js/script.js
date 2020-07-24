$(document).ready(function() {
		   
	


setInterval(function (){
           $(".obr:last").fadeOut(1000, function(){
              $(this).prependTo(".obrazky");
            }).prev().fadeIn(1000);
        }, 3000);
})