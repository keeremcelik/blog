@extends('/panel/layout')
@section('baslik','Panel index Title')
@section('icerik')
<div class="content">
	
	<div class="pageTitle">
		<div class="left">
			<h1 class="h1">Kategoriler <small>Blog</small></h1>
		</div>
		<div class="right">
			<div class="pageBreadcrumb">
				<ul class="">
					<li class=""><a href="{{url('/panel/index')}}">Ana Sayfa</a></li>
					<li class=""><a class="active" href="#">Kategoriler</a></li>
				</ul>
			</div>
		</div>	
		
	</div>
	
	
	<div class="optionbar">
		<div class="right">
			
			<button type="button" class="btn btn-sm btn-red"  data-toggle="modal" data-target="#newcategorymodal" ><i class="fas fa-plus"></i> Yeni</button>
		</div>
	</div>
	<div class="pageContent">		
		
		<table id="tb_category"  class="table-responsive table">
			<thead class="thead-smoke">
				<tr>
					<th width="5%">Durum</th>
					<th width="75%">Kategori Adı</th>
					<th width="15%">Veri Sayısı</th>
					<th width="5%">İşlemler</th>
				</tr>
			</thead>
			<tbody>

				@foreach($categories as $category)

				<tr id="tr_{{$category->id}}" >
					<td>
						@if($category->status==1)
						<span class="badge badge-pill badge-success">Aktif</span>
						@elseif($category->status==2)
						<span class="badge badge-pill badge-danger">Pasif</span>
						@else
						<span class="badge badge-pill badge-dark">Bilinmiyor</span>
						@endif
						
					</td>
					<td>{{$category->name}}</td>
					<td>POST SAYISI</td>
					<td style="vertical-align: middle;">
						
						<div class="islemler">    					


							<a id="" onclick="pullCategory({{$category->id }})" class="editBtn left" href="#"  data-id="{{$category->id }}"  data-toggle="modal" data-target="#editcategorymodal" ><i class="fas fa-edit"></i></a>	
							@if($category->status==1)
							<a class="text-danger right" onclick="deleteFunc({{$category->id }},'categories')" href="#"><i class="fas fa-trash-alt"></i></a>
							@else
							<a class="text-success right" onclick="deleteFunc({{$category->id }},'categories')" href="#"><i class="far fa-plus-square"></i></a>
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

<div class="modal fade" id="newcategorymodal" tabindex="-1" role="dialog" aria-labelledby="newCategoryLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Yetenek Ekle</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="newcategory">
				{{csrf_field()}}
				<div class="modal-body">

					<div class="form-group">
						<label for="name">Kategori Adı</label>
						<input type="text" name="name" id="name" class="form-control" placeholder="Kamp, Kişisel, HTML, CSS, C# vb." required >			
					</div>
					<div class="form-group">
						<label for="sef_url">SEF URL</label>
						<input type="text" name="sef_url" id="sef_url" class="form-control" placeholder="Otomatik oluşmalıdır"  required >			
					</div>
					<div class="form-group">
						<label for="keywords">Keywords</label>
						<input type="text" name="keywords" id="keywords" class="form-control" placeholder="keyword,keywords,ornekkeyword"  required >			
					</div>
					<div class="form-group">
						<label for="description">Description</label>
						<input type="text" name="description" id="description" class="form-control" placeholder="Açıklama giriniz" required >			
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
<div class="modal fade" id="editcategorymodal" tabindex="-1" role="dialog" aria-labelledby="editCategoryLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Yetenek Düzenle</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="editcategory" data-id="">
				{{csrf_field()}}
				<div class="modal-body">					
					<div class="form-group">
						<label for="editname">Kategori Adı</label>
						<input type="text" name="editname" id="editname" class="form-control" placeholder="Kamp, Kişisel, HTML, CSS, C# vb." required >			
					</div>
					<div class="form-group">
						<label for="editsef_url">SEF URL</label>
						<input type="text" name="editsef_url" id="editsef_url" class="form-control" placeholder="Otomatik oluşmalıdır"   required >			
					</div>
					<div class="form-group">
						<label for="editkeywords">Keywords</label>
						<input type="text" name="editkeywords" id="editkeywords" class="form-control" placeholder="keyword,keywords,ornekkeyword"  required >			
					</div>
					<div class="form-group">
						<label for="editdescription">Description</label>
						<input type="text" name="editdescription" id="editdescription" class="form-control" placeholder="Açıklama giriniz" required >			
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