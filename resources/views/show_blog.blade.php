<x-app-layout>
    @include('partials.navbar')

    <div class="main_container">
        <h2>Blogs</h2>
        
        <div class="blog_container">
            <div class="left_arrow">
                <a href="{{ route('blog') }}">&larr;</a>
            </div>

            <div class="blog_show">
                <div class="image">
                    @if ($blog->image)
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
                    @else
                        <img src="{{ asset('assets/images/default_image.png') }}" alt="{{ $blog->title }}"> 
                    @endif
                </div>
                <h2>{{ $blog->title }}</h2>

                @if ($category)
                    <div class="link">
                        <a href="#">{{ $category->title }}</a>
                    </div>
                @else
                    <div class="link">
                        Uncategorized
                    </div>
                @endif

                <p>{{ $blog->description }} </p> 
            </div>  
        </div>
    </div>

    @include('partials.Footer')
</x-app-layout>