<!-- Get In Touch Section -->
<section class="get-in-touch-section">
  <div class="get-in-touch-content">
    <div class="brochure-cards">
      <div class="brochure-card">
        <h3 class="brochure-title">Pitch Deck</h3>
        <a href="#" class="brochure-link openBrochureModalBtn" data-redirect="canva">
          <img src="assets/icons/pdf.svg" alt="PDF" class="brochure-icon" />
          <span class="brochure-text">Download Brochure</span>
        </a>
      </div>
      <div class="brochure-card dark">
        <h3 class="brochure-title">One-on-one with iMAC Design & Engineering</h3>
        <a href="#" class="brochure-cta open-appointment-modal">Schedule a Consultation </a>
      </div>
    </div>
    <div class="contact-info-section">
      <h2 class="contact-info-title">Get In Touch</h2>
      <div class="contact-locations">
        <div class="location">
          <h3 class="location-title">Ahmedabad</h3>
          <a href="https://maps.app.goo.gl/kUES8dPGESWaq8Cy8" target="_blank">
            <div class="location-item">
              <img src="assets/icons/location.svg" alt="Address" class="location-icon" />
              <span class="location-text">203, Harsh Avenue, Navrangpura, Ahmedabad, Gujarat 380009</span>
            </div>
          </a>
          <div class="location-item">
            <img src="assets/icons/phone.svg" alt="Phone" class="location-icon" />
            <span class="location-text"><a href="tel:+916357173693">+91 6357173693</a></span>
          </div>
          <div class="location-item">
            <img src="assets/icons/email.svg" alt="Email" class="location-icon" />
            <span class="location-text"><a
                href="mailto:business@imacengineering.com">business@imacengineering.com</a></span>
          </div>
        </div>
        <div class="location">
          <h3 class="location-title">United States</h3>
          <a href="https://maps.app.goo.gl/Ji3hhKYaJejgewBH9" target="_blank">
            <div class="location-item">
              <img src="assets/icons/location.svg" alt="Address" class="location-icon" />
              <span class="location-text">21512 Lake Forest Dr, Lake Forest, California 92630, United States</span>
            </div>
          </a>
        </div>
        <div class="location">
          <h3 class="location-title">United Kingdom</h3>
          <a href="https://maps.app.goo.gl/eyDAuENYx4rPxYdSA" target="_blank">
            <div class="location-item">
              <img src="assets/icons/location.svg" alt="Address" class="location-icon" />
              <span class="location-text">6 Sutton Rd, Harrow HA2 6ET, London, United Kingdom</span>
            </div>
          </a>
          <div class="location-item">
            <img src="assets/icons/phone.svg" alt="Phone" class="location-icon" />
            <span class="location-text"><a href="tel:+447810427007">+44 7810 427007</a></span>
          </div>
        </div>
        <div class="location">
          <h3 class="location-title">Pune</h3>
          <a href="https://maps.app.goo.gl/Y1hyFwx4BWErnrKE7" target="_blank">
            <div class="location-item">
              <img src="assets/icons/location.svg" alt="Address" class="location-icon" />
              <span class="location-text">H 706, Sukhwani Skylines, Wakad, Pune, 411057</span>
            </div>
          </a>
          <div class="location-item">
            <img src="assets/icons/phone.svg" alt="Phone" class="location-icon" />
            <span class="location-text"><a href="tel:+918799153098">+91 8799153098</a></span>
          </div>
        </div>
        <div class="location">
          <h3 class="location-title">Canada</h3>
          <a href="https://maps.app.goo.gl/7zETRNbGcRoVrJpW6" target="_blank">
            <div class="location-item">
              <img src="assets/icons/location.svg" alt="Address" class="location-icon" />
              <span class="location-text">140 Cherryhill Pl, 809, London, Ontario N6H 4M5, Canada</span>
            </div>
          </a>
          <div class="location-item">
            <img src="assets/icons/phone.svg" alt="Phone" class="location-icon" />
            <span class="location-text"><a href="tel:+15483883470">+1 5483883470</a>, <a
                href="tel:+15485670037">+1 5485670037</a></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<footer class="footer">
  <a href="https://imacengineering.com/"><img src="assets/image/logo.svg" alt="iMAC Logo" class="footer-logo" /></a>
  <div class="footer-content">
    <a href="https://imacengineering.com/privacy-policy" class="footer-link">Privacy Policy</a>
    <span class="footer-text">© 2025 iMAC Design & Engineering Services. All Rights Reserved</span>
  </div>
</footer>

<div class="sticky-buttons">
  <a href="#" class="button openModalBtn" data-redirect="thank-you">SEND INQUIRY</a>
  <a href="https://wa.me/+916357173693" class="button">WHATSAPP</a>
  <a href="tel:+916357173693" class="button">CALL</a>
</div>
</div>

<?php include("popup.php"); ?>
<?php include("popup-brochure.php"); ?>
<?php include("calendly-popup.php"); ?>

<!-- Local scripts — all deferred to avoid blocking -->
<script src="js/script.js?v=<?= ASSET_VERSION ?>" defer></script>

<!-- REMOVE this duplicate; popup.js already included (defer) in header.php -->
<!-- <script src="js/popup.js?v=<?= ASSET_VERSION ?>" defer></script> -->

<script src="js/popup-brochure.js?v=<?= ASSET_VERSION ?>" defer></script>
<script src="js/case-study.min.js?v=<?= ASSET_VERSION ?>" defer></script>
<script src="js/testimonial-slider.js?v=<?= ASSET_VERSION ?>" defer></script>
<script src="js/tabs.js?v=<?= ASSET_VERSION ?>" defer></script>
<script src="js/navigation.js?v=<?= ASSET_VERSION ?>" defer></script>
<script src="js/slider.js?v=<?= ASSET_VERSION ?>" defer></script>
<script src="js/slider-testimonial.js?v=<?= ASSET_VERSION ?>" defer></script>
<script src="js/logo-slider.js?v=<?= ASSET_VERSION ?>" defer></script>

<!-- <script src="js/portfolio-n.js?v=<?= ASSET_VERSION ?>" defer></script> -->

<!-- Inline logic wrapped to run after DOM is parsed -->
<script>
  window.addEventListener('DOMContentLoaded', function () {
    // Open the modal when any button with the class 'open-appointment-modal' is clicked
    document.querySelectorAll('.open-appointment-modal').forEach(function (button) {
      button.addEventListener('click', function () {
        var modal = document.querySelector('.modal-overlay-wrapper');
        if (modal) {
          modal.classList.add('active');
          document.body.classList.add('modal-open');
        }
      });
    });

    // Close the modal when the close button is clicked
    document.querySelectorAll('.close-appointment-modal').forEach(function (button) {
      button.addEventListener('click', function () {
        var modal = button.closest('.modal-overlay-wrapper');
        if (modal) {
          modal.classList.remove('active');
          document.body.classList.remove('modal-open');
        }
      });
    });

    // Close the modal if clicking outside the modal content
    document.querySelectorAll('.modal-overlay-wrapper').forEach(function (modalOverlay) {
      modalOverlay.addEventListener('click', function (event) {
        if (event.target === modalOverlay) {
          modalOverlay.classList.remove('active');
          document.body.classList.remove('modal-open');
        }
      });
    });
  });
</script>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    const lazyBackgrounds = document.querySelectorAll(".lazy-bg");
    if ("IntersectionObserver" in window) {
      const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            const bg = entry.target;
            bg.style.backgroundImage = `url(${bg.dataset.bg})`;
            observer.unobserve(bg);
          }
        });
      });
      lazyBackgrounds.forEach(bg => observer.observe(bg));
    } else {
      // Fallback for older browsers
      lazyBackgrounds.forEach(bg => {
        bg.style.backgroundImage = `url(${bg.dataset.bg})`;
      });
    }
  });

</script>
<script>
  (function () {
    // Fix logo link
    var logoLink = document.querySelector('.logo-icons a[href="/"], .logo-icons a[href="https://imacengineering.com/"]');
    if (logoLink) {
      if (!logoLink.getAttribute('aria-label')) logoLink.setAttribute('aria-label', 'iMAC Engineering — home');
      var img = logoLink.querySelector('img');
      if (img && !img.alt) img.alt = 'iMAC Engineering';
    }

    // Fix empty service links
    document.querySelectorAll('.services-slider .service-slide .service-content > a[href]')
      .forEach(function (a) {
        var hasText = a.textContent.trim().length > 0;
        if (!hasText && !a.getAttribute('aria-label') && !a.getAttribute('aria-labelledby')) {
          var title = a.parentElement.querySelector('h3, .service-title, .dm-card-heading');
          if (title && title.id === '') title.id = 'svc-' + Math.random().toString(36).slice(2);
          if (title) {
            a.setAttribute('aria-labelledby', title.id);
          } else {
            a.setAttribute('aria-label', 'Learn more');
          }
        }
      });
  })();
</script>

<!-- Google Tag Manager (noscript) — keep at very end to avoid early work -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PPC4QD4B" height="0" width="0"
    style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<script src="js/lenis.min.js"></script>
<script src="js/smooth-scroll.js"></script>
</body>

</html>