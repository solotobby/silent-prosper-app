<div class="footer1 mt-80 md:mt-40 sm:mt-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="logo">
                    <a href="index.html"><img src="{{ asset('assets/img/logo/header-logo1.png')}}" alt="vexon" /></a>
                </div>
                <div class="heading1 mt-16">
                    <p>Eclatspad is a platform where both writers and readers can connect with each other, explore, create,  and share captivating stories.</p>
                    <div class="footer-social1">
                        <ul>
                            <li>
                                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                            </li>
                            {{-- <li>
                                <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                            </li> --}}
                            <li>
                                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa-regular fa-x-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa-brands fa-tiktok"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-50 sm:mb-30 sm:mt-30">
                <div class="footer-list1 ml-80 md:ml-0 sm:ml-0">
                    <h3>Explore Categories</h3>
                    <ul>
                        <li><a href="#">Digital Marketing </a></li>
                        <li><a href="#">Ai & Technology </a></li>
                        <li><a href="#">Content Strategy </a></li>
                        <li><a href="#">Social Media </a></li>
                        <li><a href="#">SEO & Analytics </a></li>
                        <li><a href="#">Design & Development </a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="footer-list1 ml-50 md:ml-0 sm:ml-0 mb-50 sm:mb-30">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="{{ url('/') }}">Home </a></li>
                        <li><a href="{{ url('register') }}">Sign Up </a></li>
                        <li><a href="{{ url('login') }}">Sign In </a></li>
                        <li><a href="{{ url('about') }}">About </a></li>
                        <li><a href="{{ url('privacy-policies') }}">Privacy & policy </a></li>
                        <li><a href="{{ url('terms-conditions') }}">Terms & Conditions </a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="footer-contact-list1 mb-50 sm:mb-30">
                    <h3>Contact Us</h3>
                    <div class="footer-contact-box1">
                        <div class="icon">
                            <img src="{{ asset('assets/img/icons/footer1-icon1.svg')}}" alt="vexon" />
                        </div>
                        <div class="text">
                            <a href="#">eclatspad@gmail.com</a>
                        </div>
                    </div>

                    {{-- <div class="footer-contact-box1">
                        <div class="icon">
                            <img src="assets/img/icons/footer1-icon2.svg" alt="vexon" />
                        </div>
                        <div class="text">
                            <a href="#"
                                >8708 Technology Forest Pl <br />
                                Suite 125 -G, The Woodlands, <br />
                                TX 773</a
                            >
                        </div>
                    </div> --}}

                    {{-- <div class="footer-contact-box1">
                        <div class="icon">
                            <img src="assets/img/icons/footer1-icon3.svg" alt="vexon" />
                        </div>
                        <div class="text">
                            <a href="#">123-456-7890</a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>

        <div class="coppyrihgt1">
            <div class="row coppyrihgt-border">
                <div class="col-md-6">
                    <p class="coppyrihgt">© {{ date('Y') }} Eclatspad, Inc. All Rights Reserved.</p>
                </div>
                <div class="col-md-6">
                    <div class="conditions">
                        <a href="{{ url('privacy-policies') }}"> Privacy Policy </a>
                        <a href="{{ url('terms-conditions') }}"> Terms & Conditions </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>