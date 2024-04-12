<x-app-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="input_container">
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <h2>Forgot Password</h2>
            <div class="input_group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email')}}">
            </div>
            <button type="submit">Reset Password</button>
        </form>
    </div>
</x-app-layout>
