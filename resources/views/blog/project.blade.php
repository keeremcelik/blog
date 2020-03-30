@extends('/blog/layout')
@section('baslik','Blog Title')
@section('icerik')
<section id="s1">
	<div class="container-fluid">			
		<div class="row">	
			<div class="col-head">	
				
			</div>
		</div>
		<div class="row mt-4">	
			<div id="col-left" class="col-left br-r col-md-3">
				<div class="col-title">
					<h3 class="h4 font-weight-bold text-dark">ÖNERİLENLER</h3>
				</div>		
				@foreach($random as $r)
				<div class="box  br-b">								
					<a href="{{url('/blog/post/'.$r->id.'/'.$r->sef_url)}}" class="">
						<div class="box-img mb-2">

							<img class="" src="{{asset('storage/img/posts/'.$r->coverimg) }}"/>

						</div>
						<div class="box-body">
							<h3 class="box-title h3 font-weight-bold font-italic">
								{{$r->title}}
							</h3>
							<div class="box-text">
								<p>
									{{$r->abstract}}
								</p>
							</div>
							<div class="box-subtitle">
							</div>
						</div>								
					</a></div>
					@endforeach							
				</div>
			<div class="col-mid col-md-6">
				<div class="row ">
					<div class="pageBreadcrumb">
						<ul class="">
							<li class=""><a href="#">Ana Sayfa</a></li>
							<li class=""><a class="active" href="#">Projeler</a></li>
							
						</ul>
					</div>
				</div>
				<div class="row">

					@foreach($last as $key => $value)
					<div class="xbox">	
						<a href="{{url('/blog/projects/'.$value->id.'/'.$value->sef_url)}}" class="">
							<div class="box-img mb-2">

								<img class="" src="{{asset('storage/img/projects/'.$value->coverimg) }}"/>

							</div>
							<div class="box-body">
								<h3 class="box-title h3 font-weight-bold ">
									{{$value->name}}
								</h3>
								<div class="box-text">
									
								</div>
							</div>								
						</a>					
					</div>
					@endforeach


				</div>
				<div class="row ">
					@foreach($projects as $key => $value)
					@if($key!=0)
					<div class="otherbox col-md-6">		
				<a href="{{url('/blog/projects/'.$value->id.'/'.$value->sef_url)}}" class="">				
							<div class="box-img mb-2">


								<img class="" src="{{asset('storage/img/projects/'.$value->coverimg) }}"/>

							</div>
							<div class="box-body">
								<h3 class="box-title font-weight-bold ">
									{{$value->name}}
								</h3>
							</div>								
						</a>	
					</div>
					@endif
					@endforeach

					
					
				</div>
			</div>
				<div id="col-right" class="col-right br-l col-md-3">

					<div class="row bulten ml-1 mb-4">
						<div class="col-title">
							<h3 class="h4 font-weight-bold text-dark">BÜLTEN</h3>
						</div>			
						<div class="bultenbox">					
							<div class="bulten-body">						
								<input type="" name="">
								<button>Kayıt Ol</button>
							</div>								
						</div>
					</div>

					<div class="row last ml-1">	
						<div class="col-title">
							<h3 class="h4 font-weight-bold text-dark">SON PAYLAŞIMLAR</h3>
						</div>									

						@foreach($posts as $post)
						<div class="lastbox">								
							<div class="box-img col-md-4">
								<a href="{{url('/blog/post/'.$post->id.'/'.$post->sef_url)}}" class="">
									<img class="" src="{{asset('storage/img/posts/'.$post->coverimg) }}"/>
								</a>
							</div>
							<div class="box-body col-md-8">
								<a href="{{url('/blog/post/'.$post->id.'/'.$post->sef_url)}}" class="">
									<h3 class="box-title font-weight-bold">
										{{$post->title}}
									</h3>					
								</a>
							</div>								

						</div>
						@endforeach
					</div>
				</div>	
			</div>
		</div>
	</section>
	@endsection