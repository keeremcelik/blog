@extends('/panel/layout')
@section('baslik','Panel index Title')
@section('icerik')
<div class="content">

	<div class="pageTitle">
		<div class="left">
			<h1 class="h1">Yetenekler <small>Blog</small></h1>
		</div>
		<div class="right">
			<div class="pageBreadcrumb">
				<ul class="">
					<li class=""><a href="{{url('/panel/index')}}">Ana Sayfa</a></li>
					<li class=""><a class="active" href="#">Yetenekler</a></li>
				</ul>
			</div>
		</div>	

	</div>


	<div class="optionbar">
		<div class="right"> 
			
<button type="button" class="btn btn-sm btn-red"  data-toggle="modal" data-target="#newabilitymodal" ><i class="fas fa-plus"></i> Yeni</button>
				
		</div>
	</div>
	<div class="pageContent">		

		<table id="tb_ability" class="table-responsive table">
			<thead class="thead-smoke">
				<tr>
					<th width="5%">Durum</th>
					<th width="90%">Yetenek</th>
					<th width="5%">İşlemler</th>
				</tr>
			</thead>
			<tbody>

				@foreach($abilities as $ability)

				<tr id="tr_{{$ability->id}}" >
					<td>
						@if($ability->status==1)
						<span class="badge badge-pill badge-success">Aktif</span>
						@elseif($ability->status==2)
						<span class="badge badge-pill badge-danger">Pasif</span>
						@else
						<span class="badge badge-pill badge-dark">Bilinmiyor</span>
						@endif

					</td>
					<td>
						<div class="clearfix">
							<strong class="left">{{$ability->name}}</strong>
							<small class="right">{{$ability->rate}}%</small>
						</div>
						<div class="progress xs">
							<div class="progress-bar " style="width:{{$ability->rate}}%"> </div>
						</div>


					</td>
					<td style="vertical-align: middle;">
						<div class="islemler">    					
							<a id="" onclick="pullAbility({{$ability->id }})" class="editBtn left" href="#"  data-id="{{$ability->id }}"  data-toggle="modal" data-target="#editabilitymodal" ><i class="fas fa-edit"></i></a>	 

								@if($ability->status==1)
						<a class="text-danger right" onclick="deleteFunc({{$ability->id }},'abilities')" href="#"><i class="fas fa-trash-alt"></i></a>
					@else
					<a class="text-success right" onclick="deleteFunc({{$ability->id }},'abilities')" href="#"><i class="far fa-plus-square"></i></a>
					@endif
							
							
						</div>
						

					</td>
				</tr>
				@endforeach



			</tbody>
		</table>

	</div>
	<div class="pageFooter"></div>
</div>
<div class="modal fade" id="newabilitymodal" tabindex="-1" role="dialog" aria-labelledby="newAbilityLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Yetenek Ekle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <form id="newability">
     	{{csrf_field()}}
		  <div class="modal-body">
			<div class="form-group">
			<label for="name">Yetenek Adı</label>
			<input type="text" name="name" id="name" class="form-control" placeholder="HTML, CSS, C# vb." required >			
			</div>
			<div class="form-group">
			<label for="rate">Yetenek yüzdesi</label>
			<input type="text" name="rate" id="rate" class="form-control" placeholder="0, 100, 50, 10" required >
			<span></span>
			<small class="form-text text-muted">ÖNEMLİ : Sadece sayı giriniz. Ör: 15, 0, 100, 70 </small>		
			</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" id="kaydet" name="kaydet" class="btn btn-primary">Kaydet</button>
		  </div>
	  </form>
      
    </div>
  </div>
</div>
<div class="modal fade" id="editabilitymodal" tabindex="-1" role="dialog" aria-labelledby="editAbilityLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Yetenek Düzenle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <form id="editability" data-id="">
     	{{csrf_field()}}
		  <div class="modal-body">
					
			<div class="form-group">
			<label for="name">Yetenek Adı</label>
			<input type="text" name="editname" id="editname" class="form-control" placeholder="HTML, CSS, C# vb." required >			
			</div>
			<div class="form-group">
			<label for="rate">Yetenek yüzdesi</label>
			<input type="text" name="editrate" id="editrate" class="form-control" placeholder="0, 100, 50, 10" required >
			<span></span>
			<small class="form-text text-muted">ÖNEMLİ : Sadece sayı giriniz. Ör: 15, 0, 100, 70 </small>		
			</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" id="kaydet" name="kaydet" class="btn btn-primary">Kaydet</button>
		  </div>
	  </form>
      
    </div>
  </div>
</div>
@endsection