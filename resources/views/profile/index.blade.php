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

		@forelse($feeds as $feed)

			@if($feed->feedable_type == 'App\Thread')
				@if($feed->feedable['thread'] != null)
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">{{ $feed->type }}</h4>
						</div>
						<div class="panel-body">
							{{ $user->fullname }} created new thread : <a href="{{route('forum.show', $feed->feedable['id'] )}}" title=""> {{ $feed->feedable['subject'] }}</a>
						</div>
					</div>
				@endif
			@elseif($feed->feedable_type == 'App\Model\Comment')
				@if($feed->feedable['body'] != null)
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">{{ $feed->type }}</h4>
						</div>
						<div class="panel-body">
							{{ $user->fullname }} created new comment :  {{ $feed->feedable['body'] }} on <a href="{{route('forum.show', $feed->id )}}" title=""> {{ $feed->subject }} </a>
						</div>
					</div>
				@endif
			@endif

		@empty
			There is no feed activity.

		@endforelse
	</div>
@endsection