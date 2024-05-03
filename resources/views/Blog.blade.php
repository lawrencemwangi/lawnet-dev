<x-app-layout>
    @include('partials.navbar')
    
    <div class="main_container">
        <h2>Blogs</h2>

        <div class="blog_container">
            {{-- <div class="categories">
                <a href="#">UI/UX Design</a>
                <a href="#">Wed Development</a>
                <a href="#">Intergration services</a>
                <a href="#">ICT consultant</a>
                <a href="#">Software development</a>
            </div> --}}
            <div class="blog_infor">

                @foreach ($blogs as $blog)
                    <div class="blog_items">
                        <div class="image">
                            @if ($blog->imagePath)
                                <img src="{{ $blog->imagePath }}" alt="{{ $blog->title }}">

                                @else
                                <img src="{{ asset('assets/images/default_image.png') }}" alt="{{ $blog->title }}"> 
                            @endif
                        </div>
                        <h2>{{ $blog->slug }}</h2>

                        <div class="link">
                            <a href="#">{{ $blog->category_id }}</a>
                        </div>

                        <p>{{ Illuminate\Support\Str::limit($blog->description, 85) }}
                            @if (strlen($blog->description) > 85)
                                <span id="moreContent_{{ $blog->id }}" style="display: none;">
                                    {{ substr($blog->description, 85) }}
                                </span>
                                <span onclick="toggleContent({{ $blog->id }})"> <a href="#">Learn More</a></span>
                            @endif
                        </p> 
                    </div>  
                @endforeach
            </div>
        </div>
    </div>

    @include('partials.Footer')
</x-app-layout>
