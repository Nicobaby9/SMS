
<nav class="main-header navbar navbar-expand bg-info navbar-light">
    <a class="navbar-brand" href="#">SMAN 1 PATIANROWO</a>
		<a href="/" title="" class="btn btn-info float-right">Home</a>
		
</nav>
@if (Route::has('login'))
<nav class=" float-right">
	@auth
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
        {{ __('Logout') }}
	    </a>

	    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	        @csrf
	    </form>
    @else
        <a class="dropdown-item" href="{{ route('login') }}">Login</a>
	@endauth
</nav>
@endif