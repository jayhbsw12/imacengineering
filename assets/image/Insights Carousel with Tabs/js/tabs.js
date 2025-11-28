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
