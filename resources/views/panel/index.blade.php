@extends('/panel/layout')
@section('baslik','Panel index Title')
@section('icerik')


	<div class="content">
		<div class="pageTitle">
			<div class="left">
				<h1 class="h1">Ana Sayfa <small>İstatistikler</small></h1>
			</div>
			<div class="right">
				<div class="pageBreadcrumb">
					<ul class="">
						<li class=""><a href="#">Ana Sayfa</a></li>
					</ul>
				</div>
			</div>

		</div>
		<div class="container-fluid ">
			<div class="row">
				<div class="alert alert-info col-md-12" role="alert">
					Admin Panel v1.0 tamamlanmıştır.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="info-box">
						<span class="info-box-icon bg-primary"><i class="fas fa-pen"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Yazılar</span>
							<span class="info-box-number">{{$countpost}}</span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="info-box">
						<span class="info-box-icon bg-success"><i class="fas fa-code"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Projeler</span>
							<span class="info-box-number">{{$countproject}}</span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="info-box">
						<span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Mesajlar</span>
							<span class="info-box-number">{{$countmails}}</span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="info-box">
						<span class="info-box-icon bg-warning"><i class="far fa-comments"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Yorumlar</span>
							<span class="info-box-number">{{$countcomment}}</span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12">	
					<div class="box">	
						<div class="box-header">	
							<i class="fas fa-comments"></i>	
							<h3 class="box-title"> Yorumlar</h3>

						</div>
						<div class="comment-box">	
						@foreach($comments as $comment)
						<div class="comment">	
							<i class="user-img fas fa-user"></i>
							<p class="message">
								<strong class="name">{{$comment->name}}<small class="text-muted right"><i class="fa fa-clock-o"></i>{{$comment->date}}</small></strong>
								{{$comment->content}}
							</p>
						</div>
						@endforeach
						</div>
						<div class="box-footer">	
							<a href="{{url('/panel/comments/list')}}" class="">Tüm Yorumları Görüntüle</a>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-12 col-xs-12">	
					<div class="box">	
						<div class="box-header">	
							<i class="fas fa-envelope"></i>	
							<h3 class="box-title"> Mailler</h3>

						</div>
						<div class="comment-box">	
						@foreach($mails as $mail)
						<div class="comment">	
							<i class="user-img fas fa-user"></i>
							<p class="message">
								<strong class="name">{{$mail->name}}<small class="text-muted right"><i class="fa fa-clock-o"></i>{{$mail->date}}</small></strong>
								{{$mail->subject}}
							</p>
						</div>
						@endforeach
								
						</div>

						<div class="box-footer">	
							<a href="{{url('/panel/mails/list')}}" class="">Tüm Mailleri Görüntüle</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">	
					<div class="box">	
						<div class="box-header">	
							<i class="fas fa-code"></i>	
							<h3 class="box-title"> Paylaşımlar</h3>

						</div>

						<div class="post-box">
						@foreach($posts as $post)	
							<div class="post">	
								<img class="" src="{{asset('storage/img/posts/'.$post->id.'/'.$post->coverimg) }}"/>
								<p class="text">
									<strong class="title">{{$post->title}}<small class="text-muted right"><i class="fa fa-clock-o"></i> 2:15</small></strong>
									{{$post->abstract}}
								</p>
							</div>
						@endforeach

						</div>
						<div class="box-footer">	
							<a href="{{url('/panel/posts/list')}}" class="">Tüm Paylaşımları Görüntüle</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="pageFooter"></div>
	</div>

@endsection