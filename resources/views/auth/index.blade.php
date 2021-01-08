@extends('layouts.photo')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-primary" style="text-align: center;">
                    <div class="card-header">
                        <h3 class="card-title">Photo</h3>
                        <p>Anda diharuskan mengupload foto diri</p>
                        <a href="{{ route('photo', auth()->user()->id) }}" title="">Klik untuk menuju halaman upload</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection