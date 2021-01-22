@extends('layouts.front')

@section('category')
<div class="col-md-12">
	
</div>
	<div class="col-md-3">
		<div class="dp text-center">
			<img src="{{ asset('profile_images/'. $user->photo) }}" style="border-radius: 49%;" width="200" height="200">
			<br><br>
			<p style="font-size: 9px; float: "> *User created since : {{ $user->created_at->diffForHumans() }} / {{ \Carbon\Carbon::parse($user->created_at)->format('d-m-Y') }} </p>
		</div>
		<h3>
			{{ $user->fullname }}
		</h3>
		<table style="width:100%">
		  	<tr>
			    <th>Email </th>
			    <th> : &nbsp;</th>
			    <td> {{ $user->email }}</td>
			</tr>
			<tr>
			    <th>Username</th>
			    <th> : &nbsp;</th>
			    <td> {{ '@'.$user->username }}</td>
			</tr>
			<tr>
			    <th>Phone</th>
			    <th> : &nbsp;</th>
			    <td> {{ $user->phone }}</td>
			</tr>
		</table>
		<br> 
		@if($user->username != auth()->user()->username)
		
		@else
			<a href="{{ route('user_profile_edit', $user->username) }}" class="btn btn-sm btn-warning">Edit Profile</a>
		@endif
	</div>
@endsection

@section('content')
	<div class="row">
		<h3>{{ $user->fullname }}'s latest activity</h3>

		@forelse($feedas as $feed)

			@if($feed->feedable_type == 'App\Model\Thread')
				@if($feed->feedable['thread'] != null)
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">{{ $feed->type }}</h4>
						</div>
						<div class="panel-body">
							@if(auth()->user()->id == $user->id)
							You created new thread :
							@else
							{{ $user->fullname }} created new thread : 
							@endif
							" <a href="{{route('forum.show', $feed->feedable['id'] )}}" title=""> {{ $feed->feedable['subject'] }} </a> "
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
							@if(auth()->user()->id == $user->id)
							You created new comment :
							@else
							{{ $user->fullname }} created new comment : 
							@endif
							" {{ $feed->feedable['body'] }} "
						</div>
					</div>
				@endif
			@endif

		@empty
			There is no feed activity.
		@endforelse
		<div class="panel panel-info text-center">
			{{ $feedas->links() }}
		</div>
	</div>

@endsection