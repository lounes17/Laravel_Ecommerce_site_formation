<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a href="{{ url('/') }}" class="navbar-brand navtitle " style="font-family: 'Lobster', cursive; " >Ummto Learning</a>
        <form class="form-inline">
            <button class="btn btn-outline-success my-2 my-sm-0 search-btn border-right-0 " type="submit"><i class="fas fa-search"></i></button>
            <input class="form-control mr-sm-2 search-input border-left-0 border-top-0 border-bottom-0" type="search" placeholder="Search" aria-label="Search">
        </form>
    </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark border border-light border-right-0 border-bottom-0 border-left-0 pt-0 pb-0">
    <div class="container">
        <button class="navbar-toggler mt-3 mb-3" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ (Illuminate\Support\Facades\Route::currentRouteName())==''? 'active' :'' }} ">
                    <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active ">
                    <a class="nav-link" href="{{route('carte.index')}}"><i class="fas fa-shopping-cart">(
                        {{session()->has('cart')?session()->get('cart')->totalQty :  '0 '}})</i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                @if (is_null(auth()->user()))
                <li class="nav-item {{ (Illuminate\Support\Facades\Route::currentRouteName())=='login'? 'active' :'' }}">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item {{ (Illuminate\Support\Facades\Route::currentRouteName())=='register'? 'active' :'' }}">
                      <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
                @else
                  <li>
                     <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                         {{ __('Logout') }}
                     </a>
                     <form action="{{ route('logout') }}" id="logout-form" method="POST">@csrf </form>
                 </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
