<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>School forum</title>
    <link rel="stylesheet" href="https://bootswatch.com/paper/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/css/selectize.min.css">

    <!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('js/app.js') }}">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Tempusdominus Bootstrap 4 -->
	<link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
	<!-- JQVMap -->
	<link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
	<!-- Daterange picker -->
	<!-- summernote -->
	<link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <style>
    	* {
    		color: black;
    	}
    	.btn-xs {
    		color:black;
    		font-family: Gill Sans Extrabold, sans-serif;
    		margin-top: 2px;
    	}
    </style>
	 
</head>
<body>

	@include('thread.partial.navbar')

	@include('thread.partial.error')
	@include('thread.partial.success')
	
	<br>
	<div class="container">
		<a href="{{ route('forum.create') }}" class="btn btn-info float-right">Apa yang anda ingin tanyakan?</a>
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
					<a href="{{ route('forum.index') }}" class="list-group-item" style="border-bottom: solid 2px black; margin-bottom: 1px; border-radius: 4px;">
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
				<div class="content-wrap well col-md-12" style="background-color: #eaeae2; border-radius: 20px; height: 100%;"> 
					<br>
					@yield('content')
					
				</div>
			</div>
		</div>
	</div>

	<script src="{{asset('js/main.js')}}"></script>
	<script src="{{asset('js/app.js')}}"></script>

@yield('js')
</body>
</html>