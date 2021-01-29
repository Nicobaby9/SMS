@extends('layouts.front')

@section('head')
	<h2 style="font-weight: bold;"> EDIT PROFILE </h2>
@endsection

@section('category')
</div>
    <div class="col-md-3">
        <div class="dp text-center">
            <img src="{{ asset('profile_images/'. $profile->photo) }}" style="border-radius: 49%;" width="200" height="200">
            <br><br>
            <p style="font-size: 9px; float: "> *profile created since : {{ $profile->created_at->diffForHumans() }} / {{ \Carbon\Carbon::parse($profile->created_at)->format('d-m-Y') }} </p>
        </div>
        <h3>
            {{ $profile->fullname }}
        </h3>
        <table style="width:100%">
            <tr>
                <th>Email </th>
                <th> : &nbsp;</th>
                <td> {{ $profile->email }}</td>
            </tr>
            <tr>
                <th>profilename</th>
                <th> : &nbsp;</th>
                <td> {{ '@'.$profile->username }}</td>
            </tr>
            <tr>
                <th>Phone</th>
                <th> : &nbsp;</th>
                <td> {{ $profile->phone }}</td>
            </tr>
        </table>
    </div>
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
            <a href="{{ route('user_profile', $profile->username) }}" class="btn btn-danger" value="Cancel">Cancel</a>
            <br><br>
        </form>
        <br>
        <div class="card-footer">
          <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Change Photo</a>
        </div>
        <hr>
        <div class="form-group">
            <div class="card-body">
                <div class="tab-content">
                    <div class="collapse multi-collapse" id="multiCollapseExample1">
                        <form method="post" action="{{ route('photo.store', auth()->user()->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputFile">Choose File</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="photo" type="file" class="form-control" id="exampleInputFile" onchange="loadPreview(this);">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="text-align: center;">
                                    <img id="preview_img" src="{{ asset('profile_images/'. $profile->photo) }}" style="border-radius: 49%;" width="200" height="150"/>
                                </div>
                            </div>
                            <div class="card-footer">
                              <button type="submit" class="btn btn-info">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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