$(document).ready(function(){
	

	pullComment(idCek());
	
});
function openImg(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
}
function menuFunc(){
		
		  var x = document.getElementById("menu");
		  
		  if (x.className === "menu") {
			x.className += " open";
			console.log($(window).height());
			document.getElementById("body").style.overflow  = "hidden";
			document.getElementById("main").style.display = "none";
			
		  } else {
			x.className = "menu";
				document.getElementById("body").style.overflow  = "auto";
			document.getElementById("main").style.display = "block";
		  }
		
	};
	
	function idCek(){
	    var vars = {};
    var parts = window.location.href.split("/");
	
    return parts[parts.length-2];
	
	
	}

	function pullComment($element) {
		
		$.ajax({
			url:'/files/func/func.php?view=com&op=pull',
			data:{
				'id':$element
			},
			type:'post',
			
			success:function(data){
			
				$('#comment-box').html(data);				
			
			}
		});
	}	
	
	function addComment($id) {		
	var name 	=	document.getElementById("name").value;
	var comment =	document.getElementById("comment").value;
	
	$.ajax({
	url:'/files/func/func.php?view=com&op=add',
	data: {
		'id': $id,
		'name': name,
		'comment':comment
	},
	dataType: 'json',
	method:'post',
	
	success:function(data){
	if(data.error != ''){
		//$('.veriler').html(result);
		$('#commentForm')[0].reset();	
		$('#comment_message').html(data.error);	
		}
	},
	error:function(){
		console.log("hata");
	}
});
};