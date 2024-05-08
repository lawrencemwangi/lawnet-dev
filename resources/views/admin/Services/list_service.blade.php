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
                        <th>Duration</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody class="searchable">
                        <tr>
                            <td>Web design</td>
                            <td>web-design</td>
                            <td>website</td>
                            <td>It' a webiste for business..</td>
                            <td>500.00</td>
                            <td>Yes</td>
                            <td>12 weeks</td>
                            <td>Visible</td>
                            <td>
                                <div class="icons">
                                    <a href="#"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="#"><i class="fas fa-trash-alt"></i></a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>