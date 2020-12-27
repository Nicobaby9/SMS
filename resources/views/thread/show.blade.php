@extends('layouts.front')

@section('content')
	<h4>{{ $thread->subject }}</h4>
	<br>
	<div class="thread-details" >
		{!! \Michelf\Markdown::defaultTransform($thread->thread) !!}
	</div>
	<br>

	@if(auth()->user()->id == $thread->user_id)
	<div class="action">
		<a href="{{ route('forum.edit', $thread->id) }}" class="btn btn-info btn-xs" style="float: left; margin-right: 5px;">Edit</a>
		<form action="{{ route('forum.destroy', $thread->id) }}" method="post" class="inline-it">
			@csrf
			@method('DELETE')
			<input class="btn btn-danger btn-xs" type="submit" value="Delete">
		</form>
	</div>
	@endif

	<!-- Comment/Answers -->

	<div class="comment-list">
		@foreach($thread->comments as $comment)
		<h4 class="">{{ $comment->body }}</h4>
		<lead>{{ $comment->user->fullname }}</lead>

		@if(auth()->user()->id == $thread->user_id)
		<div class="action">
			<a class="btn btn-primary btn-xs" data-toggle="modal" href="#{{ $comment->id }}">Edit</a>

			<div class="modal fade" id="{{ $comment->id }}">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="clone" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Modal Title</h4>
						</div>
						<div class="modal-body">
							<form action="{{ route('comment.update', $comment->id) }}" method="post" accept-charset="utf-8" role="form">
								@csrf
								@method('PUT')
								<h5>Edit Komentar</h5>
								<div class="form-group" style="margin-top: -15px;">
									<label for=""></label>
									<input type="text" class="form-control" name="body" value="{{ $comment->body }}">
								</div>

								<button type="submit" class="btn btn-primary">Komen</button>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary">Simpan</button>
						</div>
					</div>
				</div>
			</div>

			<form action="{{ route('comment.destroy', $comment->id) }}" method="post" class="inline-it">
				@csrf
				@method('DELETE')
				<input class="btn btn-danger btn-xs" type="submit" value="Delete">
			</form>
		</div>
		@endif

		@endforeach
	</div>
	<br><br>
	<div class="comment-form">
		<form action="{{ route('threadcomment.store', $thread->id) }}" method="post" accept-charset="utf-8" role="form">
			@csrf
			<h5>Tambahkan Komentar</h5>
			<div class="form-group" style="margin-top: -15px;">
				<label for=""></label>
				<input type="text" class="form-control" name="body">
			</div>

			<button type="submit" class="btn btn-primary">Komen</button>
		</form>
	</div>

@endsection