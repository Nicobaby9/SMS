<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<!-- <link rel="stylesheet" href="https://bootswatch.com/4/minty/bootstrap.css"> -->
	<link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
	<link rel="stylesheet" href="https://bootswatch.com/4/pulse/bootstrap.css">
</head>
<body>

	@include('thread.partial.navbar')
	@include('thread.partial.success')

<div class="container">
		<a href="{{ route('forum.create') }}" class="btn btn-info float-right">Buat Postingan</a>
	<div class="row">
		<div class="row content-heading">
			<div class="col-md-3"><h4> Kategori </h4></div>
			<div class="col-md-9">
				<div class="col-md-4"><h4 class="main-content-heading">@yield('heading')</h4></div>
					
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-3">
			<ul class="list-group">
				<a href="{{ route('forum.index') }}" class="list-group-item"  style="border-bottom: solid 1px black; margin-bottom: 1px;">
					Semua Postingan
					<span class="badge" style="float:right;">14</span>
				</a>
				<a href="#" class="list-group-item">
					PHP
					<span class="badge" style="float:right;">14</span>
				</a>
				<a href="#" class="list-group-item">
					Javascript
					<span class="badge" style="float:right;">14</span>
				</a>
			</ul>
		</div>

		<div class="col-md-9">
			<div class="content-wrap well">
				
				@yield('content')
				
			</div>
		</div>
	</div>
</div>
	
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<script src="{{ asset('dist/js/demo.js') }}"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<script src="{{ asset('dist/js/pages/dashboard.js')}}"></script>
	@yield('js')
</body>
</html>