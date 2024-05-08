<x-app-layout>
    @include('partials.navbar')
    
    <div class="main_container">
        <h2>Blogs</h2>

        <div class="blog_container">
            <div class="blog_infor">

                @foreach ($blogs as $blog)
                    <div class="blog_items">
                        <div class="image">
                            @if ($blog->image)
                                <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
                            @else
                                <img src="{{ asset('assets/images/default_image.png') }}" alt="{{ $blog->title }}"> 
                            @endif
                        </div>
                        <h2>{{ $blog->title }}</h2>

                        @if (isset($categories[$blog->id]))
                            <div class="link">
                                <a href="#"> {{ $categories[$blog->id]->title }}</a>
                            </div>
                        @else
                            <div class="link">
                                Uncategorized 
                            </div>
                        @endif

                        <p>{{ Illuminate\Support\Str::limit($blog->description, 80) }}
                            @if (strlen($blog->description) > 85)
                                <span id="moreContent_{{ $blog->id }}" style="display: none;">
                                    {{ substr($blog->description, 85) }}
                                </span><a href="{{ route('blog.show',$blog->id) }}">Learn More</a>
                            @endif
                        </p> 
                    </div>  
                @endforeach
            </div>
        </div>
    </div>

    @include('partials.Footer')
</x-app-layout>
