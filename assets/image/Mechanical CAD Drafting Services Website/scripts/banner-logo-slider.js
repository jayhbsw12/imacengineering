function initializeLogoSlider() {
  const logoTrack = document.querySelector('.banner-logo-track');
  const logoSlider = document.querySelector('.banner-logo-slider');

  if (!logoTrack || !logoSlider) return;

  logoSlider.addEventListener('mouseenter', function() {
    logoTrack.style.animationPlayState = 'paused';
  });

  logoSlider.addEventListener('mouseleave', function() {
    logoTrack.style.animationPlayState = 'running';
  });

  logoSlider.addEventListener('keydown', function(e) {
    if (e.key === 'Space' || e.key === 'Enter') {
      e.preventDefault();
      logoTrack.style.animationPlayState =
        logoTrack.style.animationPlayState === 'paused' ? 'running' : 'paused';
    }
  });

  logoSlider.setAttribute('tabindex', '0');
  logoSlider.setAttribute('role', 'region');
  logoSlider.setAttribute('aria-label', 'Partner logos carousel');

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      logoTrack.style.animationPlayState = entry.isIntersecting ? 'running' : 'paused';
    });
  }, { threshold: 0.1 });

  observer.observe(logoSlider);

  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    logoTrack.style.animation = 'none';
    logoTrack.style.transform = 'translateX(0)';
  }

  function adjustAnimationSpeed() {
    const width = window.innerWidth;
    let duration = '20s';

    if (width < 480) duration = '15s';
    else if (width < 768) duration = '17s';
    else if (width < 1200) duration = '18s';

    logoTrack.style.animationDuration = duration;
  }

  adjustAnimationSpeed();
  window.addEventListener('resize', adjustAnimationSpeed);

  logoTrack.style.opacity = '0';
  setTimeout(() => {
    logoTrack.style.transition = 'opacity 0.5s ease';
    logoTrack.style.opacity = '1';
  }, 100);
}

function addLogoHoverEffects() {
  const logoItems = document.querySelectorAll('.banner-logo-item');

  logoItems.forEach(item => {
    item.addEventListener('mouseenter', function() {
      this.style.transform = 'scale(1.1)';
      this.style.transition = 'transform 0.3s ease';
    });

    item.addEventListener('mouseleave', function() {
      this.style.transform = 'scale(1)';
    });
  });
}

document.addEventListener('DOMContentLoaded', addLogoHoverEffects);

function preloadLogoImages() {
  const logoImages = [
    'https://static.codia.ai/custom_image/2025-07-05/131851/partner-logo-1.png',
    'https://static.codia.ai/custom_image/2025-07-05/131851/partner-logo-2.svg',
    'https://static.codia.ai/custom_image/2025-07-05/131851/partner-logo-3.png'
  ];

  logoImages.forEach(src => {
    const img = new Image();
    img.src = src;
  });
}

window.addEventListener('load', preloadLogoImages);
