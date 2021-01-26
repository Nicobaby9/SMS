@extends('layouts.admin')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header p-2">
            <button class="btn btn-danger btn-flat btn-md remove-book float-right" data-id="{{ $book->id }}" data-action="{{ route('books.destroy',$book->id) }}"> Delete</button>
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
                            <img src="{{ asset('storage/books/'.$book->image) }}" style="height: 600px; width: 350px; border-radius: 15px;">
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
                                <option value="{{ $book->category_id }}"> {{ $book->category->title }}</option>                                @foreach($categories as $category)
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
                        <div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
                            <label>Status Buku</label>
                            <br>
                            <select class="form-control" name="status" id="active">
                                <option class="btn btn-xs btn-success" value="1" @if (old('active') == 1) selected @endif>Available</option>
                                <option class="btn btn-xs btn-danger" value="0" @if (old('active') == 0) selected @endif>Dipinjam</option>
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
    $("body").on("click",".remove-book",function(){
        var current_object = $(this);
        swal({
            title: "Are you sure?",
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