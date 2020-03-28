@extends('/panel/layout')
@section('baslik','Panel index Title')
@section('icerik')
<div class="content">



		<div class="pageTitle">
				<div class="left">
					<h1 class="h1">Proje Düzenle <small>Blog</small></h1>
				</div>
				<div class="right">
					<div class="pageBreadcrumb">
						<ul class="">
							<li class=""><a href="{{url('/panel')}}">Ana Sayfa</a></li>
							<li class=""><a href="{{url('/panel/projects/list')}}">Projeler</a></li>
							<li class=""><a class="active" href="#">Proje Düzenle</a></li>
						</ul>
					</div>
				</div>	
				
			</div>
	<div class="pageContent">			


		<div class="pageBody">
			<form action="#" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="type">Tür </label>
							<select name="type" class="custom-select">
								<option value="0">Lütfen tür seçiniz</option>	
														
								<option value="1"
								@if($projects->type==1) selected @endif	
								>Web</option>						
								<option value="2"
								@if($projects->type==2) selected @endif	
								>Masaüstü</option>						
								<option value="3"
								@if($projects->type==3) selected @endif	
								>Mobil</option>			
							</select>
				</div>
				<div class="form-group">
					<label for="name">Proje Adı</label>
					<input class="form-control" name="name" type="text" value="{{$projects->name}}"  placeholder="Projenin adı">
					
				</div>							
				<div class="form-group">
					<label for="content">İçerik</label>
					<textarea class="form-control ckeditor" name="content" rows="10">{!! $projects->content !!}</textarea>	
												
				</div>	
				<div class="form-group">
					<label for="infrastructure">Kullanılan Diller</label>
					<input class="form-control" name="infrastructure" value="{{$projects->infrastructure}}" type="text"  placeholder="HTML / CSS, C# / MSSQL, PHP vb.">
					
				</div>			
				<div class="form-group">
					<label for="keywords">Anahtar kelimeler</label>
					<input class="form-control" name="keywords" value="{{$projects->keywords}}"type="text" placeholder="Anahtar Kelimeler">						
				</div>

			
				<div class="form-group">
					<div class="row">
						@foreach($images as $key => $value)
						<div class="col-lg-3 col-md-4 col-6">
							<a href="javascript:;" class="d-block">
								<img data-id="{{ $key}}" id="postImg" onclick="openImg(this)"  class="img-fluid img-thumbnail post-pic" src="{{asset('storage/img/projects/'.$value) }}"/>
								
							</a>

							

								<div class="imgsettings">
									@if($projects->coverimg == $value)
										<span class="badge badge-success"> Kapak resmi</span>
									@else

										<a href="{{url('/panel/projects/edit/coverimg/'.$projects->id.'/'.$key)}}" class="badge badge-primary">Kapak resmi yap</a>
										
									<a href="{{url('/panel/projects/edit/delimg/'.$projects->id.'/'.$key)}}" class="badge badge-danger">Sil</a>
									@endif
									
								</div>
							
								
								
						</div>
						@endforeach

					</div>
				</div>
				<div class="form-group">
					<div class="custom-file">


						<div class="col-md-3">

							
							
							<input  type="file" id="customFile[]" multiple name="customFile[]" class="custom-file-input" >
							<label class="custom-file-label" for="customFile">Choose file</label>
						</div>	
					</div>
				</div>



				<div>
					<button type="submit" class="btn btn-red">Kaydet</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div id="modal01" class="modal post-img-modal" onclick="this.style.display='none'">
	<div class="kapsayici">
		<div class="modal-content">
			<span class="modal-kapat"><i class="fas fa-times-circle"></i></span>
		
				<img class="" id="img01" >
		
			
		</div>
	</div>
</div>
@endsection