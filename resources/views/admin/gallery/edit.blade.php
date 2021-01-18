@extends('layouts.admin')

@section('content')
<div class="container mt-2">
	 <div class="col-md-10">
	 	<form role="form" action="{{ route('gallery.update', $gallery->id) }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	 		@csrf
            @method('PATCH')
	 		<div class="form-group">
                <label>Title</label>
                <input name="title" type="text" class="form-control" placeholder="Title" value="{{ $gallery->title }}">
            </div>
            <div class="form-group">
                <label>Subtitle</label>
                <input name="subtitle" type="text" class="form-control" placeholder="Subtitle" value="{{ $gallery->subtitle }}">
            </div>
            <div class="form-group">
                <div class="custom-file">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    <input name="photo" type="file" class="custom-file-input" id="exampleInputFile" onchange="loadPreview(this);" value="{{ $gallery->photo }}">
                    <p class="text-danger">{{ $errors->first('photo') }}</p>
                </div>
            </div>
    	 	<div class="form-group" style="text-align: center;">
                <img id="preview_img" src="{{ asset('gallery/'. $gallery->photo) }}" class="" width="350" height="260"/>
            </div>
              <button type="submit" class="btn btn-primary">Submit</button>
        </form>
	 </div>
</div>
@endsection	

@section('js') 
<script>
    function loadPreview(input, id) {
        id = id || '#preview_img';
        if (input.files && input.files[0]) {
            var reader = new FileReader();
     
            reader.onload = function (e) {
                $(id).attr('src', e.target.result).width(350).height(260);
            };
     
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection