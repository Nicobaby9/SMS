@if(!empty($thread->solution))
	@if($thread->solution == $comment->id) 
		<button class="btn btn-success pull-right">Jawaban Terpilih</button>
	@endif
@else
	@can('update', $thread)
	<div class="btn btn-primary pull-right" onclick="markAsSolution('{{ $thread->id }}', '{{ $comment->id }}', this)"> Pilih Jawaban Tepat</div>
	@endcan
@endif
<img src="{{ asset('profile_images/'.$comment->user->photo) }}" style="border-radius: 50%; float: left; margin-right: 10px;" width="40" height="40">
<h5 style="margin-top: -5px; font-weight: bold;">{{ $comment->user->fullname }}</h5>
<p style="margin-left: 50px">{{ $comment->body }}</p>
@if(auth()->user()->id == $comment->user_id)
  <form action="{{route('comment.destroy',$comment->id)}}" method="POST" class="inline-it pull-right">
      @csrf
      @method('DELETE')
      <input class="btn btn-sm btn-danger btn-xs" type="submit" value="Delete">
  </form>&nbsp;
  <a href="#{{$comment->id}}" class="btn btn-primary btn-sm btn-xs pull-right" data-toggle="modal" data-target="#exampleModal{{ $comment->id }}" style="margin-right: 3px;">
		<i class="nav-icon far fa-edit"></i>
	</a>
@endif

@section('js')

<script>
	function markAsSolution(threadId, solutionId, elem) {
        var csrfToken = '{{csrf_token()}}';
        $.post('{{route('markAsSolution')}}', {solutionId: solutionId, threadId: threadId,_token:csrfToken}, function (data) {
            $(elem).text('Jawaban Terpilih');
        });
    }

    function likeIt(commentId,elem){
        var csrfToken = '{{csrf_token()}}';
        var likesCount = parseInt($('#'+commentId+"-count").text());
        $.post('{{route('toggleLike')}}', {commentId: commentId,_token:csrfToken}, function (data) {
            console.log(data);
           if(data.message === 'liked'){
           		$(elem).addClass('liked');
           		$('#'+commentId+"-count").text(likesCount+1);
				$(elem).css({color:'red'});
           }else{
            	$(elem).css({color:'black'});
           		$('#'+commentId+"-count").text(likesCount-1);
           		$(elem).removeClass('liked');
           }
        });
    }

    function toggleReply(commentId){
        $('.reply-form-'+commentId).toggleClass('hidden');
    }

</script>

@endsection