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
				@foreach($random as $key => $value)
				<div class="box">								
					<a href="{{url('/blog/post/'.$value->id.'/'.$value->sef_url)}}" class="">
						<div class="box-img mb-2">
							<img class="" src="{{asset('storage/img/posts/'.$value->coverimg) }}"/>
						</div>
						<div class="box-body">

							<h3 class="box-title h3 font-weight-bold font-italic">
								{{$value->title}}
							</h3>
							<div class="box-text">
								<p>
									{{$value->abstract}}
								</p>
							</div>
							<div class="box-subtitle">
							</div>
						</div>								
					</a>
				</div>
				@endforeach				
			</div>
			<div class="col-mid col-md-6">
				<div class="row ">
					<div class="pageBreadcrumb">
						<ul class="">
							<li class=""><a href="#">Ana Sayfa</a></li>
							<li class=""><a class="active" href="#">{{$category->name}}</a></li>
							
						</ul>
					</div>
				</div>
				<div class="row">

					@foreach($last as $key => $value)
					<div class="xbox">	
						<a href="{{url('/blog/post/'.$value->id.'/'.$value->sef_url)}}" class="">
							<div class="box-img mb-2">

								<img class="" src="{{asset('storage/img/posts/'.$value->coverimg) }}"/>

							</div>
							<div class="box-body">
								<h3 class="box-title h3 font-weight-bold ">
									{{$value->title}}
								</h3>
								<div class="box-text">
									<p>
										{{$value->abstract}}
									</p>
								</div>
							</div>								
						</a>					
					</div>
					@endforeach


				</div>
				<div class="row ">
					@foreach($other as $key => $value)
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

						@foreach($posts as $key => $value)
				
				<div class="lastbox">								
						<div class="box-img col-md-4">
							<a href="{{url('/blog/post/'.$value->id.'/'.$value->sef_url)}}" class="">	
						
						<img class="" src="{{asset('storage/img/posts/'.$value->coverimg) }}"/>
						
						</div>
						<div class="box-body col-md-8">
						<h3 class="box-title font-weight-bold">
						{{$value->title}}
						</h3>					

						</div>								
						</a></div>
					@endforeach

					
				</div>
			</div>		
		</div>
	</div>
</section>


	@endsection