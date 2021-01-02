
<nav class="main-header navbar navbar-expand bg-info navbar-light">
    <a class="navbar-brand" href="/">SMAN 1 PATIANROWO</a>
		
	@if (Route::has('login'))
	<div>
		@auth
	        <a class="navbar-brand" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()" style="float: right; border-radius: 7px;">
	        {{ __('Logout') }}
		    </a>

		    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
		        @csrf
		    </form>
    	@else
	        <a class="navbar-brand pull-right" href="{{ route('login') }}">Login</a>
		@endauth
	</div>
    <a class="navbar-brand pull-right" href="{{ route('user_profile', auth()->user()) }}">My Profile</a>
	@endif
</nav>
