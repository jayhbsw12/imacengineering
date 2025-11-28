document.addEventListener('DOMContentLoaded', function() {
  // Filter button functionality
  const filterButtons = document.querySelectorAll('.filter-btn');
  
  filterButtons.forEach(button => {
    button.addEventListener('click', function() {
      // Remove active class from all buttons
      filterButtons.forEach(btn => btn.classList.remove('filter-btn--active'));
      
      // Add active class to clicked button
      this.classList.add('filter-btn--active');
      
      // Here you could add filtering logic for articles
      console.log('Filter selected:', this.textContent);
    });
  });

  // Hover effects for article cards
  const hoverableCard = document.querySelector('.article-card--hoverable');
  
  if (hoverableCard) {
    hoverableCard.addEventListener('mouseenter', function() {
      console.log('Hovering over article card');
    });
    
    hoverableCard.addEventListener('mouseleave', function() {
      console.log('Mouse left article card');
    });
  }

  // CTA button click handler
  const ctaButton = document.querySelector('.cta-button');
  
  if (ctaButton) {
    ctaButton.addEventListener('click', function() {
      console.log('Get a Quote button clicked');
      // Add your quote request logic here
    });
  }

  // Smooth scrolling for better UX
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        target.scrollIntoView({
          behavior: 'smooth',
          block: 'start'
        });
      }
    });
  });

  // Add loading animation for images
  const images = document.querySelectorAll('img');
  images.forEach(img => {
    img.addEventListener('load', function() {
      this.style.opacity = '1';
    });
    
    img.addEventListener('error', function() {
      console.warn('Failed to load image:', this.src);
      this.style.opacity = '0.5';
    });
  });

  // Responsive behavior for smaller screens
  function handleResize() {
    const mainContainer = document.querySelector('.main-container');
    const viewportWidth = window.innerWidth;
    
    if (viewportWidth < 1920) {
      mainContainer.style.transform = `scale(${viewportWidth / 1920})`;
      mainContainer.style.transformOrigin = 'top left';
    } else {
      mainContainer.style.transform = 'none';
    }
  }

  window.addEventListener('resize', handleResize);
  handleResize(); // Call on initial load
});
