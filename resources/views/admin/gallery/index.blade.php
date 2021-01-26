@extends('layouts.admin')

@section('content')
<div class="container">
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
		 			<button class="btn btn-danger btn-flat btn-sm remove-gallery float-left" data-id="{{ $gallery->id }}" data-action="{{ route('gallery.destroy',$gallery->id) }}"> Delete </button>
		 			<p class="float-right">{{ \Carbon\Carbon::parse($gallery->created_at)->format('d-M-Y') }}</p>
		 		</div>
	 		</div>
 		</div>
 		@empty

	 	<div class="col-xl-12 col-lg-12 col-md-6 col-xs-6 text-center">
	 		<div class="card" style="margin-top: 15px;">
	 			<div class="card-body">
	 				<h3>There is No Photo.</h3>
	 			</div>
	 		</div>
	 	</div>
	 	@endforelse
	 </div>
</div>
@endsection

@section('js')
<script>
$("body").on("click",".remove-gallery",function(){
    var current_object = $(this);
    swal({
        title: "Apakah anda yakin akan menghapus reply anda?",
        text: "You will not be able to recover this imaginary file!",
        type: "error",
        showCancelButton: true,
        dangerMode: true,
        cancelButtonClass: '#DD6B55',
        confirmButtonColor: '#dc3545',
        confirmButtonText: 'Delete!',
    },function (result) {
        if (result) {
            var action = current_object.attr('data-action');
            var token = jQuery('meta[name="csrf-token"]').attr('content');
            var id = current_object.attr('data-id');

            $('body').html("<form class='form-inline remove-form' method='post' action='"+action+"'></form>");
            $('body').find('.remove-form').append('<input name="_method" type="hidden" value="delete">');
            $('body').find('.remove-form').append('<input name="_token" type="hidden" value="'+token+'">');
            $('body').find('.remove-form').append('<input name="id" type="hidden" value="'+id+'">');
            $('body').find('.remove-form').submit();
        }
    });
});
</script>
@endsection