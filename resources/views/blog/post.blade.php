@extends('/blog/layout')
@section('baslik','Blog Title')
@section('icerik')

<section id="s1">
	<div class="container-fluid">			
		<div class="row">	
			<div class="col-head ">	
				
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
							<li class=""><a href="#" class="active">	{{$post->title}}</a></li>
							
						</ul>
					</div>
				</div>
				<div class="row">
					
					<div class="xbox col-xs-12 br-b col-md-12">						
						<div class="post">
							<div class="post-box">
								<h1 class="post-box-img">
											<img src="{{asset('storage/img/posts/'.$post->coverimg) }}">
									
								</h1>
								<div class="post-box-desc">
									<div class="text_detail" >		
										<span class="head">
											<i class="fas fa-heading"></i>
										</span>
										<span class="date">
											<i class="far fa-calendar-alt"></i> 	
										{{ date('j/F/Y', strtotime($post->date)) }} 
										</span>	
										<span class="writer">
											<i class="fas fa-user"></i>	
											Kerem ÇELİK
										</span>	
										<span class="read">
											<i class="far fa-eye"></i>
											{{$post->hit}}
										</span>						
									</div>											
								</div>
								<div class="writer-desc" >
									<h1 class="post-box-title">
										{{$post->title}}									
									</h1>
								</div>
								<div class="post-box-text">
									<p>
									{!! $post->content !!}
									</p>
								</div>
								<div class="post-box-pics">
									<div class="row">
										@foreach($images as $image)
									<div class="col-lg-3 col-md-4 col-6">
										<a href="javascript:;" class="d-block mb-4 h-100">
											<img id="postImg" onclick="openImg(this)"  class="img-fluid img-thumbnail post-pic" src="{{asset('storage/img/posts/'.$post->id.'/'.$image) }}"/>
										</a>
									</div>
									@endforeach
									</div>
								</div>
								<div class="post-box-keywords">
										@foreach(explode(',',$post->keywords) as $keyword)
								<span class="badge badge-keywords">{{$keyword}}</span>
								@endforeach
									
									
								</div>
							</div>
						</div>
						
						
						
					</div>
					
				</div>
				<div class="row ">

						@foreach($others as $key => $value)
					@if($key!=0)
					<div class="otherbox col-md-6">								
							<a href="{{url('/blog/post/'.$value->id.'/'.$value->sef_url)}}" class="">
						<div class="box-img mb-2">
								<img class="" src="{{asset('storage/img/posts/'.$value->coverimg) }}"/>
						
						</div>
						<div class="box-body">
							<h3 class="box-title font-weight-bold ">
								{{$value->title}}
							</h3>
							
							<div class="box-subtitle">
							</div>
						</div>								
						</a></div>
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

<div id="modal01" class="modal post-img-modal" onclick="this.style.display='none'">
	<div class="kapsayici">
		<div class="modal-content">
			<span class="modal-kapat"><i class="fas fa-times-circle"></i></span>
			<img class="" id="img01">
		</div>
	</div>
</div>
@endsection