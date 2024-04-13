<X-app-layout>
    <div class="navbar_container">
        <div class="logo">
            <img src="{{ asset('assets/images/dell.jpg') }}" width="30px" height="30px" alt="logo">
            <a href="{{ route('home') }}">{{ config('app.name')}}</a>
        </div>

        <div class="nav_links" id="navLinks">
            <ul>
                @if(Auth::user() && Auth::user()->user_level == 2)
                <li>
                    <a href="{{ route('home') }}">Dashboard</a>
                </li>
                @elseif(Auth::user() && Auth::user()->user_level == 1)
                    <li>
                        <a href="{{ route('admin_dashboard') }}">Dashboard</a>
                    </li>
                @endif

                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('service') }} ">Service</a></li>
                <li><a href="{{ route('blog') }}">Blog</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
                <li><a href="#"><i class="fas fa-cart-plus"><span>0</span></i></a></li>
                
                <li class="profiles">
                    @if(Auth::user())
                    <a href="{{ route('profile.edit') }}" class="profile">
                        <i class="fa fa-user"></i>
                    </a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="logout">Log out</button>
                    </form>
                    @else
                        <button><a href="{{ route('login') }}">Log in</a></button>
                    @endif
                </li>
            </ul>
        </div>
        
        <div class="burger" id="burgerIcon">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</X-app-layout>