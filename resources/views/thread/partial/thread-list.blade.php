<div class="list-group">
	@forelse($threads as $thread)

	<a href="{{ route('forum.show', $thread->id) }}" class="list-group-item">
		<h3 class="list-group-item-heading" style="font-weight: bold;">{{ $thread->subject }}</h3>
		<p class="list-group-item-text">{{ \Illuminate\Support\Str::limit($thread->thread, 120) }}</p>
	</a>
	
	@empty
		<h5>Tidak Ada Postingan</h5>
	@endforelse
</div>