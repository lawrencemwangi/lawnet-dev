<x-app-layout>
    <div class="admin_container">
        @include('admin.partials.aside')

        <div class="admin">
            <div class="service_container">
                <div class="service_content">
                    <h1>Messages</h1>
                    @include('admin.partials.search')
                </div>
                
                <table>
                    <thead>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Action</th>
                    </thead>
                    <tbody  class="searchable">
                        @foreach ($messages as $message)
                        <tr>
                            <td>{{ $message->first_name }}</td>
                            <td>{{ $message->last_name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->message }}</td>
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