@extends('../layouts.front')

@section('content')

@include('thread.partial.error')
@include('thread.partial.success')

<div class="container-fluid mt-4">
    <div class="row">
        <section class="col">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Post something</h5>
                    <br>
                    <form role="form" action="{{ route('thread.update', $thread->slug) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Judul Post</label>
                            <input name="subject" type="text" class="form-control" placeholder="Judul Post" value="{{ $thread->subject }}" required>
                        </div>
                        <div class="form-group" >
                            <select name="tags[]" id="tag" type="text" multiple>
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}" 
                                        @foreach($thread->tags as $value)
                                            @if($tag->id == $value->id)
                                                selected
                                            @endif
                                        @endforeach
                                    >
                                    {{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Isi Post</label>
                            <textarea name="thread" type="text" class="form-control" placeholder="Isi Post" value="{{ $thread->thread }}" rows="5" required> {{ $thread->thread }} </textarea>
                        </div>
                        <input type="submit" class="btn btn-info" value="Save">
                        <input type="reset" class="btn btn-danger" value="Reset">
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
	
@endsection

@section('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.0/js/standalone/selectize.min.js"></script>
    <script>
        $(function() {
            $('#tag').selectize();
        })
    </script>
@endsection