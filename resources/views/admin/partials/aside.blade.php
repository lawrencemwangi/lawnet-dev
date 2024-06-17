<x-app-layout>
    <div class="aside_container">
        <div class="aside_logo">
            <img src="{{ asset('assets/images/dell.jpg') }}" width="40px" height="40px" alt="logo">
            <a href="{{ route('home')}}" target="_blank">Lawnet Dev</a>
        </div>

        <div class="aside_links">
            <ul>
                <li>
                    <a href="{{ route('admin_dashboard')}}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <li>
                    <a href="{{ route('user.index') }}">
                        <i class="fas fa-users"></i>
                        <span>Users</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('service.index') }}">
                        <i class="fab fa-product-hunt"></i>
                        <span>Services</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('projects.index') }}">
                        <i class="fas fa-tasks"></i>
                        <span>Projects</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('blog.index') }}">
                        <i class="fas fa-blog"></i>
                        <span>Blogs</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('orders.index') }}">
                        <i class="fas fa-blog"></i>
                        <span>Orders</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('chat.index') }}">
                        <i class="fas fa-blog"></i>
                        <span>Chats</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('message.index') }}">
                        <i class="fas fa-comments"></i>
                        <span>Messages</span>
                    </a>
                </li>

            </ul>
        </div>

        <div class="user">
            <div class="image">
                <img src="{{ asset('assets/images/user.png') }}" alt="avator">
            </div>

            <div class="name">
                <a href="{{ route('profile.edit')}}">{{ Auth::User()->first_name }} {{ Auth::User()->last_name}}</a>
            </div>

            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="logout">Log out</button>
            </form>
        </div>
    </div>
</x-app-layout>