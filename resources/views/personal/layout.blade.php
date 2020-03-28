<!DOCTYPE html>
<html>
	<head>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-58156243-2"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'UA-58156243-2');
		</script>

		@extends('/personal/header')
		<title>@yield('baslik')</title>
	</head>
	<body>
		@extends('/personal/sidebar')
	
			@yield('icerik')
		
		@extends('/personal/footer')
	</body>
</html>