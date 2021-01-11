@extends('layouts.front')

@section('head')
	<h2> Edit User </h2>
@endsection

@section('content')

@if($profile->username != auth()->user()->username)
	<a href="{{ route('user_profile', $profile->username) }}" class="btn btn-info btn-sm" >Kembali</a>
@else
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title" style="font-weight: bold;">Edit User Form</h3>
    </div>
    <div class="panel-body">
        <form role="form" action="{{ route('user_profile_update', $profile->id) }}" method="post" enctype="multipart/form-dat">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label>Email</label>
                <input name="email" type="text" class="form-control" placeholder="Email" value="{{ $profile->email }}" >
            </div>
            <div class="form-group">
                <label>Fullname</label>
                <input name="fullname" type="text" class="form-control" placeholder="Fullname" value="{{ $profile->fullname }}" >
            </div>
            <div class="form-group">
                <label>Username</label>
                <input name="username" type="text" class="form-control" placeholder="Username" value="{{ $profile->username }}" >
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input name="phone" type="text" class="form-control" placeholder="Phone" value="{{ $profile->phone }}" >
            </div>
            <input type="submit" class="btn btn-info" value="Save">
            <br><br>
        </form>
        <br>
        <div class="form-group">
        <form method="post" action="{{ route('photo.store', auth()->user()->id) }}" enctype="multipart/form-data">
	        @csrf
			<div class="card-body">
			    <div class="form-group">
			        <label for="exampleInputFile">File input</label>
			        <div class="input-group">
			            <div class="custom-file">
			                <input name="photo" type="file" class="form-control" id="exampleInputFile" onchange="loadPreview(this);">
			                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
			            </div>
			        </div>
			    </div>
			    <div class="form-group" style="text-align: center;">
			        <img id="preview_img" src="{{ asset('profile_images/'. $profile->photo) }}" class="" width="200" height="150"/>
			    </div>
			</div>
			<div class="card-footer">
			  <button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
		</div>
    </div>
</div>
@endif

@endsection

@section('js')
	<script>
        function loadPreview(input, id) {
            id = id || '#preview_img';
            if (input.files && input.files[0]) {
                var reader = new FileReader();
         
                reader.onload = function (e) {
                    $(id).attr('src', e.target.result).width(200).height(150);
                };
         
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection