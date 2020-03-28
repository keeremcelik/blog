</main>	
<footer class="page-footer font-small teal">
	<!-- Footer Text -->
	<div class="container" >
		<!-- Grid row -->
		<div class="ft-left">
			<div class="social-media">	
				<p> <strong class="footer-title ">Sosyal Medya</strong></p>	
				@foreach($socials as $social)									
					<a href="{{ $social->facebook }}" target="_blank"><i class="fab fa-facebook-square"></i></a>
					<a href="{{ $social->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
					<a href="{{ $social->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
					<a href="{{ $social->linkedin }}" target="_blank"><i class="fab fa-linkedin"></i></a>
					<a href="{{ $social->github }}" target="_blank"><i class="fab fa-github"></i></a>
					<a href="{{ $social->google }}" target="_blank"><i class="fab fa-google"></i></a>
					<a href="{{ $social->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a>		
				@endforeach
				
				<br>			
				<br>							
			</div>
			<div class="inf-box">
				<p> <strong class="footer-title">İletişim Bilgileri</strong></p>						

				<p class="fs15">{{$personal[0]->degree}} & KRX </p>						
				<p class="fs15">{{$personal[0]->email}}</p>						
				<p class="fs15">{{$personal[0]->phone}}</p>						



			</div>



		</div>
		<div class="ft-right">
			<div class="description">
				<p class="fs15"> <strong class="footer-title">Özet</strong></p>						
				<p class="fs15">Adım Kerem ÇELİK, Bilgisayar Eğitmeni ve Bilgisayar Yazılımcısıyım. 8 yıldır C# dilinde çeşitli yazılımlar geliştirdim. 2019 yılından itibaren web yazılımları geliştirmeye başladım.</p>						

			</div>
			<div class="copyright">
				<p> <strong class="footer-title">Copyright</strong></p>						

				<p class="fs15">© 2020 {{$personal[0]->name}} & <a href="{{$ss[0]->site_name}}">{{$ss[0]->site_name}}</a></p>						
				<p class="fs15"><strong class="footer-title fs15">Created By</strong> {{$personal[0]->name}}</p>	
			</div>
		</div>
		<!-- Grid row -->

	</div>
	<!-- Footer Text -->

	<!-- Copyright -->

	<!-- Copyright -->

</footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{URL::asset('js/jquery-3.4.1.min.js')}}" ></script>
<script src="{{URL::asset('js/popper.min.js')}}" ></script>
<script src="{{URL::asset('js/bootstrap.bundle.min.js')}}" ></script>
<script src="{{URL::asset('js/all.min.js')}}" ></script>
<script src="{{URL::asset('js/my.js')}}" ></script>