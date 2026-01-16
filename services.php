<?php include("header-top.php"); ?>
<!-- Anti-FOUC: minimal, structure-safe -->
<script>document.documentElement.classList.add('fp-preload');</script>
<style>
    /* Hide only until CSS/JS are ready, then reveal quickly */
    html.fp-preload body {
        opacity: 0;
    }

    html.fp-ready body {
        opacity: 1;
        transition: opacity .15s ease;
    }
</style>
<style>
    .sections-new-imac .imac-services-title {
        margin-bottom: 0px;
        text-align: left;
    }

    .sections-new-imac {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: auto;
        padding: 80px 80px 80px 80px;
        background: #ffffff;
    }

    .new-section-holder,
    .conclusion-service-holder {
        display: flex;
        flex-direction: column;
        gap: 20px;
        width: 100%;
        max-width: 1440px;
    }

    .new-section-cards-holder {
        width: 100%;
        height: auto;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        flex-direction: row;
        gap: 20px;
    }

    .new-section-card {
        width: 100%;
        height: auto;
        display: flex;
        flex-direction: column;
        padding: 40px;
        background: #e5e5e5;
        color: #ff4612;
        justify-content: space-between;
        gap: 20px;
    }

    .new-icon-wrapper-card {
        display: flex;
        justify-content: flex-end;
    }

    .new-section-card h3 {
        font-size: 24px;
        font-weight: 600;
    }

    .big-card-number {
        font-size: 28px;
        background: #fff;
        padding: 10px 15px;
        width: fit-content;
        font-weight: 500;
    }

    .card-upper-holder {
        width: 100%;
        height: auto;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .new-section-cards-holder {
        max-width: 1440px;
    }

    .service-page-section.cards-section {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 80px 0px;
        flex-direction: column;
    }

    p.new-section-description {
        color: black;
    }

    a.new-service-btn {
        padding: 10px;
        background: #ff4612;
        color: #fff;
    }

    .new-button-holder {
        height: auto;
        width: 100%;
        margin-top: 20px;
    }

    .new-section-ul li {
        list-style: disc;
        margin-left: 20px;
    }

    .conclusion-service-holder{
    margin-top: 80px;
    }
    .conclusion-service-holder h2{
        margin: 0;
    }
</style>
<noscript>
    <style>
        html.fp-preload body {
            opacity: 1
        }
    </style>
</noscript>

<meta name="robots" content="noindex,nofollow">
<title> Services - iMAC Engineering </title>
<meta name="description" content="">
<link rel="canonical" href="https://imacengineering.com/services" />
<meta property="og:type" content="website" />
<meta property="og:title" content="" />
<meta property="og:url" content="https://imacengineering.com/services" />
<meta property="og:description" content="" />
<meta property="og:image" content="" />
<meta property="og:image:type" content="image/webp" />
<meta property="og:image:alt" content="Services" />
<meta name="keywords" content="">
<!-- <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "url": "https://imacengineering.com/",
  "logo": "https://imacengineering.com/assets/image/logo.svg",
  "name": "iMAC Design & Engineering Services",
  "description": "iMAC Design & Engineering - Your One Stop Product Innovation, Design & Development Destination. Founded in 2020, iMac Design & Engineering began with a vision to empower businesses by transforming innovative ideas into tangible, high-quality products. With a strong focus on product design, engineering development, and sustainable solutions, the company quickly established itself as a leading Product Innovation, Design & Development Company. We are just not another design and engineering company, but as your one-stop partner for product design and development. We created a place where brilliant ideas don't just get sketched on paper, they get converted into reality.",
  "email": "business@imacengineering.com",
  "telephone": "+91-63571-73693",
  "sameAs": [
    "https://www.linkedin.com/company/imac-design-engineering-services/",
    "https://www.instagram.com/imac_designs/",
    "https://www.facebook.com/iMACDesigns/"
  ]
}
</script> -->
<!-- <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "iMAC Design & Engineering Services",
  "logo": "https://imacengineering.com/assets/image/logo.svg",
  "url": "https://imacengineering.com/",
  "telephone": "+91-63571-73693",
  "email": "business@imacengineering.com",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "203, Harsh Avenue, Navrangpura",
    "addressLocality": "Ahmedabad",
    "addressRegion": "Gujarat",
    "postalCode": "380009",
    "addressCountry": "IN"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": "23.04137294688895",
    "longitude": "72.56707116077179"
  },
  "openingHoursSpecification": [
    {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": [
        "Monday",
        "Tuesday",
        "Wednesday",
        "Thursday",
        "Friday",
        "Saturday"
      ],
      "opens": "09:00",
      "closes": "19:00"
    },
    {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": "Sunday",
      "opens": "Closed",
      "closes": "Closed"
    }
  ],
  "sameAs": [
    "https://www.linkedin.com/company/imac-design-engineering-services/",
    "https://www.instagram.com/imac_designs/",
    "https://www.facebook.com/iMACDesigns/"
  ],
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "4.6",
    "reviewCount": "44"
  }
}
</script> -->

<?php include("header.php"); ?>


<section class="service-page-section top-headingbar">
    <div class="service-page-container flex">
        <h2 class="service-page-main-heading">Our Services</h2>
    </div>
</section>

<section class="service-page-section cards-section">
    <div class="new-section-cards-holder">

        <div class="new-section-card">
            <div class="card-upper-holder">
                <span class="big-card-number">01.</span>
                <h3>Engineering Design & Manufacturing Services</h3>
                <p class="new-section-description">At iMAC Engineering Services, we provide integrated engineering
                    design and manufacturing solutions
                    that support products from early concept through production. Our services are structured to help
                    organizations reduce development risk, improve manufacturability, and achieve consistent execution
                    across design, documentation, and manufacturing stages.</p>

                <p class="new-section-description">
                    This page outlines our core engineering capabilities and how each service fits within the overall
                    product development and manufacturing lifecycle.
                </p>
            </div>

        </div>
        <div class="new-section-card">
            <div class="card-upper-holder">
                <span class="big-card-number">02.</span>
                <h3>Product Design & Development Services</h3>
                <p class="new-section-description">Our product design and development services focus on transforming
                    ideas into functional, manufacturable products. We support concept development, design refinement,
                    material selection, and design validation while ensuring alignment with downstream manufacturing
                    requirements.</p>

                <p class="new-section-description">
                    This stage establishes the foundation for performance, cost control, and scalability throughout the
                    product lifecycle.
                </p>

                <div class="new-button-holder">
                    <a href="https://imacengineering.com/product-design-and-development-services" target="_blank"
                        class="new-service-btn">
                        Read More
                    </a>
                </div>
            </div>

        </div>
        <div class="new-section-card">
            <div class="card-upper-holder">
                <span class="big-card-number">03.</span>
                <h3>Mechanical CAD Drafting Outsourcing Services</h3>
                <p class="new-section-description">Mechanical CAD drafting converts design intent into precise technical
                    documentation required for manufacturing, procurement, and quality control. Our drafting services
                    include detailed part drawings, assembly drawings, tolerance definition, and revision control
                    aligned with industry standards.</p>

                <p class="new-section-description">
                    These drawings enable accurate communication across engineering teams and manufacturing partners.
                </p>
                <div class="new-button-holder">
                    <a href="https://imacengineering.com/mechanical-cad-drafting-outsourcing-services" target="_blank"
                        class="new-service-btn">
                        Read More
                    </a>
                </div>
            </div>

        </div>
        <div class="new-section-card">
            <div class="card-upper-holder">
                <span class="big-card-number">04.</span>
                <h3>Plastic Injection Molding Services</h3>
                <p class="new-section-description">Our plastic injection molding services support high-volume production
                    of precision plastic components. We work closely with design and tooling requirements to ensure part
                    geometry, material selection, and mold design are optimized for repeatable production and consistent
                    quality.</p>

                <p class="new-section-description">
                    Injection molding solutions are developed to support scalable manufacturing and long-term production
                    stability.
                </p>

                <div class="new-button-holder">
                    <a href="https://imacengineering.com/plastic-injection-molding-services" target="_blank"
                        class="new-service-btn">
                        Read More
                    </a>
                </div>
            </div>

        </div>
        <div class="new-section-card">
            <div class="card-upper-holder">
                <span class="big-card-number">05.</span>
                <h3>Additive Manufacturing & Rapid Prototyping</h3>
                <p class="new-section-description">Additive manufacturing and rapid prototyping services enable fast
                    validation of design concepts, functional testing, and design iteration. These services help reduce
                    development timelines and support early-stage decision making before committing to production
                    tooling.</p>
            </div>

        </div>
        <div class="new-section-card">
            <div class="card-upper-holder">
                <span class="big-card-number">06.</span>
                <h3>Contract Manufacturing & Production Support</h3>
                <p class="new-section-description">We provide manufacturing support services that help bridge the gap
                    between engineering and production. Our capabilities include supplier coordination, production
                    planning, and documentation support to ensure consistent execution during manufacturing scale-up.
                </p>
            </div>

        </div>
        <div class="new-section-card">
            <div class="card-upper-holder">
                <span class="big-card-number">07.</span>
                <h3>Integrated Engineering Workflow</h3>
                <p class="new-section-description">Our services are designed to function as a connected workflow:</p>
                <ul class="new-section-ul">
                    <li>Product design establishes functionality and manufacturability</li>
                    <li>CAD drafting defines technical documentation and tolerances</li>
                    <li>Manufacturing services execute production with accuracy and consistency</li>
                </ul>
                <p class="new-section-description">This integrated approach helps reduce rework, shorten development
                    cycles, and improve production reliability.</p>
            </div>

        </div>
        <div class="new-section-card">
            <div class="card-upper-holder">
                <span class="big-card-number">08.</span>
                <h3>Industries We Support</h3>
                <p class="new-section-description">Our engineering and manufacturing services support a wide range of
                    industries, including:</p>
                <ul class="new-section-ul">
                    <li>Medical devices</li>
                    <li>Automotive components</li>
                    <li>Industrial equipment</li>
                    <li>Consumer products</li>
                    <li>Electronics and electromechanical systems</li>
                </ul>
                <p class="new-section-description">Each project is approached with attention to regulatory, performance,
                    and production requirements.</p>
            </div>

        </div>

    </div>

    <div class="conclusion-service-holder">
        <h2>Conclusion</h2>
        <p>iMAC Engineering Services delivers structured engineering and manufacturing solutions that support reliable
            product execution. By aligning design, documentation, and manufacturing processes, we help organizations
            achieve predictable outcomes and long-term production success.</p>
    </div>
</section>

<script>
    async submitForm() {
        const submitBtn = this.form.querySelector('.submit-btn');
        const originalText = submitBtn.textContent;

        // Show loading state
        submitBtn.disabled = true;
        submitBtn.textContent = 'Sending...';

        try {
            // Make the actual form submission request
            const response = await this.submitFormData();

            // Handle success or error based on response
            if (response === 'success') {
                this.showSuccessMessage();
            } else {
                this.showErrorMessage('Failed to send message. Please try again.');
            }

            // Reset form
            this.form.reset();
            this.clearAllErrors();
        } catch (error) {
            this.showErrorMessage('Failed to send message. Please try again.');
        } finally {
            // Reset button state
            submitBtn.disabled = false;
            submitBtn.textContent = originalText;
        }
    }

    submitFormData() {
        return new Promise((resolve, reject) => {
            const formData = new FormData(this.form);

            fetch('assets/home-contact.php', {
                method: 'POST',
                body: formData,
            })
                .then(response => response.text())
                .then(data => {
                    if (data.trim() === 'success') {
                        resolve('success');
                    } else {
                        reject('error');
                    }
                })
                .catch(err => reject(err));
        });
    }
</script>

<script>

    //Read More Read Less
    function toggleText() {
        var dots = document.getElementById("dots");
        var moreText = document.getElementById("more");
        var btnText = document.getElementById("readMoreBtn");

        if (dots.style.display === "none") {
            // Show the dots and hide the "Read Less" part
            dots.style.display = "inline";
            moreText.style.display = "none";
            btnText.innerHTML = "Read More"; // Change button text to "Read More"
        } else {
            // Hide the dots and show the "Read Less" part
            dots.style.display = "none";
            moreText.style.display = "inline";
            btnText.innerHTML = "Read Less"; // Change button text to "Read Less"
        }
    }

    function animateCounter(element, target, duration = 2000) {
        const start = 0;
        const increment = target / (duration / 16);
        let current = start;

        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
                element.classList.remove('counting');
            }

            element.textContent = Math.floor(current);
            element.classList.add('counting');
        }, 16);
    }

    function createObserver() {
        const options = {
            threshold: 0.5,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counters = entry.target.querySelectorAll('.arx_14');

                    counters.forEach(counter => {
                        const target = parseInt(counter.getAttribute('data-target'));
                        animateCounter(counter, target);
                    });

                    observer.unobserve(entry.target);
                }
            });
        }, options);

        return observer;
    }

    document.addEventListener('DOMContentLoaded', () => {
        const statsContainer = document.querySelector('.arx_15');
        const observer = createObserver();

        if (statsContainer) {
            observer.observe(statsContainer);
        }
    });

    // accordion js

    document.querySelectorAll('.accordion-ux-header').forEach(header => {
        header.addEventListener('click', () => {
            const item = header.parentElement;
            const allItems = document.querySelectorAll('.accordion-ux-item');

            allItems.forEach(i => {
                if (i !== item) {
                    i.classList.remove('active');
                    i.querySelector('.accordion-ux-symbol').textContent = '+';
                }
            });

            item.classList.toggle('active');
            const symbol = item.querySelector('.accordion-ux-symbol');
            symbol.textContent = item.classList.contains('active') ? '-' : '+';
        });
    });

</script>

<script>
    async submitForm() {
        const submitBtn = this.form.querySelector('.submit-btn');
        const originalText = submitBtn.textContent;

        // Show loading state
        submitBtn.disabled = true;
        submitBtn.textContent = 'Sending...';

        try {
            // Make the actual form submission request
            const response = await this.submitFormData();

            // Handle success or error based on response
            if (response === 'success') {
                this.showSuccessMessage();
            } else {
                this.showErrorMessage('Failed to send message. Please try again.');
            }

            // Reset form
            this.form.reset();
            this.clearAllErrors();
        } catch (error) {
            this.showErrorMessage('Failed to send message. Please try again.');
        } finally {
            // Reset button state
            submitBtn.disabled = false;
            submitBtn.textContent = originalText;
        }
    }

    submitFormData() {
        return new Promise((resolve, reject) => {
            const formData = new FormData(this.form);

            fetch('assets/home-contact.php', {
                method: 'POST',
                body: formData,
            })
                .then(response => response.text())
                .then(data => {
                    if (data.trim() === 'success') {
                        resolve('success');
                    } else {
                        reject('error');
                    }
                })
                .catch(err => reject(err));
        });
    }
</script>

<script>
    const blogApiBase = 'https://hbapi.hbsoftweb.com/api/frontend/blogs?token=bd01414decae90b5c477217977dde3b44a8f0d32dd142f52d60e7d83d450d11b';
    const blogTemplate = document.getElementById('carousel-blog-template');
    const blogSlider = document.getElementById('dmCarouselSliderBG');

    fetch(blogApiBase)
        .then(res => res.json())
        .then(json => {
            const blogs = json.data || [];

            if (!json.isSuccessfull || blogs.length === 0) return;

            blogs.forEach(blog => {
                const clone = blogTemplate.cloneNode(true);
                clone.removeAttribute('id');
                clone.style.display = 'block';

                clone.querySelector('img').src = blog.blogImage;
                clone.querySelector('img').alt = blog.blogTitle;
                clone.querySelector('.dm-card-heading').textContent = blog.blogTitle;
                clone.querySelector('.hero-author').textContent = blog.authorName;
                clone.querySelector('.dm-author-img-wrap img').src = blog.authorImage || 'https://imacengineering.com/assets/Author/Keshav-Bhavsar.webp';
                clone.querySelector('.dm-author-img-wrap img').alt = blog.authorName;
                clone.querySelector('.read-time').textContent = blog.readDuration || '5 Min Read';

                clone.addEventListener('click', () => {
                    window.location.href = `/blog/${blog.blogUrl}`;
                });

                blogSlider.appendChild(clone);
            });
        })
        .catch(err => console.error('Blog fetch error:', err));
</script>

<!-- contact section end -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const slider = document.querySelector('.services-slider');
        const prevBtn = document.querySelector('.services-nav img:first-child');
        const nextBtn = document.querySelector('.services-nav img:last-child');

        if (slider && prevBtn && nextBtn) {
            let scrollAmount = 0;
            const slideWidth = 490; // slide width + gap
            const slideInterval = 3000; // Set the autoplay interval (3000ms = 3 seconds)

            // Autoplay function
            function autoplay() {
                scrollAmount += slideWidth;
                if (scrollAmount > slider.scrollWidth - slider.clientWidth) {
                    scrollAmount = 0; // Reset to the beginning
                }
                slider.scrollTo({
                    left: scrollAmount,
                    behavior: 'smooth'
                });
            }

            // Start autoplay
            let autoplayInterval = setInterval(autoplay, slideInterval);

            // Next button click
            nextBtn.addEventListener('click', function () {
                clearInterval(autoplayInterval); // Stop autoplay when user interacts
                scrollAmount += slideWidth;
                if (scrollAmount > slider.scrollWidth - slider.clientWidth) {
                    scrollAmount = 0;
                }
                slider.scrollTo({
                    left: scrollAmount,
                    behavior: 'smooth'
                });
                autoplayInterval = setInterval(autoplay, slideInterval); // Restart autoplay
            });

            // Previous button click
            prevBtn.addEventListener('click', function () {
                clearInterval(autoplayInterval); // Stop autoplay when user interacts
                scrollAmount -= slideWidth;
                if (scrollAmount < 0) {
                    scrollAmount = slider.scrollWidth - slider.clientWidth;
                }
                slider.scrollTo({
                    left: scrollAmount,
                    behavior: 'smooth'
                });
                autoplayInterval = setInterval(autoplay, slideInterval); // Restart autoplay
            });
        } else {
            console.error('Slider or navigation buttons are missing in the DOM.');
        }
    });


    // Process accordion
    document.addEventListener("DOMContentLoaded", function () {
        const images = document.querySelectorAll('.accordion-image');
        const items = document.querySelectorAll('.accordion-item');
        const headers = document.querySelectorAll('.accordion-header');

        // Clear all active states
        function clearActiveStates() {
            images.forEach(img => img.classList.remove('active'));
            items.forEach(item => {
                item.classList.remove('active');
                const body = item.querySelector('.accordion-body');
                if (body) {
                    body.style.maxHeight = null;
                }
            });
        }

        // Activate tab based on data-tab name
        function activateTab(tabName) {
            clearActiveStates();

            const matchedImage = document.querySelector(`.accordion-image[data-tab="${tabName}"]`);
            const matchedItem = document.querySelector(`.accordion-item[data-tab="${tabName}"]`);

            if (matchedImage) matchedImage.classList.add('active');
            if (matchedItem) {
                matchedItem.classList.add('active');
                const body = matchedItem.querySelector('.accordion-body');
                if (body) {
                    body.style.maxHeight = body.scrollHeight + 'px';
                }
            }
        }

        // Click on image
        images.forEach(img => {
            img.addEventListener('click', function () {
                const tabName = this.getAttribute('data-tab');
                activateTab(tabName);
            });
        });

        // Click on accordion header
        headers.forEach(header => {
            header.addEventListener('click', function () {
                const parentItem = this.closest('.accordion-item');
                const tabName = parentItem.getAttribute('data-tab');
                activateTab(tabName);
            });
        });

        // Set default active if none is active
        const activeImage = document.querySelector('.accordion-image.active');
        const activeContent = document.querySelector('.accordion-item.active');

        if (!activeImage || !activeContent) {
            const defaultTab = images[0]?.getAttribute('data-tab');
            if (defaultTab) activateTab(defaultTab);
        } else {
            const body = activeContent.querySelector('.accordion-body');
            if (body) {
                body.style.maxHeight = body.scrollHeight + 'px';
            }
        }
    });


    window.addEventListener('scroll', function () {
        const header = document.getElementById('mainHeader');
        if (window.scrollY > 50) {
            header.classList.add('sticky');
        } else {
            header.classList.remove('sticky');
        }
    });
</script>

<!--Portfolio section js-->
<script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js'></script>
<script>
    $(document).ready(function () {
        var swiper = new Swiper(".swiper-container-h", {
            direction: "horizontal",
            effect: "slide",
            autoplay: {
                delay: 10000,
                disableOnInteraction: false
            },
            parallax: true,
            speed: 1600,
            loop: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            },
            pagination: {
                el: ".swiper-pagination",
                type: "progressbar"
            }
        });
    });
</script>

<!-- Reveal page as soon as everything is ready -->
<script>
    (function () {
        const reveal = () => {
            document.documentElement.classList.remove('fp-preload');
            document.documentElement.classList.add('fp-ready');
        };
        if (document.readyState === 'complete') { reveal(); }
        else { window.addEventListener('load', reveal, { once: true }); }
    })();
</script>

<script src="js/slider.js"></script>
<script src="js/slider-testimonial.js"></script>
<script src="js/logo-slider.js"></script>

<script src="js/portfolio-n.js"></script>
<?php include("footer.php"); ?>