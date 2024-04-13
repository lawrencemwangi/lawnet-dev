<x-app-layout>
    <div class="profile_container">
        @include('partials.navbar')

        <div class="main_container">
            <h1>Profile</h1>

            <div class="general_content">
                <h3>Update Profile</h3>

                <form action="{{ route('profile.update') }}" method="post">
                    @csrf
                    @method('patch')

                    <div class="group">
                        <div class="input_group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $user->first_name) }}">
                            <span class="inline_alert">{{ $errors->first('first_name') }}</span>
                        </div>

                        <div class="input_group">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $user->last_name) }}">
                            <span class="inline_alert">{{ $errors->first('last_name') }}</span>
                        </div> 
                    </div>
                    
                    <div class="group">
                        <div class="input_group">
                            <label for="email"> Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}">
                            <span class="inline_alert">{{ $errors->first('email') }}</span>
                        </div>
    
                        <div class="input_group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $user->phone_number) }}">
                            <span class="inline_alert">{{ $errors->first('phone_number') }}</span>
                        </div>
                    </div>

                    <button type="submit">Update</button>
                </form>
            </div>

            <div class="profile_password">
                <h3>Update Password</h3>

                <form action="{{ route('password.update') }}" method="post">
                    @csrf
                    @method('put')

                    <div class="input_group">
                        <label for="update_password_current_password">Current Password</label>
                        <input type="password" name="current_password" id="update_password_current_password" placeholder="Current Password" value="{{ old('update_password_current_password') }}">
                        <span class="inline_alert">{{ $errors->updatePassword->first('current_password') }}</span>
                    </div>

                    <div class="input_group">
                        <label for="update_password_password">New Password</label>
                        <input type="password" name="password" id="update_password_password" placeholder="New Password" value="{{ old('update_password_password') }}">
                        <span class="inline_alert">{{ $errors->updatePassword->first('password') }}</span>
                    </div>

                    <div class="input_group">
                        <label for="update_password_password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="update_password_password_confirmation" placeholder="Confirm Password" value="{{ old('update_password_password_confirmation') }}">
                        <span class="inline_alert">{{ $errors->updatePassword->first('password_confirmation') }}</span>
                    </div>

                    <button type="submit">Update</button>
                </form>
            </div>

            <div class="profile_delete">
                <h3>Delete Account</h3>

                <form action="{{ route('profile.destroy') }}" method="post"  id="deleteForm">
                    @csrf
                    @method('delete')

                    <p>if you want to delete you account enter the password. We will miss you our client and hope to see you back !!</p>
                    <input type="password" name="latest_password" id="latest_password" placeholder="Enter Your Password">
                    <span class="inline_alert">{{ $errors->first('password') }}</span>

                    <button type="submit" id="deleteButton"  style="display: none;" class="alert-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
