@extends('/personal/layout')

@section('baslik','Kişisel Site Title')
@section('icerik')
<section id="s1">
	<div id="slider">
		<div class="dfn-center">
			<div class="container">
				<div class="row">
					<div class=" wow bounceInLeft"> 
						<h1 class="header-title">{{$personal[0]->name}}<strong class="yesil"></strong></h1>
						<div class="def01"><strong class="xy0">Software</strong><strong class="xy1">DEVELOPER</strong></div>
					</div>
				</div>
				<div class="row">
					<span class="minititle wow bounceInLeft">Bilgisayar Eğitmeni ve Bilgisayar Yazılımcısı</span>
				</div>
				<div class="row">
					<p class="header-subtitle">

					</p> 
				</div>
			</div>
		</div>
	</div>
</section>
<section id="s2">
	<div class="container">	
		<div class="row flex">
			<div class="stitle wow flipInX slow">
				<h3>HAKKIMDA</h3>
			</div>		
			<div class="vline"></div>
		</div>
		
		<div class="row  wow fadeIn slow" style="margin-top: 2vw;">	
			<div class="col-md-6">
				<div class="info center">					
					<img id="infoImg" src="{{asset('storage/img/usr/'.$personal[0]->img) }}" alt="{{$personal[0]->img}}"/>
						
				</div>

				<div class="info center">

					<p class="infoName">{{$personal[0]->name}}</p>
					<p class="infoDef">Freelancer Full-stack yazılım geliştirmecisiyim.</p>
				</div>
			</div>
			
			<div class="col-md-6">
				<div class="ability">
					@foreach($abilities as $ability)					
					<div class="p-bar wow fadeInLeft slow">
						<label class="txt">{{$ability->name}}</label>
						<div class="progress ">
							<div class="progress-bar" role="progressbar" style="width: {{$ability->rate}}%" aria-valuenow="{{$ability->rate}}" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
						@endforeach
					</div>					
				</div>
			</div>		
		</div>		
	</div>
</section>
<section id="s3" class="bg-light">
	<div class="container ">

		<div class="row flex">
			<div class="stitle wow flipInX slow">
				<h3>PROJELERİM</h3>
			</div>		
			<div class="vline"></div>
		</div>
		
		
		<div class="row">
			<div class="col-lg-12">
				<div class="projects">
					<div class="row flex">
						<nav class="nav-project">
							<div class="nav nav-tabs" id="nav-tab" role="tablist">
								<a class="nav-item nav-link active" id="nav-web-tab" data-toggle="tab" href="#nav-web" role="tab" aria-controls="nav-web" aria-selected="true">Web</a>
								<a class="nav-item nav-link" id="nav-desktop-tab" data-toggle="tab" href="#nav-desktop" role="tab" aria-controls="nav-desktop" aria-selected="false">Masaüstü</a>
								<a class="nav-item nav-link" id="nav-mobile-tab" data-toggle="tab" href="#nav-mobile" role="tab" aria-controls="nav-mobile" aria-selected="false">Mobil</a>
							</div>
						</nav>
					</div>
					<div class="row center">
						<div class="tab-content" id="nav-tabContent">
							<div class="tab-pane fade show active" id="nav-web" role="tabpanel" aria-labelledby="nav-web-tab">
								<div class="project-group"> 
									@foreach($projects as $project)	
									@if($project->type===1)
									<div onmouseover="testProje({{ $project->id }},event)" onmouseleave="testProje({{ $project->id }},event)" id="cp{{ $project->id }}" class="card-project col-lg-3 col-md-4 col-sm-6 col-xs-1 wow slideInUp">
										<div id="ph{{ $project->id }}" class="project-head">
											<h5>{{ $project->name }}</h5>
											<span>{{ $project->infrastructure}}</span>		
										</div>									
										<div id="pb{{ $project->id }}" class="project-body" >
											<img class="project-img" src="{{asset('storage/img/projects/'.$project->id.'/'.$project->coverimg ) }}" style="min-height: 250px;">
										</div>								
										<div id="pf{{ $project->id }}" class="project-footer">
											<a href="blog/project/'.seo({{ $project->id }}).'/'.seo({{ $project->name }})" class="btn-p-detail">Detay</a>
										</div>										
									</div> 	
									@endif									
									@endforeach


								</div>					  
							</div>
							<div class="tab-pane fade" id="nav-desktop" role="tabpanel" aria-labelledby="nav-desktop-tab">
								<div class="project-group"> 
									@foreach($projects as $project)	
									@if($project->type===2)
									<div onmouseover="testProje({{ $project->id }},event)" onmouseleave="testProje({{ $project->id }},event)" id="cp{{ $project->id }}" class="card-project col-lg-3 col-md-4 col-sm-6 col-xs-1 wow slideInUp">
										<div id="ph{{ $project->id }}" class="project-head">
											<h5>{{ $project->name }}</h5>
											<span>{{ $project->infrastructure}}</span>		
										</div>									
										<div id="pb{{ $project->id }}" class="project-body" >
											<img class="project-img" src="{{asset('storage/img/projects/'.$project->id.'/'.$project->coverimg ) }}" style="min-height: 250px;">
										</div>									
										<div id="pf{{ $project->id }}" class="project-footer">
											<a href="blog/project/'.seo({{ $project->id }}).'/'.seo({{ $project->name }})" class="btn-p-detail">Detay</a>
										</div>										
									</div> 	
									@endif									
									@endforeach							
								</div>									
							</div>
							<div class="tab-pane fade" id="nav-mobile" role="tabpanel" aria-labelledby="nav-mobile-tab">					  
								<div class="project-group"> 
									@foreach($projects as $project)	
									@if($project->type===3)
									<div onmouseover="testProje({{ $project->id }},event)" onmouseleave="testProje({{ $project->id }},event)" id="cp{{ $project->id }}" class="card-project col-lg-3 col-md-4 col-sm-6 col-xs-1 wow slideInUp">
										<div id="ph{{ $project->id }}" class="project-head">
											<h5>{{ $project->name }}</h5>
											<span>{{ $project->infrastructure}}</span>		
										</div>									
										<div id="pb{{ $project->id }}" class="project-body" >
											<img class="project-img" src="{{asset('storage/img/projects/'.$project->id.'/'.$project->coverimg ) }}" style="min-height: 250px;">
										</div>									
										<div id="pf{{ $project->id }}" class="project-footer">
											<a href="blog/project/'.seo({{ $project->id }}).'/'.seo({{ $project->name }})" class="btn-p-detail">Detay</a>
										</div>										
									</div> 	
									@endif									
									@endforeach							
								</div>	
							</div>
						</div>						
					</div>					
				</div>
			</div>
		</div>		
	</div>
</section>
<section id="s4" >
	<div class="container ">

		<div class="row flex">
			<div class="stitle wow flipInX slow">
				<h3>BLOG</h3>
			</div>		
			<div class="vline"></div>
		</div>		
		
		<div class="row">
			<div class="col-lg-12">
				<div class="blogs">
					<div class="card-group">
						@foreach($posts as $post)							
						<div class="card wow zoomIn">
							<a href="blog/post/'.seo({{ $post->id }}).'/'.seo({{ $post->title }}).'.php" style="">
								<img class="project-img" src="{{asset('storage/img/posts/'.$post->id.'/'.$post->coverimg ) }}">				
								
							</a>
							<div class="card-body">
								<h5 class="card-title">{{ $post->title }}</h5>
								<p class="card-text">{{ $post->abstract}}</p>
								<p class="card-text"><small class="text-muted">{{ date('j F Y', strtotime($post->date)) }}</small></p>
								
							</div>
						</div> 					
						@endforeach			
					</div>
				</div>
			</div>
		</div>
		
	</div>
</section>
@endsection