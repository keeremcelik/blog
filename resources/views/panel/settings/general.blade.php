@extends('/panel/layout')
@section('baslik','Panel index Title')
@section('icerik')
<div class="content">

	<div class="pageTitle">
		<div class="left">
			<h1 class="h1">Genel Site Ayarları<small>Blog</small></h1>
		</div>
		<div class="right">
			<div class="pageBreadcrumb">
				<ul class="">
					<li class=""><a href="{{url('/panel/index')}}">Ana Sayfa</a></li>
					<li class=""><a class="active" href="#">Genel Site Ayarları</a></li>
				</ul>
			</div>
		</div>	

	</div>
	<div class="pageContent">						
		<div class="pageBody">
			<form action="{{url('/panel/settings/general')}}" method="POST">
				@csrf
				<div class="form-group">
					<label for="site_name">Site Adı</label>
					<input class="form-control" name="site_name" type="text" value="{{$ss->site_name}}" placeholder="Site Başlığı">
					<small class="form-text text-muted">Site'nin başlığını giriniz. Ör: Blog Sitesi</small>
				</div>
				<div class="form-group">
					<label for="title">Site Başlığı</label>
					<input class="form-control" name="title" type="text" value="{{$ss->title}}" placeholder="Site Başlığı">
					<small class="form-text text-muted">Site'nin başlığını giriniz. Ör: Blog Sitesi</small>
				</div>
				<div class="form-group">
					<label for="description">Site Açıklaması</label>
					<textarea class="form-control" name="description" rows="3">{{$ss->description}}</textarea>						
				</div>					
				<div class="form-group">
					<label for="keywords">Anahtar kelimeler</label>
					<input class="form-control" name="keywords" value="{{$ss->keywords}}" type="text" placeholder="Anahtar Kelimeler">						
				</div>
				<div class="form-group">
					<label for="googleid">Google ID</label>
					<input class="form-control" name="googleid" type="text" value="{{$ss->googleid}}" placeholder="Anahtar Kelimeler">		
					<small class="form-text text-muted">Site'nin google id'sini giriniz. Ör: UA-12345678-9</small>						
				</div>
				<div class="form-group">
					<label for="googlecode">Google takip kodu</label>
					<textarea class="form-control" name="googlecode" rows="3">{{$ss->googlecode}}</textarea>	
					<small class="form-text text-muted">Önemli : "script" etiketleri ile birlikte yazınız.</small>							
				</div>
				<div class="form-group">
					<label for="googlemap">Google takip kodu</label>
					<textarea class="form-control" name="googlemap" rows="3">{{$ss->googlemap}}</textarea>	
					<small class="form-text text-muted">Önemli : < iframe > kodunu yapıştırınız.</small>							
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