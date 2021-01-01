<div style="background-color: #ebebe0; border-radius: 10px; color: black; width: 80%;">
	<h5 style="font-weight: bold; padding: 5px 0px 0px 5px;">{{ $reply->user->fullname }}</h5>
	<p style="padding: 0px 0px 7px 10px; color: black;">{{ $reply->body }}</p>
</div>
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

