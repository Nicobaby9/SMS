
<nav class="main-header navbar navbar-expand bg-info navbar-light">
    <a class="navbar-brand" href="/">SMAN 1 PATIANROWO</a>
		
</nav>
@if (Route::has('login'))
<div class=" float-right">
	@auth
        <a class="dropdown-item btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()" style="float: right; border-radius: 7px;">
        {{ __('Logout') }}
	    </a>

	    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	        @csrf
	    </form>
    @else
        <a class="dropdown-item" href="{{ route('login') }}">Login</a>
	@endauth
</div>
@endif