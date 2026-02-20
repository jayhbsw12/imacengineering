<?php include("header-top.php"); ?>
 <meta name="robots" content="index,follow">
 <title>AFDS: Advanced Fire Detection System | iMAC Engineering</title>
 <meta name="description" content="See how iMAC Engineering designed an advanced fire detection and suppression system with instant activation, manual override, and durability for harsh mining conditions.">
 <meta property="og:image" content="https://imacengineering.com//assets/case-study-images/Banner/AFDS.webp">
 <meta property="og:title" content="AFDS: Advanced Fire Detection System | iMAC Engineering" />
 <meta property="og:description" content="See how iMAC Engineering designed an advanced fire detection and suppression system with instant activation, manual override, and durability for harsh mining conditions." />
<?php include("header.php"); ?>

<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous"> -->

<!-- HERO IMAGE -->
<section class="case-study-hero">
    <img src="./assets/case-study-images/Banner/AFDS.webp" alt="Advanced Fire Detection System">
</section>
<!-- HERO IMAGE END -->

<!-- DETAIL-CONTENT -->
<section class="detail-content">
    <div class="container">
        <h2>AFDS: Advanced Fire Detection System</h2>
        <div class="detail-obj">
            <h4><b>Objectives:</b></h4>
            <p>The primary goal of this project was to design an instant-response automatic fire detection and suppression system for a high-value surface mining machine used in coal mines. The client, responsible for security and safety operations, highlighted that traditional systems experienced a significant 2–3 minute delay in activating the fire extinguisher—time enough for a fire to cause extensive damage.</p>
            <p>The new system needed to detect the earliest signs of combustion and trigger suppression immediately. Beyond automation, it also had to offer a manual activation option for emergency override, ensuring that operators retained control in case of an unexpected malfunction. Additionally, the system had to withstand harsh mining conditions, including extreme temperatures and pervasive coal dust.</p>
        </div>

        <div class="detail-obj">
            <h4><b>Challenges:</b></h4>
            <p>Developing this system involved overcoming several critical challenges. First, the enclosed engine compartment of the surface miner regularly reaches temperatures well above the safe limits of conventional electronics, with printed circuit boards (PCBs) rated only up to 70 °C, creating a risk of component failure. Secondly, the reliance on a single-unit IR sensor had proven too slow, allowing flashpoints to escalate rapidly before detection. </p>
            <p>Third, coal dust presented a severe contamination hazard; when our initial prototype used conventional filters, conductive coal particles still penetrated the housing and triggered short circuits in sensitive components. Finally, the monolithic design, which housed both sensors and controllers in the engine space, posed logistical difficulties for cooling and made the system vulnerable to dust infiltration and heat bleed.</p>
        </div>


        <div class="detail-obj">
            <h4><b>Solution:</b></h4>
            <p>To address these obstacles, we reimagined the system with a modular, multi-sensor architecture and relocated the electronics to a controlled environment. An IR detector mounted on top of the engine compartment was paired with four contact thermocouples installed at critical hotspots: the fuel pump, hydraulic distribution line, turbocharger, and the main engine bay. </p>
            <p>These sensors allowed for precise, localized temperature monitoring and instant flashpoint detection. Key electronics—including the main controller and PCBs—were moved into the crew cabin, where ambient temperatures remain safe and dust intrusion is minimal. This eliminated the need for active cooling systems, such as peltiers and fans, which had proven unreliable in coal-dust conditions.</p>
            <p>The contact sensors were encased in sealed wire harnesses to resist water and particulate ingress. The system was configured to issue an early warning alarm when temperatures rose between 150–200 °C, escalating to automatic extinguisher activation when any IR sensor registered temperatures exceeding 300–350 °C.</p>
            <p>A clearly marked manual override button was integrated to let operators trigger suppression manually, reinforcing safety redundancy. Operators could also monitor real-time temperatures and system status via an intuitive display panel, which included diagnostics such as fuse and light integrity checks.</p>
        </div>
        <div class="detail-obj">
            <h4><b>Outcome:</b></h4>
            <p>The redesigned system delivered marked improvements in speed, reliability, and maintainability. The combination of the IR flashpoint sensor and strategically placed contact thermocouples facilitated near-instantaneous fire detection, significantly reducing the reaction time compared to prior solutions.Relocating the controller and electronics into the cabin protected them from extreme heat and coal dust, eliminating chilly cooling system dependencies and avoiding contamination-related failures. The system’s modular design allows for simple replacement or updating of individual components without taking the entire machine offline—greatly minimizing downtime.</p>
            <p> Operators reported increased confidence in the machine’s safety, backed by visible temperatures, reliable alarms, and a manual override. This comprehensive approach not only met but surpassed the client’s objectives for immediate fire response and robust, dust-resistant performance in demanding mining environments.</p>
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
                    
                    <!-- Project Card 6 - Blossom Fans -->
                    <a href="https://imacengineering.com/pill-cap"><div class="carousel-card">
                        <div class="card-image">
                            <img src="/assets/CASE-STUDY-BANNER/PILLCAP.webp" alt="PILLCAP">
                            <div class="card-overlay"></div>
                            <div class="card-content">
                                <h3 class="card-title">Pill Cap</h3>
                                <!-- <p class="card-description">Premium fans for the discerning users</p> -->
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
