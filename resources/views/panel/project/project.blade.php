@extends('/panel/layout')
@section('baslik','Panel index Title')
@section('icerik')
<div class="content">
			
			
			
			<div class="pageTitle">
				<div class="left">
					<h1 class="h1">Projeleri Görüntüle <small>Blog</small></h1>
				</div>
				<div class="right">
					<div class="pageBreadcrumb">
						<ul class="">
							<li class=""><a href="{{url('/panel')}}">Ana Sayfa</a></li>
							<li class=""><a class="active" href="#">Projeler</a></li>
						</ul>
					</div>
				</div>					
			</div>
			<div class="optionbar">
				<div class="right">
					<!--<button type="button" class="btn btn-sm btn-red" data-id="'.$c["id"].'"  data-toggle="modal" data-target="#addModal" ><i class="fas fa-plus"></i> Yeni</button>-->
					<a href="{{url('/panel/projects/new')}}" class="btn-red"><i class="fas fa-plus"></i> Yeni</a>
				</div>
			</div>
				<div class="pageContent">			
				
					<table class="table-responsive table">
						 <thead class="thead-smoke">
						<tr>
						  <th width="5%">Durum</th>
						  <th width="60%">Proje Adı</th>
						  <th width="25%">Tarih</th>
						  <th width="5%">Türü</th>
						  <th width="5%">İşlemler</th>
						</tr>
					  </thead>
					  <tbody> 
					  	@foreach($projects as $project)
							<tr id="tr_{{$project->id}}" >
						   <td>
							@if($project->status==1)
								<span class="badge badge-pill badge-success">Aktif</span>
							@elseif($project->status==2)
								<span class="badge badge-pill badge-danger">Pasif</span>
							@else
								<span class="badge badge-pill badge-dark">Bilinmiyor</span>
							@endif
						   	
						   </td>
						   <td>{{$project->name}}</td>
						   <td>{{$project->date}}</td>
						   <td>
							@if($project->type==1)
								<span class="badge badge-pill badge-success">Web</span>
							@elseif($project->type==2)
								<span class="badge badge-pill badge-success">Masaüstü</span>
							@elseif($project->type==3)
								<span class="badge badge-pill badge-success">Mobil</span>
							@else
								<span class="badge badge-pill badge-dark">Bilinmiyor</span>
							@endif
							</td>

						  	<td style="vertical-align: middle;">
							  

					<div class="islemler">   
					<a id=""  class="editBtn left" href="{{url('/panel/projects/edit/'.$project->id)}}"  ><i class="fas fa-edit"></i></a>
					
					@if($project->status===1)
							<a class="text-danger right" onclick="deleteFunc({{$project->id }},'projects')" href="#"><i class="fas fa-trash-alt"></i></a>
							@elseif($project->status===2)
							<a class="text-success right" onclick="deleteFunc({{$project->id }},'projects')" href="#"><i class="far fa-plus-square"></i></a>						
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

@endsection