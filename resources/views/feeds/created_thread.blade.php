@if($feed->feedable_type == 'App\Thread')

	@if($feed->feedable['thread'])
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">{{ $feed->type }}</h4>
		</div>
		<div class="panel-body">
			User  {{ $feed->feedable['subject'] }}
		</div>
	</div>
	@endif

@elseif($feed->feedable_type == 'App\Model\Comment')

	@if($feed->feedable['comment'])
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">{{ $feed->type }}</h4>
		</div>
		<div class="panel-body">
			User  {{ $feed->feedable['body'] }}
		</div>
	</div>
	@endif

@endif