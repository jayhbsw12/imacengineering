
(function() {
  class InfiniteSlider {
    constructor() {
      this.currentSlide = 0;
      this.slides = document.querySelectorAll(".slide");
      this.navDots = document.querySelectorAll(".nav-dot");
      this.totalSlides = this.slides.length;
      this.autoPlayInterval = 5000;
      this.isTransitioning = false;
      this.titleToIndexMap = {};

      // cache + helpers
      this.sliderWrapper = document.querySelector(".slider-wrapper");
      this.slideWidth = 0;
      this.rafId = null;

      this.buildTitleToIndexMap();
      this.measure(); // measure once at load
      this.init();
      this.bindResize(); // keep measurements fresh
    }

    buildTitleToIndexMap() {
      this.slides.forEach((slide, index) => {
        const title = slide.querySelector("h1.slide-title")?.textContent?.trim();
        if (title) this.titleToIndexMap[title] = index;
      });
    }

    // ✅ Measure slides only once (or when resized)
    measure() {
      if (!this.slides.length) return;
      const rect = this.slides[0].getBoundingClientRect(); // single layout read
      this.slideWidth = rect.width || 0;
    }

    // ✅ Handle resize with debounce or ResizeObserver
    bindResize() {
      let t;
      const remeasure = () => {
        clearTimeout(t);
        t = setTimeout(() => {
          this.measure();
          this.updateSliderPosition(); // write only
        }, 120);
      };
      window.addEventListener("resize", remeasure);


        this.sliderWrapper = document.querySelector(".slider-wrapper");
        this.slideWidth = 0;
        this.rafId = null;

        this.buildTitleToIndexMap();
        this.measure(); // measure once at load
        this.init();
        this.bindResize(); // keep measurements fresh
      }

      buildTitleToIndexMap() {
        this.slides.forEach((slide, index) => {
          const title = slide.querySelector("h1.slide-title")?.textContent?.trim();
          if (title) this.titleToIndexMap[title] = index;
        });
      }

      // ✅ Measure slides only once (or when resized)
      measure() {
        if (!this.slides.length) return;
        const rect = this.slides[0].getBoundingClientRect(); // single layout read
        this.slideWidth = rect.width || 0;
      }

      // ✅ Handle resize with debounce or ResizeObserver
      bindResize() {
        let t;
        const remeasure = () => {
          clearTimeout(t);
          t = setTimeout(() => {
            this.measure();
            this.updateSliderPosition(); // write only
          }, 120);
        };
        window.addEventListener("resize", remeasure);

        if ("ResizeObserver" in window && this.sliderWrapper) {
          const ro = new ResizeObserver(() => remeasure());
          ro.observe(this.sliderWrapper);
        }
      }

      init() {
        this.setupEventListeners();
        this.startAutoPlay();
        this.updateNavDots(this.currentSlide);
        this.activateSlide(this.currentSlide);
        this.bindFeatureCardClicks();
      }

      setupEventListeners() {
        this.navDots.forEach((dot, index) => {
          dot.addEventListener("click", () => {
            if (!this.isTransitioning) this.goToSlide(index);
          });
        });

        const sliderContainer = document.querySelector(".slider-container");
        if (sliderContainer) {
          sliderContainer.addEventListener("mouseenter", () =>
            this.pauseAutoPlay()
          );
          sliderContainer.addEventListener("mouseleave", () =>
            this.startAutoPlay()
          );
        }

        document.addEventListener("keydown", (e) => {
          if (!this.isTransitioning) {
            if (e.key === "ArrowLeft") this.previousSlide();
            else if (e.key === "ArrowRight") this.nextSlide();
          }
        });
      }

      activateSlide(index) {
        this.slides.forEach((slide, i) => {
          slide.classList.toggle("active", i === index);
        });
        this.updateSliderPosition();
      }

      // ✅ No layout reads here; only GPU writes via rAF
      updateSliderPosition() {
        if (!this.sliderWrapper) return;
        const x = -(this.currentSlide * this.slideWidth);

        if (this.rafId) cancelAnimationFrame(this.rafId);
        this.rafId = requestAnimationFrame(() => {
          this.sliderWrapper.style.transform = `translate3d(${x}px, 0, 0)`;
          this.rafId = null;
        });
      }

      goToSlide(targetIndex) {
        if (targetIndex === this.currentSlide || this.isTransitioning) return;
        this.isTransitioning = true;

        const nextSlide = this.slides[targetIndex];
        if (nextSlide) nextSlide.style.display = "block";

        setTimeout(() => {
          this.currentSlide = targetIndex;
          this.updateNavDots(targetIndex);
          this.activateSlide(targetIndex);
          this.isTransitioning = false;
        }, 800);
      }

      nextSlide() {
        // ...existing code...
      }
      // ...existing code...
    }

    // ✅ Initialise and handle tab visibility (single instance)
    document.addEventListener("DOMContentLoaded", () => {
      window.sliderInstance = new InfiniteSlider();
    });

    document.addEventListener("visibilitychange", () => {
      const slider = window.sliderInstance;
      if (slider) {
        document.hidden ? slider.pauseAutoPlay() : slider.startAutoPlay();
      }
    });
  })();



//accordion js

document.addEventListener("DOMContentLoaded", function () {
  const accordionItems = document.querySelectorAll(".accordion-item");
  const accordionImages = document.querySelectorAll(".accordion-image");

  // Initialize first item as active
  if (accordionItems[0]) accordionItems[0].classList.add("active");
  if (accordionImages[0]) accordionImages[0].classList.add("active");

  accordionItems.forEach((item) => {
    const header = item.querySelector(".accordion-header");

    header.addEventListener("click", function () {
      const tabName = item.getAttribute("data-tab");

      // Close all accordion items
      accordionItems.forEach((accordionItem) => {
        accordionItem.classList.remove("active");
      });

      // Hide all images
      accordionImages.forEach((image) => {
        image.classList.remove("active");
      });

      // Open clicked item
      item.classList.add("active");

      // Show corresponding image
      const targetImage = document.querySelector(
        `.accordion-image[data-tab="${tabName}"]`
      );
      if (targetImage) {
        targetImage.classList.add("active");
      }
    });
  });
});

// tabs js

window.TabManager = window.TabManager || class TabManager {
  constructor() {
    this.init();
  }

  init() {
    this.bindEvents();
    this.setActiveTab("blogs"); // Set default active tab
  }

  bindEvents() {
    const tabButtons = document.querySelectorAll(".nav-tab");

    tabButtons.forEach((button) => {
      button.addEventListener("click", (e) => {
        const tabName = e.target.getAttribute("data-tab");
        this.setActiveTab(tabName);
      });
    });
  }

  setActiveTab(tabName) {
    // Remove active class from all tabs and content
    document.querySelectorAll(".nav-tab").forEach((tab) => {
      tab.classList.remove("active");
    });

    document.querySelectorAll(".tab-content").forEach((content) => {
      content.classList.remove("active");
    });

    // Add active class to selected tab and content
    const activeTab = document.querySelector(`[data-tab="${tabName}"]`);
    const activeContent = document.getElementById(tabName);

    if (activeTab && activeContent) {
      activeTab.classList.add("active");
      activeContent.classList.add("active");
    }

    // Update indicator position
    this.updateIndicator(tabName);

    // Animate cards
    this.animateCards(activeContent);
  }

  updateIndicator(tabName) {
    const indicator = document.querySelector(".indicator-short");

    if (indicator) {
      if (tabName === "case-studies") {
        indicator.classList.add("case-studies");
      } else {
        indicator.classList.remove("case-studies");
      }
    }
  }

  animateCards(container) {
    if (!container) return;

    const cards = container.querySelectorAll(".insight-card");

    // Reset animation
    cards.forEach((card) => {
      card.style.opacity = "0";
      card.style.transform = "translateY(30px)";
    });

    // Animate cards with stagger
    cards.forEach((card, index) => {
      setTimeout(() => {
        card.style.transition = "opacity 0.6s ease, transform 0.6s ease";
        card.style.opacity = "1";
        card.style.transform = "translateY(0)";
      }, index * 100);
    });
  }
};

// Slider functionality for mobile
class SliderManager {
  constructor() {
    this.currentSlide = 0;
    this.init();
  }

  init() {
    if (window.innerWidth <= 768) {
      this.setupMobileSlider();
    }

    window.addEventListener("resize", () => {
      if (window.innerWidth <= 768) {
        this.setupMobileSlider();
      } else {
        this.removeMobileSlider();
      }
    });
  }
  // ...existing code for SliderManager...
}

// form js

var contactForm = document.getElementById("contactForm");
if (contactForm) {
  contactForm.addEventListener("submit", function (e) {
    e.preventDefault();
    var form = e.target;
    var valid = true;

    form.querySelectorAll(".error").forEach(function(el) { el.textContent = ""; });

    Array.prototype.forEach.call(form.elements, function(el) {
      if (["INPUT", "TEXTAREA", "SELECT"].indexOf(el.tagName) !== -1) {
        var errorSpan = el.parentElement.querySelector(".error");
        if (el.hasAttribute("required") && !el.value.trim()) {
          if (errorSpan) errorSpan.textContent = "This field is required";
          el.style.borderColor = "red";
          valid = false;
        } else {
          if (errorSpan) errorSpan.textContent = "";
          el.style.borderColor = "#ccc";
        }
      }
    });

    if (valid) {
      var formData = new FormData(form);

      fetch("assets/home-contact.php", {
        method: "POST",
        body: formData,
      })
        .then(function(res) { return res.text(); })
        .then(function(response) {
          var messageBox = document.getElementById("form-success-message");
          if (response.trim() === "success") {
            if (messageBox) {
              messageBox.innerHTML = '<div class="form-message success">✅ Your message has been sent successfully!</div>';
            }
            form.reset();

            setTimeout(function() {
              if (messageBox) messageBox.innerHTML = "";
            }, 5000);
          } else {
            if (messageBox) {
              messageBox.innerHTML = '<div class="form-message error">❌ Something went wrong. Please try again.</div>';
            }
          }
        })
        .catch(function() {
          var box = document.getElementById("form-success-message");
          if (box)
            box.innerHTML = '<div class="form-message error">❌ Server error. Try again later.</div>';
        });
    }
  });
}
