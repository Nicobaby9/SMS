<a href="{{route('forum.show',$notification->data['thread']['id'])}}" style="padding-left: 10px;  height: 70px;">
   {{ $notification->data['user']['fullname'] }} commented on <strong> {{ $notification->data['thread']['subject'] }}</strong>
   <p class="pull-right" style="font-size: 10px;">{{ $notification->created_at->diffForHumans() }}</p>
   <hr>
</a>