<x-app-layout>
    @include('partials.navbar')

    <div class="main_container">
        <h2>Service</h2>
        
        <div class="service_container">
            <div class="service_details">
                @include('partials.Product')  
            </div>
        </div> 
    </div>

    @include('partials.Footer')
</x-app-layout>