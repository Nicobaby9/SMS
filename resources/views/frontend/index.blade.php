@extends('layouts.admin')

@section('content')
<div class="col-md-12">
    <div class="card">
    <div class="card-header p-2">
        <a class="btn btn-md btn-warning float-right" href="{{ route('frontend.image') }}">Images Edit</a>
        <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link active" href="#detail" data-toggle="tab">Detail</a></li>
            <li class="nav-item"><a class="nav-link " href="#edit" data-toggle="tab">Edit</a></li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane active" id="detail">
                <form class="form-horizontal" method="POST">
                @csrf
                {{--  School Name  --}}
                <div class="form-group">
                    <label for="slogan" class="col-sm-3 control-label">Nama Sekolah</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" rows="6" cols="20" name="school_name" value="{{ $frontend->school_name }}" disabled> </input>
                    </div>
                </div>

                {{--  Slogan  --}}
                <div class="form-group">
                    <label for="slogan" class="col-sm-3 control-label">Slogan</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" rows="6" cols="20"  name="slogan" value="{{ $frontend->slogan }}" disabled> </input>
                    </div>
                </div>

                {{--  Student Total  --}}
                <div class="form-group">
                    <label for="students" class="col-sm-3 control-label">Jumlah Peserta Didik</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="students" name="students" value="{{ $frontend->students }}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="educator" class="col-sm-3 control-label">Jumlah Pendidik</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="educator" name="educator" value="{{ $frontend->educator }}" disabled>
                    </div>
                </div>
                {{--  Teacher Total  --}}
                <div class="form-group">
                    <label for="teacher" class="col-sm-3 control-label">Jumlah Tenaga Pendidik</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="teacher" name="teacher" value="{{ $frontend->teacher }}" disabled>
                    </div>
                </div>
                {{--  Course Total  --}}
                <div class="form-group">
                    <label for="course" class="col-sm-3 control-label">Jumlah Mata Pelajaran</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="course" value="{{ $frontend->course }}" disabled>
                    </div>
                </div>

                {{--  FIRST CONTENT  --}}
                <div class="form-group">
                    <label for="content1_title" class="col-sm-3 control-label">Judul Konten 1</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="content1_title" value="{{ $frontend->content1_title }}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="content1_body" class="col-sm-3 control-label">Isi Konten 1</label>

                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" name="content1_body" rows="3" disabled> {{ $frontend->content1_body }}</textarea>
                    </div>
                </div>

                {{--  SECOND CONTENT  --}}
                <div class="form-group">
                    <label for="content2_title" class="col-sm-3 control-label">Judul Konten 2</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="content2_title" value="{{ $frontend->content2_title }}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="content2_body" class="col-sm-3 control-label">Isi Konten 2</label>

                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" name="content2_body" rows="3" disabled> {{ $frontend->content2_body }} </textarea>
                    </div>
                </div>

                {{--  Third CONTENT  --}}
                <div class="form-group">
                    <label for="content3_title" class="col-sm-3 control-label">Judul Konten 3</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="content3_title" value="{{ $frontend->content3_title }}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="content3_body" class="col-sm-3 control-label">Isi Konten 3</label>

                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" name="content3_body" rows="4" disabled>{{ $frontend->content3_body }}</textarea>
                    </div>
                </div>

                {{--  FIRST PROFILE  --}}
                <div class="form-group">
                    <label for="profile1_title" class="col-sm-3 control-label">Judul Profil 1</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="profile1_title" name="profile1_title" value="{{ $frontend->profile1_title }}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="profile1_body" class="col-sm-3 control-label">Isi Profil 1</label>

                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" id="profile1_body" name="profile1_body" rows="3" disabled>{{ $frontend->profile1_body }}</textarea>
                    </div>
                </div>

                {{--  SECOND PROFILE  --}}
                <div class="form-group">
                    <label for="profile2_title" class="col-sm-3 control-label">Judul Profil 2</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="profile2_title" name="profile2_title" value="{{ $frontend->profile2_title }}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="profile2_body" class="col-sm-3 control-label">Isi Profil 2</label>

                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" id="profile2_body" name="profile2_body" rows="3" disabled>{{ $frontend->profile2_body }}</textarea>
                    </div>
                </div>

                {{--  THIRD PROFILE  --}}
                <div class="form-group">
                    <label for="profile3_title" class="col-sm-3 control-label">Judul Profil 3</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="profile3_title" name="profile3_title" value="{{ $frontend->profile3_title }}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="profile3_body" class="col-sm-3 control-label">Isi Profil 3</label>

                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" id="profile3_body" name="profile3_body" rows="3" disabled>{{ $frontend->profile3_body }}</textarea>
                    </div>
                </div>

                </form>
            </div>

            <div class="tab-pane" id="edit">
                <form class="form-horizontal" method="POST" action="{{ route('front-end.update', [$frontend->id]) }}">
                @csrf
                {{ method_field('PATCH') }}
                <input type="hidden" name="_method" value="PATCH">

                {{--  Slogan  --}}
                <div class="form-group">
                    <label for="slogan" class="col-sm-3 control-label">Slogan</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" rows="6" cols="20"  name="slogan" value="{{ $frontend->slogan }}"> </input>
                    </div>
                </div>

                {{--  Student Total  --}}
                <div class="form-group">
                    <label for="students" class="col-sm-3 control-label">Jumlah Peserta Didik</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="students" value="{{ $frontend->students }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="educator" class="col-sm-3 control-label">Jumlah Pendidik</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control"  name="educator" value="{{ $frontend->educator }}">
                    </div>
                </div>
                {{--  Teacher Total  --}}
                <div class="form-group">
                    <label for="teacher" class="col-sm-3 control-label">Jumlah Tenaga Pendidik</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="teacher" value="{{ $frontend->teacher }}">
                    </div>
                </div>
                {{--  Course Total  --}}
                <div class="form-group">
                    <label for="course" class="col-sm-3 control-label">Jumlah Mata Pelajaran</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control"  name="course" value="{{ $frontend->course }}">
                    </div>
                </div>

                {{--  FIRST CONTENT  --}}
                <div class="form-group">
                    <label for="content1_title" class="col-sm-3 control-label">Judul Konten 1</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="content1_title" value="{{ $frontend->content1_title }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="content1_body" class="col-sm-3 control-label">Isi Konten 1</label>

                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" name="content1_body" rows="3">{{ $frontend->content1_body }}</textarea>
                    </div>
                </div>
                {{--  SECOND CONTENT  --}}
                <div class="form-group">
                    <label for="content2_title" class="col-sm-3 control-label">Judul Konten 2</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="content2_title" value="{{ $frontend->content2_title }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="content2_body" class="col-sm-3 control-label">Isi Konten 2</label>

                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" name="content2_body" rows="3">{{ $frontend->content2_body }}</textarea>
                    </div>
                </div>
                {{--  Third CONTENT  --}}
                <div class="form-group">
                    <label for="content3_title" class="col-sm-3 control-label">Judul Konten 4</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="content3_title" value="{{ $frontend->content3_title }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="content3_body" class="col-sm-3 control-label">Isi Konten 4</label>

                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" name="content3_body" rows="3">{{ $frontend->content3_body }}</textarea>
                    </div>
                </div>
                {{--  FIRST PROFILE  --}}
                <div class="form-group">
                    <label for="profile1_title" class="col-sm-3 control-label">Judul Profil 1</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="profile1_title" value="{{ $frontend->profile1_title }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="profile1_body" class="col-sm-3 control-label">Isi Profil 1</label>

                    <div class="col-sm-10">
                        <textarea type="text" class="form-control"  name="profile1_body" rows="3">{{ $frontend->profile1_body }}</textarea>
                    </div>
                </div>

                {{--  SECOND PROFILE  --}}
                <div class="form-group">
                    <label for="profile2_title" class="col-sm-3 control-label">Judul Profil 2</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="profile2_title" value="{{ $frontend->profile2_title }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="profile2_body" class="col-sm-3 control-label">Isi Profil 2</label>

                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" name="profile2_body" rows="3">{{ $frontend->profile2_body }}</textarea>
                    </div>
                </div>

                {{--  THIRD PROFILE  --}}
                <div class="form-group">
                    <label for="profile3_title" class="col-sm-3 control-label">Judul Profil 3</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control"  name="profile3_title" value="{{ $frontend->profile3_title }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="profile3_body" class="col-sm-3 control-label">Isi Profil 3</label>

                    <div class="col-sm-10">
                        <textarea type="text" class="form-control"  name="profile3_body" rows="3">{{ $frontend->profile3_body }}</textarea>
                    </div>
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
    </div>
    <!-- /.nav-tabs-custom -->
</div>
    
@endsection

@section('js')
<script>
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