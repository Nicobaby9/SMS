@extends('layouts.admin')

@section('content')
<div class="container mt-2">
	<a href="{{ route('gallery.create') }}" class="btn btn-sm btn-info">Create New Photo</a>
	 <div class="row">
	 	@forelse($galleries as $gallery)
	 	<div class="col-xl-4 col-lg-4 col-md-6 col-xs-12">
	 		<div class="card" style="margin-top: 15px;">
	 			<img src="{{ asset('gallery/'.$gallery->photo)}}" alt="" style="height: 240px;">
	 			<div class="card-body">
	 				<h5 style="font-weight: bold;">{{ \Illuminate\Support\Str::ucfirst($gallery->title) }}</h5>
	 				<p>{{ \Illuminate\Support\Str::ucfirst($gallery->subtitle) }}</p>
		 			<a href="{{ route('gallery.edit', $gallery->id) }}" class="btn btn-sm btn-primary float-left" style="margin-right: 10px;">Edit</a>
		 			<form action="{{ route('gallery.destroy', $gallery->id) }}" method="post" accept-charset="utf-8" class=" float-left">
		 				@csrf
		 				@method('DELETE')
		 				<input type="submit" value="Delete" class="btn btn-sm btn-danger">
		 			</form>
		 			<p class="float-right">{{ \Carbon\Carbon::parse($gallery->created_at)->format('d-M-Y') }}</p>
		 		</div>
	 		</div>
 		</div>
 		@empty
 			<h5>There is no Photo</h5>	
	 	@endforelse
	 </div>
</div>
@endsection