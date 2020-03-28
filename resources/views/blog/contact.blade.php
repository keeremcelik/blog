@extends('/blog/layout')
@section('baslik','Blog Title')
@section('icerik')
<section id="s1">
        <div class="container">
			<div class="row">	
				<div class="contact-title">	
					<h1>İletişim</h1>
				</div>	
			</div>
			<div class="row">					
					<div class="contact-detail">						
							<div class="col-md-12 col-sm-12">
								<div class="row">
									<div class="contact-inf">
										<div class="pull-left col-md-6 col-sm-12 col-xs-12">
											<h5 class=""><i class="fas fa-user-tie"></i><strong> {{$personal[0]->name}}</strong></h5>
										<p class="phone"><i class="fas fa-phone"></i> <strong>Telefon : </strong> {{$personal[0]->phone}}</p>
										<p class="email"><i class="far fa-envelope-open"></i> <strong>E mail : </strong>{{$personal[0]->email}}</p>
										<p class="location"><i class="far fa-compass"></i> <strong>Konum : </strong>Kocaeli / Türkiye</p>
									
										</div>
										<div class="pull-right col-md-6 col-sm-12 col-xs-12">
											<div class="ticket-mail">					
												<div class="ticket">	
													<h5 class=""><i class="fas fa-envelope"></i><strong> Mail Gönder</strong></h5>
													<form method="post" action="{{URL::to('/blog/contact')}}" id="ticketForm">
														@csrf
														<div class="form-group">
															<input class="form-control form-control-sm" id="name" name="name" type="text" placeholder="Ad">
														</div>
														<div class="form-group">
															<input class="form-control form-control-sm" id="subject" name="subject" type="text" placeholder="Konu">
														</div>
														<div class="form-group">
															<textarea class="form-control" id="content" name="content" rows="3"></textarea>
														</div>
														<div class="form-group">
															<div class="pull-right">
																<button  type="submit" id="kaydet" name="kaydet" class="btn btn-primary">Gönder</button>
															</div>
														</div>
														<div class="form-group">
															<span id="comment_message">
															
															</span>
														</div>
														</form>
													
												</div>						
											</div>
										</div>
									</div>
								</div>
								<div class="row">
								<div class="contact-map">
									{!! $ss[0]->googlemap !!}
								</div>
								</div>
							</div>
					</div>
						
			
			</div>
        </div>
	</section>	
@endsection