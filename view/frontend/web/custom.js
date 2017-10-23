require(['jquery', 'jquery/ui'], function($){
	var message = "Air shipping options are not available because your order contain a hazmat / oversized product";
	var isElementAdded = false;
	function checkElement(){
	   if($('#s_method_seafreight_seafreight').length && !isElementAdded){
	       if($("#s_method_flatrate_flatrate").length < 1){
	       		$('div#custom_message').text(message);
	       }

	       isElementAdded = true;
	   }
	}
	setInterval(checkElement,200);
});
