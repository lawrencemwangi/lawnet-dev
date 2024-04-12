<x-app-layout>
    @include('partials.navbar')

    <div class="main_container">
        <h2>Contact</h2>
        @include('partials.message')

        <div class="contact_container">
            <div class="contact_infor">
                <p>lawnetdeveloper@gmail.com</p>
                <p>+254 799 509 242</p>
            </div>
            
            <div class="contact_form">
                <form action="{{ route('message.store') }}" method="post">
                    @csrf
                    @method('post')

                    <div class="input_group">
                        <div class="names">
                            <div class="input_content">
                                <input type="text" name="first_name" id="first_name"  required>
                                <label for="first_name"><i class="fas fa-user-alt"></i>First Name</label>
                                <span class="inline_alert">{{ $errors->first('first_name') }}</span>
                            </div>
                            <div class="input_content">
                                <input type="text" name="last_name" id="last_name"  required>
                                <label for="first_name"><i class="fas fa-user-alt"></i>Last Name</label>
                                <span class="inline_alert">{{ $errors->first('last_name') }}</span>

                            </div>
                        </div>
                        <div class="input_content">
                            <input type="email" name="email" id="email" required >
                            <label for="email"><i class="fas fa-envelope"></i>Email</label>
                            <span class="inline_alert">{{ $errors->first('email') }}</span>

                        </div>
                        <div class="input_content">
                            <textarea name="message" id="message" cols="7" rows="6" required></textarea>
                            <label for="first_name"><i class="fas fa-comments"></i>Message</label>
                            <span class="inline_alert">{{ $errors->first('message') }}</span>

                        </div>
                    </div>
                    <button class="btn" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

    @include('partials.Footer')
</x-app-layout>