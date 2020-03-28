@section('pageright')
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
@endsection