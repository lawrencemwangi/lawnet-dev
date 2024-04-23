<x-app-layout>
    <div class="admin_container">
        @include('admin.partials.aside')
        
        <div class="admin">
            <div class="service_container">
                <div class="service_content">
                    <h1>Projects</h1>
                    @include('admin.partials.search')

                    <div class="btn">
                        <a href="{{ route('projects.create') }}">Add New</a>
                    </div>
                </div>

                <table>
                    <thead>
                        <th>Title</th>
                        <th>Iframe</th>
                        <th>Description</th>
                        <th>View Link</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            
                        <tr>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->iframe }}</td>
                            <td>{{ $project->description }}</td>
                            <td>{{ $project->link }}</td>
                            <td>
                                <div class="icons">
                                    <i class="fas fa-trash-alt"></i>
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