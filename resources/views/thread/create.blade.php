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
                        <div class="form-group" >
                            <label for="tag">Tags</label>
                            <select name="tags[]" id="tag" multiple required>
                                @foreach($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Isi Post</label>
                            <textarea name="thread" type="text" class="form-control" placeholder="Isi Post"rows="5" required>{{ old('thread') }}</textarea>
                        </div>
                        <div class="form-group" required> 
                            {!! NoCaptcha::renderJs() !!}
                            {!! app('captcha')->display(['data-theme' => 'dark']) !!}
                        </div>

                        <input type="submit" class="btn btn-info" value="Save">
                        <br><br>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
	
@endsection

@section('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/js/standalone/selectize.min.js"></script>
    <script>
        $(function() {
            $('#tag').selectize();
        })
    </script>
@endsection