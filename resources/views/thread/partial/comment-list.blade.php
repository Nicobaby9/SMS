<br>
<div>
	@if(!empty($thread->solution))
		@if($thread->solution == $comment->id) 
			<button class="btn btn-success pull-right">Jawaban Terpilih</button>
		@endif
	@else
		@if(auth()->check())
			@if(auth()->user()->id == $thread->user_id)
			<!-- <form action="{{ route('markAsSolution') }}" method="post" accept-charset="utf-8">
				@csrf
				<input type="hidden" name="threadId" value="{{ $thread->id }}">
				<input type="hidden" name="solutionId" value="{{ $comment->id }}">
				<input type="submit" class="btn btn-primary pull-right" id="{{ $comment->id }}" value="Pilih Jawaban Tepat"></input>
			</form>	 -->
			<div class="btn btn-primary pull-right" onclick="markAsSolution('{{ $thread->id }}', '{{ $comment->id }}', this)"> Pilih Jawaban Tepat</div>

			@endif
		@endif
	@endif
	<h5 style="margin-top: -10px; font-weight: bold;">{{ $comment->user->fullname }}</h5>
	<lead>{{ $comment->body }}</lead>
	<br>
	<button class="btn btn-default btn-xs">{{ $comment->likes()->count() }}</button>
	<button class="btn btn-default btn-xs" onclick="likeIt('{{$comment->id}}', this)">
		<span class="fas fa-heart {{ $comment->isLiked()? 'liked':'' }}"></span>
	</button>
	@if(auth()->user()->id == $comment->user_id)
    <form action="{{route('comment.destroy',$comment->id)}}" method="POST" class="inline-it">
        @csrf
        @method('DELETE')
        <input class="btn btn-sm btn-danger btn-xs" type="submit" value="Delete">
    </form>
	<a href="#{{$comment->id}}" class="btn btn-primary btn-sm btn-xs float-right" data-toggle="modal" data-target="#exampleModal{{ $comment->id }}">
		<i class="nav-icon far fa-edit"></i>
	</a>
	@endif
</div>

@section('js')

<script>
	function markAsSolution(threadId, solutionId, elem) {
        var csrfToken='{{csrf_token()}}';
        $.post('{{route('markAsSolution')}}', {solutionId: solutionId, threadId: threadId,_token:csrfToken}, function (data) {
            $(elem).text('Jawaban Terpilih');
        });
    }

    function likeIt(commentId, elem) {
        var csrfToken='{{csrf_token()}}';
		$.post('{{route('toggleLike')}}', {commentId: commentId, _token:csrfToken}, function (data) {
            if(data.message==='liked') {
               $(elem).addClass('liked');
               $('#'+commentId+"-count").text(likesCount+1);
               $(elem).css({colod: 'red'});
            }else {
               $('#'+commentId+"-count").text(likesCount-1);
               $(elem).removeClass('liked');
            }
        });
    }
</script>

@endsection