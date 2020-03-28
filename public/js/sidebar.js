$(document).ready(function(){
	
	$(".sidebar ul li a").on("click", function() {
		$(".sidebar ul li a").find(".active").removeClass("active");
		$(this).parent().addClass("active");
	});
	jQuery(function ($) {

		$(".sidebar-dropdown > a").click(function() {
		$(".sidebar-submenu").slideUp(200);
	  if (
		$(this)
		  .parent()
		  .hasClass("active")
	  ) {
		$(".sidebar-dropdown").removeClass("active");
		$(this)
		  .parent()
		  .removeClass("active");
	  } else {
		$(".sidebar-dropdown").removeClass("active");
		$(this)
		  .next(".sidebar-submenu")
		  .slideDown(200);
		$(this)
		  .parent()
		  .addClass("active");
	  }
	});

	$("#close-sidebar").click(function() {
	  $(".page-wrapper").removeClass("toggled");
	});
	$("#show-sidebar").click(function() {
	  $(".page-wrapper").addClass("toggled");
	});


	   
	   
	});
});

function sidebarOpen(){
	$("#sidebar").animate({
		width:'250px',
		'min-width':'250px'			
	});
	$("#page-content").animate({
		
		'margin-left':'250px'			
	});
		$(".sidebar-content").css("display","block");
		$(".sidebar-footer").css("display","flex");
}
function sidebarClose(){
	$("#sidebar").animate({
			width:'0px',
			'min-width':'0px'			
	});
	$("#page-content").animate({
		
		'margin-left':'0px'			
	});
	$(".sidebar-content").css("display","none");
	$(".sidebar-footer").css("display","none");
	
		

}
function sidebarToggle(){

	if($("#sidebar").width()>0){
	 sidebarClose();
	
	}
	else {
		sidebarOpen();
	
	}
}
