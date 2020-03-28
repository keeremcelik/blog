$(document).ready(function(){
	var SITEURL = (document).getElementById("_base_url").content;
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	/*  ABILITY OPTIONS */
	$('#newability').on('submit',function(e){
		e.preventDefault();
		var table = $('#tb_ability');
		var name= document.getElementById("name").value;	
		var rate =document.getElementById("rate").value;

		$.ajax({
			type:"POST",
			url:SITEURL+"/panel/abilities/new",
			data: {
				name : name,
				rate: rate
			},
			success: function(data){
				table.prepend(
					'<tr id="tr_'+data.id+'"><td><span class="badge badge-pill badge-success">Aktif</span></td><td><div class="clearfix"><strong class="left">'+data.name+'</strong><small class="right">'+data.rate+'%</small></div><div class="progress xs"><div class="progress-bar " style="width:'+data.rate+'%"> </div></div></td><td style="vertical-align: middle;"><div class="islemler"><a id="" onclick="'+pullAbility(data.id)+'" class="editBtn left" href="#"  data-id="'+data.id+'"  data-toggle="modal" data-target="#editabilitymodal" ><i class="fas fa-edit"></i></a><a class="delBtn right" href="delete/'+data.id+'"><i class="fas fa-trash-alt"></i></a></div></td></tr>'
					);
				console.log(data)
				$('#newabilitymodal').modal('hide')
				
			},
			error: function(error){
				console.log(error)
				alert("data not saved");
			}
		});
	});

	$('#editability').on('submit',function(e){
		e.preventDefault();

		var id= $(this).data('id');

		var name= document.getElementById("editname").value;	
		var rate =document.getElementById("editrate").value;

		$.ajax({
			type:"POST",
			url:SITEURL+"/panel/abilities/update",
			data: {
				id:id,
				name : name,
				rate: rate
			},
			datatype:'json',
			success: function(data){
				
				$('#editabilitymodal').modal('hide')
				
			},
			error: function(error){
				console.log(error)
				alert("data not saved");
			}
		});
	});
	/* ABILITY OPTIONS END */

	function changeImgModal(element) {
		$('#edit-img')[0].src = window.URL.createObjectURL(element);
	}

	/* CATEGORY OPTIONS */

	$('#newcategory').on('submit',function(e){
		e.preventDefault();
		var table = $('#tb_category');
		var name= document.getElementById("name").value;	
		var sef_url =document.getElementById("sef_url").value;
		var keywords =document.getElementById("keywords").value;
		var description =document.getElementById("description").value;

		$.ajax({
			type:"POST",
			url:SITEURL+"/panel/categories/new",
			data: {
				name : name,
				sef_url : sef_url,
				keywords : keywords,
				description: description
			},
			success: function(data){
				table.prepend(
					'<tr id="tr_'+data.id+'"><td><span class="badge badge-pill badge-success">Aktif</span></td><td>'+data.name+'</td><td>post sayısı</td><td style="vertical-align: middle;"><div class="islemler"><a id="" onclick="'+pullCategory(data.id)+'" class="editBtn left" href="#"  data-id="'+data.id+'"  data-toggle="modal" data-target="#editcategorymodal" ><i class="fas fa-edit"></i></a><a class="delBtn right" href="delete/'+data.id+'"><i class="fas fa-trash-alt"></i></a></div></td></tr>'
					);
				console.log(data)
				$('#newcategorymodal').modal('hide')
				
			},
			error: function(error){
				console.log(error)
				alert("data not saved");
			}
		});
	});

	$('#editcategory').on('submit',function(e){
		e.preventDefault();

		var id= $(this).data('id');

		var name= document.getElementById("editname").value;	
		var sef_url =document.getElementById("editsef_url").value;
		var keywords =document.getElementById("editkeywords").value;
		var description =document.getElementById("editdescription").value;

		$.ajax({
			type:"POST",
			url:SITEURL+"/panel/categories/update",
			data: {
				id:id,
				name : name,
				sef_url : sef_url,
				keywords : keywords,
				description: description
			},
			datatype:'json',
			success: function(data){
				
				$('#editcategorymodal').modal('hide')
				
			},
			error: function(error){
				console.log(error)
				alert("data not saved");
			}
		});
	});


	/* CATEGORY OPTIONS END */
	

	
	
});

function openImg(element) {
	document.getElementById("img01").src = element.src;
	document.getElementById("modal01").style.display = "block";

}

function pullAbility(element) {		
	var SITEURL = (document).getElementById("_base_url").content;
	var id= element;	

	$.ajax({
		type:"get",
		url:SITEURL+"/panel/abilities/pull/"+id,
		datatype:'json',
		success: function(result){

			var d = document.getElementById("editability"); 
			d.setAttribute('data-id',result.id)
			document.getElementById("editname").value = result.name; 
			document.getElementById("editrate").value = result.rate; 

		},
		error: function(error){
			console.log(error)
			alert("veri çekilmedi ");
		}
	});
};
function pullCategory(element) {		
	var SITEURL = (document).getElementById("_base_url").content;
	var id= element;	

	$.ajax({
		type:"get",
		url:SITEURL+"/panel/categories/pull/"+id,
		datatype:'json',
		success: function(result){

			var d = document.getElementById("editcategory"); 
			d.setAttribute('data-id',result.id)
			document.getElementById("editname").value = result.name; 
			document.getElementById("editsef_url").value = result.sef_url; 
			document.getElementById("editkeywords").value = result.keywords; 
			document.getElementById("editdescription").value = result.description; 

		},
		error: function(error){
			console.log(error)
			alert("veri çekilmedi ");
		}
	});
};
//Yetenek Silme Fonksiyonu

function deleteFunc(element,table) {
	var SITEURL = (document).getElementById("_base_url").content;
	var id= element;
	$.ajax({		
		type:'post',
		url:SITEURL+'/panel/'+table+'/delete',
		data : {
			id:id
		},
		datatype: 'json',
		success:function(result){
			$("#tr_"+id).fadeOut("slow").remove();
		}
	});
}	


function pullMail(element) {
	var SITEURL = (document).getElementById("_base_url").content;
	var id= element;	


	$.ajax({
		url:SITEURL+"/panel/messages/pull/"+id,
		dataType: 'json',
		type:'get',

		success:function(result){

		//$('.veriler').html(result);
		document.getElementById("name").innerHTML = result.name; 
		document.getElementById("date").innerHTML = result.date; 
		document.getElementById("title").innerHTML = result.subject; 
		document.getElementById("mail").innerHTML = result.content; 
	},
	error:function(){
		alert("hata");
	}
});
};	

























/* POST YAZI İŞLEMLERİ */

function deletePost($id) {
	var baseurl =document.getElementById("_base_url").content;
	var url 	='/panel/posts/delete/';
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	console.log(baseurl+url+$id);

	$.ajax({
		type:'post',
		url: url,
		data: {
			_token: CSRF_TOKEN,
			id : $id,
			status : 2

		},
		datatype:'json',
		success:function(){
			console.log(data.message);				
			
		},
		error:function(jqXHR,exception){
			console.log(jqXHR);
		}
	});
}		

/* POST YAZI İŞLEMLERİ SON*/

//Yorum Silme Fonksiyonu

function deleteComment(element) {
	$("#silbuton").click(function(e){

	});
	
	$.ajaxSetup({

		headers: {

			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

		}

	});
	$.ajax({

		type:'POST',
		url:"{{ route('comments/delete') }}",
		data: {'id':element},
		success:function(data){
			if(data.success){
				console.log('Başarılı');
			}

		}
	});
	

}	
function approveComment(element) {

	$.ajax({
		url:'/files/func/func.php?view=cmt&op=aprv',
		data: "id="+element,
		dataType: 'json',
		type:'post',

		success:function(result){
			if(result==1){
				$("#tr_"+element).fadeOut("slow");
			}
			else{
				alert("Ekleme işlemi başarısız.");
			}
		}
	});
}	
/* Yorum İŞLEMLERİ SON*/














/*

Yetenek İşlemleri

*/


//Modal'a veri Çek


/* 
	Yetenek İşlemleri BİTTİ
	*/

	/* MAIL İŞLEMLERİ */
	function readMail(element) {
		$.ajax({
			url:'/files/func/func.php?view=mail&op=read',
			data: "id="+element,
			dataType: 'json',
			type:'post',

			success:function(result){
				if(result==1){
					$("#tr_"+element).fadeOut("slow").remove();
				}
				else{
					alert("İşlem başarısız.");
				}
			}
		});
	}	
	function unreadMail(element) {
		$.ajax({
			url:'/files/func/func.php?view=mail&op=unread',
			data: "id="+element,
			dataType: 'json',
			type:'post',

			success:function(result){
				if(result==1){
					$("#tr_"+element).fadeOut("slow").remove();
				}
				else{
					alert("İşlem başarısız.");
				}
			}
		});
	}
	

	/* PROJECT İŞLEMLERİ*/
	function deleteProject(element) {

		$.ajax({
			url:'/files/func/func.php?view=prj&op=del',
			data: "id="+element,
			dataType: 'json',
			type:'post',

			success:function(result){
				if(result==1){
					$("#tr_"+element).fadeOut("slow").remove();
				}
				else{
					alert("Silme işlemi başarısız.");
				}
			}
		});
	}
	/* PROJECT İŞLEMLERİ SON*/

	
