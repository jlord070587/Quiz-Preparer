<!doctype html>
<html>
<head>
	<title>Quiz Preparer</title>
	{{HTML::style('css/bootstrap.min.css')}}
	<style>
	form ul {
		margin-left: 0;
		padding-left: 0;
	}
	form li {
		list-style: none;
	}
	.container {
		width: 80%;
		margin: auto;
	}
	</style>
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