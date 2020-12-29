@extends('../layouts.front')

@section('content')

<div class="container-fluid mt-4">
    <div class="row">
        <section class="col">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Apa yang anda ingin tanyakan?</h5>
                    <br>
                    <form role="form" action="{{ route('forum.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Judul Post</label>
                            <input name="subject" type="text" class="form-control" placeholder="Judul Post" value="{{ old('subject') }}" required>
                        </div>
                        <div class="form-group">
                            <label>Tipe</label>
                            <input name="type" type="text" class="form-control" placeholder="Tipe"  value="{{ old('type') }}" required>
                        </div>
                        <div class="form-group">
                            <label>Isi Post</label>
                            <textarea name="thread" type="text" class="form-control" placeholder="Isi Post" value="{{ old('thread') }}" rows="5" required> </textarea>
                        </div>
                        <div class="form-group"> 
                            {!! NoCaptcha::renderJs() !!}
                            {!! app('captcha')->display(['data-theme' => 'dark']) !!}
                        </div>

                        <input type="submit" class="btn btn-info" value="Save">
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
	
@endsection