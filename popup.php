<!-- Modal Overlay -->
<div id="modalOverlay" class="modal-overlay">
    <div class="modal-container">
        <!-- Close Button -->
        <button class="modal-close" id="closeModalBtn">
            <i class="fas fa-times"></i>
        </button>

        <!-- Modal Content -->
        <div class="modal-content">
            <!-- Left Section -->
            <div class="modal-left">
                <div class="services-list">
                    <div class="service-item">
                        <!--<i class="fa-light fa-right-from-line"></i>-->
                        <span>We design innovative products that align with your vision and market needs</span>
                    </div>
                    <div class="service-item">
                        <!--<i class="fas fa-users"></i>-->
                        <span>We develop your concepts using the latest technology and engineering expertise </span>
                    </div>
                    <div class="service-item">
                        <!--<i class="fas fa-brain"></i>-->
                        <span>We offer end-to-end manufacturing with quality control and delivery</span>
                    </div>
                </div>

                <!-- Illustration -->
                <div class="illustration">
                    <div class="phone-device">
                        <div class="phone-screen">
                            <i class="fas fa-phone"></i>
                            <div class="chat-dots">
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot"></span>
                            </div>
                        </div>
                    </div>
                    <div class="person-figure">
                        <div class="person-head"></div>
                        <div class="person-body"></div>
                        <div class="person-arm"></div>
                    </div>
                    <div class="gear-icon">
                        <i class="fas fa-cog"></i>
                    </div>
                    <div class="envelope-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>
            </div>

            <!-- Right Section -->
            <div class="modal-right">
                <div class="form-header">
                    <h2>Innovation Starts With a Conversation.</h2>
                    <p>Your project deserves a team that cares as much as you do. Let's connect!</p>
                </div>

                <form id="contactForm-popup" method="post" action="popup-mail.php">
                    <label for="fullName">Full Name</label>
                    <input type="text" id="fullName" name="fullName" required>
                    <div class="error-message"></div>

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                    <div class="error-message"></div>

                    <label for="contactNumber">Contact Number</label>
                    <input type="tel" id="contactNumber" name="contactNumber" />
                    <div class="error-message"></div>

                    <!-- Message field restored -->
                    <label for="message">Message</label>
                    <textarea id="message" name="message" maxlength="200" placeholder=""></textarea>
                    <div class="error-message"></div>

                    <button type="submit" class="submit-btn-popup">Submit</button>
                </form>

                <!-- Success Message -->
                <div id="successMessage" class="success-message" style="display: none;">
                    <i class="fas fa-check-circle"></i>
                    <p>Thank you! Your inquiry has been submitted successfully. We'll get back to you soon.</p>
                </div>
            </div>
        </div>
    </div>
</div>
