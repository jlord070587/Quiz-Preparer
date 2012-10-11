<!doctype html>
<html>
<head>
	<title>Quiz Preparer</title>
	<style>
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