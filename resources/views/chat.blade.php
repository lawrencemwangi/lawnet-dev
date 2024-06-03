<x-app-layout>
    @include('partials.navbar')

    <div class="main_container">
        <div class="chat_container">
            <h1>Chat</h1>

            <div class="chat_content">
                <div class="chat_header">
                    <p>Welcome back: <span>Lawrence mwangi</span></p>
                    <p>Status: <span class="status">Online</span></p>
                </div>
                <div class="chat_body">
                    <div class="user_chat">
                        <p>hello!</p>
                    </div>
                    <div class="admin_chat">
                        <p>How is you!</p>
                    </div>
                </div>
                <div class="chat_input">
                    <form action="#" method="post">
                        @csrf
                        <input type="text" name="chat_input" id="chat_input"  value="" placeholder="Type you message" autofocus>
                    </form>
                    <button type="submit">Send</button>
                </div>
            </div>
        </div>
    </div>

    @include('partials.footer')
</x-app-layout>