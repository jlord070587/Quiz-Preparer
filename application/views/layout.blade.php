<!doctype html>
<html>
<head>
	<title>Quiz Preparer</title>
	{{HTML::style('css/bootstrap.min.css')}}
	{{HTML::style('css/styles.css')}}
</head>
<body>

	<div class="container">
		@yield('container')
	</div>

	<script src="http://code.jquery.com/jquery.js"></script>
	{{HTML::script('js/forms.js')}}
	
	@yield('scripts')

</body>
</html>