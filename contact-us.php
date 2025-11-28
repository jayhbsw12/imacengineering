<?php include("header-top.php"); ?>
<meta name="robots" content="index,follow">
<title> Contact Us - iMAC Engineering </title>
<meta name="description"
  content="To learn more about iMAC and its services, contact us by using this e-mail ID - business@imacengineering.com, or you can call at +91 6357173693">
<link rel="canonical" href="https://imacengineering.com/contact-us" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Contact Us - iMAC Engineering" />
<meta property="og:url" content="https://imacengineering.com/contact-us" />
<meta property="og:description"
  content="To learn more about iMAC and its services, contact us by using this e-mail ID - business@imacengineering.com, or you can call at +91 6357173693" />
<meta property="og:image" content="https://imacengineering.com/aassets/image/about/img-s-28.webp" />
<meta property="og:image:type" content="image/webp" />
<meta property="og:image:alt" content="About imac" />
<meta name="keywords" content="">
<?php include("header.php"); ?>

<!-- Add JS flag BEFORE first paint so CSS can hide animated elements pre-paint -->
<script>document.documentElement.classList.add('js')</script>

<style>
  .responsive-map {
    position: relative;
    width: 100%;
    padding-bottom: 24%;
    /* Default height for large screens (16:8 ratio) */
    height: 0;
    overflow: hidden;
  }

  .section-title {
    font-family: 'Poppins', var(--default-font-family);
    font-size: 20px;
    font-weight: 600;
    line-height: 85px;
    color: var(--text-dark);
  }

  .responsive-map iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 0;
  }

  /* Tablet view */
  @media (max-width: 1024px) {
    .responsive-map {
      padding-bottom: 60%;
      /* Taller map */
    }
  }

  /* Mobile view */
  @media (max-width: 768px) {
    .responsive-map {
      padding-bottom: 75%;
      /* Even taller map for portrait view */
    }
    .section-title{
      line-height: 55px;
    }
  }

  /* ---------------------------
     FOUC / skeleton flash fix
     --------------------------- */
  /* Initial hidden state only when JS is available, so no-JS users see content */
  .js .has_fade_anim {
    opacity: 0;
    transform: translateY(20px);
    transition: opacity .6s ease, transform .6s ease;
    will-change: opacity, transform;
  }
  /* Revealed state when in view */
  .js .has_fade_anim.is-inview {
    opacity: 1;
    transform: none;
  }
  /* Respect reduced motion users */
  @media (prefers-reduced-motion: reduce) {
    .js .has_fade_anim {
      transition: none;
      transform: none;
      opacity: 1;
    }
  }
</style>

<!-- hero area start  -->
<!-- (kept as-is, commented) -->
<!-- hero area end  -->

<!-- contact area start  -->
<section class="contact-area">
  <div class="container">
    <div class="contact-area-inner section-spacing">
      <div class="section-header">
        <div class="section-title-wrapper">
          <div class="title-wrapper">
            <h2 class="section-title large has_fade_anim">We’ve been
              waiting for you!</h2>
          </div>
        </div>
        <div class="text-wrapper">
          <p class="text has_fade_anim">If you are looking at us for any services/ work feel free to call us or drop
            your message. We are happy to work with you.</p>
        </div>
      </div>
      <div class="section-content">
        <div class="info-box has_fade_anim">
          <ul class="contact-list">
            <h6 class="contact-title-details">Business Related Enquiries:</h6>
            <li><a href="tel:+916357173693"><img src="assets/icons/phone.svg" alt="Phone" class="location-icon"
                  style="margin:0px;" /> &nbsp; +91-6357173693</a></li>
            <li><a href="mailto:business@imacengineering.com"><img src="assets/icons/email.svg" alt="Email"
                  class="location-icon" style="margin:0px;" /> &nbsp; business@imacengineering.com</a></li>
            <hr>
            <h6 class="contact-title-details">Vacancy Related Enquiries:</h6>
            <li><a href="tel:+918799153098"><img src="assets/icons/phone.svg" alt="Phone" class="location-icon"
                  style="margin:0px;" /> &nbsp; +91-8799153098</a></li>
            <li><a href="mailto:hr@imacengineering.com"><img src="assets/icons/email.svg" alt="Email"
                  class="location-icon" style="margin:0px;" /> &nbsp; hr@imacengineering.com</a></li>
            <hr>
            <h6 class="contact-title-details">Headquarters Address:</h6>
            <li><img src="assets/icons/location.svg" alt="Address" class="location-icon" style="margin:0px;" /> &nbsp;
              203, Harsh Avenue, Navrangpura, <br> Ahmedabad, Gujarat 380009</li>
          </ul>
        </div>
        <div class="contact-wrap has_fade_anim" data-delay="0.30">
          <form id="contactFormMain" action="mail.php" method="POST" novalidate>
            <div class="contact-formwrap">
              <div class="contact-formfield">
                <input type="text" name="Name" id="Name" placeholder="Name*" required>
                <span class="error-message" id="NameError"></span>
              </div>
              <div class="contact-formfield">
                <input type="email" name="Email" id="Email" placeholder="Email*" required>
                <span class="error-message" id="EmailError"></span>
              </div>
              <div class="contact-formfield">
                <input type="text" name="Phone" id="Phone" placeholder="Phone*" required>
                <span class="error-message" id="PhoneError"></span>
              </div>
              <div class="contact-formfield">
                <input type="text" name="Organization" id="Organization" placeholder="Organization Name*" required>
                <span class="error-message" id="OrganizationError"></span>
              </div>
              <div class="contact-formfield contact-service">
                <select name="Service" id="contact-Service" required>
                  <option value="">Service</option>
                  <option value="CAD Outsourcing Services">CAD Outsourcing Services</option>
                  <option value="Product Design and Development">Product Design and Development</option>
                  <option value="Reverse Engineering Service">Reverse Engineering Service</option>
                  <option value="Sheet Metal Design">Sheet Metal Design</option>
                  <option value="3D Printing">3D Printing</option>
                  <option value="Contract Manufacturing">Contract Manufacturing</option>
                  <option value="Plastic Injection Modeling">Plastic Injection Modeling</option>
                  <option value="Innovation &amp; IP Strategy">Innovation &amp; IP Strategy</option>
                  <option value="Medical Product Design">Medical Product Design</option>
                  <option value="On Demand Manufacturing">On Demand Manufacturing</option>
                  <option value="Tooling Design and Manufacturing">Tooling Design and Manufacturing</option>
                  <option value="3D miniature Design">3D miniature Design</option>
                  <option value="Integration Services">Integration Services</option>
                  <option value="Kiosk Design Service">Kiosk Design Service</option>
                </select>
                <span class="error-message" id="ServiceError"></span>
              </div>
              <div class="contact-formfield messages">
                <input type="text" name="Message" id="Messages" placeholder="Messages*" required>
                <span class="error-message" id="MessagesError"></span>
              </div>
            </div>
            <div class="submit-btn">
              <button type="submit" class="wc-btn wc-btn-primary btn-text-flip">
                <span data-text="Send Message">Send Message</span>
              </button>
            </div>
          </form>
          <div id="formResponseMain"></div>

        </div>
      </div>
    </div>
  </div>
</section>
<!-- contact area end  -->

<div class="responsive-map">
  <iframe
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1835.7587188544428!2d72.56607874352964!3d23.04148401714607!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e831368621d5f%3A0xce3123ec6684ebc6!2siMAC%20Design%20and%20Engineering%20Services%20(Product%20Innovation%2C%20Design%20and%20Development%20Company)!5e0!3m2!1sen!2sin!4v1753881844340!5m2!1sen!2sin"
    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
  </iframe>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const slider = document.querySelector('.services-slider');
    const prevBtn = document.querySelector('.services-nav img:first-child');
    const nextBtn = document.querySelector('.services-nav img:last-child');

    if (slider && prevBtn && nextBtn) {
      let scrollAmount = 0;
      const slideWidth = 490; // slide width + gap

      // Next button click
      nextBtn.addEventListener('click', function () {
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
      prevBtn.addEventListener('click', function () {
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

  // faq + IntersectionObserver (FOUC-safe)
  document.addEventListener('DOMContentLoaded', function () {
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
      contactLink.addEventListener('click', function (e) {
        e.preventDefault();
        console.log('Contact us clicked');
      });
    }

    // IntersectionObserver for elements with .has_fade_anim
    const animatedEls = document.querySelectorAll('.has_fade_anim');
    if (animatedEls.length) {
      const io = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-inview');
            obs.unobserve(entry.target);
          }
        });
      }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

      animatedEls.forEach(el => io.observe(el));
    }

    // Handle window resize for responsive adjustments
    let resizeTimer;
    window.addEventListener('resize', function () {
      clearTimeout(resizeTimer);
      resizeTimer = setTimeout(function () {
        console.log('Window resized');
      }, 250);
    });
  }); 
</script>

<!--contactus page js-->
<script>
  document.getElementById('contactFormMain').addEventListener('submit', function (e) {
    e.preventDefault();
    const form = e.target;
    const responseDiv = document.getElementById('formResponseMain');
    let isValid = true;

    // Clear previous errors
    form.querySelectorAll('.error-message').forEach(el => el.textContent = '');

    const fields = ['Name', 'Email', 'Phone', 'Organization', 'Messages', 'contact-Service']; // Updated for select ID
    fields.forEach(id => {
      const input = form.querySelector(`#${id}`);
      const error = form.querySelector(`#${id}Error`);
      if (!input || !error) return;
      if (!input.value.trim()) {
        error.textContent = `${id.replace('-', ' ')} is required`; // Replace hyphen with space for a cleaner message
        isValid = false;
      }
    });

    // Email validation
    const emailEl = form.querySelector('#Email');
    const emailValue = emailEl ? emailEl.value.trim() : '';
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (emailValue && !emailRegex.test(emailValue)) {
      const emailErr = form.querySelector('#EmailError');
      if (emailErr) emailErr.textContent = 'Enter a valid email';
      isValid = false;
    }

    // Phone validation
    const phoneInput = form.querySelector('#Phone');
    const phoneValue = phoneInput ? phoneInput.value.trim() : '';
    const phoneRegex = /^\+?[0-9]{10,15}$/;
    if (!phoneRegex.test(phoneValue)) {
      const phoneErr = form.querySelector('#PhoneError');
      if (phoneErr) phoneErr.textContent = 'Enter valid phone number (10–15 digits, optional +)';
      isValid = false;
    }

    if (isValid) {
      const formData = new FormData(form);
      fetch('mail.php', {
        method: 'POST',
        body: formData
      })
        .then(res => res.text())
        .then(result => {
          if (result.trim() === 'success') {
            window.location.href = '/thank-you.php'; // ✅ Redirect on success
          } else {
            responseDiv.innerHTML = `<div class="form-message error">❌ Something went wrong. Please try again.</div>`;
          }
        })
        .catch(() => {
          responseDiv.innerHTML = `<div class="form-message error">❌ Server error. Try again later.</div>`;
        });
    }
  });

  // ✅ Allow only numbers and "+" in phone input
  document.getElementById('Phone').addEventListener('input', function () {
    this.value = this.value.replace(/[^\d+]/g, '');
  });
</script>

<script src="js/slider.js"></script>
<script src="js/slider-testimonial.js"></script>
<script src="js/testimonial-slider.js"></script>
<script src="js/logo-slider.js"></script>

<script src="js/banner-logo-slider.js"></script>
<?php include("footer.php"); ?>
