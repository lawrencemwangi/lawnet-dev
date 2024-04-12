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
                        <button type="submit">Add New</button>               
                    </div>
                </div>
                <table>
                    <thead>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Price(KSH)</th>
                        <th>Action</th>
                    </thead>
                    <tbody class="searchable">
                        <tr>
                            <td>Web design</td>
                            <td>web-design</td>
                            <td>website</td>
                            <td>It' a webiste for business..</td>
                            <td>500.00</td>
                            <td>
                                <div class="icons">
                                    <i class="fas fa-trash-alt"></i>
                                    <i class="fas fa-pencil-alt"></i>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>