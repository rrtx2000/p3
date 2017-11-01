<!DOCTYPE html>
<html>
<head>
	<title>
		@yield('title', 'P3-Trip Time Computer')
	</title>
	
	<meta charset='utf-8'>
	<link href="css/main.css" type='text/css' rel='stylesheet'>
	@stack('head')

</head>
<body>

	<header>
		
	</header>

	<section>
		@yield('content')
	</section>

	<footer>
	</footer>

    @stack('body')

</body>
</html>