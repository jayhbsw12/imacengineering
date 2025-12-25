<style>
    /* Reset and base styles */
    body {
        font-family: 'Poppins', sans-serif;
        line-height: 1.6;
        color: #1a1a1a
    }

    .service-description ul {
        margin-left: 37px;
        margin: 25px
    }

    h5.add-text {
        font-size: 18px;
        margin-bottom: 15px
    }

    /* Main content styles */
    .content-wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        padding: 2rem;
        text-align: center
    }

    .content-wrapper h1 {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        color: #0F3460
    }

    .content-wrapper p {
        font-size: 1.2rem;
        color: #666;
        margin-bottom: 2rem
    }

    .contact-section-calendly h5 {
        color: #ff4612
    }

    /* Modal styles */
    .modal-overlay-wrapper {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, .6);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1000;
        opacity: 0;
        visibility: hidden;
        transition: all .3s ease;
        padding: 1rem
    }

    .modal-overlay-wrapper.active {
        opacity: 1;
        visibility: visible
    }

    .contact-section-calendly {
        padding: 0;
        background: #fff
    }

    .modal-box {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, .15);
        max-width: 1200px;
        width: 100%;
        max-height: 70vh;
        overflow-y: auto;
        position: relative;
        transform: scale(.9);
        transition: all .3s ease
    }

    .modal-overlay-wrapper.active .modal-box {
        transform: scale(1)
    }

    .close-modal-btn {
        position: absolute;
        top: 1rem;
        right: 1rem;
        background: none;
        border: none;
        font-size: 1.5rem;
        color: #999;
        cursor: pointer;
        z-index: 1001;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all .3s ease
    }

    .close-modal-btn:hover {
        background: #f8f9fa;
        color: #1a1a1a
    }

    /* Modal content layout */
    .modal-content-wrapper {
        display: grid;
        grid-template-columns: 1fr 1fr;
        min-height: 600px
    }

    /* Service info section */
    .service-details {
        padding: 2rem;
        border-right: 1px solid #e1e5e9;
        display: flex;
        flex-direction: column;
        gap: 1.5rem
    }

    .service-header {
        display: flex;
        flex-direction: column;
        gap: .5rem
    }

    .provider-info {
        display: flex;
        align-items: center;
        gap: .5rem;
        font-size: .9rem;
        color: #666
    }

    .provider-name {
        font-weight: 600
    }

    .verification-badge {
        color: #006BFF
    }

    .service-name {
        font-size: 1.5rem;
        font-weight: 600;
        color: #1a1a1a;
        margin: .5rem 0
    }

    .service-duration-info {
        display: flex;
        align-items: center;
        gap: .5rem;
        color: #666;
        font-size: .9rem
    }

    .service-description h3 {
        font-size: 1.8rem;
        color: #f15a24;
        margin-bottom: .5rem
    }

    .service-description p {
        color: #000;
        line-height: 1.5;
        font-size: 16px
    }

    .location-info h4 {
        font-size: 1.2rem;
        color: #f15a24;
        margin-bottom: 1rem
    }

    .address-item {
        display: flex;
        align-items: flex-start;
        gap: .5rem;
        margin-bottom: .75rem;
        color: #000;
        font-size: 16px
    }

    .address-item i {
        color: #f15a24;
        margin-top: .2rem;
        flex-shrink: 0
    }

    .social-links {
        display: flex;
        gap: 1rem;
        margin-bottom: 1.5rem
    }

    .service-description li {
        font-size: 16px
    }

    .social-links a {
        color: #000
    }

    .social-link-facebook:hover {
        color: #f15a24
    }

    .social-link-instagram:hover {
        color: #f15a24
    }

    .contact-section-calendly a {
        color: #000;
        font-size: 16px
    }

    .contact-info {
        display: block;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
        margin-top: 30px
    }

    .contact-section-calendly {
        margin-bottom: 20px
    }

    /* Right section - Content area */
    .calendar-wrapper {
        padding: 2rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        justify-content: flex-start;
    }

    .calendar-wrapper h3 {
        font-size: 1.5rem;
        color: #1a1a1a;
        margin-bottom: 1rem
    }

    .calendar-wrapper p {
        color: #666;
        margin-bottom: 1.5rem
    }

    /* Responsive design */
    @media (max-width:768px) {
        .contact-details {
            display: none
        }

        .modal-overlay-wrapper {
            height: auto
        }

        .modal-box {
            margin: 1rem;
            max-height: calc(100vh - 2rem)
        }

        .modal-content-wrapper {
            grid-template-columns: 1fr
        }

        .service-details {
            border-right: none;
            border-bottom: 1px solid #e1e5e9;
            padding: 1.5rem
        }

        .calendar-wrapper {
            padding: 1.5rem
        }

        .contact-info {
            grid-template-columns: 1fr
        }

        .social-links {
            flex-direction: column;
            gap: .5rem
        }

        .content-wrapper h1 {
            font-size: 2rem
        }

        .content-wrapper p {
            font-size: 1rem
        }
    }

    @media (max-width:480px) {
        .modal-overlay-wrapper {
            padding: .5rem;
            width: fit-content !important
        }

        .service-details,
        .calendar-wrapper {
            padding: 1rem
        }

        .service-name {
            font-size: 1.3rem
        }

        .service-description h3 {
            font-size: 1.5rem
        }
    }
</style>

<!-- Modal Overlay -->
<div class="modal-overlay-wrapper modal-popup" id="imacCalendlyModal">
    <div class="modal-box">
        <!-- Close Button -->
        <button class="close-modal-btn close-appointment-modal" aria-label="Close appointment modal">
            <i class="fas fa-times" aria-hidden="true"></i>
        </button>

        <!-- Modal Content -->
        <div class="modal-content-wrapper">
            <!-- Left Section - Service Info -->
            <div class="service-details">
                <div class="service-description">
                    <h3>Let's Talk.</h3>
                    <p>Hey, Feel free to contact us. We can discuss:</p>
                    <ul>
                        <li><i class="fa fa-check bn-icon" aria-hidden="true"></i>Collaboration</li>
                        <li><i class="fa fa-check bn-icon" aria-hidden="true"></i>Your requirements</li>
                        <li><i class="fa fa-check bn-icon" aria-hidden="true"></i>Our Process</li>
                        <li><i class="fa fa-check bn-icon" aria-hidden="true"></i>Our Team</li>
                        <li><i class="fa fa-check bn-icon" aria-hidden="true"></i>Estimated Timelines</li>
                        <li><i class="fa fa-check bn-icon" aria-hidden="true"></i>Costings and more..</li>
                    </ul>
                    <p>Just pick a date & time of your convenience and book a meeting with us.</p>
                </div>

                <div class="contact-details">
                    <div class="location-info">
                        <h4>We Serve Globally</h4>
                        <h5 class="add-text">Ahmedabad</h5>
                        <div class="address-item"><i class="fas fa-map-marker-alt"></i><span>203, Harsh Avenue,
                                Navrangpura, Ahmedabad, Gujarat 380009</span></div>
                        <h5 class="add-text">United States</h5>
                        <div class="address-item"><i class="fas fa-map-marker-alt"></i><span>21512 Lake Forest Dr, Lake
                                Forest, California 92630, United States</span></div>
                        <h5 class="add-text">United Kingdom</h5>
                        <div class="address-item"><i class="fas fa-map-marker-alt"></i><span>6 Sutton Rd, Harrow HA2
                                6ET, London, United Kingdom</span></div>
                        <h5 class="add-text">Canada</h5>
                        <div class="address-item"><i class="fas fa-map-marker-alt"></i><span>140 Cherryhill Pl, 809,
                                London, Ontario N6H 4M5, Canada</span></div>
                    </div>

                    <div class="contact-info">
                        <div class="social-links">
                            <div><a href="https://www.linkedin.com/company/imac-design-engineering-services/"
                                    target="_blank" class="social-link-linkedin" aria-label="LinkedIn"
                                    rel="noopener noreferrer"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a>
                            </div>
                            <div><a href="https://www.facebook.com/iMACDesigns/" target="_blank"
                                    class="social-link-facebook"><i class="fab fa-facebook-f"></i></a></div>
                            <div><a href="https://www.instagram.com/imac_designs/" target="_blank"
                                    class="social-link-instagram"><i class="fab fa-instagram"></i></a></div>
                        </div>
                        <div class="contact-detail">
                            <div class="contact-section-calendly">
                                <h5>Email Us</h5>
                                <a href="mailto:business@imacengineering.com">business@imacengineering.com</a>
                            </div>
                            <div class="contact-section-calendly">
                                <h5>Contact Us</h5>
                                <a href="tel:+916357173693">+91 6357173693</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Section - Calendar -->
            <div class="calendar-wrapper">
                <!-- Calendly inline widget container (no script loaded yet) -->
                <div id="calendlyContainer" style="min-width:550px;height:700px;"></div>
            </div>
        </div>
    </div>
</div>

<script>
    /**
     * Lazy-load Calendly only when the modal opens.
     * - No impact on LCP (no external scripts at initial render).
     * - Works whether you toggle .active class or click a trigger button.
     */

    (function () {
        const MODAL_SELECTOR = '#imacCalendlyModal';
        const CONTAINER_ID = 'calendlyContainer';
        const CALENDLY_URL = 'https://calendly.com/business-imacengineering/30min?primary_color=ff4612';

        let calendlyLoaded = false;
        let calendlyRendered = false;

        function loadCalendlyScript() {
            if (window.Calendly) return Promise.resolve();
            return new Promise(function (resolve, reject) {
                const s = document.createElement('script');
                s.src = 'https://assets.calendly.com/assets/external/widget.js';
                s.async = true;
                s.onload = resolve;
                s.onerror = reject;
                document.head.appendChild(s);
            });
        }

        async function renderCalendlyInline() {
            if (calendlyRendered) return;
            await loadCalendlyScript();
            calendlyLoaded = true;

            const target = document.getElementById(CONTAINER_ID);
            if (!target) return;

            // Explicit initialisation avoids waiting for auto-scan
            window.Calendly.initInlineWidget({
                url: CALENDLY_URL,
                parentElement: target,
                // prefill: {}, // optional
                // utm: {}      // optional
            });

            calendlyRendered = true;
        }

        // 1) Observe the modal for .active being added
        const modalEl = document.querySelector(MODAL_SELECTOR);
        if (modalEl) {
            const observer = new MutationObserver((mutList) => {
                for (const m of mutList) {
                    if (m.type === 'attributes' && m.attributeName === 'class') {
                        if (modalEl.classList.contains('active')) {
                            renderCalendlyInline();
                        }
                    }
                }
            });
            observer.observe(modalEl, { attributes: true });
        }

        // 2) Also hook common open buttons (if you have them)
        //    Add class "openModalBtn" or data-open-calendly on your trigger(s)
        document.querySelectorAll('.openModalBtn,[data-open-calendly]').forEach(btn => {
            btn.addEventListener('click', () => {
                // If your click handler elsewhere adds .active, this ensures we kick off load immediately
                renderCalendlyInline();
            }, { passive: true });
        });

        // 3) Optional: if the modal is already open on load (edge cases)
        if (modalEl && modalEl.classList.contains('active')) {
            renderCalendlyInline();
        }
    })();
</script>