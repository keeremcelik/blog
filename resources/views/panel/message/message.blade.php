@extends('/panel/layout')
@section('baslik','Panel index Title')
@section('icerik')
<div class="content">

	<div class="pageTitle">
		<div class="left">
			<h1 class="h1">Mesajlar <small>Blog</small></h1>
		</div>
		<div class="right">
			<div class="pageBreadcrumb">
				<ul class="">
					<li class=""><a href="{{url('/panel/index')}}">Ana Sayfa</a></li>
					<li class=""><a class="active" href="#">Mesajlar</a></li>
				</ul>
			</div>
		</div>	

	</div>


	<div class="optionbar">
		<div class="right"> 
			


		</div>
	</div>
	<div class="pageContent">		

		<table class="table-responsive table">
			<thead class="thead-smoke">
				<tr>
					<th width="5%">Durum</th>
					<th width="20%">Ad Soyad</th>
					<th width="50%">Konu</th>
					<th width="20%">Tarih</th>
					<th width="5%">İşlemler</th>
				</tr>
			</thead>
			<tbody>

				@foreach($mails as $mail)
				<tr id="tr_{{$mail->id}}" >
					<td>
						@if($mail->status==1)
						<span class="badge badge-pill badge-success">Aktif</span>
						@elseif($mail->status==2)
						<span class="badge badge-pill badge-danger">Pasif</span>
						@else
						<span class="badge badge-pill badge-dark">Bilinmiyor</span>
						@endif

					</td>
					<td><span>{{$mail->name}}</span></td>
					<td>{{$mail->subject}}</td>
					<td>{{$mail->date}}</td>
					<td style="vertical-align: middle;">

						<div class="islemler">    					
							<a onclick="pullMail({{$mail->id}})" class="editBtn left" href="#" data-id="{{$mail->id}}"  data-toggle="modal" data-target="#readmailmodal" ><i class="fas fa-eye"></i></a>	 
							@if($mail->status==1)
							<a class="text-danger right" onclick="deleteFunc({{$mail->id }},'messages')" href="#"><i class="fas fa-trash-alt"></i></a>
							@elseif($mail->status==2)
							<a class="text-success right" onclick="deleteFunc({{$mail->id }},'messages')" href="#"><i class="far fa-plus-square"></i></a>						
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
<div class="modal fade" id="readmailmodal" tabindex="-1" role="dialog" aria-labelledby="readMailModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Mail Görüntüle</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<div class="container">
					<div class="row">
						<div class="modal-comment">

							<p class=""><strong>Gönderen :</strong> <span name="name" id="name"></span></p>
							<p class=""><strong>Tarih :</strong> <span id="date"></span></p>
							<p class=""><strong>Konu :</strong> <span id="title"></span></p>



						</div>
					</div>
					<div class="row">
						<div class="modal-comment-detail">

							<strong >Mail</strong>
							<p id="mail"></p>
						</div>
					</div>
				</div>		
			</div>
			<div class="modal-footer">

				<button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
				
			</div>     
		</div>
	</div>
</div>
@endsection