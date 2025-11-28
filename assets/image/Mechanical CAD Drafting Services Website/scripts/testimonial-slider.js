// Main JavaScript file for initialization and common functionality
document.addEventListener('DOMContentLoaded', function() {
  // Initialize all components
  if (typeof initializeLogoSlider === 'function') {
    initializeLogoSlider();
  }
  initializeTestimonialSlider();
  initializeScrollEffects();
  initializeCTAButton();
});

// Smooth scroll for internal links
function initializeScrollEffects() {
  // Add smooth scrolling behavior
  const links = document.querySelectorAll('a[href^="#"]');
  
  links.forEach(link => {
    link.addEventListener('click', function(e) {
      e.preventDefault();
      
      const targetId = this.getAttribute('href');
      const targetSection = document.querySelector(targetId);
      
      if (targetSection) {
        targetSection.scrollIntoView({
          behavior: 'smooth',
          block: 'start'
        });
      }
    });
  });
}

// CTA Button functionality
function initializeCTAButton() {
  const ctaButton = document.querySelector('.cta-button');
  
  if (ctaButton) {
    ctaButton.addEventListener('click', function() {
      // Add your CTA functionality here
      console.log('CTA button clicked');
      
      // Example: Open contact form or redirect
      // window.location.href = '/contact';
      
      // Add click animation
      this.style.transform = 'scale(0.95)';
      setTimeout(() => {
        this.style.transform = 'scale(1)';
      }, 150);
    });
    
    // Add hover effects
    ctaButton.addEventListener('mouseenter', function() {
      this.style.transform = 'translateY(-2px)';
      this.style.boxShadow = '0 4px 12px rgba(255, 70, 18, 0.3)';
    });
    
    ctaButton.addEventListener('mouseleave', function() {
      this.style.transform = 'translateY(0)';
      this.style.boxShadow = 'none';
    });
  }
}

// Utility function for responsive behavior
function handleResize() {
  const width = window.innerWidth;
  
  // Adjust logo slider speed based on screen size
  const logoTrack = document.querySelector('.logo-track');
  if (logoTrack) {
    if (width < 768) {
      logoTrack.style.animationDuration = '15s';
    } else if (width < 1200) {
      logoTrack.style.animationDuration = '18s';
    } else {
      logoTrack.style.animationDuration = '20s';
    }
  }
}

// Listen for window resize
window.addEventListener('resize', handleResize);

// Initialize on load
handleResize();


// Testimonial Slider functionality
function initializeTestimonialSlider() {
  const testimonialData = [
    {
      text: "I run Meli pattern works and I worked with iMac deaign, all the engineers professionals and have good quality knowledge...",
      author: "Meli Pattern Works",
      image: "https://static.codia.ai/custom_image/2025-07-05/131851/profile-image.png"
    },
    {
      text: "Outstanding CAD drafting services with exceptional attention to detail. The team delivered exactly what we needed for our manufacturing process.",
      author: "TechFlow Industries",
      image: "https://static.codia.ai/custom_image/2025-07-05/131851/profile-image.png"
    },
    {
      text: "Professional service and quick turnaround time. iMAC Design helped us convert our legacy drawings to modern 3D models efficiently.",
      author: "Precision Manufacturing Co.",
      image: "https://static.codia.ai/custom_image/2025-07-05/131851/profile-image.png"
    }
  ];

  let currentTestimonial = 0;
  const testimonialText = document.querySelector('.banner-testimonial-text');
  const authorName = document.querySelector('.testimonial-author-name');
  const profileImage = document.querySelector('.profile-image');
  const dots = document.querySelectorAll('.dot');

  function updateTestimonial(index) {
    if (!testimonialText || !authorName || !profileImage) return;

    testimonialText.style.opacity = '0';
    authorName.style.opacity = '0';

    setTimeout(() => {
      testimonialText.textContent = testimonialData[index].text;
      authorName.textContent = testimonialData[index].author;
      profileImage.src = testimonialData[index].image;

      dots.forEach((dot, i) => {
        dot.classList.toggle('active', i === index);
      });

      testimonialText.style.opacity = '1';
      authorName.style.opacity = '1';
    }, 300);
  }

  function nextTestimonial() {
    currentTestimonial = (currentTestimonial + 1) % testimonialData.length;
    updateTestimonial(currentTestimonial);
  }

  setInterval(nextTestimonial, 5000);

  dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
      currentTestimonial = index;
      updateTestimonial(currentTestimonial);
    });
  });

  if (testimonialText) {
    testimonialText.style.transition = 'opacity 0.3s ease';
  }
  if (authorName) {
    authorName.style.transition = 'opacity 0.3s ease';
  }

  updateTestimonial(0);
}

// Touch/swipe support for mobile
function addSwipeSupport() {
  const testimonialCard = document.querySelector('.banner-testimonial-card');
  if (!testimonialCard) return;

  let startX = 0;
  let startY = 0;

  testimonialCard.addEventListener('touchstart', function(e) {
    startX = e.touches[0].clientX;
    startY = e.touches[0].clientY;
  });

  testimonialCard.addEventListener('touchend', function(e) {
    if (!startX || !startY) return;

    const endX = e.changedTouches[0].clientX;
    const endY = e.changedTouches[0].clientY;

    const diffX = startX - endX;
    const diffY = startY - endY;

    if (Math.abs(diffX) > Math.abs(diffY)) {
      if (Math.abs(diffX) > 50) {
        nextTestimonial();
      }
    }

    startX = 0;
    startY = 0;
  });
}

document.addEventListener('DOMContentLoaded', addSwipeSupport);
