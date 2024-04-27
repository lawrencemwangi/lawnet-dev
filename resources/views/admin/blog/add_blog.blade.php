<x-app-layout>
    <div class="admin_container">
        @include('admin.partials.aside')

        <div class="admin">
            <div class="blog_container">
                <div class="blog_content">
                    <h1>Add Blog</h1>

                    <form action="#" method="post">
                        @csrf

                        <div class="input_gruop">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}">
                        </div>

                        <div class="input_group">
                            <label for="category">category</label>

                            {{-- @foreach ($categories as $category) --}}
                                <select name="category" id="category">
                                    <option value="">--select category--</option>
                                </select>
                            {{-- @endforeach --}}
                        </div>

                        <div class="input_group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" cols="7" rows="5"></textarea>
                        </div>

                        <div class="input_group">
                            <label for="description">Select an images:</label>
                            <input type="file" name="image"  id="image" accept="image/*" value="{{ old('image')}}">
                        </div>

                        <button type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>