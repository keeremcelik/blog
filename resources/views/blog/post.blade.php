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
								<img src="{{asset('storage/img/posts/'.$posts[0]->coverimg) }}">
							</div>									
							<div class="post-box-desc">										

								<div class="text_detail" >		
									<span class="head">
										<i class="fas fa-heading"></i>
									</span>
									<span class="date">
										<i class="far fa-calendar-alt"></i> 	
										{{ date('j F Y', strtotime($posts[0]->date)) }} 
									</span>	
									<span class="writer">
										<i class="fas fa-user"></i>	
										Kerem ÇELİK
									</span>	
									<span class="read">
										<i class="far fa-eye"></i>
										{{$posts[0]->hit}}
									</span>						
								</div>	
								<div class="writer-desc" >
									<h1 class="post-box-title">
										{{$posts[0]->title}}										
									</h1>
								</div>										
							</div>
							<div class="post-box-text">
								<p>
									{!! $posts[0]->content !!}
								</p>
							</div>
							<div class="post-box-pics">
								<div class="row">
									@foreach($images as $image)
									<div class="col-lg-3 col-md-4 col-6">
										<a href="javascript:;" class="d-block mb-4 h-100">
											<img id="postImg" onclick="openImg(this)"  class="img-fluid img-thumbnail post-pic" src="{{asset('storage/img/posts/'.$posts[0]->id.'/'.$image) }}"/>
										</a>
									</div>
									@endforeach
								</div>
							</div>
							<div class="post-box-keywords">				
								@foreach(explode(',',$posts[0]->keywords) as $keyword)
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
	<div class="container-fluid">					
		<div class="blogBox row">
			<div class="page-subtitle col-xs-12 col-md-8">
				<div class="title_line">
						
						<h4>Yorumlar</h4>
						</div>

			</div>	
			<div class="blogBox col-xs-12 col-md-8">

				<div class="content">
					
					<div class="comment-box">
						@foreach($comments as $comment)
						<div class="comment">
							<div class="comment-head">
								<div class="writer-img">
									<i class="fas fa-user-circle"></i>
								</div>
								<div class="writer-desc" >
									<span class="writer-name">{{$comment->name}}</span><br>
									<span class="date"><i class="far fa-calendar-alt"></i> {{ date('j F Y', strtotime($comment->date)) }}</span>
								</div>
							</div>										
							<div class="comment-text" >
								<p>{{$comment->content}}</p>
							</div>

						</div>

						@endforeach


						<div class="p-1r">
							<form id="commentForm" action="{{URL::to('/blog/post/'.$posts[0]->id.'/'.$posts[0]->sef_url.'/addcomment')}}" method="POST">
								@csrf
								<div class="form-group">
									<label for="name">Ad soyad</label>
									<input class="form-control form-control-sm" id="name" name="name" type="text" placeholder="Adınız">
								</div>
								<div class="form-group">
									<label for="comment">Yorumunuz</label>
									<textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
								</div>
								<div class="form-group pull-right">
									<button type="submit" id="kaydet" name="kaydet" class="btn btn-primary">Gönder</button>
								</div>

							</form>
						</div>
					</div>

				</div>

			</div>

		</div>
	</div>
</section>
<section id="s3" >
	<div class="container">
		<div class="row">

			<div class="otherpost">
				<div class="page-subtitle">
					<h2>Benzer Gönderiler</h2>
				</div>
				<div class="card-group" >
					@foreach($otherposts as $otherpost)
					<div class="card">
						<a href="{{url('/blog/post/'.$otherpost->id.'/'.$otherpost->sef_url)}}">
							<img class="card-img-top cpimg" src="{{asset('storage/img/posts/'.$otherpost->id.'/'.$otherpost->coverimg) }}"/>
							<div class="card-body">
								<h5 class="card-title">{{$otherpost->title}}</h5>
								<p class="card-abstract">{{$otherpost->abstract}}</p>		
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