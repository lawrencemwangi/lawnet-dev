@foreach ($services as $service)

    <div class="product_items">
        <div class="product_image">
            <img src="{{ asset('storage/service/' . $service->image) }}" alt="service image">
        </div>

        <h2>{{ $service->title }}</h2>
        @if (isset($categories[$service->id]))
            <div class="link">
                <a href="#" class="searchable"> {{ $categories[$service->id]->title }}</a>
            </div>
        @else
            <div class="link">
                Uncategorized 
            </div>
        @endif

        <p class="duration">Duration: {{ $service->duration }}</p>

        <p>{{ Illuminate\Support\str::limit( $service->description, 25 ) }}</p>  
        <div class="product_infor">
            <p>Price:  <span>Ksh.{{ $service->price }}</span></p>
            
            <form action="{{ route('add_to_cart', $service->id) }}" method="post">
                @csrf
                @method('POST')

                <button type="submit">
                    <i class="fas fa-shopping-cart"></i>
                </button>
            </form>
        </div>
    </div> 
@endforeach

