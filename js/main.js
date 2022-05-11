
$(document).ready(function(){
  $('#wrap').click(function() {
		$(this).toggleClass('active');
	});
  $('#wrap').click(function() {
  	$('#cont').slideToggle(400 , function () {
  		$('#cont').animate({
  			opacity: '0.9'
  		}) 
  	});
  });
  

});