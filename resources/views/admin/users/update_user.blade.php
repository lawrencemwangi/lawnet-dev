<x-app-layout>
    <div class="admin_container">
        @include('admin.partials.aside')

        <div class="admin">
            <div class="service_container">
                <h1>Update user</h1>
                <div class="service_item">
                    <form action="{{ route('user.update',['user' => $user]) }}" method="post">
                        @csrf
                        @method('PATCH')

                        <div class="group">
                            <div class="input_group">
                                <p>First Name:-</p>
                                <span>{{ $user->first_name }}</span>
                            </div>
        
                            <div class="input_group">
                                <p>Last Name:-</p>
                                <span>{{ $user->last_name }}</span>
                            </div>
                        </div>

                        <div class="group">
                            <div class="input_group">
                                <p>Email:-</p>
                                <span>{{ $user->email }}</span>
                            </div>
        
                            <div class="input_group">
                                <p>Phone Number:-</p>
                                <span>{{ $user->phone_number }}</span>
                            </div>
                        </div>
    
                        <div class="group">
                            <div class="input_group">
                                <label for="status">Status:-</label>
                                <div class="custom_radio_buttons">
                                    <label>
                                        <input class="option_radio" type="radio" name="status" id="active" value="1" {{ old('status',$user->status) == '1' ? 'checked' : '' }}>
                                        <span>active</span>
                                    </label>
        
                                    <label>
                                        <input class="option_radio" type="radio" name="status" id="inactive" value="0" {{ old('status',$user->status) == '0' ? 'checked' : '' }}>
                                        <span>inacitve</span>
                                    </label>
                                </div>
                            </div>
    
                            <div class="input_group">
                                <label for="user_level">User Level:-</label>
                                <div class="custom_radio_buttons">
                                    <label>
                                        <input class="option_radio" type="radio" name="user_level" id="admin" value="1" {{ old('user_level', $user->user_level) == '1' ? 'checked' : '' }}>
                                        <span>Admin</span>
                                    </label>
        
                                    <label>
                                        <input class="option_radio" type="radio" name="user_level" id="user" value="0" {{ old('user_level', $user->user_level) == '0' ? 'checked' : '' }}>
                                        <span>User</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <button type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>