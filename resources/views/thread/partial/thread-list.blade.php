<div class="list-group">
	@forelse($threads as $thread)

	<a href="{{ route('forum.show', $thread->id) }}" class="list-group-item">
		<h4 class="list-group-item-heading">{{ $thread->subject }}</h4>
		<p class="list-group-item-text" style="border-bottom: 1px solid black;">{{ \Illuminate\Support\Str::limit($thread->thread, 120) }}</p>
	</a>
	
	@empty
		<h5>Tidak Ada Postingan</h5>
	@endforelse
</div>