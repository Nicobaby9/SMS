@extends('layouts.photo')

@section('content')
<div class="container">
    @if (auth()->user()->id !== $id->id) 
    <div class="row justify-content-center">
        <div class="col-md-8" style="text-align: center;">
            <h3 style="text-align: center;">Halaman Terlarang!!</h3>
            <br>
            <a href="{{ url()->previous() }}" class="btn btn-info btn-sm" >Kembali</a>
            <!-- <a href="{{ url()->previous() }}" class="btn btn-info btn-sm" >Home</a> -->
        </div>
    </div>
        
    @else
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Upload Photo</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{ route('photo.store', auth()->user()->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="photo" type="file" class="custom-file-input" id="exampleInputFile" onchange="loadPreview(this);" required>
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="text-align: center;">
                        <img id="preview_img" src="https://www.w3adda.com/wp-content/uploads/2019/09/No_Image-128.png" class="" width="200" height="150"/>
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
</div>
@endsection
