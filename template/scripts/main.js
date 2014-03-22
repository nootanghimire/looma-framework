$(function(){
	$(".toolbar button").click(function(){
		$(".toolbar button").removeClass("selected");
		$(this).addClass("selected");
		switch($(this).index()){
			case 1:
			window.location.href = "/"
			break;
		}
	})
	$(".toolbar button").hover(function(){
		$(".toolbar .caption").text($(this).find('img').attr('alt'));
		capWid = $(".toolbar .caption").width()-8;
		$(".toolbar .caption").css("left",(($(document).width()-capWid)/2)+"px");
		$(".toolbar .caption").toggle();
	})
})