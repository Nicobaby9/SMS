<h5 style="font-weight: bold;">{{ $reply->user->fullname }}</h5>
<lead>{{ $reply->body }}</lead>

<div>
	@if(auth()->user()->id == $reply->user_id)
    <form action="{{route('comment.destroy',$reply->id)}}" method="POST" class="inline-it float-right">
        @csrf
        @method('DELETE')
        <input class="btn btn-sm btn-danger btn-xs" type="submit" value="Delete">
    </form>
	<a href="#{{$reply->id}}" class="btn btn-primary btn-sm btn-xs float-right" data-toggle="modal" data-target="#exampleModal{{ $reply->id }}">
		<i class="nav-icon far fa-edit"></i>
	</a>
	@endif
</div>