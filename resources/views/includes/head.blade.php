<head>
	<link rel="stylesheet" href="{{asset('css/styles.css')}}">
	<script src="{{asset('js/jquery-3.3.1.slim.js')}}"></script>
	<title>@yield('title')</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="csrf_token" content="{{ csrf_token() }}">
	<script>
		$(document).ready(function() {
			$("a#show_hide").click(function() {
			$('form#show-form').slideToggle(800);
			// $("#box").css('padding-top', '50px');
				$("table").toggleClass('hide');
			});

			$("#close").click(function() {
				$("#message").fadeToggle(500);
			});
		});
	</script>
</head>