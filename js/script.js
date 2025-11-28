  document.addEventListener('DOMContentLoaded', function () {
    // Get the current page's URL
    const currentPage = window.location.pathname.split('/').pop(); // Get the current file name (e.g., home.php, about.php)

    // Get all navigation links
    const navLinks = document.querySelectorAll('.nav-link');

    // Loop through each nav link and add the "active" class if it matches the current page
    navLinks.forEach(function (link) {
      // If the link's href matches the current page
      if (link.getAttribute('href') === currentPage) {
        link.classList.add('active');
      }
    });
  });


// Process accordion
const processHeaders = document.querySelectorAll('.process-header');

processHeaders.forEach(header => {
    header.addEventListener('click', function () {
        const description = this.nextElementSibling;
        const arrow = this.querySelector('img');  // Ensure this targets the correct element

        if (description.style.display === 'none' || !description.style.display) {
            description.style.display = 'block';
            arrow.style.transform = 'rotate(180deg)';
        } else {
            description.style.display = 'none';
            arrow.style.transform = 'rotate(0deg)';
        }
    });
});




// insight tab

window.TabManager = window.TabManager || class TabManager {
  constructor() {
    this.tabButtons = document.querySelectorAll('.tab-button');
    this.tabUnderline = document.querySelector('.tab-underline');
    this.carouselTrack = document.getElementById('carouselTrack');
    this.currentTab = 'blogs';
    
    this.blogCards = this.generateCards('blog');
    this.caseStudyCards = this.generateCards('case-study');
    
    this.init();
  }

  init() {
    this.setupEventListeners();
    this.showTab('blogs');
  }

  setupEventListeners() {
    this.tabButtons.forEach(button => {
      button.addEventListener('click', (e) => {
        const tabName = e.target.dataset.tab;
        this.showTab(tabName);
      });
    });
  }

  showTab(tabName) {
    // Update active tab button
    this.tabButtons.forEach(button => {
      button.classList.remove('active');
      if (button.dataset.tab === tabName) {
        button.classList.add('active');
      }
    });

    // Update underline position
    if (tabName === 'case-studies') {
      this.tabUnderline.classList.add('case-studies');
    } else {
      this.tabUnderline.classList.remove('case-studies');
    }

    // Update carousel content
    this.updateCarouselContent(tabName);
    this.currentTab = tabName;

    // Reset carousel position
    if (window.carousel) {
      window.carousel.goToSlide(0);
    }
  }

  updateCarouselContent(tabName) {
    const cards = tabName === 'blogs' ? this.blogCards : this.caseStudyCards;
    this.carouselTrack.innerHTML = cards.join('');
    
    // Reinitialize carousel with new content
    setTimeout(() => {
      if (window.carousel) {
        window.carousel.cards = document.querySelectorAll('.card');
        window.carousel.maxIndex = window.carousel.cards.length - window.carousel.cardsToShow;
        window.carousel.currentIndex = 0;
        window.carousel.updateCarousel();
        window.carousel.updateButtons();
      }
    }, 100);
  }

  generateCards(type) {
    const cardData = this.getCardData(type);
    return cardData.map(card => `
      <article class="card ${type}-card">
        <img src="${card.image}" alt="${card.title}" class="card-image">
        <div class="card-content">
          <span class="card-category">${card.category}</span>
          <h3 class="card-title">${card.title}</h3>
          <div class="card-author">
            <img src="${card.authorImage}" alt="${card.authorName}" class="author-avatar">
            <span class="author-name">${card.authorName}</span>
          </div>
          <p class="card-subtitle">${card.subtitle}</p>
          <div class="card-meta">
            <span class="article-type">${card.articleType}</span>
            <span class="read-time">${card.readTime}</span>
            <img src="${card.arrowIcon}" alt="Arrow" class="meta-arrow">
          </div>
        </div>
      </article>
    `);
  }

  getCardData(type) {
    const blogData = [
      {
        image: 'https://static.codia.ai/custom_image/2025-07-05/122313/feature-image-1.png',
        category: 'New Energy',
        title: 'What will it take to finance a decarbonized economy?',
        authorImage: 'https://codia-f2c.s3.us-west-1.amazonaws.com/image/2025-07-05/uwTfwCOWCY.png',
        authorName: 'Sebastian Pages',
        subtitle: 'Leading new energy from growth to',
        articleType: 'Insights Article',
        readTime: '8 Min Read',
        arrowIcon: 'https://static.codia.ai/custom_image/2025-07-05/122313/small-arrow-1.svg'
      },
      {
        image: 'https://static.codia.ai/custom_image/2025-07-05/122313/feature-image-2.png',
        category: 'New Energy',
        title: 'What will it take to finance a decarbonized economy?',
        authorImage: 'https://static.codia.ai/custom_image/2025-07-05/122313/profile-icon-4.png',
        authorName: 'Sebastian Pages',
        subtitle: 'Leading new energy from growth to',
        articleType: 'Insights Article',
        readTime: '8 Min Read',
        arrowIcon: 'https://static.codia.ai/custom_image/2025-07-05/122313/small-arrow-2.svg'
      },
      {
        image: 'https://static.codia.ai/custom_image/2025-07-05/122313/feature-image-3.png',
        category: 'New Energy',
        title: 'What will it take to finance a decarbonized economy?',
        authorImage: 'https://codia-f2c.s3.us-west-1.amazonaws.com/image/2025-07-05/eEvvRtwufm.png',
        authorName: 'Sebastian Pages',
        subtitle: 'Leading new energy from growth to',
        articleType: 'Insights Article',
        readTime: '8 Min Read',
        arrowIcon: 'https://static.codia.ai/custom_image/2025-07-05/122313/small-arrow-3.svg'
      },
      {
        image: 'https://static.codia.ai/custom_image/2025-07-05/122313/feature-image-4.png',
        category: 'New Energy',
        title: 'What will it take to finance a decarbonized economy?',
        authorImage: 'https://codia-f2c.s3.us-west-1.amazonaws.com/image/2025-07-05/2umsDTR8FC.png',
        authorName: 'Sebastian Pages',
        subtitle: 'Leading new energy from growth to',
        articleType: 'Insights Article',
        readTime: '8 Min Read',
        arrowIcon: 'https://static.codia.ai/custom_image/2025-07-05/122313/small-arrow-4.svg'
      },
      {
        image: 'https://static.codia.ai/custom_image/2025-07-05/122313/feature-image-1.png',
        category: 'New Energy',
        title: 'Sustainable energy solutions for tomorrow',
        authorImage: 'https://codia-f2c.s3.us-west-1.amazonaws.com/image/2025-07-05/uwTfwCOWCY.png',
        authorName: 'Sebastian Pages',
        subtitle: 'Exploring renewable energy trends',
        articleType: 'Insights Article',
        readTime: '6 Min Read',
        arrowIcon: 'https://static.codia.ai/custom_image/2025-07-05/122313/small-arrow-1.svg'
      },
      {
        image: 'https://static.codia.ai/custom_image/2025-07-05/122313/feature-image-2.png',
        category: 'New Energy',
        title: 'The future of clean technology investments',
        authorImage: 'https://static.codia.ai/custom_image/2025-07-05/122313/profile-icon-4.png',
        authorName: 'Sebastian Pages',
        subtitle: 'Investment strategies for clean tech',
        articleType: 'Insights Article',
        readTime: '10 Min Read',
        arrowIcon: 'https://static.codia.ai/custom_image/2025-07-05/122313/small-arrow-2.svg'
      }
    ];

    const caseStudyData = [
      {
        image: 'https://static.codia.ai/custom_image/2025-07-05/122313/feature-image-3.png',
        category: 'Case Study',
        title: 'Transforming energy infrastructure in developing markets',
        authorImage: 'https://codia-f2c.s3.us-west-1.amazonaws.com/image/2025-07-05/eEvvRtwufm.png',
        authorName: 'Sebastian Pages',
        subtitle: 'Real-world implementation strategies',
        articleType: 'Case Study',
        readTime: '12 Min Read',
        arrowIcon: 'https://static.codia.ai/custom_image/2025-07-05/122313/small-arrow-3.svg'
      },
      {
        image: 'https://static.codia.ai/custom_image/2025-07-05/122313/feature-image-4.png',
        category: 'Case Study',
        title: 'Solar power adoption in urban environments',
        authorImage: 'https://codia-f2c.s3.us-west-1.amazonaws.com/image/2025-07-05/2umsDTR8FC.png',
        authorName: 'Sebastian Pages',
        subtitle: 'Urban renewable energy solutions',
        articleType: 'Case Study',
        readTime: '15 Min Read',
        arrowIcon: 'https://static.codia.ai/custom_image/2025-07-05/122313/small-arrow-4.svg'
      },
      {
        image: 'https://static.codia.ai/custom_image/2025-07-05/122313/feature-image-1.png',
        category: 'Case Study',
        title: 'Wind energy project success stories',
        authorImage: 'https://codia-f2c.s3.us-west-1.amazonaws.com/image/2025-07-05/uwTfwCOWCY.png',
        authorName: 'Sebastian Pages',
        subtitle: 'Lessons from successful implementations',
        articleType: 'Case Study',
        readTime: '9 Min Read',
        arrowIcon: 'https://static.codia.ai/custom_image/2025-07-05/122313/small-arrow-1.svg'
      },
      {
        image: 'https://static.codia.ai/custom_image/2025-07-05/122313/feature-image-2.png',
        category: 'Case Study',
        title: 'Energy storage breakthrough analysis',
        authorImage: 'https://static.codia.ai/custom_image/2025-07-05/122313/profile-icon-4.png',
        authorName: 'Sebastian Pages',
        subtitle: 'Battery technology advancements',
        articleType: 'Case Study',
        readTime: '11 Min Read',
        arrowIcon: 'https://static.codia.ai/custom_image/2025-07-05/122313/small-arrow-2.svg'
      },
      {
        image: 'https://static.codia.ai/custom_image/2025-07-05/122313/feature-image-3.png',
        category: 'Case Study',
        title: 'Smart grid implementation challenges',
        authorImage: 'https://codia-f2c.s3.us-west-1.amazonaws.com/image/2025-07-05/eEvvRtwufm.png',
        authorName: 'Sebastian Pages',
        subtitle: 'Overcoming infrastructure barriers',
        articleType: 'Case Study',
        readTime: '13 Min Read',
        arrowIcon: 'https://static.codia.ai/custom_image/2025-07-05/122313/small-arrow-3.svg'
      },
      {
        image: 'https://static.codia.ai/custom_image/2025-07-05/122313/feature-image-4.png',
        category: 'Case Study',
        title: 'Corporate sustainability transformations',
        authorImage: 'https://codia-f2c.s3.us-west-1.amazonaws.com/image/2025-07-05/2umsDTR8FC.png',
        authorName: 'Sebastian Pages',
        subtitle: 'Enterprise energy transition',
        articleType: 'Case Study',
        readTime: '14 Min Read',
        arrowIcon: 'https://static.codia.ai/custom_image/2025-07-05/122313/small-arrow-4.svg'
      }
    ];

    return type === 'blog' ? blogData : caseStudyData;
  }
};

// Initialize tab manager and make carousel globally accessible
document.addEventListener('DOMContentLoaded', () => {
  new TabManager();
  
  // Make carousel globally accessible for tab switching
  setTimeout(() => {
    window.carousel = new Carousel();
  }, 100);
});

// insights carousel js

class Carousel {
  constructor() {
    this.track = document.getElementById('carouselTrack');
    this.prevBtn = document.getElementById('prevBtn');
    this.nextBtn = document.getElementById('nextBtn');
    this.cards = document.querySelectorAll('.card');
    this.currentIndex = 0;
    this.cardsToShow = this.getCardsToShow();
    this.maxIndex = Math.max(this.cards.length - this.cardsToShow, 0);

    // If the essential DOM elements are missing, abort initialization silently.
    // This allows the script to run on pages that don't include the carousel.
    if (!this.track) return;

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
    if (this.prevBtn) this.prevBtn.addEventListener('click', () => this.prevSlide());
    if (this.nextBtn) this.nextBtn.addEventListener('click', () => this.nextSlide());
    
    // Touch/swipe support
    let startX = 0;
    let currentX = 0;
    let isDragging = false;

    if (this.track) {
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
    }

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
  // Defensive guards: ensure track and at least one card exist
  if (!this.track) return;
  if (!this.cards || this.cards.length === 0) return;

  const card = this.cards[0];
  if (!card) return;

  const cardMarginRight = 430; // use fixed gap from your CSS
  const cardWidth = card.offsetWidth || 0; // accurate width when available
  const translateX = -(this.currentIndex * (cardWidth + cardMarginRight));

  // Ensure style property exists before setting transform
  if (this.track.style) {
    this.track.style.transform = `translateX(${translateX}px)`;
  }
}

  updateButtons() {
    if (this.prevBtn) this.prevBtn.disabled = this.currentIndex === 0;
    if (this.nextBtn) this.nextBtn.disabled = this.currentIndex >= this.maxIndex;
  }

  goToSlide(index) {
    if (index >= 0 && index <= this.maxIndex) {
      this.currentIndex = index;
      this.updateCarousel();
      this.updateButtons();
    }
  }
}

// Carousel is initialized when `TabManager` runs (and assigned to `window.carousel`).
// No-op here to avoid double-initialization on pages without carousel markup.
