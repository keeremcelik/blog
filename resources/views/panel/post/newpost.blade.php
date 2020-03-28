@extends('/panel/layout')
@section('baslik','Panel index Title')
@section('icerik')
	<div class="content">
			
			
			
			<div class="pageTitle">
				<div class="left">
					<h1 class="h1">Yeni Yazı Oluştur <small>Blog</small></h1>
				</div>
				<div class="right">
					<div class="pageBreadcrumb">
						<ul class="">
							<li class=""><a href="{{url('/panel/index')}}">Ana Sayfa</a></li>
								<li class=""><a href="{{url('/panel/posts/list')}}">Yazılar</a></li>
							<li class=""><a class="active" href="#">Yeni Yazı</a></li>
						</ul>
					</div>
				</div>			
			</div>
				<div class="pageContent">			
				
					<div class="pageBody">
					<form action="{{url('/panel/posts/new')}}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label for="category">Kategori </label>
							<select name="category" class="custom-select">
								<option value="0">Lütfen kategori seçiniz</option>
								@foreach($categories as $category)
									<option value="{{$category->id}}">{{$category->name}}</option>
								@endforeach
								
							</select>
						</div>
						<div class="form-group">
							<label for="title">Başlık</label>
							<input class="form-control" name="title" type="text"  placeholder="Yazının Başlığı">
							
						</div>
						<div class="form-group">
							<label for="abstract">Özet</label>
							<textarea class="form-control" name="abstract" rows="3"></textarea>						
						</div>	
						<div class="form-group">
							<label for="content">Yazı</label>
							<textarea class="form-control ckeditor" name="content" rows="10"></textarea>	
														
						</div>										
						<div class="form-group">
							<label for="keywords">Anahtar kelimeler</label>
							<input class="form-control" name="keywords" type="text" placeholder="Anahtar Kelimeler">						
						</div>
						<div class="form-group">
							<div class="custom-file">
								@if (count($errors) > 0)
								<div class="alert alert-danger">
									<strong>Whoops!</strong> There were some problems with your input.<br><br>
									<ul>
										@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
								@endif					
								<input type="file" id="customFile" name="customFile[]" class="custom-file-input" multiple >
								<label class="custom-file-label" for="customFile">Choose file</label>
							</div>
						</div>
						<div class="form-group">
						
							<button type="submit" class="btn btn-red">Kaydet</button>
						
						</div>
						
					</form>
				</div>
				</div>
				<div class="pageFooter"></div>
			</div>
@endsection