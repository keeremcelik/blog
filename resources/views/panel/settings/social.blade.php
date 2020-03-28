@extends('/panel/layout')
@section('baslik','Panel index Title')
@section('icerik')
<div class="content">

	<div class="pageTitle">
		<div class="left">
			<h1 class="h1">Sosyal Hesap Ayarları <small>Blog</small></h1>
		</div>
		<div class="right">
			<div class="pageBreadcrumb">
				<ul class="">
					<li class=""><a href="{{url('/panel/index')}}">Ana Sayfa</a></li>
					<li class=""><a class="active" href="#">Sosyal Hesaplar</a></li>
				</ul>
			</div>
		</div>	

	</div>
	<div class="pageContent">						
		<div class="pageBody">
			<form action="{{url('/panel/settings/social')}}" method="POST">
				@csrf
				<div class="form-group">
					<label for="facebook">Facebook Adresi</label>
					<input class="form-control" name="facebook" type="text" placeholder="Facebook adresi giriniz" value="{{$social->facebook}}" >
				</div>
				<div class="form-group">
					<label for="twitter">Twitter Adresi</label>
					<input class="form-control" name="twitter" type="text" placeholder="Twitter adresi giriniz" value="{{$social->twitter}}" >					
				</div>	
				<div class="form-group">
					<label for="instagram">Instagram Adresi</label>
					<input class="form-control" name="instagram" type="text" placeholder="Instagram adresi giriniz" value="{{$social->instagram}}" >					
				</div>		
				<div class="form-group">
					<label for="github">Github Adresi</label>
					<input class="form-control" name="github" type="text" placeholder="Github adresi giriniz" value="{{$social->github}}" >					
				</div>	
				<div class="form-group">
					<label for="linkedin">Linkedin Adresi</label>
					<input class="form-control" name="linkedin" type="text" placeholder="Linkedin adresi giriniz" value="{{$social->linkedin}}" >						
				</div>
				<div class="form-group">
					<label for="youtube">Youtube Adresi</label>
					<input class="form-control" name="youtube" type="text" placeholder="Youtube adresi giriniz" value="{{$social->youtube}}" >					
				</div>
				<div class="form-group">
					<label for="google">Google Adresi</label>
					<input class="form-control" name="google" type="text" placeholder="Google adresi giriniz" value="{{$social->google}}" >					
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