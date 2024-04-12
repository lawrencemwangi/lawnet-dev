<x-app-layout>
   <div class="input_container">
        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <h2>Password Reset</h2>
            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="input_group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" value="{{ old('email', $request->email)}}" required>
            </div>
    
            <div class="input_group">
                <label for="pasword">Password</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div class="input_group">
                <label for="pasword-confirmation">Confirmation Password</label>
                <input type="password" name="password-confirmation" id="password-confirmation" required>
            </div>
            
            <button type="submit">Reset Pasword</button>
        </form>
   </div>
</x-app-layout>
