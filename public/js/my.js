

$(document).ready(()=>{
	$(".navbar-toggler").click(function(){				
		$(".navbarMenu").slideToggle(500);	
	
	});

		var mainheight=$("header").height();
		var windowh= $(window).height();
		
	sliderResize();
	navBarToggle();

	$(window).resize(function(){
		sliderResize();
		
	
	});
	$(window).scroll(function(){
		navBarToggle();
	});


	//Sayfanın başlangıcında slideri tam ekran yapar
	//Eğer sayfa boyutu değişirse slider boyutu ona göre değişir
	function sliderResize(){
		var w= $(window).width();
		var h= windowh-mainheight;
		
		$("#slider").width(w);
		$("#slider").height(h);
		//$(".dfn1").css("padding",h/2);
	}
	
	//navbar'ın saklanması ve görünmesi fonksiyonu
	function navBarToggle(){
		var scroll = $(this).scrollTop();
		if(scroll>=windowh){
		$("#nav").slideDown();
		}
		else if(scroll<windowh){
			$("#nav").slideUp();
		}
	}
	
	
});


//projelerim divindeki kartların üzerine gelince oluşacak animasyon
function testProje(id,event){
	
	if(event.type==='mouseover'){	
		
			$("#pb"+id).stop().animate({opacity:'0.1'},1000);		
			
			$("#ph"+id).stop().animate({
			top:'40%',
			opacity:'1'			
			},1000);
			$("#pf"+id).stop().animate({
				bottom:'25%',
				opacity:'1'
			},1000);
	
	}
	 if(event.type==='mouseleave'){
		
		$("#pb"+id).stop().animate({opacity:'1'},1000);	
	$("#ph"+id).stop().animate({
			top:'10%',
			opacity:'0'		
		},1000);
		$("#pf"+id).stop().animate({
				bottom:'0%',
				opacity:'0'	
		},1000);
		
	}		
	
}

	function menuFunc(){
		
		  var x = document.getElementById("navTopId");
		  var y = document.getElementById("nav-right");
		  
		  if (x.className === "navTop") {
			x.className += " responsive";
			y.className = " nav-left";
			
		  } else {
			x.className = "navTop";
			y.className = "nav-right";
		  }
		
	}

	