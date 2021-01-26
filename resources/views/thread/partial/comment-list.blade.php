@if(!empty($thread->solution))
	@if($thread->solution == $comment->id) 
		<button class="btn btn-success pull-right" id="choosed">Jawaban Terpilih</button>
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
  <button class="btn btn-danger btn-flat btn-xs remove-comment pull-right" data-id="{{ $comment->id }}" data-action="{{ route('comment.destroy',$comment->id) }}"> Delete </button>
  <a href="#{{$comment->id}}" class="btn btn-primary btn-sm btn-xs pull-right" data-toggle="modal" data-target="#exampleModal{{ $comment->id }}" style="margin-right: 3px;">
		<i class="nav-icon far fa-edit"></i>
	</a>
@endif

@section('js')

<script>
	function markAsSolution(threadId, solutionId, elem) {
        var csrfToken = '{{csrf_token()}}';
        $.post('{{route('markAsSolution')}}', {solutionId: solutionId, threadId: threadId,_token:csrfToken}, function (data) {
            $(elem).text('Jawaban Terpilih').addClass('btn btn-success pull-right');
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

    $("body").on("click",".remove-comment",function(){
        var current_object = $(this);
        swal({
            title: "Apakah anda yakin akan menghapus komentar anda?",
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

    $("body").on("click",".remove-reply",function(){
      var current_object = $(this);
      swal({
          title: "Apakah anda yakin akan menghapus reply anda?",
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