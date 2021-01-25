@extends('layouts.admin')

@section('content')
<div class="col-md-12">
    <div class="card">
    <div class="card-header p-2">
        <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link active" href="#logo" data-toggle="tab">Logo</a></li>
            <li class="nav-item"><a class="nav-link " href="#content" data-toggle="tab">Content</a></li>
            <li class="nav-item"><a class="nav-link " href="#profile" data-toggle="tab">Profile</a></li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane active" id="logo">
                <form class="form-horizontal" method="POST" action="{{ route('frontend.image.update', $frontend->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="_method" value="PATCH">

                    {{--  FIRST CONTENT PHOTO  --}}
                    <div class="form-group text-center">
                        <label class="control-label">Logo</label><br>
                        <a class="btn btn-info btn-xs col-sm-3 control-label" data-toggle="collapse" href="#logo_edit" role="button" aria-expanded="false" aria-controls="logo">Edit</a>
                        <div class="collapse multi-collapse" id="logo_edit">
                            <hr>
                            <div class="custom-file">
                                <label class="custom-file-label" for="exampleInputFile1">Choose file</label>
                                <input name="logo" type="file" class="custom-file-input" onchange="loadPreviewlogo(this);" value="{{ $frontend->profile1_photo }}">
                                <p class="text-danger">{{ $errors->first('logo') }}</p>
                            </div>
                            <hr>
                            <img id="preview_logo" src="{{ asset('storage/frontend/'. $frontend->logo ) }}" class="" width="400" height="400" style="border-radius: 10px;"/>
                        </div>
                        <hr>
                    </div>      
                    <hr>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" style="width: 100%;" value="post">Submit</button>
                    </div>
                </form>
            </div>
            <div class="tab-pane" id="content">
                <form class="form-horizontal" method="POST" action="{{ route('frontend.image.update', $frontend->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="_method" value="PATCH">

                    {{--  FIRST CONTENT PHOTO  --}}
                    <div class="form-group text-center">
                        <label class="control-label">Content 1</label><br>
                        <a class="btn btn-info btn-xs col-sm-3 control-label" data-toggle="collapse" href="#content1_photo_edit" role="button" aria-expanded="false" aria-controls="content1_photo">Edit</a>
                        <div class="collapse multi-collapse" id="content1_photo_edit">
                            <hr>
                            <div class="custom-file">
                                <label class="custom-file-label" for="exampleInputFile1">Choose file</label>
                                <input name="content1_photo" type="file" class="custom-file-input" onchange="loadPreviewContent1(this);" value="{{ $frontend->profile1_photo }}">
                                <p class="text-danger">{{ $errors->first('content1_photo') }}</p>
                            </div>
                            <hr>
                            <img id="content1_photo" src="{{ asset('storage/frontend/'. $frontend->content1_photo ) }}"  width="500" height="200" style="border-radius: 15px;"/>
                        </div>
                    </div>            

                    {{--  SECOND CONTENT PHOTO  --}}
                    <div class="form-group text-center">
                        <label class="control-label">Content 2</label><br>
                        <a class="btn btn-info btn-xs col-sm-3 control-label" data-toggle="collapse" href="#content2_photo_edit" role="button" aria-expanded="false" aria-controls="content2_photo">Edit</a>
                        <div class="collapse multi-collapse" id="content2_photo_edit">
                            <hr>
                            <div class="custom-file">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                <input name="content2_photo" type="file" class="custom-file-input" onchange="loadPreviewContent2(this);" value="{{ $frontend->content2_photo }}">
                                <p class="text-danger">{{ $errors->first('content2_photo') }}</p>
                            </div>
                            <hr>
                            <img id="content2_photo" src="{{ asset('storage/frontend/'. $frontend->content2_photo ) }}" width="500" height="200" style="border-radius: 15px;"/>
                        </div>
                    </div>

                    {{--  THIRD CONTENT PHOTO  --}}
                    <div class="form-group text-center">
                        <label class="ontrol-label">Content 3</label><br>
                        <a class="btn btn-info btn-xs col-sm-3 control-label" data-toggle="collapse" href="#content3_photo_edit" role="button" aria-expanded="false" aria-controls="content3_photo">Edit</a>
                        <div class="collapse multi-collapse" id="content3_photo_edit">
                            <hr>
                            <div class="custom-file">
                                <label class="custom-file-label" for="exampleInputFile3">Choose file</label>
                                <input name="content3_photo" type="file" class="custom-file-input" onchange="loadPreviewContent3(this);" value="{{ $frontend->content3_photo }}" id="exampleInputFile">
                                <p class="text-danger">{{ $errors->first('content3_photo') }}</p>
                            </div>
                            <hr>
                            <img id="content3_photo" src="{{ asset('storage/frontend/'. $frontend->content3_photo ) }}" class="" width="500" height="200" style="border-radius: 15px;"/>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" style="width: 100%;" value="post">Submit</button>
                    </div>
                </form>
            </div>
            <!-- PROFILE -->
            <div class="tab-pane" id="profile">
                <form class="form-horizontal" method="POST" action="{{ route('frontend.image.update', $frontend->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="_method" value="PATCH">

                    {{--  FIRST PROFILE PHOTO  --}}
                    <div class="form-group text-center">
                        <label class="control-label">Profil 1</label><br>
                        <a class="btn btn-info btn-xs col-sm-3 control-label" data-toggle="collapse" href="#profile1_photo_edit" role="button" aria-expanded="false" aria-controls="profile1_photo">Edit</a>
                        <div class="collapse multi-collapse" id="profile1_photo_edit">
                            <hr>
                            <div class="custom-file">
                                <label class="custom-file-label" for="exampleInputFile1">Choose file</label>
                                <input name="profile1_photo" type="file" class="custom-file-input" onchange="loadPreviewProfile1(this);" value="{{ $frontend->profile1_photo }}">
                                <p class="text-danger">{{ $errors->first('profile1_photo') }}</p>
                            </div>
                            <hr>
                            <img id="profile1_photo" src="{{ asset('storage/frontend/'. $frontend->profile1_photo ) }}" class="" width="200" height="200" style="border-radius: 49%;"/>
                        </div>
                    </div>            

                    {{--  SECOND PROFILE PHOTO  --}}
                    <div class="form-group text-center">
                        <label class="control-label">Profil 2</label><br>
                        <a class="btn btn-info btn-xs col-sm-3 control-label" data-toggle="collapse" href="#profile2_photo_edit" role="button" aria-expanded="false" aria-controls="profile2_photo">Edit</a>
                        <div class="collapse multi-collapse" id="profile2_photo_edit">
                            <hr>
                            <div class="custom-file">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                <input name="profile2_photo" type="file" class="custom-file-input"  onchange="loadPreviewProfile2(this);" value="{{ $frontend->profile2_photo }}">
                                <p class="text-danger">{{ $errors->first('profile2_photo') }}</p>
                            </div>
                            <hr>
                            <img id="profile2_photo" src="{{ asset('storage/frontend/'. $frontend->profile2_photo ) }}" class="" width="200" height="200" style="border-radius: 49%;"/>
                        </div>
                    </div>

                    {{--  THIRD PROFILE PHOTO  --}}
                    <div class="form-group text-center">
                        <label class="control-label">Profil 3</label><br>
                        <a class="btn btn-info btn-xs col-sm-3 control-label" data-toggle="collapse" href="#profile3_photo_edit" role="button" aria-expanded="false" aria-controls="profile3_photo">Edit</a>
                        <div class="collapse multi-collapse" id="profile3_photo_edit">
                            <hr>
                            <div class="custom-file">
                                <label class="custom-file-label" for="exampleInputFile3">Choose file</label>
                                <input name="profile3_photo" type="file" class="custom-file-input" onchange="loadPreviewProfile3(this);" value="{{ $frontend->profile3_photo }}">
                                <p class="text-danger">{{ $errors->first('profile3_photo') }}</p>
                            </div>
                            <hr>
                            <img id="profile3_photo" src="{{ asset('storage/frontend/'. $frontend->profile3_photo ) }}" class="" width="200" height="200" style="border-radius: 49%;"/>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" style="width: 100%;" value="post">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
    </div>
    <!-- /.nav-tabs-custom -->
</div>
    
@endsection

@section('js')
<script>
    // LOGO
    function loadPreviewlogo(input, id) {
        id = id || '#preview_logo';
        if (input.files && input.files[0]) {
            var reader = new FileReader();
     
            reader.onload = function (e) {
                $(id).attr('src', e.target.result).width(800).height(350);
            };
     
            reader.readAsDataURL(input.files[0]);
        }
    }

    // CONTENT
    function loadPreviewContent1(input, id) {
        id = id || '#content1_photo';
        if (input.files && input.files[0]) {
            var reader = new FileReader();
     
            reader.onload = function (e) {
                $(id).attr('src', e.target.result).width(500).height(200);
            };
     
            reader.readAsDataURL(input.files[0]);
        }
    }
    function loadPreviewContent2(input, id) {
        id = id || '#content2_photo';
        if (input.files && input.files[0]) {
            var reader = new FileReader();
     
            reader.onload = function (e) {
                $(id).attr('src', e.target.result).width(500).height(200);
            };
     
            reader.readAsDataURL(input.files[0]);
        }
    }
    function loadPreviewContent3(input, id) {
        id = id || '#content3_photo';
        if (input.files && input.files[0]) {
            var reader = new FileReader();
     
            reader.onload = function (e) {
                $(id).attr('src', e.target.result).width(500).height(200);
            };
     
            reader.readAsDataURL(input.files[0]);
        }
    }

    // PROFILE
    function loadPreviewProfile1(input, id) {
        id = id || '#profile1_photo';
        if (input.files && input.files[0]) {
            var reader = new FileReader();
     
            reader.onload = function (e) {
                $(id).attr('src', e.target.result).width(250).height(250);
            };
     
            reader.readAsDataURL(input.files[0]);
        }
    }
    function loadPreviewProfile2(input, id) {
        id = id || '#profile2_photo';
        if (input.files && input.files[0]) {
            var reader = new FileReader();
     
            reader.onload = function (e) {
                $(id).attr('src', e.target.result).width(250).height(250);
            };
     
            reader.readAsDataURL(input.files[0]);
        }
    }
    function loadPreviewProfile3(input, id) {
        id = id || '#profile3_photo';
        if (input.files && input.files[0]) {
            var reader = new FileReader();
     
            reader.onload = function (e) {
                $(id).attr('src', e.target.result).width(250).height(250);
            };
     
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection