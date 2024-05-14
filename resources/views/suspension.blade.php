@if(session('status') === 0)
    <div class="inline_alert" role="alert">
        <p>
            Your account has been suspended for violation of the website policy.
            Please contact support for assistance.
        </p>
    </div>
@endif