<x-app-layout>
    <div class="admin_container">
        @include('admin.partials.aside')

        <div class="admin">
            <div class="service_container">
                <div class="service_content">
                    <h1>Blog</h1>
                    @include('admin.partials.search')
                    
                    <div class="btn">
                        <a href="{{ route('blog.create') }}">Add New</a>
                    </div>
                </div>
                
                <table>
                    <thead>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Action</th>
                    </thead>
                    <tbody class="searchable">
                        @foreach ($blogs as $blog)
                        <tr>
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->slug }}</td>
                            <td>{{ $blog->category_id }}</td>
                            <td>{{ Illuminate\Support\Str::limit($blog->description, 20) }}</td>
                            <td>
                                <div class="icons">
                                    <a href="{{ route('blog.edit', ['blog' => $blog]) }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
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