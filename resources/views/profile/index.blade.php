@extends('layouts.front')

@section('category')
<div class="col-md-12">
 <a class="btn btn-success btn-xs pull-right" href="/forum"> Forum </a> 
	
</div>
	<div class="col-md-3">
		<div class="dp">
			<img src="https://dummyimage.com/300x200/000/fff" style="border-radius: 6px;">
		</div>
		<h3>
			{{ $user->fullname }}
		</h3>
	</div>
@endsection

@section('content')
	<div>
		<h3>{{ $user->fullname }}'s latest threads</h3>

		@forelse($threads as $thread)
			<h5><a href="{{ route('forum.show', $thread->id) }}">{{ $thread->subject }}</a> <p class="pull-right">{{ $thread->created_at->diffForHumans() }} </p></h5>
		@empty
			<h5>Belum pernah membuat postingan</h5>
		@endforelse
		
		<br>

		<h3>{{ $user->fullname }}'s latest comments</h3>

		@forelse($comments as $comment)
			<h5>{{ $user->fullname }} commented on <a href="{{ route('forum.show', $comment->commentable['id']) }}" title="">{{ $comment->commentable['subject'] }}</a>  <p class="pull-right">{{ $comment->created_at->diffForHumans() }} </p> </h5>
		@empty
			<h5>Belum pernah berkomentar</h5>
		@endforelse
		<br>
	</div>
@endsection