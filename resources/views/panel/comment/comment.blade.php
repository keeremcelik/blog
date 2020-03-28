@extends('/panel/layout')
@section('baslik','Panel index Title')
@section('icerik')
<div class="content">
			
			<div class="pageTitle">
				<div class="left">
					<h1 class="h1">Yorumları Görüntüle <small>Blog</small></h1>
				</div>
				<div class="right">
					<div class="pageBreadcrumb">
						<ul class="">
							<li class=""><a href="{{url('/panel/index')}}">Ana Sayfa</a></li>
							<li class=""><a class="active" href="#">Yorumlar</a></li>
						</ul>
					</div>
				</div>	
				
			</div>
			<div class="optionbar">
				<div class="right">
					<!--<button type="button" class="btn btn-sm btn-red" data-id="'.$c["id"].'"  data-toggle="modal" data-target="#addModal" ><i class="fas fa-plus"></i> Yeni</button>-->
				</div>
			</div>
				<div class="pageContent">			
				
					<table class="table-responsive table">
						 <thead class="thead-smoke">
						<tr>
						  <th width="5%">Durum</th>
						  <th width="20%">Ad Soyad</th>
						  <th width="50%">Paylaşım</th>
						  <th width="20%">Tarih</th>
						  <th width="5%">İşlemler</th>
						</tr>
					  </thead>
					  <tbody> 
					  	@foreach($comments as $comment)
							<tr id="tr_{{$comment->id}}" >
						   <td>
							@if($comment->status==1)
								<span class="badge badge-pill badge-success">Aktif</span>
							@elseif($comment->status==2)
								<span class="badge badge-pill badge-danger">Pasif</span>
							@else
								<span class="badge badge-pill badge-dark">Bilinmiyor</span>
							@endif
						   	
						   </td>
						   <td>{{$comment->name}}</td>
						   <td>
						   	@foreach($posts as $post)
								@if($comment->post_id==$post->id)
									<a href="{{url('blog/post/'.$post->id.'/'.$post->sef_url)}}" target="_blank">{{$post->title}}</a>						
								@endif
							@endforeach
						   	</td>
						   <td>{{$comment->date}}</td>
						  	<td style="vertical-align: middle;">
							  

					<div class="islemler">   
					<a class="editBtn left" href="#" data-id="{{$comment->id}}"  data-toggle="modal" data-target="#editModal" ><i class="fas fa-eye"></i></a>	 
							@if($comment->status===1)
							<a class="text-danger right" onclick="deleteFunc({{$comment->id }},'comments')" href="#"><i class="fas fa-trash-alt"></i></a>
							@elseif($comment->status===2)
							<a class="text-success right" onclick="deleteFunc({{$comment->id }},'comments')" href="#"><i class="far fa-plus-square"></i></a>						
							@endif
						
   					</div>
   					
				</td>
						</tr>	
					  	@endforeach
					 
					  </tbody>
					</table>
				
				</div>
				<div class="pageFooter"></div>
			</div>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Yorum Görüntüle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
		  <div class="modal-body">
			<div class="container">
				<div class="row">
				<div class="modal-comment">
					
					<p class=""><strong>Gönderen Kişi :</strong> Kerem ÇELİK</p>
					<p class=""><strong>Gönderme Tarihi :</strong> 1 February 2020</p>
					<p class=""><strong>Gönderi :</strong> Kerem ÇELİK Kimdir ?</p>
				
				
						
				</div>
				</div>
				<div class="row">
					<div class="modal-comment-detail">
					
					<strong class="">Yorum</strong>
					<p>yorum</p>
					</div>
				</div>
			</div>		
		  </div>
		  <div class="modal-footer">
		
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
				
		  </div>     
    </div>
  </div>
</div>
@endsection