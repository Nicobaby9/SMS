@extends('layouts.admin')

@section('content')
<div class="container mt-2">
	 <div class="col-md-10">
	 	<form role="form" action="{{ route('gallery.store') }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	 		@csrf
	 		<div class="form-group">
                <label>Title</label>
                <input name="title" type="text" class="form-control" placeholder="Title" value="{{ old('title') }}" required>
            </div>
            <div class="form-group">
                <label>Subtitle</label>
                <input name="subtitle" type="text" class="form-control" placeholder="Subtitle" value="{{ old('subtitle') }}" required>
            </div>
            <div class="form-group">
                <div class="custom-file">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    <input name="photo" type="file" class="custom-file-input" id="exampleInputFile" onchange="loadPreview(this);" required>
                    <p class="text-danger">{{ $errors->first('photo') }}</p>
                </div>
            </div>
    	 	<div class="form-group" style="text-align: center;">
                <img id="preview_img" src="https://www.w3adda.com/wp-content/uploads/2019/09/No_Image-128.png" class="" width="200" height="150"/>
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
                $(id).attr('src', e.target.result).width(200).height(150);
            };
     
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection