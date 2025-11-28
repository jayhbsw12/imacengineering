class InfiniteSlider {
  constructor() {
    this.currentSlide = 0;
    this.totalSlides = 4;
    this.autoPlayInterval = 5000; // 5 seconds
    this.isTransitioning = false;
    
    this.slides = document.querySelectorAll('.slide');
    this.navDots = document.querySelectorAll('.nav-dot');
    
    this.init();
  }
  
  init() {
    this.setupEventListeners();
    this.startAutoPlay();
  }
  
  setupEventListeners() {
    // Navigation dots click events
    this.navDots.forEach((dot, index) => {
      dot.addEventListener('click', () => {
        if (!this.isTransitioning) {
          this.goToSlide(index);
        }
      });
    });
    
    // Pause auto-play on hover
    const sliderContainer = document.querySelector('.slider-container');
    sliderContainer.addEventListener('mouseenter', () => {
      this.pauseAutoPlay();
    });
    
    sliderContainer.addEventListener('mouseleave', () => {
      this.startAutoPlay();
    });
    
    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
      if (!this.isTransitioning) {
        if (e.key === 'ArrowLeft') {
          this.previousSlide();
        } else if (e.key === 'ArrowRight') {
          this.nextSlide();
        }
      }
    });
  }
  
  goToSlide(slideIndex) {
    if (slideIndex === this.currentSlide || this.isTransitioning) return;
    
    this.isTransitioning = true;
    
    const currentSlideElement = this.slides[this.currentSlide];
    const nextSlideElement = this.slides[slideIndex];
    
    // Remove active class from current slide
    currentSlideElement.classList.remove('active');
    
    // Add active class to next slide
    nextSlideElement.classList.add('active');
    
    // Update navigation dots
    this.updateNavDots(slideIndex);
    
    // Update current slide index
    this.currentSlide = slideIndex;
    
    // Reset transition flag after animation completes
    setTimeout(() => {
      this.isTransitioning = false;
    }, 800);
  }
  
  nextSlide() {
    const nextIndex = (this.currentSlide + 1) % this.totalSlides;
    this.goToSlide(nextIndex);
  }
  
  previousSlide() {
    const prevIndex = (this.currentSlide - 1 + this.totalSlides) % this.totalSlides;
    this.goToSlide(prevIndex);
  }
  
  updateNavDots(activeIndex) {
    this.navDots.forEach((dot, index) => {
      dot.classList.toggle('active', index === activeIndex);
    });
  }
  
  startAutoPlay() {
    this.pauseAutoPlay(); // Clear any existing interval
    this.autoPlayTimer = setInterval(() => {
      this.nextSlide();
    }, this.autoPlayInterval);
  }
  
  pauseAutoPlay() {
    if (this.autoPlayTimer) {
      clearInterval(this.autoPlayTimer);
      this.autoPlayTimer = null;
    }
  }
  
  // Method to add smooth slide transitions with direction
  addSlideTransition(currentSlide, nextSlide, direction = 'next') {
    const currentElement = this.slides[currentSlide];
    const nextElement = this.slides[nextSlide];
    
    // Remove any existing animation classes
    currentElement.classList.remove('slide-in-left', 'slide-in-right', 'slide-out-left', 'slide-out-right');
    nextElement.classList.remove('slide-in-left', 'slide-in-right', 'slide-out-left', 'slide-out-right');
    
    if (direction === 'next') {
      currentElement.classList.add('slide-out-left');
      nextElement.classList.add('slide-in-right');
    } else {
      currentElement.classList.add('slide-out-right');
      nextElement.classList.add('slide-in-left');
    }
    
    // Clean up animation classes after transition
    setTimeout(() => {
      currentElement.classList.remove('slide-out-left', 'slide-out-right');
      nextElement.classList.remove('slide-in-left', 'slide-in-right');
    }, 800);
  }
}

// Initialize slider when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
  new InfiniteSlider();
});

// Handle visibility change to pause/resume auto-play
document.addEventListener('visibilitychange', () => {
  const slider = window.sliderInstance;
  if (slider) {
    if (document.hidden) {
      slider.pauseAutoPlay();
    } else {
      slider.startAutoPlay();
    }
  }
});

// Expose slider instance globally for debugging
window.addEventListener('load', () => {
  window.sliderInstance = new InfiniteSlider();
});
