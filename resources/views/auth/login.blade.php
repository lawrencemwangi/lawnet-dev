<x-app-layout>

    <div class="input_container">
        <form method="POST" action="{{ route('login') }}">
            @csrf
    
            <h2>Log In</h2>
            <div class="input_group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email')}}" required>
                <span class="inline_alert">{{ $errors->first('email') }}</span>
            </div>
    
            <div class="input_group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" value="{{ old('pasword')}}" required>
                <span class="inline_alert">{{ $errors->first('password') }}</span>
            </div>
                             
            <div class="input_group">
                Don't have an account? <a href="{{ route('register')}}">Sign Up</a>
            </div>
            <div class="input_group">
                <a href="{{'forgot-password'}}">Forgot your password?</a>
            </div>   
            <button type="submit">Log In</button>   
        </form>
    </div>
</x-app-layout>
