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
      console.log('CTA button clicked');
      this.style.transform = 'scale(0.95)';
      setTimeout(() => {
        this.style.transform = 'scale(1)';
      }, 150);
    });
    
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

// Testimonial Slider functionality (2-second slide change)
function initializeTestimonialSlider() {
  const testimonialData = [
    {
      text: "I had the pleasure of collaborating with IMAC team for the development of my Nitrous oxide analgesia machines.Their team demonstrated exceptional expertise in product design, sheet metal manufacturing, and testing. The final product met all regulatory requirements and performed flawlessly in clinical trials.",
      author: "Dr. Pathik Shah",
      image: "../assets/imac-logo-icon.png"
    },
    {
      text: "I run Meli pattern works and I worked with iMac deaign, all the engineers professionals and have good quality knowledge...",
      author: "prakash dodiya, Owner",
      image: "../assets/imac-logo-icon.png"
    },
    {
      text: "Communication and quality work. I would highly recommend anyone who’s having any difficulties in bringing an idea or...",
      author: "Mark Tettey, Student",
      image: "../assets/imac-logo-icon.png"
    },
     {
      text: "I have good experience form iMAC which are doing excellence work in design. I will prefer who are looking for new development, CAD design...",
      author: "Dhaval Patel, Professor",
      image: "../assets/imac-logo-icon.png"
    },
    {
      text: "Working with the iMAC team was an amazing experience. They are very knowledgeable about many different engineering and design subjects. They have amazing communication and we’re willing to help me at every step of my project. They will meet every deadline.",
      author: "Innocent Kukulu, Student",
      image: "../assets/imac-logo-icon.png"
    },
    {
      text: "Had a very good experience working with the mechanical designing team from iMAC. They are very quick and efficient in translating the design ideas to CAD and then fabrication.",
      author: "Adithya KS, Osure Lab Pvt Ltd",
      image: "../assets/imac-logo-icon.png"
    },
    {
      text: "IMAC Design and Engineering has done excellent reverse engineering work on a medical device. Their service and delivery have been very professional and timely. The team demonstrated strong technical expertise, attention to detail, and a clear understanding of our product requirements.",
      author: "saravanan, Biotech Healthcare Pvt Ltd",
      image: "../assets/imac-logo-icon.png"
    },
    {
      text: "IMAC has provided us very prompt services, and specially Akshar and Keshav are always excited to work together.",
      author: "Harshal Kulkarni, Zydus Wellness",
      image: "../assets/imac-logo-icon.png"
    },
    {
      text: "We really appreciate your Innovative Designs for solution towards betterment of products Manufacturing 🙏🙏",
      author: "Shailesh Patel",
      image: "../assets/imac-logo-icon.png"
    },
    
    
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
    }, 300); // Slight delay for fade effect
  }

  function nextTestimonial() {
    currentTestimonial = (currentTestimonial + 1) % testimonialData.length;
    updateTestimonial(currentTestimonial);
  }

  setInterval(nextTestimonial, 2000);  // Change slide every 2 seconds

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
