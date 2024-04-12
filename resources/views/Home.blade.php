<x-app-layout>
    @include('partials.navbar')

    <div class="home_container">
        <div class="hero_container">
            <div class="hero_content">
                <h1>Transforming Creative Ideas into Vibrant Digital Realities</h1>
                <p>Crafting stunning websites while ensuring seamless tech operations for an optimal and efficient digital experience.</p>

                <div class="btn">
                    <button type="submit">
                        <a href="{{ route('service') }}">Our Services</a>
                    </button>
                    <button type="submit">
                        <a href="{{ route('about') }}">Explore More</a>
                    </button>
                </div>
            </div>

            <div class="hero_image">
                <img src="{{ asset('assets/images/dell.jpg') }}" alt="Hero Image">
            </div>
        </div>

        <div class="main_container">
            <h1>Our Projects</h1>

            <div class="project_content">
                @include('partials.Project')
                @include('partials.Project')
                @include('partials.Project')
                @include('partials.Project')
            </div>
            <div class="button">
                <button type="submit">
                    <a href="{{ route('service')}}">Explore More</a>
                </button>
            </div>
        </div>
    </div>

    @include('partials.Footer')
</x-app-layout>