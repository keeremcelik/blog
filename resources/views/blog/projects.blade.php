@extends('/blog/layout')
@section('baslik','Blog Title')
@section('icerik')
<section id="s1">	
	<div class="container-fluid">	

		<div class="row">

			<div class="blogBox col-xs-12 col-md-12">						
				<div class="col-md-8">
					<div class="row">
								<div class="post">
						<div class="post-box">

							<div class="post-box-img">	
								<img src="{{asset('storage/img/projects/'.$projects->coverimg) }}">
							</div>									
							<div class="post-box-desc">										

								<div class="text_detail" >		
									<span class="head">
										<i class="fas fa-heading"></i>
									</span>
									<span class="date">
										<i class="far fa-calendar-alt"></i> 	
											{{ date('j F Y', strtotime($projects->date)) }}
									</span>	
									<span class="writer">
										<i class="fas fa-user"></i>	
										Kerem ÇELİK
									</span>	
									<span class="read">
										<i class="far fa-eye"></i>
										{{$projects->hit}}
									</span>						
								</div>	
								<div class="writer-desc" >
									<h1 class="post-box-title">
											{{$projects->name}}										
									</h1>
								</div>										
							</div>
							<div class="post-box-text">
								<p>
									{!! $projects->content !!}
								</p>
							</div>
							<div class="post-box-pics">
								<div class="row">
									@foreach($images as $image)
									<div class="col-lg-3 col-md-4 col-6">
										<a href="javascript:;" class="d-block mb-4 h-100">
											<img id="postImg" onclick="openImg(this)"  class="img-fluid img-thumbnail post-pic" src="{{asset('storage/img/projects/'.$projects->id.'/'.$image) }}"/>
										</a>
									</div>
									@endforeach
								</div>
							</div>
							<div class="post-box-keywords">				
								@foreach(explode(',',$projects->keywords) as $keyword)
								<span class="badge badge-keywords">{{$keyword}}</span>
								@endforeach
							</div>
						</div>
					</div>
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
							<li><a href="{{url('/blog/category/'.$category->id.'/'.$category->sef_url)}}"><i class="fas fa-chevron-right"></i> {{$category->name}}</a></li>
						@endforeach
						</ul>
					</div>
					
				</div>

			</div>

		</div>
	</div>
</section>
<section id="s2" >
	<div class="container">
		<div class="row">

			<div class="otherpost">
				<div class="page-subtitle">
					<h2>Benzer Gönderiler</h2>
				</div>
				<div class="card-group" >
					@foreach($otherprojects as $otherproject)
					<div class="card">
						<a href="{{url('/blog/project/'.$otherproject->id.'/'.$otherproject->sef_url)}}">
							<img class="card-img-top cpimg" src="{{asset('storage/img/projects/'.$otherproject->id.'/'.$otherproject->coverimg) }}"/>
							<div class="card-body">
								<h5 class="card-title">{{$otherproject->name}}</h5>		
							</div>
						</a>
						
					</div>
					@endforeach



				</div>
			</div>
		</div>
	</div>
</section>
<div id="modal01" class="modal post-img-modal" onclick="this.style.display='none'">
	<div class="kapsayici">
		<div class="modal-content">
			<span class="modal-kapat"><i class="fas fa-times-circle"></i></span>
			<img class="" id="img01">
		</div>
	</div>
</div>
@endsection