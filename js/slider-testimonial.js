if (typeof window.TestimonialSlider === 'undefined') {
  class TestimonialSlider {
  constructor() {
    this.sliderTrack = document.getElementById('sliderTrack');
    this.slides = document.querySelectorAll('.testimonial-slide');
    this.prevBtn = document.querySelector('.prev-btn');
    this.nextBtn = document.querySelector('.next-btn');
    
    this.currentIndex = 0;
    this.totalSlides = this.slides.length;
    this.isTransitioning = false;
    this.autoPlayInterval = null;
    this.autoPlayDelay = 5000; // 5 seconds
    
    this.init();
  }

  init() {
    this.setupEventListeners();
    this.startAutoPlay();
    this.updateSlider();
  }

  setupEventListeners() {
    this.nextBtn.addEventListener('click', () => this.nextSlide());
    this.prevBtn.addEventListener('click', () => this.prevSlide());
    
    // Pause auto-play on hover
    this.sliderTrack.addEventListener('mouseenter', () => this.pauseAutoPlay());
    this.sliderTrack.addEventListener('mouseleave', () => this.startAutoPlay());
    
    // Handle keyboard navigation
    document.addEventListener('keydown', (e) => {
      if (e.key === 'ArrowLeft') {
        this.prevSlide();
      } else if (e.key === 'ArrowRight') {
        this.nextSlide();
      }
    });

    // Handle touch events for mobile swipe
    this.setupTouchEvents();
  }

  setupTouchEvents() {
    let startX = 0;
    let endX = 0;
    const minSwipeDistance = 50;

    this.sliderTrack.addEventListener('touchstart', (e) => {
      startX = e.touches[0].clientX;
    }, { passive: true });

    this.sliderTrack.addEventListener('touchend', (e) => {
      endX = e.changedTouches[0].clientX;
      const swipeDistance = startX - endX;

      if (Math.abs(swipeDistance) > minSwipeDistance) {
        if (swipeDistance > 0) {
          this.nextSlide();
        } else {
          this.prevSlide();
        }
      }
    }, { passive: true });
  }

  nextSlide() {
    if (this.isTransitioning) return;
    
    this.currentIndex = (this.currentIndex + 1) % this.totalSlides;
    this.updateSlider();
  }

  prevSlide() {
    if (this.isTransitioning) return;
    
    this.currentIndex = (this.currentIndex - 1 + this.totalSlides) % this.totalSlides;
    this.updateSlider();
  }

  updateSlider() {
    this.isTransitioning = true;
    
    // Calculate transform value
    const translateX = -this.currentIndex * 20; // 20% per slide
    this.sliderTrack.style.transform = `translateX(${translateX}%)`;
    
    // Update active slide
    this.slides.forEach((slide, index) => {
      slide.classList.toggle('active', index === this.currentIndex);
    });

    // Reset transition flag after animation completes
    setTimeout(() => {
      this.isTransitioning = false;
    }, 500);
  }

  startAutoPlay() {
    this.pauseAutoPlay(); // Clear any existing interval
    this.autoPlayInterval = setInterval(() => {
      this.nextSlide();
    }, this.autoPlayDelay);
  }

  pauseAutoPlay() {
    if (this.autoPlayInterval) {
      clearInterval(this.autoPlayInterval);
      this.autoPlayInterval = null;
    }
  }

  // Public method to add new testimonials
  addTestimonial(testimonialData) {
    const newSlide = this.createSlideElement(testimonialData);
    this.sliderTrack.appendChild(newSlide);
    this.slides = document.querySelectorAll('.testimonial-slide');
    this.totalSlides = this.slides.length;
    this.updateSliderWidth();
  }

  createSlideElement(data) {
    const slide = document.createElement('article');
    slide.className = 'testimonial-slide';
    
    slide.innerHTML = `
      <blockquote class="testimonial-text">
        ${data.text}
      </blockquote>
      <div class="author-info">
        <img src="${data.avatar}" alt="${data.name}" class="author-avatar">
        <div class="author-details">
          <h3 class="author-name">${data.name}</h3>
          <p class="author-title">${data.title}</p>
        </div>
      </div>
    `;
    
    return slide;
  }

  updateSliderWidth() {
    const widthPercentage = this.totalSlides * 20;
    this.sliderTrack.style.width = `${widthPercentage}%`;
    
    this.slides.forEach(slide => {
      slide.style.flex = `0 0 ${100 / this.totalSlides}%`;
      slide.style.width = `${100 / this.totalSlides}%`;
    });
  }

  // Public method to go to specific slide
  goToSlide(index) {
    if (index >= 0 && index < this.totalSlides && !this.isTransitioning) {
      this.currentIndex = index;
      this.updateSlider();
    }
  }

  // Public method to get current slide index
  getCurrentSlide() {
    return this.currentIndex;
  }

  // Public method to destroy slider
  destroy() {
    this.pauseAutoPlay();
    this.prevBtn.removeEventListener('click', () => this.prevSlide());
    this.nextBtn.removeEventListener('click', () => this.nextSlide());
  }
  }
  window.TestimonialSlider = TestimonialSlider;
}

// Initialize slider when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
  window.testimonialSlider = new TestimonialSlider();
});

// Example of how to add new testimonials dynamically
// Uncomment and modify as needed:
/*
function addNewTestimonial() {
  const newTestimonial = {
    text: "Your new testimonial text here...",
    name: "Client Name",
    title: "Client Title",
    avatar: "path/to/avatar.jpg"
  };
  
  window.testimonialSlider.addTestimonial(newTestimonial);
}
*/
