<nav class="navbar navbar-expand-lg bg-dark m-0 p-0">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">E-SHOP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{url('/')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('category')}}">Category</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{url('cart')}}">Cart
                     <span class="badge badge-pill bg-secondary cart-count">0</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('wishlist')}}">Wishlist
                     <span class="badge badge-pill bg-success wishlist-count">0</span></a>
                </li>


                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li>
                                <a href=" {{url('my-orders')}}" class="dropdown-item">
                                    My Orders
                                </a>
                            </li>
                            <li>
                                <a href="" class="dropdown-item">
                                    Profile
                                </a>
                            </li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </li>
                @endguest

            </ul>
        </div>
    </div>
</nav>
