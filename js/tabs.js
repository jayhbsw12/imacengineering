window.TabManager = window.TabManager || class TabManager {
  constructor() {
    this.init();
  }

  init() {
    this.bindEvents();
    this.setActiveTab('blogs'); // Set default active tab
  }

  bindEvents() {
    const tabButtons = document.querySelectorAll('.nav-tab');
    
    tabButtons.forEach(button => {
      button.addEventListener('click', (e) => {
        const tabName = e.target.getAttribute('data-tab');
        this.setActiveTab(tabName);
      });
    });
  }

  setActiveTab(tabName) {
    // Remove active class from all tabs and content
    document.querySelectorAll('.nav-tab').forEach(tab => {
      tab.classList.remove('active');
    });
    
    document.querySelectorAll('.tab-content').forEach(content => {
      content.classList.remove('active');
    });

    // Add active class to selected tab and content
    const activeTab = document.querySelector(`[data-tab="${tabName}"]`);
    const activeContent = document.getElementById(tabName);
    
    if (activeTab && activeContent) {
      activeTab.classList.add('active');
      activeContent.classList.add('active');
    }

    // Update indicator position
    this.updateIndicator(tabName);
    
    // Animate cards
    this.animateCards(activeContent);
  }

  updateIndicator(tabName) {
    const indicator = document.querySelector('.indicator-short');
    
    if (tabName === 'case-studies') {
      indicator.classList.add('case-studies');
    } else {
      indicator.classList.remove('case-studies');
    }
  }

  animateCards(container) {
    if (!container) return;
    
    const cards = container.querySelectorAll('.insight-card');
    
    // Reset animation
    cards.forEach(card => {
      card.style.opacity = '0';
      card.style.transform = 'translateY(30px)';
    });

    // Animate cards with stagger
    cards.forEach((card, index) => {
      setTimeout(() => {
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        card.style.opacity = '1';
        card.style.transform = 'translateY(0)';
      }, index * 100);
    });
  }
};

// Slider functionality for mobile
// class SliderManager {
//   constructor() {
//     this.currentSlide = 0;
//     this.init();
//   }

//   init() {
//     if (window.innerWidth <= 768) {
//       this.setupMobileSlider();
//     }
    
//     window.addEventListener('resize', () => {
//       if (window.innerWidth <= 768) {
//         this.setupMobileSlider();
//       } else {
//         this.removeMobileSlider();
//       }
//     });
//   }

//   setupMobileSlider() {
//     const grids = document.querySelectorAll('.cards-grid');
    
//     grids.forEach(grid => {
//       if (!grid.classList.contains('slider-enabled')) {
//         grid.classList.add('slider-enabled');
//         this.addSliderControls(grid);
//       }
//     });
//   }

//   removeMobileSlider() {
//     const grids = document.querySelectorAll('.cards-grid');
    
//     grids.forEach(grid => {
//       grid.classList.remove('slider-enabled');
//       const controls = grid.parentNode.querySelector('.slider-controls');
//       if (controls) {
//         controls.remove();
//       }
//     });
//   }

//   addSliderControls(grid) {
//     const container = grid.parentNode;
//     const cards = grid.querySelectorAll('.insight-card');
    
//     if (cards.length <= 1) return;

//     const controlsHTML = `
//       <div class="slider-controls">
//         <button class="slider-btn prev" aria-label="Previous slide">‹</button>
//         <div class="slider-dots">
//           ${Array.from(cards).map((_, index) => 
//             `<button class="dot ${index === 0 ? 'active' : ''}" data-slide="${index}"></button>`
//           ).join('')}
//         </div>
//         <button class="slider-btn next" aria-label="Next slide">›</button>
//       </div>
//     `;
    
//     container.insertAdjacentHTML('afterend', controlsHTML);
    
//     this.bindSliderEvents(container);
//   }

//   bindSliderEvents(container) {
//     const prevBtn = container.parentNode.querySelector('.prev');
//     const nextBtn = container.parentNode.querySelector('.next');
//     const dots = container.parentNode.querySelectorAll('.dot');
//     const grid = container.querySelector('.cards-grid');
//     const cards = grid.querySelectorAll('.insight-card');

//     prevBtn?.addEventListener('click', () => {
//       this.currentSlide = this.currentSlide > 0 ? this.currentSlide - 1 : cards.length - 1;
//       this.updateSlider(grid, cards, dots);
//     });

//     nextBtn?.addEventListener('click', () => {
//       this.currentSlide = this.currentSlide < cards.length - 1 ? this.currentSlide + 1 : 0;
//       this.updateSlider(grid, cards, dots);
//     });

//     dots.forEach((dot, index) => {
//       dot.addEventListener('click', () => {
//         this.currentSlide = index;
//         this.updateSlider(grid, cards, dots);
//       });
//     });

//     // Touch events for swipe
//     let startX = 0;
//     let endX = 0;

//     grid.addEventListener('touchstart', (e) => {
//       startX = e.touches[0].clientX;
//     });

//     grid.addEventListener('touchend', (e) => {
//       endX = e.changedTouches[0].clientX;
//       const diff = startX - endX;

//       if (Math.abs(diff) > 50) {
//         if (diff > 0) {
//           // Swipe left - next
//           this.currentSlide = this.currentSlide < cards.length - 1 ? this.currentSlide + 1 : 0;
//         } else {
//           // Swipe right - prev
//           this.currentSlide = this.currentSlide > 0 ? this.currentSlide - 1 : cards.length - 1;
//         }
//         this.updateSlider(grid, cards, dots);
//       }
//     });
//   }

//   updateSlider(grid, cards, dots) {
//     const translateX = -this.currentSlide * 100;
//     grid.style.transform = `translateX(${translateX}%)`;
    
//     dots.forEach((dot, index) => {
//       dot.classList.toggle('active', index === this.currentSlide);
//     });
//   }
// }

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
  new TabManager();
  // new SliderManager();
});

// Add CSS for mobile slider
const sliderStyles = `
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
const styleSheet = document.createElement('style');
styleSheet.textContent = sliderStyles;
document.head.appendChild(styleSheet);
