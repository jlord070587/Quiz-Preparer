<!doctype html>
<html>
<head>
	<title>
		@if (isset($title))
			{{$title}}
		@else
			Quiz Preparer
		@endif
	</title>
	{{HTML::style('css/bootstrap.min.css')}}
	{{HTML::style('css/styles.css')}}
</head>
<body>

	@if ( Session::has('flash') )
		<div class="alert alert-error">
  		<button type="button" class="close" data-dismiss="alert">×</button>
  		<strong>Warning!</strong> {{Session::get('flash')}}
		</div>
	@endif

	<div class="container">
		@yield('container')
	</div>

	<script src="http://code.jquery.com/jquery.js"></script>
	{{HTML::script('js/forms.js')}}

	<script>$('button.close').on('click', function() { $('.alert').slideUp(350); })</script>
	@yield('scripts')

</body>
</html>