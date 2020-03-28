@extends('/panel/layout')
@section('baslik','Panel index Title')
@section('icerik')
<div class="content">

	<div class="pageTitle">
		<div class="left">
			<h1 class="h1">Kişisel Bilgiler Ayarları <small>Blog</small></h1>
		</div>
		<div class="right">
			<div class="pageBreadcrumb">
				<ul class="">
					<li class=""><a href="{{url('/panel/index')}}">Ana Sayfa</a></li>
					<li class=""><a class="active" href="#">Kişisel Bilgiler</a></li>
				</ul>
			</div>
		</div>	

	</div>
	<div class="pageContent">						
		<div class="pageBody">
			<form action="{{url('/panel/settings/personal')}}" method="POST">
				@csrf
				
				<div class="form-group">
					<label for="name">Ad Soyad</label>
					<input class="form-control" name="name" type="text" placeholder="Adınızı ve soyadınızo giriniz" value="{{$personal->name}}" >
				</div>
				<div class="form-group">
					<label for="degree">Ünvan</label>
					<input class="form-control" name="degree" type="text" placeholder="Ünvanınızı giriniz" value="{{$personal->degree}}" >					
				</div>	
				<div class="form-group">
					<label for="email">Eposta Adresi</label>
					<input class="form-control" name="email" type="text" placeholder="Eposta adresi giriniz" value="{{$personal->email}}" >					
				</div>		
				<div class="form-group">
					<label for="phone">Telefon Numarası</label>
					<input class="form-control" name="phone" type="text" placeholder="Telefon numaranızı giriniz" value="{{$personal->phone}}" >					
				</div>	
				<div class="form-group">
					<label for="address">Adres</label>
					<textarea class="form-control" name="address" rows="3">{{$personal->address}}</textarea>		
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