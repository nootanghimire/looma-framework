$(function(){
	$(".toolbar button").click(function(){
		$(".toolbar button").removeClass("selected");
		$(this).addClass("selected");
	})
})