<x-app-layout>
    <div class="footer_container">
        <div class="footer_content">
            <div class="footer_infor">
                <img src="{{ asset('assets/images/dell.jpg') }}" width="40px" height="40px" alt="logo Image">
                <h2 class="title">Lawnet Developers</h2>
                <p>We specialize in developing user-friendly systems and websites tailored to your needs. 
                    Don't hesitate to contact us for any inquiries or assistance you may need 
                </p>
                <p>Kiambu, Kenya</p>
            </div>
            <div class="footer_links">
                <h3>Links</h3>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('service') }} ">Service</a></li>
                <li><a href="{{ route('blog') }}">Blog</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </div>
            <div class="footer_social">
                <h3>Social Media</h3>
                <a href="https://github.com/lawrencemwangi" target="_blank" rel="noopener noreferrer">
                    <img src="{{ asset('assets/images/github.png') }}" alt="github icon">
                </a>
                
                <a href="https://www.instagram.com/lawrenzo.mwangi/" target="_blank" rel="noopener noreferrer">
                    <img src="{{ asset('assets/images/instagram.png') }}" alt="instagram icon">
                </a>

                <a href="https://www.linkedin.com/in/lawrencemwangi/" target="_blank" rel="noopener noreferrer">
                    <img src="{{ asset('assets/images/linkedin.png') }}" alt="linkedin icon">
                </a>
            
                <a href="http://wa.me/254799509242?text='Hello Lawnet developers'" target="_blank" rel="noopener noreferrer">
                    <img src="{{ asset('assets/images/whatsapp.png') }}" alt="whatapp icon">
                </a>
                <p>lawnetdevelopers@gmail.com</p>
                <p>+254 799 509 242</p>
            </div>
        </div>
        <hr>
        <div class="footer_copyrigth">
            <p>&copy; 2024 | Lawnet Developers | All Rights Reserved</p>
        </div>
    </div>
</x-app-layout>