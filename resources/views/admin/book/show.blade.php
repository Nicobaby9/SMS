@extends('layouts.admin')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header p-2">
            <form action="{{ route('books.destroy', $book->id) }}" method="post" class="float-right" onclick="return confirm('Are you sure?')">
                @csrf
                @method('DELETE')
                <input class="btn btn-danger btn-sm" type="submit" value="Delete">
            </form>
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#detail" data-toggle="tab">Detail</a></li>
                <li class="nav-item"><a class="nav-link" href="#edit" data-toggle="tab">Edit</a></li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="active tab-pane active" id="detail">
                    <form class="form-horizontal" method="get">
                        @csrf
                        <div class="form-group">
                            <label>Title</label>
                            <input name="title" type="text" class="form-control" placeholder="Title" value="{{ $book->title }}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category_id" id="tag" type="text"  disabled>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" selected> {{ $book->category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Author</label>
                            <input name="author" type="text" class="form-control" placeholder="Author" value="{{ $book->author }}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Publisher</label>
                            <input name="publisher" type="text" class="form-control" placeholder="Publisher" value="{{ $book->publisher }}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Publish Date</label>
                            <input name="publish_date" type="date" class="form-control" placeholder="Publish Date" value="{{ $book->publish_date }}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Bahasa</label>
                            <input name="language" type="text" class="form-control" placeholder="Bahasa" value="{{ $book->language }}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Halaman</label>
                            <input name="pages" type="number" class="form-control" placeholder="Jumlah Halaman" value="{{ $book->pages }}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Kode Buku</label>
                            <input name="code" type="text" class="form-control" placeholder="Kode Buku" value="{{ $book->code }}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Status Buku</label>
                            <br>
                            @if($book->status == 1)
                                <button type="button" class="btn btn-sm btn-success" disabled>Available</button>
                            @else
                                <button type="button" class="btn btn-sm btn-danger" disabled>Dipinjam</button>
                            @endif
                        </div>
                        <div class="form-group text-center">
                            <label>Image</label>
                            <br>
                            <img src="{{ asset('storage/books/'.$book->image) }}" style="height: 250px; width: 400px; border-radius: 15px;">
                        </div>
                    </form>
                </div>

                <div class="tab-pane" id="edit">
                    <form class="form-horizontal" method="POST" action="{{ route('books.update', $book->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Title</label>
                            <input name="title" type="text" class="form-control" placeholder="Title" value="{{ $book->title }}">
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category_id" id="tags" type="text">
                                <option> {{ $book->category->title }}</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"> {{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Author</label>
                            <input name="author" type="text" class="form-control" placeholder="Author" value="{{ $book->author }}">
                        </div>
                        <div class="form-group">
                            <label>Publisher</label>
                            <input name="publisher" type="text" class="form-control" placeholder="Publisher" value="{{ $book->publisher }}">
                        </div>
                        <div class="form-group">
                            <label>Publish Date</label>
                            <input name="publish_date" type="date" class="form-control" placeholder="Publish Date" value="{{ $book->publish_date }}">
                        </div>
                        <div class="form-group">
                            <label>Bahasa</label>
                            <input name="language" type="text" class="form-control" placeholder="Bahasa" value="{{ $book->language }}">
                        </div>
                        <div class="form-group">
                            <label>Jumlah Halaman</label>
                            <input name="pages" type="number" class="form-control" placeholder="Jumlah Halaman" value="{{ $book->pages }}">
                        </div>
                        <div class="form-group">
                            <label>Kode Buku</label>
                            <input name="code" type="text" class="form-control" placeholder="Kode Buku" value="{{ $book->code }}">
                        </div>
                        <div class="form-group">
                            <label>Status Buku</label>
                            <select name="status" id="tagz" type="text">
                                <option value="1" class="btn btn-xs btn-success"> Available </option>
                                <option value="0" class="btn btn-xs btn-danger"> Dipinjam </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <div class="custom-file">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                <input name="image" type="file" class="custom-file-input" id="exampleInputFile" onchange="loadPreview(this);">
                                <p class="text-danger">{{ $errors->first('photo') }}</p>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <label for="image">Image Preview</label>
                            <br>
                            <a href="#" class="thumbnail">
                                <img id="preview_img" src="{{ asset('storage/books/'. $book->image) }}" style="height: 500px; width: 350px; border-radius: 15px;">
                            </a>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary col-md-12" value="post">Update</button> 
                        </div>
                    </form>
                </div>
            <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
        <br><br><br><br>
    </div>
    <!-- /.nav-tabs-custom -->
</div>
    
@endsection

@section('js')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/css/selectize.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/js/standalone/selectize.min.js"></script>
<script>
    $(function() {
        $('#tag').selectize();
    });

    $(function() {
        $('#tags').selectize();
    });

    function loadPreview(input, id) {
        id = id || '#preview_img';
        if (input.files && input.files[0]) {
            var reader = new FileReader();
     
            reader.onload = function (e) {
                $(id).attr('src', e.target.result).width(350).height(600);
            };
     
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection