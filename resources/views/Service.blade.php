<x-app-layout>
    @include('partials.navbar')

    <div class="main_container">
        <div class="service_infor">
            <h2>Service</h2>
            <div class="input_group">
                @include('partials.search')
            </div>
        </div>  

        <div class="service_container">
            {{-- @foreach ($categories as $category)
                <div class="categories">
                    <a href="#">{{$category->title}}</a>
                </div>
            @endforeach --}}

            <div class="service_details">
                @include('partials.Product')  
            </div>
        </div> 
    </div>

    @include('partials.Footer')
</x-app-layout>