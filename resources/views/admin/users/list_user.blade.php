<x-app-layout>
    <div class="admin_container">
        @include('admin.partials.aside')

        <div class="admin">
            <div class="service_container">
                <div class="service_content">
                    <h1>Users</h1>
                    
                    @include('admin.partials.search')

                </div>

                <table >
                    <thead>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Status</th>
                        <th>User Level</th>
                        <th>Action</th>
                    </thead>

                        <tbody class="searchable" @foreach ($users as $user)>

                            <tr>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone_number }}</td>
                                <td>{{ $user->status ==1  ?'Active' : 'Inactive' }}</td>
                                <td>{{ $user->user_level ==1 ? 'Admin' : 'User' }}</td>

                                <td>
                                    <div class="icons">
                                        <i class="fas fa-pencil-alt"></i>
                                    </div>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>