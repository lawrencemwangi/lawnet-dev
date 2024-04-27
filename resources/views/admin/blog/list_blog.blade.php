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
                    <tbody>
                        <tr>
                            <td>Web design</td>
                            <td>web-design</td>
                            <td>website</td>
                            <td>It' a webiste for business..</td>
                            <td>
                                <div class="icons">
                                    <a href="#">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>