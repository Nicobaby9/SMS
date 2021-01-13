@extends('layouts.admin')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header p-2">
            <form action="{{ route('article.destroy', $article->id) }}" method="post" class="float-right" onclick="return confirm('Are you sure?')">
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
                    <form class="form-horizontal" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Author</label>
                            <input name="author" type="text" class="form-control" placeholder="Author" value="{{ $article->user->fullname }}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            <input name="author" type="text" class="form-control" placeholder="Title" value="{{ \Illuminate\Support\Str::ucfirst($article->title) }}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <textarea class="form-control" rows="4" disabled>{{ $article->content }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <input name="category" type="text" class="form-control" placeholder="Category" value="{{ $article->category->name }}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Slug</label>
                            <input name="slug" type="text" class="form-control" placeholder="Slug" value="{{ $article->slug }}" disabled>
                        </div>
                        <div class="form-group text-center">
                            <label>Image</label>
                            <br>
                            <img src="{{ asset('article/'. $article->image) }}" style="height: 250px; width: 400px; border-radius: 15px;">
                        </div>
                        <div class="form-group">
                            
                        </div>
                    </form>
                </div>

                <div class="tab-pane" id="edit">
                    <form class="form-horizontal" method="POST" action="{{ route('article.update', $article->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Title</label>
                            <input name="title" type="text" class="form-control" placeholder="Author" value="{{ $article->title }}">
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <textarea name="content" value="{{ $article->content }}" class="form-control" rows="4">{{ $article->content }}</textarea>
                        </div>
                        <div class="form-group" >
                            <label for="category">Category</label>
                            <select class="form-control" name="category_id" id="category" >
                                <option value="{{ $article->category_id }}" holder>{{ $article->category->name }}</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                <input name="image" type="file" class="custom-file-input" id="exampleInputFile" onchange="loadPreview(this);"  value="{{ $article->images }}">
                            </div>
                        </div>
                        <div class="form-group" style="text-align: center;">
                            <img id="preview_img" src="{{ asset('article/'.$article->image) }}" class="" width="400" height="200"/>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary" value="post">Submit</button>
                            </div>
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
<script>
    function loadPreview(input, id) {
        id = id || '#preview_img';
        if (input.files && input.files[0]) {
            var reader = new FileReader();
     
            reader.onload = function (e) {
                $(id).attr('src', e.target.result).width(400).height(200);
            };
     
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection