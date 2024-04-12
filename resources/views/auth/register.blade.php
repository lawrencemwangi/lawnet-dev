<x-app-layout>
    <div class="input_container">
        <ul>
            @foreach($errors as $error)
            
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <h2>Register</h2>
            <div class="input_group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name" value="{{ old('first_name')}}" required>
            </div>

            <div class="input_group">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" id="last_name" value="{{ old('last_name')}}" required>
            </div>

            <div class="input_group">
                <label for="phone_number">Phone Number</label>
                <input type="number" name="phone_number" id="phone_number" value="{{ old('phone_number')}}" required>
            </div>

            <div class="input_group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" value="{{ old('email')}}" required>
            </div>

            <div class="input_group">
                <label for="pasword">Password</label>
                <input type="password" name="password" id="password" value="{{ old('pasword')}}" required>
            </div>

            <div class="input_group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation')}}" required>
            </div>

            <div class="input_group">
                <a href="{{ route('login')}}">Already registered?</a>    
            </div>  

            <button type="submit">Register</button>      
        </form>
   </div>
</x-app-layout>
