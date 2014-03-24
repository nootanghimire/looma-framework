$(function(){
	$(".toolbar button").click(function(){
		$(".toolbar button").removeClass("selected");
		$(this).addClass("selected");
		switch($(this).index()){
			case 1:
			window.location.href = "/"
			$("body").css("cursor","progress");
			break;
		}
	})
	$(".toolbar button").hover(function(){
		$(".toolbar .caption").text($(this).find('img').attr('alt'));
		capWid = $(".toolbar .caption").width()-8;
		$(".toolbar .caption").css("left",(($(document).width()-capWid)/2)+"px");
		$(".toolbar .caption").toggle();
	})
	$(".selectbox").click(function(e){
		$(".selectbox .disp").toggle();
		$(".selectbox ul").fadeToggle(150);
		$(".selectbox").toggleClass('selectedbox')
	})
	$(".teacher-list ul li").click(function(){
		var current_selected = $(this).attr('value');
		var url = "/teachers/start_teaching/"+current_selected;
		window.location.href = url;
		$("body").css("cursor","progress");
	})
	$(".class-list ul li").click(function(){
		var current_selected = $(this).attr('value');
		var url = "/contents/in/"+current_selected;
		window.location.href = url;
		$("body").css("cursor","progress");
	})
    $(".subject-list ul li").click(function(){
    var current_selected = $(this).attr('value');
    var url = "/contents/classes/"+current_selected;
    window.location.href = url;
    $("body").css("cursor","progress");
  })
	$(document).mouseup(function (e){
		var container = $(".selectbox");
		if (!container.is(e.target) && container.has(e.target).length === 0){
			$(".selectbox .disp").show();
			$(".selectbox ul").hide();
			$(".selectbox").removeClass('selectedbox')
		}
	});
})