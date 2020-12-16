@extends('../layouts/admin')

@section('content')

<div class="container-fluid mt-4">
	<section class="col-md-6">
	    <form role="form" action="{{ route('profil.update', [$profile->id]) }}" method="post" enctype="multipart/form-data">
	    	@csrf
	    	@method('PUT')
	        <div class="form-group">
	            <label>Email</label>
	            <input value="{{ $profile->email }}" name="email" type="text" class="form-control">
	        </div>
	        <div class="form-group">
	            <label>Nama</label>
	            <input value="{{ $profile->fullname }}" name="fullname" type="text" class="form-control" placeholder="Nama" >
	        </div>
	        <div class="form-group">
                <label for="photo">Foto</label>
                <hr>
                <img src="{{ asset('storage/profile-photo/' . $profile->photo) }}" width="100px" height="100px" alt="{{ $profile->fullname }}">
                <hr>
                <input type="file" name="photo" class="form-control">
                <p>*Biarkan kosong jika tidak ingin mengganti gambar</p>
                <p class="text-danger">{{ $errors->first('photo') }}</p>
            </div>
	        <div class="form-group">
	            <label>Handphone</label>
	            <input value="{{ $profile->phone }}" name="age" type="text" class="form-control" placeholder="Handphone" >
	        </div>
	        <input type="submit" class="btn btn-primary" value="Save" onclick="return confirm('Apakah data sudah valid?')">
            <input type="reset" class="btn btn-danger" value="Reset">
	    </form>
	</section>
</div>	

@endsection