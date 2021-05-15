/*
	setInterval(function(){  
		$(".annonce_une ul li:first-child").animate({"margin-left": -570}, 800, function(){  
			$(this).css("margin-left",0).appendTo(".annonce_une ul");  
		});  
	}, 3000); 
	
	
	$('#left_view').click(function(e) {
		$(".annonce_une ul").animate({marginLeft:'-180px'},800,function(){
				$(this).css({marginLeft:0}).find("li:last").after($(this).find("li:first"));
			});
	});
	
	$('#right_view').click(function(e) {
		$(".annonce_une ul").animate({marginLeft:'180px'},800,function(){
				$(this).css({marginLeft:0}).find("li:first").after($(this).find("li:last"));
			});
	});
*/




function moveLeft(parent) {
	$("." + parent+" ul li:first-child").animate({ "margin-left": -570 }, 800, function () {
		$(this).css("margin-left", 0).appendTo("." + parent + " ul");
	});

}

function moveRight(parent) {
	$("." + parent +" ul li:last-child").animate({ "margin-right": -570 }, 800, function () {
		$(this).css("margin-right", 0).prependTo("." + parent+" ul");
	});

}

	