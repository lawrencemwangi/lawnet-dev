<div class="admin_container"> 
    @include('admin.partials.aside')
    <div class="admin">
        <h1>Dashboard</h1>
        <div class="container">
            <div class="dashboard">
                <i class="fas fa-users"></i>
                <div class="content">
                    <p>Users</p>
                    <span>{{ $count_users }}</span>
                </div>
            </div>

            <div class="dashboard">
                <i class="fas fa-laptop-code"></i>
                <div class="content">
                    <p>projects</p>
                    <span>{{ $count_project }}</span>
                </div>
            </div>

            <div class="dashboard">
                <i class="fas fa-wrench"></i> 
                <div class="content">
                    <p>Services</p>
                    <span>{{ $count_services }}</span>
                </div>
            </div>

            <div class="dashboard">
                <i class="fas fa-blog"></i>
                <div class="content">
                    <p>Blogs</p>
                    <span>{{ $count_blogs }}</span>
                </div>
            </div>

            <div class="dashboard">
                <i class="fas fa-cogs"></i>
                <div class="content">
                    <p>Categories</p>
                    <span>{{ $count_categories }}</span>
                </div>
            </div>

            <div class="dashboard">
                <i class="fas fa-comments"></i>
                <div class="content">
                    <p>Messages</p>
                    <span>{{ $count_messages }}</span>
                </div>
            </div>
            <div class="dashboard">
                <i class="fas fa-comments"></i>
                <div class="content">
                    <p>Orders</p>
                    <span>0</span>
                    {{-- {{ $count_orders }} --}}
                </div>
            </div>
        </div> 
    </div>
</div>

