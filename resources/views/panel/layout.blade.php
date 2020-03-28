<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta id="_base_url" name="_base_url" content="{{ url('/') }}">
	    <meta name="csrf-token" content="{{ csrf_token() }}" />
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}" >
	   <script src="{{URL::asset('js/jquery-3.4.1.min.js')}}" ></script>
	<link rel="stylesheet" href="{{URL::asset('css/all.min.css')}}" >
	<link rel="stylesheet" href="{{URL::asset('css/sidebar.css')}}" >
	<script type="text/javascript" src="{{URL::asset('ckeditor/ckeditor.js')}}"></script>

	
	<title>@yield('baslik')</title>
</head>
<body>	
	<div id="wrapper" class="d-flex">	
		@section('sidebar')
		<div id="sidebar">
			<div class="sidebar-content">	
				<div class="sidebar-head">
					<div class="sidebar-logo"><i class="fas fa-user"></i></div>
				</div>
				<ul class="">
					<li class="sidebar-search">						
						<div class="input-group input-group-sm mb-3">	  
							<input type="text" class="form-control search" aria-label="Sizing example input" placeholder="Arama" aria-describedby="inputGroup-sizing-sm">
						</div>
					</li>
					<li class="sidebar-title ">
						<a class="active" href="{{url('/panel/index')}}">
							<i class="fas fa-tachometer-alt"></i>
							<span>Ana Sayfa</span>				
						</a>

					</li>			
					<li class="sidebar-dropdown">
						<a href="javascript:;">
							<i class="fas fa-pen"></i>
							<span>Blog</span>				
						</a>
						<div class="sidebar-submenu">
							<ul>
								<li><a class="sidebar-link " href="{{url('/panel/posts/new')}}">Yeni Yazı</a></li>
								<li><a class="sidebar-link" href="{{url('/panel/posts/list')}}">Yazıları Görüntüle</a></li>						
							</ul>
						</div>
					</li>	
					<li class="sidebar-dropdown">
						<a href="javascript:;">
							<i class="far fa-file-code"></i>
							<span>Projeler</span>				
						</a>
						<div class="sidebar-submenu">
							<ul>
								<li> <a class="sidebar-link" href="{{url('/panel/projects/new')}}">Yeni Proje</a></li>
								<li> <a class="sidebar-link" href="{{url('/panel/projects/list')}}">Projeleri Görüntüle</a></li>						
							</ul>
						</div>
					</li>
					<li class="sidebar-dropdown">
						<a href="javascript:;">
							<i class="far fa-comments"></i>
							<span>Yorumlar</span>				
						</a>
						<div class="sidebar-submenu">
							<ul>
								<li> <a class="sidebar-link" href="{{url('/panel/comments/list')}}">Yorum işlemleri</a></li>					
							</ul>
						</div>
					</li>

					<li class="sidebar-dropdown">
						<a href="javascript:;">
							<i class="fas fa-people-carry"></i>
							<span>Diğer</span>				
						</a>
						<div class="sidebar-submenu">
							<ul>
								<li> <a class="sidebar-link" href="{{url('/panel/categories/list')}}">Kategori işlemleri</a></li>
								<li> <a class="sidebar-link" href="{{url('/panel/abilities/list')}}">Yetenek işlemleri</a></li>					
							</ul>
						</div>
					</li>
					<li class="sidebar-dropdown">
						<a href="javascript:;">
							<i class="fas fa-sliders-h"></i>
							<span>Ayarlar</span>				
						</a>
						<div class="sidebar-submenu">
							<ul>

								<li> <a class="sidebar-link" href="{{url('/panel/settings/social')}}">Sosyal Hesaplar</a></li>
								<li> <a class="sidebar-link" href="{{url('/panel/settings/personal')}}">Kişisel Bilgiler</a></li>	
							</ul>
						</div>
					</li>



				</ul>
			</div>
			<div class="sidebar-footer">
				<a href="#">
					<i class="fa fa-bell text-light"></i>
					<span class="badge badge-pill badge-warning notification">0</span>
				</a>
				<a href="{{URL::to('/panel/messages/list')}}">
					<i class="fa fa-envelope text-info"></i>
					<span class="badge badge-pill badge-success notification"></span>
				</a>
				<a href="{{URL::to('/panel/settings/general')}}">
					<i class="fa fa-cog text-success"></i>
					<span class="badge-sonar"></span>
				</a>
				<a href="{{URL::to('/panel/logout')}}">
					<i class="fa fa-power-off text-danger"></i>
				</a>
			</div>
		</div>
		<div class="" id="page-content">
			<div class="header">
				<nav class="navbar navbar-expand-lg">
					<button class="btn menu-toggle" onclick="sidebarToggle();" id="">☰</button>						
					<div class="navbar-right">						
					</div>
				</nav>
			</div>
			@yield('icerik')	
		</div>		
	</div>
</body>
@extends('/panel/footer')
</html>