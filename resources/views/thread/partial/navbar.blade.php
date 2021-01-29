
<nav class="navbar navbar-light bg-light static-top">
    <div class="container">
        <a href="/" class="nav navbar-brand pull-left"><img src="https://www.sts-school.edu.in/wp-content/uploads/2019/10/Best-School-in-Meerut-1.png" width="50" height="50"></a>
        		
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>
            <!-- RIGHTSIDE NAVBAR -->
        	<ul class="nav navbar-brand navbar-right">
                @if(Auth::guest())
                <li><a href="{{ route('login') }}">Login</a></li>
                @else
                    <li class="dropdown pull-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->fullname }} <span class="caret"></span>
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
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                          <i class="far fa-bell"></i>
                          <span class="badge badge-warning navbar-badge">{{ count(auth()->user()->unreadNotifications) }}</span>
                        </a>

                        <div class="dropdown-menu" role="menu" style="width: 250px; text-align: right;">
                            @forelse(auth()->user()->unreadNotifications as $notification)
                                @include( 'layouts.partials.notification.'. \Illuminate\Support\Str::snake(class_basename($notification->type)) )
                            @empty
                            <a href="#" class="dropdown-item" style="padding-left: 20px;">
                               Tidak ada notifikasi.
                            </a>
                            @endforelse
                        </div>
                    </li>
            	@endif
        	</ul>
        </div>
    </div>
</nav>