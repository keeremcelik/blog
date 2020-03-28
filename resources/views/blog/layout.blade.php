<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	
	
	<link rel="stylesheet" href="{{URL::asset('css/all.min.css')}}" >
	<link rel="stylesheet" href="{{URL::asset('css/contact.css')}}" >
	<link rel="stylesheet" href="{{URL::asset('css/footer.css')}}" >
	<link rel="stylesheet" href="{{URL::asset('css/blog.css')}}" >
	
	<title>@yield('baslik')</title>
</head>
<body id="body">
	<div class="header">
		

		<header>
			<div class="dd31ss"></div>
			<nav class="nav nav-open navbar-k" id="navbar-k">		
				<div class="container" >
					<div class="navTop">
						<div class="nav-left">
							<a href="{{url('/blog')}}" class="logo">KEREM ÇELİK</a>    
						</div>
						<div id="nav-right" class="nav-right">

							<a href="javascript:;" class="nav-icon" id="nav-icon"  onclick="menuFunc()" >
								<i class="fa fa-bars"></i>
							</a>
						</div>
					</div>
				</div>
			</nav>
		</header>
	</div>
	<div id="menu" class="menu">
		<div class="container d-flex">
			<div class="category">
				<ul class="mul">
					<li class="mli"><a href="{{url('/blog')}}" class="">Ana Sayfa</a></li>
					<li class="mli">
						<a class="collapsed" href="#ctg" data-toggle="collapse">Kategoriler 
							<span class="caret"></span></a>
							<ul class="ctgul collapse" id="ctg">
							@foreach($categories as $category)
						<li class="mli" data-parent="#ctg"><a href="{{url('/blog/category/'.$category->id.'/'.$category->sef_url)}}">{{$category->name}}</a></li>
						@endforeach
							</ul>
						</li> 

						

						<li class="mli"><a href="{{url('/blog/project')}}" class="">Projeler</a></li>
						<li class="mli"><a href="{{url('/blog/contact')}}" class="">İletişim</a>   </li>
					</ul>

				</div>
			</div>





		</div>

		<main id="main" role="main">
			<div class="container">
				@yield('icerik')			
			</div>
			@extends('/blog/footer')


		</body>
		</html>