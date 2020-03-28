@extends('/blog/layout')
@section('baslik','Blog Title')
@section('icerik')
<section id="s1">
	<div class="container">	
		<div class="row">	
				<div class="page-title">	
					<h1>{{$category[0]->name}}</h1>
				</div>	
			</div>
		<div class="row">	
			
			<div class="blogBox col-xs-12 col-md-12">
				<div class="col-md-8">
				<div class="row">
				
					@foreach($posts as $post)	
						<div class="col-md-6">
						<div class="post">
								<div class="post-box">								
								
								<div class="post-img">
										<a href="{{url('/blog/post/'.$post->id.'/'.$post->sef_url)}}" class="">
									<span class="cat">{{ $post->category->name }}</span>
								
										<img class="" src="{{asset('storage/img/posts/'.$post->id.'/'.$post->coverimg) }}"/>
									</a>
								</div>
								<div class="">
									
									<h3 class="post-box-title ">
									
										{{ $post->title }}
										
									</h3>
									
									<div class="post-box-text text-justify">
										<p>
										{{ $post->abstract }}
										</p>
									</div>
									<div class="post-box-subtitle">
									
									</div></div>
								</div>
							</div>
							</div>
					@endforeach			
				</div>
				</div>
				<div class="pageRight col-md-4">
					<div class="writers">
						<h4>Yazarlar</h4>

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
						<h4>Kategoriler</h4>
						<ul>						
						@foreach($categories as $category)	
							<li><a href="{{url('/blog/category/'.$category->id.'/'.$category->sef_url)}}"><i class="fas fa-chevron-right"></i> {{$category->name}}</a></li>
						@endforeach
						</ul>
					</div>
					
				</div>

			</div>

		</div>
	</div>

	
			
    </section>

@endsection