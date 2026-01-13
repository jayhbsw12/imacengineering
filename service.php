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