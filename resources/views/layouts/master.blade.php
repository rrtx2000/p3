<!DOCTYPE html>
<html>
<head>
	<title>
		@yield('title', 'Als Trip')
	</title>
	
	<meta charset='utf-8'>
	<link href="css/main.css" type='text/css' rel='stylesheet'>
	@stack('head')

</head>
<body>

	<header>
		Trip Header
	</header>

	<section>
		@yield('content')
	</section>

	<footer>
	</footer>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    @stack('body')

</body>
</html>