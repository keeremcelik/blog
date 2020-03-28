@extends('/panel/layout')
@section('baslik','Panel index Title')
@section('icerik')
<div class="content">
			
			
			
			<div class="pageTitle">
				<div class="left">
					<h1 class="h1">Yazıları Görüntüle <small>Blog</small></h1>
				</div>
				<div class="right">
					<div class="pageBreadcrumb">
						<ul class="">
							<li class=""><a href="{{url('/panel/index')}}">Ana Sayfa</a></li>
							<li class=""><a class="active" href="#">Yazılar</a></li>
						</ul>
					</div>
				</div>	
				
			</div>
			<div class="optionbar">
				<div class="right">
					<!--<button type="button" class="btn btn-sm btn-red" data-id="'.$c["id"].'"  data-toggle="modal" data-target="#addModal" ><i class="fas fa-plus"></i> Yeni</button>-->
					<a href="{{url('/panel/posts/new')}}" class="btn-red"><i class="fas fa-plus"></i> Yeni</a>
				</div>
			</div>
				<div class="pageContent">			
				
					<table class="table-responsive table">
						 <thead class="thead-smoke">
						<tr>
						  <th width="5%">Durum</th>
						  <th width="65%">Başlık</th>
						  <th width="25%">Tarih</th>
						  <th width="5%">İşlemler</th>
						</tr>
					  </thead>
					  <tbody> 
					  	@foreach($posts as $post)
							<tr id="tr_{{$post->id}}" >
						   <td>
							@if($post->status==1)
								<span class="badge badge-pill badge-success">Aktif</span>
							@elseif($post->status==2)
								<span class="badge badge-pill badge-danger">Pasif</span>
							@else
								<span class="badge badge-pill badge-dark">Bilinmiyor</span>
							@endif
						   	
						   </td>
						   <td>{{$post->title}}</td>
						   <td>{{$post->date}}</td>
						  	<td style="vertical-align: middle;">
							  

					<div class="islemler">   
					<a id=""  class="editBtn left" href="{{url('/panel/posts/edit/'.$post->id)}}"  ><i class="fas fa-edit"></i></a>
					
					
							@if($post->status==1)
							<a class="text-danger right" onclick="deleteFunc({{$post->id }},'posts')" href="#"><i class="fas fa-trash-alt"></i></a>
							@else
							<a class="text-success right" onclick="deleteFunc({{$post->id }},'posts')" href="#"><i class="far fa-plus-square"></i></a>
							@endif

						
   					</div>
   					
				</td>
						</tr>	
					  	@endforeach
					 
					  </tbody>
					</table>
				  {{ $posts->links()}}
				</div>

				<div class="pageFooter">
					
				</div>
			</div>

@endsection