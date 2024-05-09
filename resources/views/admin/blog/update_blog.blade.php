<x-app-layout>
    <div class="admin_container">
        @include('admin.partials.aside')

        <div class="admin">
            <div class="blog_container">
                <div class="blog_content">
                    <h1>Update Blog</h1>

                    <form action="{{ route('blog.update', ['blog' => $blog ]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        
                        <div class="input_group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title',$blog->title) }}">
                        </div>

                        <div class="input_group">
                            <label for="category">category</label>

                            <select name="category_id" id="category_id">
                                <option value="">-- Select Category --</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id',$blog->category_id) == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                                @endforeach
                            </select>
                            <span class="inline_alert">{{ $errors->first('category_id') }}</span>
                        </div>

                        <div class="input_group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" cols="7" rows="10">{{ old('description',$blog->description) }}</textarea>
                        </div>
                    
                        <div class="input_group">
                            <label for="description">Select an images:</label> <span>(2mb max)</span>
                            <input type="file" name="image"  id="image" accept="image/*" value="{{ old('image',$blog->image) }}">

                            @if ($blog->image)
                            <img src="{{ asset('storage/' . $blog->image) }}"  width="100px"  height="100px" alt="Current Image" class="img-fluid">
                            @endif

                            <span class="inline_alert">{{ $errors->first('image',$blog->image) }}</span>
                        </div>

                        <button type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>