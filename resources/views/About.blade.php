<x-app-layout>
    @include('partials.navbar')
    
    <div class="main_container">
        <h2>About</h2>

        <div class="about_container">
            <div class="about_content">
                <div class="about_infor">
                    <h3>Our History</h3>
                    <p>At Lawnet Developer, we specialize in a range of digital services, including web development, design, and technical support. Our dedicated team is committed 
                        to excellence and reliability, ensuring that every project we undertake is executed with precision and care. Whether you're seeking cutting-edge website solutions or
                        dependable technical assistance, we have the expertise to meet your needs. Choose from our diverse range of services to align with your brand identity and convey 
                        your message effectively in your advertising campaigns.
                    </p>
                </div>
                <div class="about_image">
                    <img src="{{ asset('assets/images/office.png')}}" alt="Office Image">
                </div>
            </div>
            
            <div class="about_content">
                <div class="founder_images">
                    <img src="{{ asset('assets/images/mwangi.jpg')}}" alt="CEO Image">
                    <p>Lawrence Mwangi <span>CEO & Founder</span></p>
                    <p>Lawnet Developers</p>

                </div>

                <div class="about_infor">
                    <h3>Our Founder</h3>
                    <p>In 2024, Lawrence Mwangi established Lawnet Developer with the visionary goal of simplifying website design and development processes. Recognizing the complexity often
                        associated with these tasks, the company is committed to providing comprehensive solutions to streamline the workflow. Lawnet Developer prioritizes accessibility and aims to 
                        equip users with all the necessary tools and resources essential for creating exceptional websites. With a focus on innovation and efficiency, Lawnet Developer strives to empower 
                        individuals and businesses to achieve their online objectives effortlessly.
                    </p>
                </div>
            </div>
        </div>
    </div>
    @include('partials.Footer')

</x-app-layout>