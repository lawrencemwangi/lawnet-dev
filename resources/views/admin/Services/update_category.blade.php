<x-app-layout>
    <div class="admin_container">
        @include('admin.partials.aside')

        <div class="admin">
            <div class="service_container">
                <div class="category_content">
                    <h2>Update Category</h2>

                    <form action="{{ route('category.update', ['category' => $category]) }}" method="post">
                        @csrf

                        @method('PATCH')

                        <div class="input_group">
                            <label for="title">Title</label>
                            <input type="text" name="title"  id="title" value="{{ old('title', $category->title) }}" autofocus>
                            <span class="inline_alert">{{ $errors->first('title') }}</span>

                        </div>
                        <button type="submit" class="btn">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>