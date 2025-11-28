class Carousel {
  constructor() {
    this.track = document.getElementById('carouselTrack');
    this.prevBtn = document.getElementById('prevBtn');
    this.nextBtn = document.getElementById('nextBtn');
    this.cards = document.querySelectorAll('.card');
    this.currentIndex = 0;
    this.cardsToShow = this.getCardsToShow();
    this.maxIndex = this.cards.length - this.cardsToShow;
    
    this.init();
    this.setupEventListeners();
    this.handleResize();
  }

  init() {
    this.updateCarousel();
    this.updateButtons();
  }

  getCardsToShow() {
    const width = window.innerWidth;
    if (width <= 480) return 1;
    if (width <= 768) return 2;
    if (width <= 1200) return 3;
    return 4;
  }

  setupEventListeners() {
    this.prevBtn.addEventListener('click', () => this.prevSlide());
    this.nextBtn.addEventListener('click', () => this.nextSlide());
    
    // Touch/swipe support
    let startX = 0;
    let currentX = 0;
    let isDragging = false;

    this.track.addEventListener('touchstart', (e) => {
      startX = e.touches[0].clientX;
      isDragging = true;
    });

    this.track.addEventListener('touchmove', (e) => {
      if (!isDragging) return;
      currentX = e.touches[0].clientX;
    });

    this.track.addEventListener('touchend', () => {
      if (!isDragging) return;
      isDragging = false;
      
      const diff = startX - currentX;
      if (Math.abs(diff) > 100) {
        if (diff > 0) {
          this.nextSlide();
        } else {
          this.prevSlide();
        }
      }
    });

    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
      if (e.key === 'ArrowLeft') {
        this.prevSlide();
      } else if (e.key === 'ArrowRight') {
        this.nextSlide();
      }
    });
  }

  handleResize() {
    window.addEventListener('resize', () => {
      this.cardsToShow = this.getCardsToShow();
      this.maxIndex = Math.max(this.cards.length - this.cardsToShow, 0);

      
      if (this.currentIndex > this.maxIndex) {
        this.currentIndex = this.maxIndex;
      }
      
      this.updateCarousel();
      this.updateButtons();
    });
  }

nextSlide() {
  if (this.currentIndex < this.maxIndex) {
    this.currentIndex++;
    console.log(`Next Slide: ${this.currentIndex}`);
    this.updateCarousel();
    this.updateButtons();
  }
}

prevSlide() {
  if (this.currentIndex > 0) {
    this.currentIndex--;
    console.log(`Previous Slide: ${this.currentIndex}`);
    this.updateCarousel();
    this.updateButtons();
  }
}
updateCarousel() {
   const card = this.cards[0];
  const cardStyle = window.getComputedStyle(card);
  const cardMarginRight = 430; // use fixed gap from your CSS

  const cardWidth = card.offsetWidth; // accurate width
  const translateX = -(this.currentIndex * (cardWidth + cardMarginRight));

  this.track.style.transform = `translateX(${translateX}px)`;
}

  updateButtons() {
    this.prevBtn.disabled = this.currentIndex === 0;
    this.nextBtn.disabled = this.currentIndex >= this.maxIndex;
  }

  goToSlide(index) {
    if (index >= 0 && index <= this.maxIndex) {
      this.currentIndex = index;
      this.updateCarousel();
      this.updateButtons();
    }
  }
}

// Initialize carousel when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
  new Carousel();
});
