@extends('layouts/admin')

@section('content')

@if($layout == 'index')
    <div class="row header-container justify-content-center">
        <div class="header">
            <h2 style="font-family: 'Gill Sans', sans-serif;">Manajemen Siswa</h2>
        </div>
    </div>
    <div class="container-fluid mt-4">
        <div class="row">
            <section class="col-md-12">
                @include('admin/students/studentlist')
            </section>
            <section class="col-md-4">
                
            </section>
        </div>
    </div>
@elseif($layout == 'create')
    @if ($errors->any())
        <div class="alert alert-danger"  style="text-align: center;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>Data NISN tidak boleh sama.</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container-fluid mt-4">
        <div class="row">
            <section class="col">
                @include('admin/students/studentlist')
            </section>
            <section class="col">
                <div class="card mb-3">
                    <img src="https://i.pinimg.com/736x/27/ee/cf/27eecf1789ddcc5c372120b03b20adc4.jpg" class="card-img-top" alt="..."  style="height: 200px;">
                    <div class="card-body">
                        <h5 class="card-title">Masukkan Informasi Siswa</h5>
                        <br>
                        <form role="form" action="{{ route('students.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Nomor Induk Siswa Nasional</label>
                                <input name="nisn" type="text" class="form-control" placeholder="NISN" required>
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input name="fullname" type="text" class="form-control" placeholder="Nama" required>
                            </div>
                            <div class="form-group">
                                <label>Agama</label>
                                <input name="religion" type="text" class="form-control" placeholder="Agama" required>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select class="form-control" name="gender" id="active">
                                    <option value="Laki-Laki" @if (old('active') == 'Laki-Laki') selected @endif>Laki-Laki</option>
                                    <option value="Perempuan" @if (old('active') == 'Perempuan') selected @endif>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input name="birth" type="date" class="form-control" placeholder="Tanggal Lahir" required>
                            </div>
                            <div class="form-group">
                                <label>Handphone</label>
                                <input name="phone" type="text" class="form-control" placeholder="Handphone" required>
                            </div>
                            <div class="form-group">
                                <label>Jurusan</label>
                                <input name="speciality" type="text" class="form-control" placeholder="Jurusan" required>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input name="address" type="text" class="form-control" placeholder="Alamat" required>
                            </div>
                            <div class="form-group">
                                <label>Tahun Masuk</label>
                                <input name="start_year" type="date" class="form-control" placeholder="Tahun Masuk" required>
                            </div>
                            <div class="form-group">
                                <label>Tahun Lulus</label>
                                <input name="end_year" type="date" class="form-control" placeholder="Tahun Lulus" required>
                            </div>
                            <input type="submit" class="btn btn-info" value="Save">
                            <input type="reset" class="btn btn-danger" value="Reset">
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@elseif($layout == 'show')
    <div class="container-fluid mt-4">
        <div class="row">
            <section class="col">
                @include('admin/students/studentlist')
            </section>
            <section class="col">
                <div class="card mb-3">
                    <img src="https://immfhumy.files.wordpress.com/2017/01/yourstory-education.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Detail Data Siswa - {{ $student->fullname }}</h5>
                        <br>
                        <a style="float: left; margin-right: 13px;" href="{{ route('students.edit', [$student->id]) }}" class="btn btn-sm btn-warning"> Edit </a>
                        <form action="{{ route('students.destroy', [$student->id]) }}" method="post" accept-charset="utf-8" style="float: left;">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin akan menghapus data?')">
                        </form>
                    </div>
                </div>
                <form>
                    <div class="form-group">
                        <label>Nomor Induk Siswa</label>
                        <input value="{{ $student->nisn }}" name="nisn" type="text" class="form-control" placeholder="nisn" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input value="{{ $student->fullname }}" name="fullname" type="text" class="form-control" placeholder="Nama" readonly>
                    </div>
                    <div class="form-group">
                        <label>Agama</label>
                        <input value="{{ $student->religion }}" name="religion" type="text" class="form-control" placeholder="Agama" readonly>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <input value="{{ $student->gender }}" name="gender" type="text" class="form-control" placeholder="Jenis Kelamin" readonly>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input value="{{ $student->birth }}" name="birth" type="text" class="form-control" placeholder="Tanggal Lahir" readonly>
                    </div>
                    <div class="form-group">
                        <label>Handphone</label>
                        <input value="{{ $student->phone }}" name="age" type="text" class="form-control" placeholder="Handphone" readonly>
                    </div>
                    <div class="form-group">
                        <label>Jurusan</label>
                        <input value="{{ $student->speciality }}" name="speciality" type="text" class="form-control" placeholder="Jurusan" readonly>
                    </div>
                    <div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
                        <label>Status Kelulusan</label>
                        <br>
                        <select class="form-control" name="status" id="active" disabled>
                            <option value="1" @if (old('active') == 1) selected @endif>Aktif</option>
                            <option value="0" @if (old('active') == 0) selected @endif>Lulus</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input value="{{ $student->address }}" name="status" type="text" class="form-control" placeholder="Alamat" readonly>
                    </div>
                    <div class="form-group">
                        <label>Tahun Masuk</label>
                        <input value="{{ $student->start_year }}" name="start_year" type="text" class="form-control" placeholder="Tahun Masuk" readonly>
                    </div>
                    <div class="form-group">
                        <label>Tahun Lulus</label>
                        <input value="{{ $student->end_year }}" name="start_year" type="text" class="form-control" placeholder="Tahun Lulus" readonly>
                    </div>
                </form>
            </section>
        </div>
    </div>
@elseif($layout == 'edit')
    <div class="container-fluid mt-4">
        <div class="row">
            <section class="col-md-7">
                @include('admin/students/studentlist')
            </section>
            <section class="col-md-5">
                <div class="card mb-3">
                    <img src="https://edtechreview.in/images/online-education-future-india.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Update Informasi Siswa</h5>
                        <br>
                        <form role="form" action="{{ route('students.update', [$student->id]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Nomor Induk Siswa</label>
                                <input value="{{ $student->nisn }}" name="nisn" type="text" class="form-control" placeholder="nisn">
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input value="{{ $student->fullname }}" name="fullname" type="text" class="form-control" placeholder="Nama">
                            </div>
                             <div class="form-group">
                                <label>Agama</label>
                                <input value="{{ $student->religion }}" name="religion" type="text" class="form-control" placeholder="Agama">
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <input value="{{ $student->gender }}" name="gender" type="text" class="form-control" placeholder="Jenis Kelamin">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input value="{{ $student->birth }}" name="birth" type="text" class="form-control" placeholder="Tanggal Lahir">
                            </div>
                            <div class="form-group">
                                <label>Hanphone</label>
                                <input value="{{ $student->phone }}" name="phone" type="text" class="form-control" placeholder="Nomor Handphone">
                            </div>
                            <div class="form-group">
                                <label>Jurusan</label>
                                <input value="{{ $student->speciality }}" name="speciality" type="text" class="form-control" placeholder="Jurusan">
                            </div>
                            <div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
                                <label>Status Kelulusan</label>
                                <br>
                                <select class="form-control" name="status" id="active">
                                    <option value="1" @if (old('active') == 1) selected @endif>Aktif</option>
                                    <option value="0" @if (old('active') == 0) selected @endif>Lulus</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input value="{{ $student->address }}" name="address" type="text" class="form-control" placeholder="Alamat">
                            </div>
                            <div class="form-group">
                                <label>Tahun Masuk</label>
                                <input value="{{ $student->start_year }}" name="start_year" type="date" class="form-control" placeholder="Tahun Masuk">
                            </div>
                            <div class="form-group">
                                <label>Tahun Lulus</label>
                                <input value="{{ $student->end_year }}" name="end_year" type="date" class="form-control" placeholder="Tahun Lulus">
                            </div>
                            <input type="submit" class="btn btn-primary" value="Update" onclick="return confirm('Apakah data sudah valid?')">
                            <input type="reset" class="btn btn-danger" value="Reset">
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endif
@endsection