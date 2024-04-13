<x-app-layout>
    <div class="admin_container">
        @include('admin.partials.aside')

        <div class="admin">
           <div class="service_container">
                <div class="service_item">
                    <h1>Add Service</h1>

                    <form action="#" method="post" enctype="multipart/form-data" >
                        @csrf

                        <div class="input_group">
                            <label for="tile">Title</label>
                            <input type="text" name="title"  id="title" value="{{ old('title')}}" autofocus>
                            <span class="inline_alert">{{ $errors->first('title') }}</span>
                        </div>

                        <div class="input_group">
                            <label for="category">Category</label>
                            <input type="text" name="category"  id="category" value="{{ old('category')}}" autofocus>
                            <span class="inline_alert">{{ $errors->first('category') }}</span>
                        </div>

                        <div class="input_group">
                            <label for="duration">Duration</label>
                            <input type="text" name="duration"  id="duration" value="{{ old('duration')}}" autofocus>
                            <span class="inline_alert">{{ $errors->first('duration') }}</span>
                        </div>

                        <div class="input_group">
                            <label for="featured">Featured</label>
                           <label for="choice">
                                <input type="radio" name="featured" value="yes">
                                <span class="button">Yes</span>
                           </label>

                           <label for="choice">
                                <input type="radio" name="featured" value="no">
                                <span class="button">No</span>
                           </label>
                        </div>

                        <div class="input_group">
                            <label for="price">Price</label>
                            <input type="text" name="price"  id="price" value="{{ old('price')}}" autofocus>
                            <span class="inline_alert">{{ $errors->first('price') }}</span>
                        </div>
                    
                        <div class="input_group">
                            <label for="description">Description</label>
                            <input type="text" name="description"  id="description" value="{{ old('description')}}" autofocus>
                            <span class="inline_alert">{{ $errors->first('description') }}</span>
                        </div>

                        <div class="input_group">
                            <label for="description">Select an images:</label>
                            <input type="file" name="image"  id="image" accept="image/*" value="{{ old('image')}}">
                        </div>

                    
                        <button type="submit" class="btn">Save</button>
                    </form>
                </div>
           </div>
        </div>
    </div>
</x-app-layout>