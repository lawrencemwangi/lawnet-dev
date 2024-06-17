<x-app-layout>
    @include('partials.navbar')

    <div class="main_container">
        <h1>Check Out</h1>
        <div class="checkout_container general_content">
            <form action="{{ route('post_checkout') }}" method="post">
                @csrf

                <div class="group">
                    <div class="input_group">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" id="first_name" value="{{ $user ? $user->first_name : old('first_name') }}" >
                    </div>

                    <div class="input_group">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" id="last_name" value="{{ $user ? $user->last_name : old('last_name') }}" >
                    </div>
                </div>
                <div class="group">
                    <div class="input_group">
                        <label for="phone_number">Phone number</label>
                        <input type="text" name="phone_number" id="phone_number" value="{{ $user ? $user->phone_number : old('phone_number') }}" >
                    </div>
                    
                    <div class="input_group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="{{  $user ? $user->email : old('email') }}" >
                    </div>
                </div>
                <div class="input_group">
                    <label for="additional_infromation" >Additional information</label>
                    <input type="text" name="additional_infromation"  id="additional_infromation" value="{{ old('additional_infromation') }}" placeholder="Enter any other information" >
                </div>

                <button type="submit">Complete Order</button>
            </form>
        </div>
    </div>

    @include('partials.footer')
</x-app-layout>