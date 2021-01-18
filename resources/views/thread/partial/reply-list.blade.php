<div  style="background-color: #ebebe0; border-radius: 6px; color: black; width: 80%;">
	<img src="{{ asset('profile_images/'.$reply->user->photo) }}" style="border-radius: 50%; float: left; margin: 7px 10px 0px 4px;" width="40" height="40">
	<h5 style="font-weight: bold; padding: 5px 0px 0px 5px;">{{ $reply->user->fullname }}</h5>
	<p style="padding: 0px 0px 7px 10px; margin-left: 50px;">{{ $reply->body }}</p>
	@if(auth()->user()->id == $reply->user_id)
    <form action="{{route('comment.destroy',$reply->id)}}" method="POST" class="inline-it pull-right">
        @csrf
        @method('DELETE')
        <input class="btn btn-sm btn-danger btn-xs" type="submit" value="Delete">
    </form>
	<a href="#{{$reply->id}}" class="btn btn-primary btn-sm btn-xs pull-right" data-toggle="modal" data-target="#exampleModal{{ $reply->id }}">
		<i class="nav-icon far fa-edit"></i>
	</a>
	@endif
</div>