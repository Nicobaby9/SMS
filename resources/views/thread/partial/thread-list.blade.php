<div class="list-group">
	@forelse($threads as $thread)

	<!-- <a href="{{ route('forum.show', $thread->id) }}" class="list-group-item" style="border-radius: 14px; background-color: black; color: white;">
		<h3 class="list-group-item-heading" style="font-weight: bold; color: #f2f2f2">{{ $thread->subject }}</h3>
		<br>
		<p class="list-group-item-text">{{ \Illuminate\Support\Str::limit($thread->thread, 110) }}</p>
	</a>
		<a class="list-group-item-text pull-right" href="{{ route('user_profile', $thread->user->username) }}" style="font-size: 10px;">by 
			{{ $thread->user->fullname }}
		</a>
		<br> -->

	<div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><a href="{{route('forum.show',$thread->id)}}" style="font-weight: bold;"> {{$thread->subject}}</a></h3>
            <p class="pull-right" style="margin-top: -16px; font-size: 11px;">{{$thread->created_at->diffForHumans()}}</p>
        </div>
        <div class="panel-body">
            <p>{{ \Illuminate\Support\Str::limit($thread->thread,100) }}
                <br>
                <a href="{{route('user_profile',$thread->user->username)}}" class="pull-right"> {{$thread->user->fullname}}</a> 
            </p>
        </div>
    </div>
	
	@empty
		<h5>Tidak Ada Postingan</h5>
	@endforelse
</div>