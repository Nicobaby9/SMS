
<nav class="main-header navbar navbar-expand bg-info navbar-light">
    <a class="navbar-brand" href="/">SMAN 1 PATIANROWO</a>
		
	@if (Route::has('login'))
	<ul class="nav navbar-nav navbar-right">
		@auth
			<li class="dropdown pull-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->fullname }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <a href="{{ route('user_profile',auth()->user()) }}">
                            My Profile
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>

            <!-- NOTIFICATIONS -->
            
            <li class="dropdown pull-right" id="markasread" onclick="markNotificationAsRead()">
                <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
		          <i class="far fa-bell"></i>
		          <span class="badge badge-warning navbar-badge">{{ count(auth()->user()->unreadNotifications) }}</span>
		        </a>

                <div class="dropdown-menu " style="width: 310px;">
		        	@forelse(auth()->user()->unreadNotifications as $notification)
			        	@include( 'layouts.partials.notification.'. \Illuminate\Support\Str::snake(class_basename($notification->type)) )
			        @empty
			        <a href="#" class="dropdown-item" style="padding-left: 20px;">
			           Tidak ada notifikasi.
			        </a>
			        @endforelse
		        </div>
            </li>
    	@else
	        <a class="navbar-brand pull-right" href="{{ route('login') }}">Login</a>
		@endauth
	</ul>
	@endif
</nav>
