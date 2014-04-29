$(function(){
	$(".toolbar button").click(function(){
		$(".toolbar button").removeClass("selected");
		$(this).addClass("selected");
		switch($(this).index()){
			case 1:
			window.location.href = "/"
			$("body").css("cursor","progress");
			break;

      case 2:
      window.location.href="/apps"
      $("body").css("cursor","progress");
      break;
		}
    /* The funcionality of the click event on the bottom link is above */
    
	}) /* The toolbar click behaviour */
	$(".toolbar button").hover(function(){
		$(".toolbar .caption").text($(this).find('img').attr('alt'));
		capWid = $(".toolbar .caption").width()-8;
		$(".toolbar .caption").css("left",(($(document).width()-capWid)/2)+"px");
		$(".toolbar .caption").toggle();
	}) /* The popup for toolbar */
	$(".selectbox").click(function(e){
		$(".selectbox .disp").toggle();
		$(".selectbox ul").fadeToggle(150);
		$(".selectbox").toggleClass('selectedbox')
	}) /* Selectbox Click Behaviour */
	$(".teacher-list ul li").click(function(){
		var current_selected = $(this).attr('value');
		var url = "/teachers/start_teaching/"+current_selected;
		window.location.href = url;
		$("body").css("cursor","progress");
	}) /* On click: teachers-list */
	$(".class-list ul li").click(function(){
		var current_selected = $(this).attr('value');
		var url = "/contents/in/"+current_selected;
		window.location.href = url;
		$("body").css("cursor","progress");
	}) /* On click: class-list */
    $(".subject-list ul li").click(function(){
    var current_selected = $(this).attr('value');
    var url = "/contents/classes/"+current_selected;
    window.location.href = url;
    $("body").css("cursor","progress");
  }) /* On click: subject list*/
	$(document).mouseup(function (e){
		var container = $(".selectbox");
		if (!container.is(e.target) && container.has(e.target).length === 0){
			$(".selectbox .disp").show();
			$(".selectbox ul").hide();
			$(".selectbox").removeClass('selectedbox')
		}
	});
}) /* The select effect on list boxes */