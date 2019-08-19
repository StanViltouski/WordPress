$(function () {

	$(window).on('scroll', function(){

     	//showcase head scroll effec 
  
        var movementTop = parseInt($(this).scrollTop() / 50);

        if(movementTop <= 10){
       		$('.wrapper4-effect').css('opacity', (movementTop/10));
        }  else {return;}

	})

});