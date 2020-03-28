@extends('/blog/layout')
@section('baslik','Blog Title')
@section('icerik')
<!--<section id="s1">
	<div class="container">	
		<div class="row" >
			<div class="blogBox col-xs-12 col-md-12">
				<div class="content">
					<div class="bloggerBox">	
						<div class="img">
							<img src="{{asset('storage/img/usr/'.$personal[0]->img) }}" alt="{{$personal[0]->img}}"/>
						</div>							
						<div class="detail">						
							<div class="title">						
								<h1>Kerem ÇELİK</h1>
							</div>
							<div class="desc">						
								<p>Kerem ÇELİK 1996 yılında Kocaeli'de Doğdu. Çanakale onsekiz mart üniversitesi Bilgisayar ve Öğretim Teknolojileri Öğretmenliği bölümünden 2018 yılında mezun oldu.</p>
								<div class="social">	
									<div class="title_line">
										<h4>Sosyal Medya</h4>	
									</div>
									@foreach($socials as $social)									
									<a href="{{ $social->facebook }}" target="_blank"><i class="fab fa-facebook-square"></i></a>
									<a href="{{ $social->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
									<a href="{{ $social->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
									<a href="{{ $social->linkedin }}" target="_blank"><i class="fab fa-linkedin"></i></a>
									<a href="{{ $social->github }}" target="_blank"><i class="fab fa-github"></i></a>
									<a href="{{ $social->google }}" target="_blank"><i class="fab fa-google"></i></a>
									<a href="{{ $social->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a>		
									@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>	
		</div>
	</div>
</section>-->

<section id="s1">

	<div class="container">	
		
		<div class="row">		
			


			<div class="blogBox col-xs-12 col-md-12">
				
				<div class="col-md-8">
					<div class="row">
						<div class="slider col-md-12">

							<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
								<ol class="carousel-indicators">
									<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
									<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
									<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
									<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
									<li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
								</ol>
								<div class="carousel-inner">
									
									@foreach($manset as $key => $value)

									<div class="carousel-item
									@if($key==1)
									active
									@endif
									">
										<img class="d-block" src="{{asset('storage/img/posts/'.$value->coverimg) }}" alt="Second slide">
										
									</div>
									@endforeach
									
									
								</div>
								<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
						</div>
					</div>
					<div class="title_line">						
						<h4>Bazı Makaleler</h4>
						</div>
					<div class="row">
						@foreach($posts as $post)	
						<div class="col-md-6">
							<div class="post">
								<div class="post-box">								

									<div class="post-img">
										<a href="{{url('/blog/post/'.$post->id.'/'.$post->sef_url)}}" class="">
											<span class="cat">{{ $post->category->name }}</span>

											<img class="" src="{{asset('storage/img/posts/'.$post->coverimg) }}"/>
										</a>
									</div>
									<div class="">

										<h3 class="post-box-title ">

											{{ $post->title }}

										</h3>

										<div class="post-box-text">
											<p>
												{{ $post->abstract }}
											</p>
										</div>
										<div class="post-box-subtitle">

										</div>
									</div>
								</div>
							</div>
						</div>
						@endforeach			
					</div>
				</div>
				<div class="pageRight col-md-4">
					<div class="writers">
						<div class="title_line">
						
						<h4>Yazarlar</h4>
						</div>

						<div class="writer">
							<div class="img">
								<img src="{{asset('storage/img/usr/'.$personal[0]->img) }}" />
							</div>
							<div class="detail">
								<h5>{{$personal[0]->name }}</h5>							
								<span>Software Developer</span>
							</div>


						</div>
					</div>
					<div class="categories">
						<div class="title_line">
						
							<h4>Kategoriler</h4>
						</div>
						<ul>						
							@foreach($categories as $category)	
							<li><a href="{{url('/blog/category/'.$category->id.'/'.$category->sef_url)}}"> {{$category->name}}</a></li>
							@endforeach
						</ul>
					</div>
					
				</div>

			</div>

		</div>
	</div>
</section>

@endsection