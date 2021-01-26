@extends('layouts.admin')

@section('content')
<div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12 main justify-content-center">
          <h3 class="page-header font-weight-bold">Tambah Buku</h3>

          <form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-xs-5 col-md-8 ">
              <div class="form-group">
                  <label>Title</label>
                  <input name="title" type="text" class="form-control" placeholder="Title" value="{{ old('title') }}" required="">
              </div>
              <div class="form-group" >
                  <label for="category">Categories</label>
                  <select name="category_id" id="tag" required>
                      <option value="">Choose Category</option>
                      @foreach($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->title }}</option>
                      @endforeach
                  </select>
              </div>
              <div class="form-group">
              <label>Author</label>
                <input name="author" type="text" class="form-control" placeholder="Author" value="{{ old('author') }}" required="">
              </div>
              <div class="form-group">
              <label>Publisher</label>
                <input name="publisher" type="text" class="form-control" placeholder="Publisher" value="{{ old('publisher') }}" required="">
              </div>
              <div class="form-group">
              <label>Publish Date</label>
                <input name="publish_date" type="date" class="form-control" placeholder="Publish Date" value="{{ old('publish_date') }}" required="">
              </div>
              <div class="form-group">
              <label>Bahasa</label>
                <input name="language" type="text" class="form-control" placeholder="Bahasa" value="{{ old('language') }}" required="">
              </div>
              <div class="form-group">
              <label>Jumlah Halaman</label>
                <input name="pages" type="number" class="form-control" placeholder="Jumlah Halaman" value="{{ old('pages') }}" required="">
              </div>
              <div class="form-group">
              <label>Kode Buku</label>
                <input name="code" type="text" class="form-control" placeholder="Kode Buku" value="{{ old('code') }}" required="">
              </div>
              <div class="form-group">
                <label>Status</label>
                <br>
                <select name="status" required>
                      <option>Choose Category</option>
                      <option value="1" class="btn btn-sm btn-success">Available</option>
                      <option value="0" class="btn btn-sm btn-danger">Dipinjam</option>
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
                  <a href="#" class="thumbnail text-center">
                    <img id="preview_img" src="https://www.w3adda.com/wp-content/uploads/2019/09/No_Image-128.png" class="" width="200" height="450">
                  </a>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary" style="width: 100%;">Publish</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    
@endsection

@section('js')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/css/selectize.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/js/standalone/selectize.min.js"></script>

<script>
    $(function() {
        $('#tag').selectize();
    });

    function loadPreview(input, id) {
        id = id || '#preview_img';
        if (input.files && input.files[0]) {
            var reader = new FileReader();
     
            reader.onload = function (e) {
                $(id).attr('src', e.target.result).width(200).height(450);
            };
     
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection