<x-app-layout>
    @include('partials.navbar')

    <div class="main_container">
        <h2>Service</h2>

        <div class="service_container">
            @foreach ($services as $service)
                <div class="service_content">
                    @include('partials.Product')  
                </div>
            @endforeach
        </div> 
    </div>

    @include('partials.Footer')
</x-app-layout>