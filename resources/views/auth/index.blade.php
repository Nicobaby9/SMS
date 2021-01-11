@extends('layouts.photo')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-primary" style="text-align: center;">
                    <div class="card-header">
                        <h3 class="card-title">Photo Upload</h3>
                        <p>Anda diharuskan melengkapi data diri anda.</p>
                        <a href="{{ route('photo', auth()->user()->id) }}" class="btn btn-lg btn-success">Upload Page</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection