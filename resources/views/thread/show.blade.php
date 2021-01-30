@extends('layouts.front')

@section('content')

<div class="content-wrap well" style="border-radius: 15px; background-color: #ebebe0;">
	<h4 class="pull-right inline-it">{{ $thread->user->fullname }}</h4>

	<img src="{{ asset('profile_images/'.$thread->user->photo) }}" style="border-radius: 50%; float: right; margin-right: 10px;" width="40" height="40">
	<h4 style="font-weight: bold;">{{ $thread->subject }} </h4>
	<div class="thread-details" style="margin-left: 20px; border-radius: 5px;"> {!! \Michelf\Markdown::defaultTransform($thread->thread) !!} </div>
	<br>
	Tags :
        @foreach($thread->tags as $tag)
    		<a href="{{ route('tag.thread', $tag->name) }}" class="btn btn-xs btn-info">  {{ \Illuminate\Support\Str::title($tag->name) }} &nbsp; </a>
    	@endforeach
    <br><br>

	@if(auth()->user()->id == $thread->user_id)
	<div class="action" >
		<button class="btn btn-danger btn-flat btn-sm remove-thread pull-right" data-id="{{ $thread->id }}" data-action="{{ route('forum.destroy',$thread->id) }}"> Delete</button>
		<a href="{{ route('thread.edit', $thread->slug) }}" class="btn btn-primary btn-sm pull-right" style="margin-right: 5px;">Edit</a>
	</div>
	@endif
    <hr>

</div>
<hr>
	<h4>Komentar</h4>
	<!-- Comment/Answers -->

	@foreach($thread->comments as $comment)
	<div class="comment-list well well-lg" style="margin-left: 20px;">
		@include('thread.partial.comment-list')

		<!-- @if(auth()->user()->id == $comment->user_id) -->
		@can('update', $thread)
		<div class="action">
            <!-- Modal -->
			<div class="app modal fade" id="exampleModal{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
		@endcan
		<!-- @endif -->

		<br>

		<!-- Reply/Answers -->
		@foreach($comment->comments as $reply)
		<div class="small text-info reply-list" style="margin-left: 40px;">	
			<h4>Replies</h4>
			@include('thread.partial.reply-list')
		</div>

		<!-- Modal Reply -->
		@if(auth()->user()->id == $reply->user_id)
		<div class="action">
            <!-- Modal -->
			<div class="app modal fade" id="exampleModal{{ $reply->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
						    <h4 class="modal-title" id="userCrudModal">Edit Komentar</h4>
						</div>
						<div class="modal-body">
						    <form action="{{ route('comment.update', $reply->id) }}" method="post" accept-charset="utf-8" role="form">
								@csrf
								@method('PUT')
								<h5>Edit Komentar</h5>
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

		@endforeach
		<br>
		<button class="btn btn-sm btn-info" onclick="toggleReply('{{ $comment->id }}')">Reply</button>
		<!-- Reply FORM -->
		<div class="reply-form-{{ $comment->id }} hidden" style="margin-left: 40px;">
			<br>
			<form action="{{ route('replycomment.store', $comment->id) }}" method="post" accept-charset="utf-8" role="form">
				@csrf
				<div class="form-group-append">
					<label for="">Reply Komentar</label>
					<input type="text" class="form-control" name="body" style="height: 30px; background-color: transparent;">
				</div>

				<button type="submit" class="btn btn-success" style="margin: 10px 0px 20px 0px;">Reply</button>
			</form>
		</div>
	</div>
	
	@endforeach
	<!-- //COMMENT-FORM -->
	<div class="comment-form">
		<form action="{{ route('threadcomment.store', $thread->id) }}" method="post" accept-charset="utf-8" role="form">
			@csrf
			<p style="font-weight: bold;"></p>
			<div class="form-group">
				<label for="">Tambahkan Komentar</label>
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
	  $('#myInput').trigger('focus').show();
	})

    function toggleReply(commentId){
        $('.reply-form-'+commentId).toggleClass('hidden');
    }

    $("body").on("click",".remove-thread",function(){
        var current_object = $(this);
        swal({
            title: "Apakah anda yakin akan menghapus thread ini?",
            text: "You will not be able to recover this imaginary file!",
            type: "error",
            showCancelButton: true,
            dangerMode: true,
            cancelButtonClass: '#DD6B55',
            confirmButtonColor: '#dc3545',
            confirmButtonText: 'Delete!',
        },function (result) {
            if (result) {
                var action = current_object.attr('data-action');
                var token = jQuery('meta[name="csrf-token"]').attr('content');
                var id = current_object.attr('data-id');

                $('body').html("<form class='form-inline remove-form' method='post' action='"+action+"'></form>");
                $('body').find('.remove-form').append('<input name="_method" type="hidden" value="delete">');
                $('body').find('.remove-form').append('<input name="_token" type="hidden" value="'+token+'">');
                $('body').find('.remove-form').append('<input name="id" type="hidden" value="'+id+'">');
                $('body').find('.remove-form').submit();
            }
        });
    });

</script>
@endsection