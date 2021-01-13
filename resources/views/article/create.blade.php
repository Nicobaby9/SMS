@extends('layouts.admin')

@section('jav')
    <script src="http://cdn.ckeditor.com/4.4.7/full/ckeditor.js"></script>
@endsection

@section('content')
<div class="container-fluid">
      <div class="row">
        <div class="col-sm-12 col-md-12 main">
          <h1 class="page-header">Add new Article</h1>

          <form action="{{ route('article.store') }}" method="post" enctype="multipart/form-data">
            @csrf
           <div class="form-group">
                <label>Title</label>
                <input name="title" type="text" class="form-control" placeholder="Title" value="{{ old('title') }}" required="">
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-7 col-md-9">
                <div class="form-group">
                  <textarea name="content" id="content" style="color: black;"></textarea>
                  <script>CKEDITOR.replace('content');</script>
                </div>
              </div>
              <div class="col-xs-5 col-md-3">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Publish</button>
                </div>
                <div class="form-group">
                  <label for="category_id">Category</label>
                  <div class="checkbox">
                    <select class="form-control" name="category_id" id="category" required>
                        <option value="" holder>Choose Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <div class="custom-file">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        <input name="image" type="file" class="custom-file-input" id="exampleInputFile" onchange="loadPreview(this);" required>
                        <p class="text-danger">{{ $errors->first('photo') }}</p>
                    </div>
                    <label for="image">Image Preview</label>
                    <br>
                    <a href="#" class="thumbnail">
                      <img id="preview_img" src="https://www.w3adda.com/wp-content/uploads/2019/09/No_Image-128.png" class="">
                    </a>
                </div>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
    
@endsection

@section('js')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/css/selectize.min.css">
<script>
    function loadPreview(input, id) {
        id = id || '#preview_img';
        if (input.files && input.files[0]) {
            var reader = new FileReader();
     
            reader.onload = function (e) {
                $(id).attr('src', e.target.result).width(230).height(120);
            };
     
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection