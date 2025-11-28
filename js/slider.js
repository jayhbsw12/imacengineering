// insights js
(function () {
  "use strict";

  // Namespace to avoid conflicts
  window.DMInsightsCarousel = class {
    constructor() {
      this.dmCurrentTab = "blogs";
      this.dmCurrentIndex = 0;
      this.dmIsAutoPlaying = true;
      this.dmAutoPlayInterval = null;
      this.dmTouchStartX = 0;
      this.dmTouchEndX = 0;
      this.dmCardsPerView = this.dmGetCardsPerView();
      this.dmLastAppliedCardsPerView = this.dmCardsPerView; // track last applied widths

      this.dmInit();
    }

    dmInit() {
      this.dmSetupTabNavigation();
      this.dmSetupCarousels();
      this.dmSetupResponsiveness();
      this.dmUpdateCardWidths(); // apply widths once on init
      this.dmStartAutoPlay();
    }

    dmSetupTabNavigation() {
      const tabButtons = document.querySelectorAll(".dm-tab-nav-btn");
      const tabContents = document.querySelectorAll(".dm-tab-panel");

      tabButtons.forEach((button) => {
        button.addEventListener("click", (e) => {
          const tabId = e.target.getAttribute("data-dm-tab");

          // Remove active class from all tabs and buttons
          tabButtons.forEach((btn) => btn.classList.remove("dm-active"));
          tabContents.forEach((content) =>
            content.classList.remove("dm-active")
          );

          // Add active class to clicked button and corresponding content
          e.target.classList.add("dm-active");
          document.getElementById("dm-" + tabId).classList.add("dm-active");

          this.dmCurrentTab = tabId;
          this.dmCurrentIndex = 0;
          // widths unchanged on tab switch; only transform moves
          this.dmUpdateCarousel();
          this.dmRestartAutoPlay();
        });
      });
    }

    dmSetupCarousels() {
      // Setup Case Studies carousel
      this.dmSetupCarouselControls(
        "dmCarouselSliderCS",
        "dmPrevBtnCS",
        "dmNextBtnCS"
      );

      // Setup Blogs carousel
      this.dmSetupCarouselControls(
        "dmCarouselSliderBG",
        "dmPrevBtnBG",
        "dmNextBtnBG"
      );

      // Setup touch events
      this.dmSetupTouchEvents();

      // Setup hover events to pause auto-play
      this.dmSetupHoverEvents();
    }

    dmSetupCarouselControls(trackId, prevBtnId, nextBtnId) {
      const prevBtn = document.getElementById(prevBtnId);
      const nextBtn = document.getElementById(nextBtnId);

      if (prevBtn) {
        prevBtn.addEventListener("click", () => this.dmPreviousSlide());
      }

      if (nextBtn) {
        nextBtn.addEventListener("click", () => this.dmNextSlide());
      }
    }

    dmSetupTouchEvents() {
      const carousels = document.querySelectorAll(".dm-carousel-slider");

      carousels.forEach((carousel) => {
        carousel.addEventListener(
          "touchstart",
          (e) => {
            this.dmTouchStartX = e.touches[0].clientX;
          },
          { passive: true }
        );

        carousel.addEventListener(
          "touchmove",
          (e) => {
            this.dmTouchEndX = e.touches[0].clientX;
          },
          { passive: true }
        );

        carousel.addEventListener(
          "touchend",
          () => {
            this.dmHandleSwipe();
          },
          { passive: true }
        );
      });
    }

    dmSetupHoverEvents() {
      const carouselContainers = document.querySelectorAll(
        ".dm-carousel-wrapper"
      );

      carouselContainers.forEach((container) => {
        container.addEventListener("mouseenter", () => {
          this.dmPauseAutoPlay();
        });

        container.addEventListener("mouseleave", () => {
          this.dmResumeAutoPlay();
        });
      });
    }

    dmSetupResponsiveness() {
      let t;
      const onResize = () => {
        clearTimeout(t);
        t = setTimeout(() => {
          const newCount = this.dmGetCardsPerView();
          const changed = newCount !== this.dmLastAppliedCardsPerView;
          this.dmCardsPerView = newCount;
          this.dmCurrentIndex = Math.min(
            this.dmCurrentIndex,
            this.dmGetMaxIndex()
          );
          if (changed) {
            this.dmUpdateCardWidths(); // apply widths only when breakpoint changes
            this.dmLastAppliedCardsPerView = newCount;
          }
          this.dmUpdateCarousel();
        }, 120);
      };
      window.addEventListener("resize", onResize);
    }

    dmGetCardsPerView() {
      const width = window.innerWidth;
      if (width >= 1025) return 4;
      if (width >= 769) return 2;
      return 1;
    }

    dmGetCurrentTrack() {
      return this.dmCurrentTab === "case-studies"
        ? document.getElementById("dmCarouselSliderCS")
        : document.getElementById("dmCarouselSliderBG");
    }

    dmGetCards() {
      const track = this.dmGetCurrentTrack();
      return track ? track.querySelectorAll(".dm-insight-card") : [];
    }

    dmGetMaxIndex() {
      const cards = this.dmGetCards();
      return Math.max(0, cards.length - this.dmCardsPerView);
    }

    dmNextSlide() {
      const maxIndex = this.dmGetMaxIndex();
      this.dmCurrentIndex =
        this.dmCurrentIndex >= maxIndex ? 0 : this.dmCurrentIndex + 1;
      this.dmUpdateCarousel();
      this.dmRestartAutoPlay();
    }

    dmPreviousSlide() {
      const maxIndex = this.dmGetMaxIndex();
      this.dmCurrentIndex =
        this.dmCurrentIndex <= 0 ? maxIndex : this.dmCurrentIndex - 1;
      this.dmUpdateCarousel();
      this.dmRestartAutoPlay();
    }

    dmUpdateCarousel() {
      const track = this.dmGetCurrentTrack();
      if (!track) return;

      const translateX = -(this.dmCurrentIndex * (100 / this.dmCardsPerView));
      track.style.transform = `translateX(${translateX}%)`;
      // widths are handled on init/resize only to avoid reflow per slide
    }

    dmUpdateCardWidths() {
      const cards = this.dmGetCards();
      const widthPercentage = 100 / this.dmCardsPerView;
      cards.forEach((card) => {
        card.style.width = `calc(${widthPercentage}% - 0.75rem)`;
      });
    }

    dmHandleSwipe() {
      const swipeThreshold = 50;
      const swipeDistance = this.dmTouchStartX - this.dmTouchEndX;

      if (Math.abs(swipeDistance) > swipeThreshold) {
        if (swipeDistance > 0) {
          this.dmNextSlide();
        } else {
          this.dmPreviousSlide();
        }
      }
    }

    dmStartAutoPlay() {
      if (this.dmAutoPlayInterval) {
        clearInterval(this.dmAutoPlayInterval);
      }

      this.dmAutoPlayInterval = setInterval(() => {
        if (this.dmIsAutoPlaying) {
          this.dmNextSlide();
        }
      }, 4000);
    }

    dmPauseAutoPlay() {
      this.dmIsAutoPlaying = false;
      const containers = document.querySelectorAll(".dm-carousel-wrapper");
      containers.forEach((container) => {
        container.classList.add("dm-auto-playing");
      });
    }

    dmResumeAutoPlay() {
      this.dmIsAutoPlaying = true;
      const containers = document.querySelectorAll(".dm-carousel-wrapper");
      containers.forEach((container) => {
        container.classList.remove("dm-auto-playing");
      });
    }

    dmRestartAutoPlay() {
      this.dmIsAutoPlaying = true;
      this.dmStartAutoPlay();
    }
  };

  // Initialize the carousel when DOM is loaded
  document.addEventListener("DOMContentLoaded", () => {
    // Store instance globally with unique namespace to avoid conflicts
    window.dmInsightsCarouselInstance = new window.DMInsightsCarousel();

    // Initial setup
    window.dmInsightsCarouselInstance.dmUpdateCarousel();
  });

  // Handle window focus/blur for auto-play
  document.addEventListener("visibilitychange", () => {
    if (window.dmInsightsCarouselInstance) {
      if (document.hidden) {
        window.dmInsightsCarouselInstance.dmPauseAutoPlay();
      } else {
        window.dmInsightsCarouselInstance.dmResumeAutoPlay();
      }
    }
  });
})();

// header
document.addEventListener("DOMContentLoaded", function () {
  // Get the current page's URL
  const currentPage = window.location.pathname.split("/").pop(); // Get the current file name (e.g., home.php, about.php)

  // Get all navigation links
  const navLinks = document.querySelectorAll(".nav-link");

  // Loop through each nav link and add the "active" class if it matches the current page
  navLinks.forEach(function (link) {
    // If the link's href matches the current page
    if (link.getAttribute("href") === currentPage) {
      link.classList.add("active");
    }
  });
});

// ===== counters – rAF + textContent (no layout thrash) =====
(function() {
  const counters = document.querySelectorAll(".stat-number");
  counters.forEach((el) => {
    const target = Number(el.getAttribute("data-target") || "0");
    const suffix = el.getAttribute("data-suffix") || "";
    const duration = 2000; // ms
    const start = performance.now();
    let lastShown = -1;

    function tick(now) {
      const t = Math.min(1, (now - start) / duration);
      const value = Math.ceil(target * t);

      if (value !== lastShown) {
        el.textContent = value.toString(); // avoids layout compared to innerText
        lastShown = value;
      }

      if (t < 1) {
        requestAnimationFrame(tick);
      } else {
        let formatted = target;
        if (target >= 1000) formatted = target / 1000 + "K";
        el.textContent = formatted + "+" + suffix;
      }
    }
    requestAnimationFrame(tick);
  });
})();

// ===== slider js – Optimised for performance and no forced reflows =====

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
    const nextIndex = (this.currentSlide + 1) % this.totalSlides;
    this.goToSlide(nextIndex);
  }

  previousSlide() {
    const prevIndex =
      (this.currentSlide - 1 + this.totalSlides) % this.totalSlides;
    this.goToSlide(prevIndex);
  }

  updateNavDots(activeIndex) {
    this.navDots.forEach((dot, index) => {
      dot.classList.toggle("active", index === activeIndex);
    });
  }

  startAutoPlay() {
    this.pauseAutoPlay();
    this.autoPlayTimer = setInterval(
      () => this.nextSlide(),
      this.autoPlayInterval
    );
  }

  pauseAutoPlay() {
    clearInterval(this.autoPlayTimer);
  }

  bindFeatureCardClicks() {
    const cards = document.querySelectorAll(".feature-card");
    cards.forEach((card) => {
      const title = card.querySelector(".feature-title")?.textContent?.trim();
      const targetIndex = this.titleToIndexMap[title];
      if (targetIndex !== undefined) {
        card.style.cursor = "pointer";
        card.addEventListener("click", () => this.goToSlide(targetIndex));
      }
    });
  }
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

  setupMobileSlider() {
    const grids = document.querySelectorAll(".cards-grid");

    grids.forEach((grid) => {
      if (!grid.classList.contains("slider-enabled")) {
        grid.classList.add("slider-enabled");
        this.addSliderControls(grid);
      }
    });
  }

  removeMobileSlider() {
    const grids = document.querySelectorAll(".cards-grid");

    grids.forEach((grid) => {
      grid.classList.remove("slider-enabled");
      const controls = grid.parentNode.querySelector(".slider-controls");
      if (controls) {
        controls.remove();
      }
    });
  }

  addSliderControls(grid) {
    const container = grid.parentNode;
    const cards = grid.querySelectorAll(".insight-card");

    if (cards.length <= 1) return;

    const controlsHTML = `
      <div class="slider-controls">
        <button class="slider-btn prev" aria-label="Previous slide">‹</button>
        <div class="slider-dots">
          ${Array.from(cards)
            .map(
              (_, index) =>
                `<button class="dot ${
                  index === 0 ? "active" : ""
                }" data-slide="${index}"></button>`
            )
            .join("")}
        </div>
        <button class="slider-btn next" aria-label="Next slide">›</button>
      </div>
    `;

    container.insertAdjacentHTML("afterend", controlsHTML);

    this.bindSliderEvents(container);
  }

  bindSliderEvents(container) {
    const prevBtn = container.parentNode.querySelector(".prev");
    const nextBtn = container.parentNode.querySelector(".next");
    const dots = container.parentNode.querySelectorAll(".dot");
    const grid = container.querySelector(".cards-grid");
    const cards = grid.querySelectorAll(".insight-card");

    prevBtn?.addEventListener("click", () => {
      this.currentSlide =
        this.currentSlide > 0 ? this.currentSlide - 1 : cards.length - 1;
      this.updateSlider(grid, cards, dots);
    });

    nextBtn?.addEventListener("click", () => {
      this.currentSlide =
        this.currentSlide < cards.length - 1 ? this.currentSlide + 1 : 0;
      this.updateSlider(grid, cards, dots);
    });

    dots.forEach((dot, index) => {
      dot.addEventListener("click", () => {
        this.currentSlide = index;
        this.updateSlider(grid, cards, dots);
      });
    });

    // Touch events for swipe (passive)
    let startX = 0;
    let endX = 0;

    grid.addEventListener(
      "touchstart",
      (e) => {
        startX = e.touches[0].clientX;
      },
      { passive: true }
    );

    grid.addEventListener(
      "touchend",
      (e) => {
        endX = e.changedTouches[0].clientX;
        const diff = startX - endX;

        if (Math.abs(diff) > 50) {
          if (diff > 0) {
            // Swipe left - next
            this.currentSlide =
              this.currentSlide < cards.length - 1 ? this.currentSlide + 1 : 0;
          } else {
            // Swipe right - prev
            this.currentSlide =
              this.currentSlide > 0 ? this.currentSlide - 1 : cards.length - 1;
          }
          this.updateSlider(grid, cards, dots);
        }
      },
      { passive: true }
    );
  }

  updateSlider(grid, cards, dots) {
    const translateX = -this.currentSlide * 100;
    grid.style.transform = `translateX(${translateX}%)`;

    dots.forEach((dot, index) => {
      dot.classList.toggle("active", index === this.currentSlide);
    });
  }
}

// Initialize when DOM is loaded
document.addEventListener("DOMContentLoaded", () => {
  new TabManager();
  new SliderManager();
});

// Add CSS for mobile slider + slider-wrapper hint
const sliderStyles = `
  .slider-wrapper {
    will-change: transform;
    transition: transform 0.8s ease;
  }
  @media (max-width: 768px) {
    .cards-grid.slider-enabled {
      display: flex;
      transition: transform 0.3s ease;
      width: ${100 * 4}%;
    }
    
    .cards-grid.slider-enabled .insight-card {
      flex: 0 0 100%;
      margin-right: 20px;
    }
    
    .slider-controls {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 20px;
      margin-top: 30px;
    }
    
    .slider-btn {
      background: var(--primary-color);
      color: white;
      border: none;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      font-size: 20px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    
    .slider-btn:hover {
      background: #e63d0f;
    }
    
    .slider-dots {
      display: flex;
      gap: 10px;
    }
    
    .dot {
      width: 12px;
      height: 12px;
      border-radius: 50%;
      border: none;
      background: #ccc;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    
    .dot.active {
      background: var(--primary-color);
    }
  }
`;

// Inject slider styles
const styleSheet = document.createElement("style");
styleSheet.textContent = sliderStyles;
document.head.appendChild(styleSheet);

// form js

document
  .getElementById("contactForm")
  ?.addEventListener("submit", function (e) {
    e.preventDefault();
    const form = e.target;
    let valid = true;

    form.querySelectorAll(".error").forEach((el) => (el.textContent = ""));

    [...form.elements].forEach((el) => {
      if (["INPUT", "TEXTAREA", "SELECT"].includes(el.tagName)) {
        const errorSpan = el.parentElement.querySelector(".error");
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
      const formData = new FormData(form);

      fetch("assets/home-contact.php", {
        method: "POST",
        body: formData,
      })
        .then((res) => res.text())
        .then((response) => {
          const messageBox = document.getElementById("form-success-message");
          if (response.trim() === "success") {
            if (messageBox) {
              messageBox.innerHTML = `<div class="form-message success">✅ Your message has been sent successfully!</div>`;
            }
            form.reset();

            setTimeout(() => {
              if (messageBox) messageBox.innerHTML = "";
            }, 5000);
          } else {
            if (messageBox) {
              messageBox.innerHTML = `<div class="form-message error">❌ Something went wrong. Please try again.</div>`;
            }
          }
        })
        .catch(() => {
          const box = document.getElementById("form-success-message");
          if (box)
            box.innerHTML = `<div class="form-message error">❌ Server error. Try again later.</div>`;
        });
    }
  });
