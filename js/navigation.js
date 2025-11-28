// Navigation JavaScript
class Navigation {
  constructor() {
    this.mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    this.mobileNavigation = document.querySelector('.mobile-navigation');
    this.navLinks = document.querySelectorAll('.nav-link, .mobile-nav-link');
    this.header = document.querySelector('.header');
    this.isMenuOpen = false;
    
    this.init();
  }
  
  init() {
    this.bindEvents();
    this.handleActiveStates();
    this.handleStickyHeader();
  }
  
  bindEvents() {
    // Mobile menu toggle
    if (this.mobileMenuToggle) {
      this.mobileMenuToggle.addEventListener('click', () => this.toggleMobileMenu());
    }
    
    // Navigation link clicks
    this.navLinks.forEach(link => {
      link.addEventListener('click', (e) => this.handleNavClick(e));
    });
    
    // Close mobile menu when clicking outside
    document.addEventListener('click', (e) => this.handleOutsideClick(e));
    
    // Handle window resize
    window.addEventListener('resize', () => this.handleResize());
    
    // Handle scroll for sticky header effects
    window.addEventListener('scroll', () => this.handleScroll());
    
    // Handle keyboard navigation
    document.addEventListener('keydown', (e) => this.handleKeydown(e));
  }
  
  toggleMobileMenu() {
    this.isMenuOpen = !this.isMenuOpen;
    
    if (this.isMenuOpen) {
      this.mobileNavigation.classList.add('active');
      this.mobileMenuToggle.setAttribute('aria-expanded', 'true');
      document.body.style.overflow = 'hidden';
    } else {
      this.mobileNavigation.classList.remove('active');
      this.mobileMenuToggle.setAttribute('aria-expanded', 'false');
      document.body.style.overflow = '';
    }
  }
  
  closeMobileMenu() {
    if (this.isMenuOpen) {
      this.isMenuOpen = false;
      this.mobileNavigation.classList.remove('active');
      this.mobileMenuToggle.setAttribute('aria-expanded', 'false');
      document.body.style.overflow = '';
    }
  }
  
  handleNavClick(e) {
    const clickedLink = e.target;
    const href = clickedLink.getAttribute('href');
    
    // Prevent default for demo purposes (remove in production)
    if (href === '#') {
      e.preventDefault();
    }
    
    // Update active states
    this.updateActiveStates(clickedLink);
    
    // Close mobile menu if open
    this.closeMobileMenu();
  }
  
  updateActiveStates(activeLink) {
    // Remove active class from all links
    this.navLinks.forEach(link => {
      link.classList.remove('active');
    });
    
    // Add active class to clicked link
    activeLink.classList.add('active');
    
    // Update corresponding link in other navigation (desktop/mobile)
    const linkText = activeLink.textContent.trim();
    this.navLinks.forEach(link => {
      if (link.textContent.trim() === linkText) {
        link.classList.add('active');
      }
    });
  }
  
  handleActiveStates() {
    // Set initial active state based on current page
    const currentPath = window.location.pathname;
    const currentHash = window.location.hash;
    
    // For demo purposes, keep "Home" as active
    // In production, you would match against actual URLs
    this.navLinks.forEach(link => {
      const href = link.getAttribute('href');
      if (href === currentPath || href === currentHash) {
        link.classList.add('active');
      }
    });
  }

  handleStickyHeader() {
    // Initialize header sticky/shadow state based on current scroll position
    // Delegates to handleScroll which contains the logic for adding/removing classes
    this.handleScroll();
  }
  
  handleOutsideClick(e) {
    if (this.isMenuOpen && 
        !this.mobileNavigation.contains(e.target) && 
        !this.mobileMenuToggle.contains(e.target)) {
      this.closeMobileMenu();
    }
  }
  
  handleResize() {
    // Close mobile menu on resize to larger screen
    if (window.innerWidth > 768 && this.isMenuOpen) {
      this.closeMobileMenu();
    }
  }
  
  handleScroll() {
    const scrollY = window.scrollY;
    
    // Add shadow effect when scrolled
    if (scrollY > 10) {
      this.header.classList.add('scrolled');
    } else {
      this.header.classList.remove('scrolled');
    }
  }
  
  handleKeydown(e) {
    // Close mobile menu with Escape key
    if (e.key === 'Escape' && this.isMenuOpen) {
      this.closeMobileMenu();
    }
    
    // Handle Enter key on mobile menu toggle
    if (e.key === 'Enter' && e.target === this.mobileMenuToggle) {
      this.toggleMobileMenu();
    }
  }
}

// Smooth scroll utility
class SmoothScroll {
  constructor() {
    this.init();
  }
  
  init() {
    // Handle smooth scrolling for anchor links
    document.addEventListener('click', (e) => {
      const link = e.target.closest('a[href^="#"]');
      if (link) {
        const href = link.getAttribute('href');
        const target = document.querySelector(href);
        
        if (target) {
          e.preventDefault();
          this.scrollToElement(target);
        }
      }
    });
  }
  
  scrollToElement(element) {
    const headerHeight = document.querySelector('.header').offsetHeight;
    const elementPosition = element.getBoundingClientRect().top + window.pageYOffset;
    const offsetPosition = elementPosition - headerHeight - 20;
    
    window.scrollTo({
      top: offsetPosition,
      behavior: 'smooth'
    });
  }
}

// Accessibility enhancements
class AccessibilityEnhancer {
  constructor() {
    this.init();
  }
  
  init() {
    this.addSkipLink();
    this.enhanceKeyboardNavigation();
    this.addAriaLabels();
  }
  
  addSkipLink() {
    const skipLink = document.createElement('a');
    skipLink.href = '#main-content';
    skipLink.textContent = 'Skip to main content';
    skipLink.className = 'skip-link';
    skipLink.style.cssText = `
      position: absolute;
      top: -40px;
      left: 6px;
      background: var(--color-primary);
      color: white;
      padding: 8px;
      text-decoration: none;
      border-radius: 4px;
      z-index: 10000;
      transition: top 0.3s;
    `;
    
    skipLink.addEventListener('focus', () => {
      skipLink.style.top = '6px';
    });
    
    skipLink.addEventListener('blur', () => {
      skipLink.style.top = '-40px';
    });
    
    document.body.insertBefore(skipLink, document.body.firstChild);
  }
  
  enhanceKeyboardNavigation() {
    // Add focus indicators
    const style = document.createElement('style');
    style.textContent = `
      .nav-link:focus,
      .mobile-nav-link:focus,
      .appointment-link:focus,
      .quote-btn:focus,
      .mobile-menu-toggle:focus {
        /* outline: 2px solid var(--color-primary); */
        outline-offset: 2px;
      }
      
      .skip-link:focus {
        outline: 2px solid white;
        outline-offset: 2px;
      }
    `;
    document.head.appendChild(style);
  }
  
  addAriaLabels() {
    // Add aria-labels where needed
    const mobileToggle = document.querySelector('.mobile-menu-toggle');
    if (mobileToggle) {
      mobileToggle.setAttribute('aria-expanded', 'false');
      mobileToggle.setAttribute('aria-controls', 'mobile-navigation');
    }
    
    const mobileNav = document.querySelector('.mobile-navigation');
    if (mobileNav) {
      mobileNav.setAttribute('id', 'mobile-navigation');
      mobileNav.setAttribute('aria-label', 'Mobile navigation menu');
    }
    
    const mainNav = document.querySelector('.navigation');
    if (mainNav) {
      mainNav.setAttribute('aria-label', 'Main navigation menu');
    }
  }
}

// Performance optimization
class PerformanceOptimizer {
  constructor() {
    this.init();
  }
  
  init() {
    this.optimizeImages();
    this.addIntersectionObserver();
  }
  
  optimizeImages() {
    // Add loading="lazy" to images below the fold
    const images = document.querySelectorAll('img');
    images.forEach((img, index) => {
      if (index > 3) { // Skip first few images (above fold)
        img.loading = 'lazy';
      }
    });
  }
  
  addIntersectionObserver() {
    // Observe elements for animations or lazy loading
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('in-view');
        }
      });
    }, {
      threshold: 0.1,
      rootMargin: '50px'
    });
    
    // Observe demo content sections
    const sections = document.querySelectorAll('.demo-section');
    sections.forEach(section => observer.observe(section));
  }
}

// Initialize all components when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
  new Navigation();
  new SmoothScroll();
  new AccessibilityEnhancer();
  new PerformanceOptimizer();
});

// Handle page visibility changes
document.addEventListener('visibilitychange', () => {
  if (document.hidden) {
    // Page is hidden, pause any animations or timers
    console.log('Page hidden');
  } else {
    // Page is visible, resume animations or timers
    console.log('Page visible');
  }
});

// Export for potential module usage
if (typeof module !== 'undefined' && module.exports) {
  module.exports = {
    Navigation,
    SmoothScroll,
    AccessibilityEnhancer,
    PerformanceOptimizer
  };
}

// Process accordion (wrapped in IIFE to avoid redeclaration errors if script reloads)
(function () {
  const processHeaders = document.querySelectorAll('.process-header');
  if (!processHeaders || processHeaders.length === 0) return;

  processHeaders.forEach(header => {
    header.addEventListener('click', function () {
      const description = this.nextElementSibling;
      const arrow = this.querySelector('img');

      if (description.classList.contains('hidden')) {
        description.classList.remove('hidden');
        if (arrow) arrow.style.transform = 'rotate(180deg)';
      } else {
        description.classList.add('hidden');
        if (arrow) arrow.style.transform = 'rotate(0deg)';
      }
    });
  });
})();
