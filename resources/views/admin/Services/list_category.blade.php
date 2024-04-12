<x-app-layout>
    <div class="admin_container">
        @include('admin.partials.aside')

        <div class="admin">
            <div class="service_container">
                @include('admin.services.servicenav')

                <div class="service_content">
                    <h1>Category</h1>
                    @include('admin.partials.search')

                    <div class="btn">
                        <a href="{{ route('category.create') }}">Add New</a>
                    </div>
                </div>

                <table>
                    <thead>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Action</th>
                    </thead>
                    <tbody class="searchable" @foreach ($categories as $category) >         
                        <tr>
                            <td>{{ $category->title }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>
                                <div class="icons">
                                    <a href="#"><i class="fas fa-trash-alt"></i></a>
                                    <a href="#"> <i class="fas fa-pencil-alt"></i></a>
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