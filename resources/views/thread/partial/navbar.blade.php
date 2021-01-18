
<nav class="nav navbar-light bg-light static-top">

    <div style="margin-left: 210px;">
        <a href="/" class="nav navbar-brand pull-left"><img src="https://www.sts-school.edu.in/wp-content/uploads/2019/10/Best-School-in-Meerut-1.png" alt="..." style="width: 50px; height: 50px; float: left;"></a>
        <ul class="nav navbar-brand pull-left">
            <li class="dropdown pull-left" style="margin-left: 80px;">
                <a class="navbar-brand" href="/forum">Forum</a>
            </li>
            <li class="dropdown pull-left" style="margin-left: 80px;">
                <a class="navbar-brand" href="/articles">Article</a>
            </li>
            <li class="dropdown pull-left" style="margin-left: 80px;">
                <a class="navbar-brand" href="/galery">Galery</a>
            </li>
            <li class="dropdown pull-left" style="margin-left: 80px;">
                <a class="navbar-brand" href="#">Contact Us</a>
            </li>
        </ul>
    </div>
    		
    	@if (Route::has('login'))
    	<ul class="nav navbar-brand pull-right">
    		@auth
    			<li class="dropdown pull-right">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                       <span class="caret"></span> {{ Auth::user()->fullname }} 
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ route('user_profile', auth()->user()) }}">
                                My Profile
                            </a>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>

                <!-- NOTIFICATIONS -->
                
                <li class="dropdown pull-right" id="markasread" onclick="markNotificationAsRead('{{ count(auth()->user()->unreadNotifications) }}')">
                    <a class="nav-brand" data-toggle="dropdown" href="#" aria-expanded="false">
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