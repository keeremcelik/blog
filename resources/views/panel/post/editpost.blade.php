@extends('/panel/layout')
@section('baslik','Panel index Title')
@section('icerik')
<div class="content">



	<div class="pageTitle">
		<div class="left">
			<h1 class="h1">Yazı Düzenle <small>Blog</small></h1>
		</div>
		<div class="right">
			<div class="pageBreadcrumb">
				<ul class="">
					<li class=""><a href="{{url('/panel/index')}}">Ana Sayfa</a></li>
					<li class=""><a href="{{url('/panel/posts/list')}}">Yazılar</a></li>
					<li class=""><a class="active" href="#">Yazı Düzenle</a></li>
				</ul>
			</div>
		</div>	

	</div>
	<div class="pageContent">			


		<div class="pageBody">
			<form action="#" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="category">Kategori </label>
					<select name="category" class="custom-select">
						<option value="0">Lütfen kategori seçiniz</option>
						@foreach($categories as $category)
						@if($posts->cat_id=== $category->id )
						<option value="{{$category->id}}" selected>{{$category->name}}</option>
						@else
						<option value="{{$category->id}}">{{$category->name}}</option>
						@endif
						@endforeach

					</select>
				</div>
				<div class="form-group">
					<label for="title">Başlık</label>
					<input class="form-control" name="title" type="text" value="{{$posts->title}}" placeholder="Yazının Başlığı">

				</div>
				<div class="form-group">
					<label for="abstract">Özet</label>
					<textarea class="form-control" name="abstract" rows="3">{{$posts->abstract}}</textarea>						
				</div>	
				<div class="form-group">
					<label for="content">Yazı</label>
					<textarea class="form-control ckeditor" name="content" rows="10">{{$posts->content}}</textarea>	

				</div>										
				<div class="form-group">
					<label for="keywords">Anahtar kelimeler</label>
					<input class="form-control" name="keywords" type="text" value="{{$posts->keywords}}"  placeholder="Anahtar Kelimeler">						
				</div>
				<div class="form-group">
					<div class="row">
						@foreach($images as $key => $value)
						<div class="col-lg-3 col-md-4 col-6">
							<a href="javascript:;" class="d-block">
								<img data-id="{{ $key}}" id="postImg" onclick="openImg(this)"  class="img-fluid img-thumbnail post-pic" src="{{asset('storage/img/posts/'.$value) }}"/>
								
							</a>

							

								<div class="imgsettings">
									@if($posts->coverimg == $value)
										<span class="badge badge-success"> Kapak resmi</span>
									@else

										<a href="{{url('/panel/posts/edit/coverimg/'.$posts->id.'/'.$key)}}" class="badge badge-primary">Kapak resmi yap</a>
										
									<a href="{{url('/panel/posts/edit/delimg/'.$posts->id.'/'.$key)}}" class="badge badge-danger">Sil</a>
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