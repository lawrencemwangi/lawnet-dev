<x-app-layout>
    <div class="admin_container">
        @include('admin.partials.aside')

        <div class="admin">
            <div class="service_container ">
                <div class="service_item">
                    <h1>Update Service</h1>

                    <form action="{{ route('service.update', ['service' => $service]) }}" method="post" enctype="multipart/form-data" >
                        @csrf
                        @method('PATCH')

                        <div class="group">
                            <div class="input_group">
                                <label for="title">Title</label>
                                <input type="text" name="title"  id="title" value="{{ old('title', $service->title)}}"  placeholder="Enter the title" autofocus>
                                <span class="inline_alert">{{ $errors->first('title') }}</span>
                            </div>
    
                            <div class="input_group">
                                <label for="category">Category</label>
                                <select name="category_id" id="category_id">
                                    <option value="">--Select Category--</option>

                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id', $service->category_id) == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>                                        
                                    @endforeach
                                </select>
                                <span class="inline_alert">{{ $errors->first('category') }}</span>
                            </div>

                            <div class="input_group">
                                <label for="duration">Duration</label>
                                <input type="text" name="duration"  id="duration" value="{{ old('duration', $service->duration) }}" placeholder="like 12 weeks" autofocus>
                                <span class="inline_alert">{{ $errors->first('duration') }}</span>
                            </div>
                        </div>

                        <div class="groups">
                            <div class="input_group">
                                <label for="price">Price</label> <span>(Kshs)</span>
                                <input  type="number" step="0.01" name="price"  id="price" value="{{ old('price', $service->price) }}" placeholder="Enter the price" autofocus>
                                <span class="inline_alert">{{ $errors->first('price') }}</span>
                            </div>
                            
                            <div class="input_group">
                                <label for="discount_price">Discount Price</label>
                                <input  type="number" step="0.01" name="discount_price"  id="discount_price" value="{{ old('discount_price', $service->discount_price) }}" placeholder="Enter the discount price" autofocus>
                                <span class="inline_alert">{{ $errors->first('discount_price') }}</span>
                            </div>
                        </div>

                        <div class="group">
                            <div class="input_group">
                                <label for="in_stock">Featured</label>
                                <div class="custom_radio_buttons">
                                    <label>
                                        <input class="option_radio" type="radio" name="featured" id="active" value="1" {{ old('featured', $service->featured ) == '1' ? 'checked' : '' }}>
                                        <span>active</span>
                                    </label>
        
                                    <label>
                                        <input class="option_radio" type="radio" name="featured" id="inactive" value="0" {{ old('featured', $service->featured) == '0' ? 'checked' : '' }}>
                                        <span>inacitve</span>
                                    </label>
                                    <span class="inline_alert">{{ $errors->first('featured') }}</span>
                                </div>
                            </div>

                            <div class="input_group">
                                <label for="in_stock">Visibility</label>
                                <div class="custom_radio_buttons">
                                    <label>
                                        <input class="option_radio" type="radio" name="visibility" id="in_stock" value="1" {{ old('visibility', $service->visibility) == '1' ? 'checked' : '' }}>
                                        <span>Yes</span>
                                    </label>
        
                                    <label>
                                        <input class="option_radio" type="radio" name="visibility" id="not_in_stock" value="0" {{ old('visibility', $service->visibility) == '0' ? 'checked' : '' }}>
                                        <span>No</span>
                                    </label>
                                    <span class="inline_alert">{{ $errors->first('in_stock') }}</span>
                                </div>
                            </div>
                        </div>
                    
                        <div class="input_group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" cols="7" rows="10" placeholder="Enter the description">{{ old('description' , $service->description) }}</textarea>
                            <span class="inline_alert">{{ $errors->first('description') }}</span>
                        </div>

                        <div class="input_group ">
                            <label for="description">Select an images:</label> <span>(2mb max)</span>
                            <input type="file" name="image"  id="image" accept="image/*" value="{{ old('image', $service->image) }}" multiple>

                            @if ($service->image)
                                <img src="{{ asset('storage/service/' . $service->image) }}"  width="100px"  height="100px" alt="Current Image" class="img-fluid">
                            @endif

                            <span class="inline_alert">{{ $errors->first('image') }}</span>
                        </div>

                        <button type="submit" class="btn">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>