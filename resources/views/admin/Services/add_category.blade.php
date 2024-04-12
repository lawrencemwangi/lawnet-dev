<x-app-layout>
    <div class="admin_container">
        @include('admin.partials.aside')

        <div class="admin">
            <div class="service_container">
                <div class="category_content">
                    <h2>Add Service</h2>

                    <form action="{{ route('category.store') }}" method="post">
                        @csrf

                        <div class="input_group">
                            <label for="title">Title</label>
                            <input type="text" name="title"  id="title" value="{{ old('title')}}" autofocus>
                        </div>
                        <button type="submit" class="btn">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>