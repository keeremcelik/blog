@extends('/panel/layout')
@section('baslik','Panel index Title')
@section('icerik')
	<div class="content">
			
			
			
			<div class="pageTitle">
				<div class="left">
					<h1 class="h1">Yeni Proje Oluştur <small>Blog</small></h1>
				</div>
				<div class="right">
					<div class="pageBreadcrumb">
						<ul class="">
							<li class=""><a href="{{url('/panel')}}">Ana Sayfa</a></li>
							<li class=""><a href="{{url('/panel/projects/list')}}">Projeler</a></li>
							<li class=""><a class="active" href="#">Yeni Proje Oluştur</a></li>
						</ul>
					</div>
				</div>	
				
			</div>
				<div class="pageContent">			
				
					<div class="pageBody">
					<form action="{{url('/panel/projects/new')}}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label for="type">Tür </label>
							<select name="type" class="custom-select">
								<option value="0">Lütfen tür seçiniz</option>								
								<option value="1">Web</option>						
								<option value="2">Masaüstü</option>						
								<option value="3">Mobil</option>								
							</select>
						</div>
						<div class="form-group">
					<label for="name">Proje Adı</label>
					<input class="form-control" name="name" type="text"  placeholder="Projenin adı">
					
				</div>							
				<div class="form-group">
					<label for="content">İçerik</label>
					<textarea class="form-control ckeditor" name="content" rows="10"></textarea>	
												
				</div>	
				<div class="form-group">
					<label for="infrastructure">Kullanılan Diller</label>
					<input class="form-control" name="infrastructure"  type="text"  placeholder="HTML / CSS, C# / MSSQL, PHP vb.">
					
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