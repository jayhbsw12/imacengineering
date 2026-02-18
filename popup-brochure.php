<!-- Modal Overlay (Brochure) -->
<div id="modalOverlayBrochure" class="modal-overlay">
  <div class="modal-container">
    <!-- Close Button -->
    <button class="modal-close" id="closeModalBtnBrochure">
      <i class="fas fa-times"></i>
    </button>

    <!-- Modal Content -->
    <div class="modal-content">
      <!-- Left Section (same visuals) -->
      <div class="modal-left">
        <div class="services-list">
          <div class="service-item">
            <span>We design innovative products that align with your vision and market needs</span>
          </div>
          <div class="service-item">
            <span>We develop your concepts using the latest technology and engineering expertise </span>
          </div>
          <div class="service-item">
            <span>We offer end-to-end manufacturing with quality control and delivery</span>
          </div>
        </div>
        <div class="illustration">
          <div class="phone-device">
            <div class="phone-screen">
              <i class="fas fa-phone"></i>
              <div class="chat-dots"><span class="dot"></span><span class="dot"></span><span class="dot"></span></div>
            </div>
          </div>
          <div class="person-figure"><div class="person-head"></div><div class="person-body"></div><div class="person-arm"></div></div>
          <div class="gear-icon"><i class="fas fa-cog"></i></div>
          <div class="envelope-icon"><i class="fas fa-envelope"></i></div>
        </div>
      </div>

      <!-- Right Section -->
      <div class="modal-right">
        <div class="form-header">
          <h2>Get the iMAC Pitch Deck</h2>
          <p>Share your details to receive the brochure.</p>
        </div>

        <!-- Same fields, NO message -->
        <form id="contactForm-brochure" method="post" action="popup-mail-brochure.php">
          <label for="fullNameBrochure">Full Name</label>
          <input type="text" id="fullNameBrochure" name="fullName" required>
          <div class="error-message"></div>

          <label for="emailBrochure">Email</label>
          <input type="email" id="emailBrochure" name="email" required>
          <div class="error-message"></div>

          <label for="contactNumberBrochure">Contact Number</label>
          <input type="tel" id="contactNumberBrochure" name="contactNumber">
          <div class="error-message"></div>

          <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response-brochure">
          <input type="hidden" name="g-recaptcha-action" id="g-recaptcha-action-brochure" value="popup_brochure">
          <button type="submit" class="submit-btn-popup">Submit</button>
        </form>

        <!-- Success Message -->
        <div id="successMessageBrochure" class="success-message" style="display:none;">
          <i class="fas fa-check-circle"></i>
          <p>Thanks! Your brochure is ready—redirecting…</p>
        </div>
      </div>
    </div>
  </div>
</div>

        <!-- reCAPTCHA v3: execute and attach token before submit (brochure popup) -->
        <script src="https://www.google.com/recaptcha/api.js?render=6LeGsTUsAAAAAPdyUaFFed_s8EMdwYGjzNFn5zVA"></script>
        <script>
          (function(){
            var form = document.getElementById('contactForm-brochure');
            if (!form) return;
            form.addEventListener('submit', function(e){
              e.preventDefault();
              grecaptcha.ready(function(){
                grecaptcha.execute('6LeGsTUsAAAAAPdyUaFFed_s8EMdwYGjzNFn5zVA', {action: 'popup_brochure'})
                .then(function(token){
                  document.getElementById('g-recaptcha-response-brochure').value = token;
                  document.getElementById('g-recaptcha-action-brochure').value = 'popup_brochure';
                  form.submit();
                });
              });
            });
          })();
        </script>
