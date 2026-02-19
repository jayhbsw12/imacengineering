<?php include("header-top.php"); ?>
 <meta name="robots" content="index,follow">
 <title>Pill Cap | iMAC Engineering</title>
 <meta name="description" content="iMAC Engineering designed an intelligent pillcap with SIM-based cellular connectivity to notify patients and doctors, featuring snap-fit assembly and sealed electronics.">
<?php include("header.php"); ?>

<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous"> -->

<!-- HERO IMAGE -->
<section class="case-study-hero">
    <img src="./assets/case-study-images/Banner/Pillcap-banner.webp" alt="Pill Cap">
</section>
<!-- HERO IMAGE END -->

<!-- DETAIL-CONTENT -->
<section class="detail-content">
    <div class="container">
        <h2>Pill Cap</h2>
        <div class="detail-obj">
            <h4><b>Objectives:</b></h4>
            <p>The goal was to create an intelligent pillcap that uses SIM‑based cellular connectivity to reliably notify both patients and doctors when doses are missed. The design needed to be robust, cost-effective, and easy to manufacture—transitioning from glue to snap‑fit assembly, while maintaining seal integrity and protecting internal electronics.</p>
            <p> A clear visual interface was also essential: a single light pipe indicating two distinct LEDs. Finally, the cap required a tamper-evident mechanism that would break if opened improperly, without risking PCB damage.</p>
        </div>

        <img src="./assets/case-study-images/Pillcap.webp" class="case-detail-image" alt="Pill Cap">

        <div class="detail-obj">
            <h4><b>Challenges:</b></h4>
            <p>Several hurdles emerged. The original glued assembly was unreliable, slow, and inconsistent. The seal‑disc failed under repeated use. Light from dual LEDs leaked and scattered, reducing clarity.Snap-fit mold design risked shrink marks and could over-compress the internal PCB if not engineered carefully. </p>
            <p>Moreover, introducing a tamper feature that didn’t impact assembly or leak paths added complexity. Choosing the right materials and maintaining tolerances further complicated the design.</p>
        </div>

        <img src="./assets/case-study-images/Pillcap(1).webp" alt="Pillcap(1)">
    
        <div class="detail-obj">
            <h4><b>Solution:</b></h4>
            <p>To address these issues, we implemented snap‑fit joints, increasing size and reducing count to ensure robustness and repeatability. We adopted a rib-supported cantilever snap-lock for sealing—drawing on best practices to taper and fillet the cantilever, minimizing stress concentrators and mold shrinkage The cantilever ribs prevented sink marks while maintaining sealing force.</p>
            <p>For optical indication, we designed a single light pipe with internal reflective surfaces to guide two LEDs independently, reducing bleed and improving visibility. Snap-lock tabs secure the light pipe in alignment. A sacrificial snap feature was engineered to visibly break if tampered with. Snap arm geometry was tuned (taper, width ≥ 5 mm, lead-in angles, fillets) to balance retention force and avoid stressing the PCB . Material selection and design tolerances ensured predictable mold shrinkage and reliable engagement . Prototype cycles included FEA and simulation to validate insertion/extraction and stress distribution</p>
        </div>
        <!-- <img src="assets/case-study/VivaE-working-.004.webp" class="case-detail-image"> -->
        <div class="detail-obj">
            <h4><b>Outcome:</b></h4>
            <p>The redesigned pillcap achieved significant improvements: fewer, larger snap‑fits cut material and assembly costs; snaps enabled faster, consistent assembly; rib-enhanced seals passed repeated cycle testing with no failures or shrink marks. </p>
            <p>The light-pipe now clearly shows two distinct LEDs with minimal optical scatter. The tamper-evident snap efficiently breaks upon intrusion without excessive force, safeguarding the electronics. Controlled snap design prevented PCB compression. Overall, the product is smarter, more secure, and cost-efficient—meeting client specs and production standards, while leveraging industry best practices for snap-fit durability and mold reliability.</p>
        </div>
    </div>
</section>
<!-- DETAIL CONTENT END -->

 <div class="carousel-container">
        <h1 class="carousel-title">Other Case Studies</h1>
        <p class="carousel-subtitle">Innovative design solutions across industries</p>
        
        <div class="carousel-wrapper">
            <!-- Left Navigation Arrow -->
            <button class="nav-arrow nav-arrow-left" id="prevBtn">
                <i class="fas fa-chevron-left"></i>
            </button>
            
            <!-- Carousel Track -->
            <div class="carousel-track-container">
                <div class="carousel-track" id="carouselTrack">
                    
                    <!-- Project Card 2 - Pegasus -->
                    <a href="https://imacengineering.com/the-journey-of-nox-advaita"><div class="carousel-card">
                        <div class="card-image">
                            <img src="/assets/CASE-STUDY-BANNER/NOX ADVAITA.webp" alt="NOX ADVAITA">
                            <div class="card-overlay"></div>
                            <div class="card-content">
                                <h3 class="card-title">Nox Advaita</h3>
                                <!-- <p class="card-description">Smart Security Products</p> -->
                            </div>
                        </div>
                    </div></a>
                    
                    <a href="https://imacengineering.com/gynec-bed-by-karma"><div class="carousel-card">
                        <div class="card-image">
                            <img src="/assets/CASE-STUDY-BANNER/GYNEC BED.webp" alt="GYNEC BED">
                            <div class="card-overlay"></div>
                            <div class="card-content">
                                <h3 class="card-title">Gynec Bed By Karma</h3>
                                <!-- <p class="card-description">Smart Security Products</p> -->
                            </div>
                        </div>
                    </div></a>

                    <!-- Project Card 3 - Rover Design -->
                    <a href="https://imacengineering.com/ev-scooter-development"><div class="carousel-card">
                        <div class="card-image">
                            <img src="/assets/CASE-STUDY-BANNER/EV VEHICLE.webp" alt="EV Scooter Development">
                            <div class="card-overlay"></div>
                            <div class="card-content">
                                <h3 class="card-title">EV Scooter Development</h3>
                                <!-- <p class="card-description">Lunar Rover Design</p> -->
                            </div>
                        </div>
                    </div></a>

                   
                    <!-- Project Card 5 - Urban Company -->
                    <a href="https://imacengineering.com/gaming-headphones"><div class="carousel-card">
                        <div class="card-image">
                            <img src="/assets/CASE-STUDY-BANNER/GAMING HEADPHONE.webp" alt="GAMING HEADPHONE">
                            <div class="card-overlay"></div>
                            <div class="card-content">
                                <h3 class="card-title">Gaming Headphones</h3>
                                <!-- <p class="card-description">UC's indigenous water purifier range</p> -->
                            </div>
                        </div>
                    </div>
                    
                    <!-- Project Card 4 - Kineco -->
                    <a href="https://imacengineering.com/universal-IR-blaster"><div class="carousel-card">
                        <div class="card-image">
                            <img src="/assets/CASE-STUDY-BANNER/IR BLASTER.webp" alt="IR BLASTER">
                            <div class="card-overlay"></div>
                            <div class="card-content">
                                <h3 class="card-title">Universal IR Blaster</h3>
                                <!-- <p class="card-description">Identity design</p> -->
                            </div>
                        </div>
                    </div></a>

                    <!-- Project Card 7 - Kangaro -->
                    <a href="https://imacengineering.com/centrifuge-machine"><div class="carousel-card">
                        <div class="card-image">
                            <img src="/assets/CASE-STUDY-BANNER/CENTRIFUGE NACHINE.webp" alt="CENTRIFUGE NACHINE">
                            <div class="card-overlay"></div>
                            <div class="card-content">
                                <h3 class="card-title">Centrifuge Machine</h3>
                                <!-- <p class="card-description">Next gen range of staplers</p> -->
                            </div>
                        </div>
                    </div></a>

                    <!-- Project Card 8 - Epigamia -->
                    <a href="https://imacengineering.com/portable-caravan-fan"><div class="carousel-card">
                        <div class="card-image">
                            <img src="/assets/CASE-STUDY-BANNER/PORTABLE CARAVAN FAN.webp" alt="PORTABLE CARAVAN FAN">
                            <div class="card-overlay"></div>
                            <div class="card-content">
                                <h3 class="card-title">Portable Caravan Fan</h3>
                                <!-- <p class="card-description">Premium yoghurt packaging</p> -->
                            </div>
                        </div>
                    </div></a>

                    <!-- Project Card 9 - Golf E-Cart -->
                    <a href="https://imacengineering.com/advanced-fire-detection-system"><div class="carousel-card">
                        <div class="card-image">
                            <img src="/assets/CASE-STUDY-BANNER/AFDS.webp" alt="AFDS">
                            <div class="card-overlay"></div>
                            <div class="card-content">
                                <h3 class="card-title">Advanced Fire Detection System</h3>
                                <!-- <p class="card-description">Heritage in design</p> -->
                            </div>
                        </div>
                    </div></a>

                    <!-- Project Card 10 - Remote -->
                    <a href="https://imacengineering.com/patient-warmer"><div class="carousel-card">
                        <div class="card-image">
                            <img src="/assets/CASE-STUDY-BANNER/PATIENT WARMER.webp" alt="PATIENT WARMER">
                            <div class="card-overlay"></div>
                            <div class="card-content">
                                <h3 class="card-title">Patient Warmer</h3>
                                <!-- <p class="card-description">One touch VRF control</p> -->
                            </div>
                        </div>
                    </div></a>

                    <!-- Project Card 11 - Remote -->
                    <a href="https://imacengineering.com/cataract-foot-pedal"><div class="carousel-card">
                        <div class="card-image">
                            <img src="/assets/CASE-STUDY-BANNER/Cataract foot padel.webp" alt="Cataract foot padel">
                            <div class="card-overlay"></div>
                            <div class="card-content">
                                <h3 class="card-title">Cataract Foot Pedal</h3>
                                <!-- <p class="card-description">One touch VRF control</p> -->
                            </div>
                        </div>
                    </div></a>

                </div>
            </div>
            
            <!-- Right Navigation Arrow -->
            <button class="nav-arrow nav-arrow-right" id="nextBtn">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>

        <!-- Carousel Indicators -->
        <div class="carousel-indicators" id="carouselIndicators">
            <!-- Dynamically generated by JavaScript -->
        </div>
    </div>









<script>
   document.addEventListener('DOMContentLoaded', function() {
   const slider = document.querySelector('.services-slider');
   const prevBtn = document.querySelector('.services-nav img:first-child');
   const nextBtn = document.querySelector('.services-nav img:last-child');
   
   if (slider && prevBtn && nextBtn) {
       let scrollAmount = 0;
       const slideWidth = 490; // slide width + gap
       
       // Next button click
       nextBtn.addEventListener('click', function() {
           scrollAmount += slideWidth;
           if (scrollAmount > slider.scrollWidth - slider.clientWidth) {
               scrollAmount = 0;
           }
           slider.scrollTo({
               left: scrollAmount,
               behavior: 'smooth'
           });
       });
       
       // Previous button click
       prevBtn.addEventListener('click', function() {
           scrollAmount -= slideWidth;
           if (scrollAmount < 0) {
               scrollAmount = slider.scrollWidth - slider.clientWidth;
           }
           slider.scrollTo({
               left: scrollAmount,
               behavior: 'smooth'
           });
       });
   } else {
       console.error('Slider or navigation buttons are missing in the DOM.');
   }
   });
   
   // Process accordion
   const processHeaders = document.querySelectorAll('.process-header');
   
   processHeaders.forEach(header => {
   header.addEventListener('click', function () {
       const description = this.nextElementSibling;
       const arrow = this.querySelector('img');  // Ensure this targets the correct element
   
       if (description.style.display === 'none' || !description.style.display) {
           description.style.display = 'block';
           arrow.style.transform = 'rotate(180deg)';
       } else {
           description.style.display = 'none';
           arrow.style.transform = 'rotate(0deg)';
       }
   });
   });
   
   window.addEventListener('scroll', function () {
   const header = document.getElementById('mainHeader');
   if (window.scrollY > 50) {
     header.classList.add('sticky');
   } else {
     header.classList.remove('sticky');
   }
   });
   
   // faq js
   document.addEventListener('DOMContentLoaded', function() {
   // FAQ Accordion functionality
   const faqItems = document.querySelectorAll('.faq-item');
   
   faqItems.forEach(item => {
   const question = item.querySelector('.faq-question');
   
   question.addEventListener('click', () => {
     // Close all other items
     faqItems.forEach(otherItem => {
       if (otherItem !== item) {
         otherItem.classList.remove('active');
       }
     });
     
     // Toggle current item
     item.classList.toggle('active');
   });
   });
   
   // Smooth scrolling for contact link
   const contactLink = document.querySelector('.faq-contact-link');
   if (contactLink) {
   contactLink.addEventListener('click', function(e) {
     e.preventDefault();
     // Add your contact form or modal logic here
     console.log('Contact us clicked');
   });
   }
   
   // Add intersection observer for animations (optional enhancement)
   const observerOptions = {
   threshold: 0.1,
   rootMargin: '0px 0px -50px 0px'
   };
   
   const observer = new IntersectionObserver((entries) => {
   entries.forEach(entry => {
     if (entry.isIntersecting) {
       entry.target.style.opacity = '1';
       entry.target.style.transform = 'translateY(0)';
     }
   });
   }, observerOptions);
   
   // Observe sections for fade-in animation
   const sections = document.querySelectorAll('section');
   sections.forEach(section => {
   section.style.opacity = '0';
   section.style.transform = 'translateY(20px)';
   section.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
   observer.observe(section);
   });
   
   // Handle window resize for responsive adjustments
   let resizeTimer;
   window.addEventListener('resize', function() {
   clearTimeout(resizeTimer);
   resizeTimer = setTimeout(function() {
     // Add any resize-specific logic here if needed
     console.log('Window resized');
   }, 250);
   });  
   }); 
</script>   
<script src="js/slider.js"></script>
<script src="js/slider-testimonial.js"></script>
<script src="js/testimonial-slider.js"></script>
<script src="js/logo-slider.js"></script>

<script src="js/banner-logo-slider.js"></script>
<?php include("footer.php"); ?>
