@extends('/blog/layout')
@section('baslik','Blog Title')
@section('icerik')
<section id="s1">

	
			<div class="container">	
			<div class="row">	
				<div class="page-title">	
					<h1>Projeler</h1>
				</div>	
			</div>			
				<div class="row">
				
					<div class="blogBox col-xs-12 col-md-12">
					
						<div class="col-md-8">
							<div class="row">
						@foreach($projects as $project)
						<div class="col-md-6">
							<div class="post">
								<div class="post-box">
								<a href="{{url('/blog/projects/'.$project->id.'/'.$project->sef_url)}}" class="writer-name">
								
								<div class="project-img">
									<span class="cat">{{ $project->infrastructure }}</span>
									<img class="" src="{{asset('storage/img/projects/'.$project->id.'/'.$project->coverimg) }}"/>
								
									

								</div>
								<div class="">
									
									<h3 class="project-box-title ">
									{{ $project->name}}
										
									</h3>
									</div>
								</a>
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