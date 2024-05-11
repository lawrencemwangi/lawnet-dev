<x-app-layout>
    <div class="admin_container">
        @include('admin.partials.aside')

        <div class="admin">

            <div class="service_container">
                @include('admin.services.servicenav')

                <div class="service_content">
                    <h1>Service</h1>
                    @include('admin.partials.search')

                    <div class="btn">
                        <a href="{{ route('service.create') }}">Add New</a>
                    </div>
                </div>
                <table>
                    <thead>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Price(KSH)</th>
                        <th>Featured</th>
                        <th>Status</th>
                        <th>Duration</th>
                        <th>Action</th>
                    </thead>
                    <tbody class="searchable">
                        @foreach ($services as $service)
                        <tr>
                            <td>{{ $service->title }}</td>
                            <td>{{ $service->slug }}</td>
                            <td>{{ $service->category_id }}</td>
                            <td>{{ Illuminate\Support\str::limit($service->description,15) }}</td>
                            <td>{{ $service->price }}</td>
                            <td>{{ $service->featured == 1 ? 'Active' : 'Inactive' }}</td>
                            <td>{{$service->visibility == 1 ? 'Yes' : 'No'}}</td>
                            <td>{{ $service->duration }}</td>
                            <td>
                                <div class="icons">
                                    <a href="#"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="#"><i class="fas fa-trash-alt"></i></a>
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