<h4> Tags </h4>
<div class="col-md-3">
	<ul class="list-group">
		<a href="{{ route('forum.index') }}" class="list-group-item" style="border-bottom: solid 2px black; margin-bottom: 1px; border-radius: 4px;">
			Semua Postingan
			<span class="badge" style="float:right;">14</span>
		</a>
		@foreach($tags as $tag)
		<a href="{{ route('forum.index', ['tags' => $tag->id]) }}" class="list-group-item">
			{{ $tag->name }}
			<span class="badge" style="float:right;">14</span>
		</a>
		@endforeach
	</ul>
</div>