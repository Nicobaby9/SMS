@extends('layouts.front')

@section('content')
	<p class="float-right inline-it">{{ $thread->user->fullname }}</p>
	<h4 style="font-weight: bold;">{{ $thread->subject }}</h4>
	<div class="thread-details" style="margin-left: 20px; border-radius: 5px;"> {!! \Michelf\Markdown::defaultTransform($thread->thread) !!}
	</div>
	<br>

	@if(auth()->user()->id == $thread->user_id)
	<div class="action">
		<a href="{{ route('forum.edit', $thread->id) }}" class="btn btn-info btn-sm" style="float: left; margin-right: 5px;">Edit</a>
		<form action="{{ route('forum.destroy', $thread->id) }}" method="post" class="inline-it">
			@csrf
			@method('DELETE')
			<input class="btn btn-danger btn-sm" type="submit" value="Delete">
		</form>
	</div>
	<br>
	@endif

	<h4>Komentar</h4>
	<!-- Comment/Answers -->

	@foreach($thread->comments as $comment)
	<div class="comment-list" style="margin-left: 20px;">
		<div>
			<br>
			
			<h5 style="margin-top: -10px; font-weight: bold;">{{ $comment->user->fullname }}</h5>
			<lead>{{ $comment->body }}</lead>

			@if(auth()->user()->id == $comment->user_id)
		    <form action="{{route('comment.destroy',$comment->id)}}" method="POST" class="inline-it float-right">
		        @csrf
		        @method('DELETE')
		        <input class="btn btn-sm btn-danger btn-xs" type="submit" value="Delete">
		    </form>
			<a href="#{{$comment->id}}" class="btn btn-primary btn-sm btn-xs float-right" data-toggle="modal" data-target="#exampleModal{{ $comment->id }}">
				<i class="nav-icon far fa-edit"></i>
			</a>
			@endif
		</div>

		@if(auth()->user()->id == $comment->user_id)
		<div class="action">

            <!-- Modal -->
			<div class="modal fade" id="exampleModal{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			            <h4 class="modal-title" id="userCrudModal">Edit Komentar</h4>
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
						<button type="submit" class="btn btn-primary">Simpan</button>
					</form>
		          </div>
			    </div>
			  </div>
			</div>
		</div>

		<br>

		@endif

		<!-- Reply/Answers -->
		
		@foreach($comment->comments as $reply)
		<div class="small well text-info reply-list">
			<p>By {{ $reply->user->fullname }}</p>
			<lead>{{ $reply->body }}</lead>

			<div>
				@if(auth()->user()->id == $reply->user_id)
			    <form action="{{route('reply.destroy',$reply->id)}}" method="POST" class="inline-it float-right">
			        @csrf
			        @method('DELETE')
			        <input class="btn btn-sm btn-danger btn-xs" type="submit" value="Delete">
			    </form>
				<a href="#{{$reply->id}}" class="btn btn-primary btn-sm btn-xs float-right" data-toggle="modal" data-target="#exampleModal{{ $reply->id }}">
					<i class="nav-icon far fa-edit">Reply</i>
				</a>
				@endif
			</div>

			@if(auth()->user()->id == $reply->user_id)
			<div class="action">
	            <!-- Modal -->
				<div class="modal fade" id="exampleModal{{ $reply->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
				  	<div class="modal-dialog" role="document">
				    	<div class="modal-content">
				      		<div class="modal-header">
				            	<h4 class="modal-title" id="userCrudModal">Edit Reply</h4>
			        		</div>
			          		<div class="modal-body">
				              	<form action="{{ route('reply.update', $reply->id) }}" method="post" accept-charset="utf-8" role="form">
									@csrf
									@method('PUT')
									<h5>Edit Reply</h5>
									<div class="form-group" style="margin-top: -15px;">
										<label for=""></label>
										<input type="text" class="form-control" name="body" value="{{ $reply->body }}">
									</div>
									<button type="submit" class="btn btn-primary">Simpan</button>
								</form>
			          		</div>
				    	</div>
				  	</div>
				</div>
			</div>

			@endif
		</div>
		@endforeach

		<!-- Reply FORM -->
		<div class="reply-form" style="margin-left: 10px;">
			<form action="{{ route('replycomment.store', $comment->id) }}" method="post" accept-charset="utf-8" role="form">
				@csrf
				<p style="font-weight: bold; font-size: 12px;">Reply Komentar</p>
				<div class="form-group-prepend">
					<input type="text" class="form-control" name="body" style="height: 30px;">
				</div>

				<button type="submit" class="btn btn-success" style="margin-top: -10px; margin-bottom: 20px;">Reply</button>
			</form>
		</div>
	</div>

	
	@endforeach
	<!-- //COMMENT-FORM -->
	<div class="comment-form">
		<form action="{{ route('threadcomment.store', $thread->id) }}" method="post" accept-charset="utf-8" role="form">
			@csrf
			<p style="font-weight: bold;">Tambahkan Komentar</p>
			<div class="form-group" style="margin-top: -25px;">
				<label for=""></label>
				<input type="text" class="form-control" name="body" style="height: 30px;">
			</div>

			<button type="submit" class="btn btn-success" style="margin-top: -10px; margin-bottom: 20px;">Komen</button>
		</form>
	</div>
	
@endsection

@section('js')

    <script>

    	let id;
    	$(this).data('id');

		$('#id').on('shown.bs.modal', function () {
		  $('#myInput').trigger('focus')
		})

        function toggleReply(commentId){
            $('.reply-form-'+commentId).toggleClass('hidden');
        }
    </script>

@endsection