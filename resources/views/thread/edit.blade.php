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
                    <form role="form" action="{{ route('forum.update', $thread->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Judul Post</label>
                            <input name="subject" type="text" class="form-control" placeholder="Judul Post" value="{{ $thread->subject }}" required>
                        </div>
                        <div class="form-group">
                            <label>Tipe</label>
                            <input name="type" type="text" class="form-control" placeholder="Tipe"  value="{{ $thread->type }}" required>
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