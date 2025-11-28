// Case studies data extracted from the Trig.com website
const caseStudies = [
    {
        id: 1,
        company: "Nox Advaita",
        title: "The Journey Of Nox Advaita : Designing The Future Of Medical Devices.",
        image: "../assets/CASE-STUDY-BANNER/NOX ADVAITA.webp",
        url: "https://imacengineering.com/the-journey-of-nox-advaita"
    },
    {
        id: 2,
        company: "Gynec Bed",
        title: "Gynec Bed By Karma : Revolutionizing Patient Care",
        image: "../assets/CASE-STUDY-BANNER/GYNEC BED.webp",
        url: "https://imacengineering.com/gynec-bed-by-karma"
    },
    {
        id: 3,
        company: "EV Scooter",
        title: "EV Scooter Development",
        image: "../assets/CASE-STUDY-BANNER/EV VEHICLE.webp",
        url: "https://imacengineering.com/ev-scooter-development"
    },
    {
        id: 4,
        company: "IR Blaster",
        title: "Development of a Universal IR Blaster for Smart Device Control",
        image: "../assets/CASE-STUDY-BANNER/IR BLASTER.webp",
        url: "https://imacengineering.com/universal-IR-blaster"
    },
    {
        id: 5,
        company: "Headphones",
        title: "Gaming Headphones",
        image: "../assets/CASE-STUDY-BANNER/GAMING HEADPHONE.webp",
        url: "https://imacengineering.com/gaming-headphones"
    },
    {
        id: 6,
        company: "Pill Cap",
        title: "Pill Cap",
        image: "../assets/CASE-STUDY-BANNER/PILLCAP.webp",
        url: "https://imacengineering.com/pill-cap"
    },
    {
        id: 7,
        company: "Centrifuge Machine",
        title: "Centrifuge Machine",
        image: "../assets/CASE-STUDY-BANNER/CENTRIFUGE NACHINE.webp",
        url: "https://imacengineering.com/centrifuge-machine"
    },
    {
        id: 8,
        company: "Caravan Fan",
        title: "Portable Caravan Fan",
        image: "../assets/CASE-STUDY-BANNER/PORTABLE CARAVAN FAN.webp",
        url: "https://imacengineering.com/portable-caravan-fan"
    },
    {
        id: 9,
        company: "AFDS",
        title: "AFDS: Advanced Fire Detection System",
        image: "../assets/CASE-STUDY-BANNER/AFDS.webp",
        url: "https://imacengineering.com/advanced-fire-detection-system"
    },
    {
        id: 10,
        company: "Patient Warmer",
        title: "Patient Warmer",
        image: "../assets/CASE-STUDY-BANNER/PATIENT WARMER.webp",
        url: "https://imacengineering.com/patient-warmer"
    },
    {
        id: 11,
        company: "Cataract Foot Pedal",
        title: "Cataract Foot Pedal",
        image: "../assets/CASE-STUDY-BANNER/Cataract foot padel.webp",
        url: "https://imacengineering.com/cataract-foot-pedal"
    }
    // {
    //     id: 12,
    //     company: "ZEISS",
    //     title: "Simple eyewear disinfection",
    
    //     image: "https://cdn.prod.website-files.com/5ec3efa8b380ded8f9609b83/5fb449a4ffa30d7e1bbb58fe_UVClean-gallery-06.jpg",
    //     url: "https://www.trig.com/case-studies/uvclean-product-development"
    // },
    // {
    //     id: 13,
    //     company: "BrightLoc",
    //     title: "Lighting the way to safety and security",
    
    //     image: "https://cdn.prod.website-files.com/5ec3efa8b380ded8f9609b83/5f3ac136ab7e5438909942aa_Brightloc-Hero-bike-locked.jpg",
    //     url: "https://www.trig.com/case-studies/industrial-design-bike-light-and-lock"
    // },
    // {
    //     id: 14,
    //     company: "The 4th Trimester Project",
    //     title: "A village for mothers",
    //     image: "https://cdn.prod.website-files.com/5ec3efa8b380ded8f9609b83/5f2aded5239b1924e80cdede_new-mom.jpg",
    //     url: "https://www.trig.com/case-studies/new-mom-health-ux-ui-co-design-process"
    // },
    // {
    //     id: 15,
    //     company: "No Conformity Co.",
    //     title: "Workout gear that doesn't follow the rules",
    //     image: "https://cdn.prod.website-files.com/5ec3efa8b380ded8f9609b83/5f35e9e9fa52fca3b84751a8_NOCO-Hero-Arm-Trainer.jpg",
    //     url: "https://www.trig.com/case-studies/noco-weightlifting-product-design"
    // },
    // {
    //     id: 16,
    //     company: "Tarboro Brewing Company",
    //     title: "Revitalizing a town",
    //     image: "https://cdn.prod.website-files.com/5ec3efa8b380ded8f9609b83/5f63d1a77cb34e1b630e78ef_tarboro-hero.jpg",
    //     url: "https://www.trig.com/case-studies/tarboro-brewing-company-brand-identity-label-design"
    // },
    // {
    //     id: 17,
    //     company: "ALTR ERGO",
    //     title: "Ergonomic fit for riders of all sizes",
    //     image: "https://cdn.prod.website-files.com/5ec3efa8b380ded8f9609b83/5f376b6cbf11902d33bad823_altr-ergo-hero.jpg",
    //     url: "https://www.trig.com/case-studies/altr-ergo-industrial-design"
    // },
    // {
    //     id: 18,
    //     company: "Voxelight",
    //     title: "Are you covered?",
    //     image: "https://cdn.prod.website-files.com/5ec3efa8b380ded8f9609b83/5f2dc95aa3f1ebeb775c8a8c_sunscreenr-hero-image.jpg",
    //     url: "https://www.trig.com/case-studies/sunscreenr-uv-camera-product-design"
    // },
    // {
    //     id: 19,
    //     company: "410 Medical",
    //     title: "Infusion device changes the game for rapid recovery",
    //     image: "https://cdn.prod.website-files.com/5ec3efa8b380ded8f9609b83/5f26ec1440b6dbb223ef15a4_lifeFlow-device-hero.jpg",
    //     url: "https://www.trig.com/case-studies/410-medical-lifeflow-rapid-infuser-medical-device-development"
    // },
    // {
    //     id: 20,
    //     company: "SEAL",
    //     title: "Safe swimming for all",  
    //     image: "https://cdn.prod.website-files.com/5ec3efa8b380ded8f9609b83/5f1f03db59391b0743939aa6_Seal_Webflow_Hero-1.jpg",
    //     url: "https://www.trig.com/case-studies/seal-swimsafe-monitor-system-product-development-industrial-design"
    // },
    // {
    //     id: 21,
    //     company: "Shoelaces Express",
    //     title: "Shoelaces with purpose",
    //     image: "https://cdn.prod.website-files.com/5ec3efa8b380ded8f9609b83/5f376a696e439f1bd2d328b0_shoelaces-express-hero.jpg",
    //     url: "https://www.trig.com/case-studies/shoelaces-express-brand-identity-positioning-design"
    // },
    // {
    //     id: 22,
    //     company: "VitalFlo",
    //     title: "Healthcare in action",
    //     image: "https://cdn.prod.website-files.com/5ec3efa8b380ded8f9609b83/5f1b14107aa396fcab0d6ed8_Vitalflo-hero-image.jpg",
    //     url: "https://www.trig.com/case-studies/vitalflo-physicians-portal-user-interface-design"
    // },
    // {
    //     id: 23,
    //     company: "ZEISS",
    //     title: "Screening with screens",
    //     image: "https://cdn.prod.website-files.com/5ec3efa8b380ded8f9609b83/5ec4143d2a18db73048d50a8_zeiss-hero.jpg",
    //     url: "https://www.trig.com/case-studies/zeiss-c-uvprotect"
    // },
    // {
    //     id: 24,
    //     company: "Miller Pediatric Dentistry",
    //     title: "Dentistry made fun",
    //     image: "https://cdn.prod.website-files.com/5ec3efa8b380ded8f9609b83/5ec413679f49f379fe0ef38c_miller-business-cards-collage-hero.jpg",
    //     url: "https://www.trig.com/case-studies/miller-pediatric-dentistry"
    // },
    // {
    //     id: 25,
    //     company: "OSSI",
    //     title: "Healthcare reimagined",
    //     image: "https://cdn.prod.website-files.com/5ec3efa8b380ded8f9609b83/5ec3fddfe031c033dfb56c30_OSSI-hero-image.jpg",
    //     url: "https://www.trig.com/case-studies/ossi-brand-identity-healthcare-reimagined"
    // }
];

class CaseStudiesApp {
    constructor() {
        this.gridElement = document.getElementById('caseStudiesGrid');
        
        this.init();
    }

    init() {
        this.setupEventListeners();
        this.renderCaseStudies();
    }

    setupEventListeners() {
        // Smooth scrolling for internal links
        document.addEventListener('click', (e) => {
            if (e.target.matches('a[href^="#"]')) {
                e.preventDefault();
                const target = document.querySelector(e.target.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            }
        });

        // Image lazy loading and error handling
        this.setupImageLazyLoading();
    }

    setupImageLazyLoading() {
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        imageObserver.unobserve(img);
                    }
                });
            });

            // Observe images after they're rendered
            setTimeout(() => {
                document.querySelectorAll('img[data-src]').forEach(img => {
                    imageObserver.observe(img);
                });
            }, 100);
        }
    }

    getAllCaseStudies() {
        return caseStudies;
    }

    createCaseStudyCard(study) {
        const card = document.createElement('a');
        card.className = 'case-study-card fade-in';
        card.href = study.url;
        card.rel = 'noopener noreferrer';
        
        card.innerHTML = `
            <img 
                class="case-study-image lazy" 
                data-src="${study.image}" 
                alt="${study.company} - ${study.title}"
                onerror="this.style.display='none'"
            >
            <div class="case-study-content">
                <div class="case-study-company">${study.company}</div>
                <h3 class="case-study-title">${study.title}</h3>
            </div>
        `;

        return card;
    }

    renderCaseStudies() {
        const allStudies = this.getAllCaseStudies();
        
        // Clear grid
        this.gridElement.innerHTML = '';
        
        if (allStudies.length === 0) {
            this.renderEmptyState();
            return;
        }

        // Create and append cards
        const fragment = document.createDocumentFragment();
        allStudies.forEach(study => {
            const card = this.createCaseStudyCard(study);
            fragment.appendChild(card);
        });
        
        this.gridElement.appendChild(fragment);
        
        // Setup lazy loading for new images
        this.setupImageLazyLoading();
        
        // Trigger animations
        setTimeout(() => {
            const cards = this.gridElement.querySelectorAll('.case-study-card');
            cards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 50);
            });
        }, 50);
    }

    renderEmptyState() {
        this.gridElement.innerHTML = `
            <div class="empty-state">
                <h3>No case studies found</h3>
                <p>Try selecting a different category to see more work.</p>
            </div>
        `;
    }
}

// Initialize the application when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    new CaseStudiesApp();
});

// Handle potential image loading errors gracefully
document.addEventListener('error', (e) => {
    if (e.target.tagName === 'IMG') {
        e.target.style.display = 'none';
        console.warn('Failed to load image:', e.target.src);
    }
}, true);

// Preload critical images for better performance
function preloadCriticalImages() {
    const criticalImages = caseStudies.slice(0, 6).map(study => study.image);
    criticalImages.forEach(src => {
        const link = document.createElement('link');
        link.rel = 'preload';
        link.as = 'image';
        link.href = src;
        document.head.appendChild(link);
    });
}

// Start preloading when page loads
window.addEventListener('load', preloadCriticalImages);

// slider js

class HorizontalCarousel {
    constructor() {
        this.track = document.getElementById('carouselTrack');
        this.prevBtn = document.getElementById('prevBtn');
        this.nextBtn = document.getElementById('nextBtn');
        this.indicators = document.getElementById('carouselIndicators');
        this.originalCards = document.querySelectorAll('.carousel-card');
        
        this.currentIndex = 0;
        this.cardWidth = 350; // Base card width
        this.gap = 20; // Gap between cards
        this.cardsPerView = this.calculateCardsPerView();
        this.totalOriginalCards = this.originalCards.length;
        
        this.isAnimating = false;
        this.autoScrollInterval = null;
        this.touchStartX = 0;
        this.touchEndX = 0;
        this.infiniteLoopEnabled = true;
        
        // Only initialize if carousel elements exist
        if (this.track && this.prevBtn && this.nextBtn && this.indicators) {
            this.init();
        } else {
            console.error('Carousel: Required elements not found. Check for #carouselTrack, #prevBtn, #nextBtn, #carouselIndicators');
        }
    }
    
    init() {
        this.updateCardDimensions();
        this.setupInfiniteLoop();
        this.createIndicators();
        this.bindEvents();
        this.updateCarousel();
        this.startAutoScroll();
        
        // Handle window resize
        window.addEventListener('resize', () => {
            this.updateCardDimensions();
            this.setupInfiniteLoop();
            this.updateCarousel();
        });
    }
    
    updateCardDimensions() {
        if (!this.track || !this.track.parentElement) {
            console.error('Carousel track element not found');
            return;
        }
        const containerWidth = this.track.parentElement.offsetWidth;
        const screenWidth = window.innerWidth;
        
        // Responsive card width calculation
        if (screenWidth <= 480) {
            this.cardWidth = 250;
        } else if (screenWidth <= 768) {
            this.cardWidth = 280;
        } else if (screenWidth <= 1200) {
            this.cardWidth = 300;
        } else {
            this.cardWidth = 350;
        }
        
        this.cardsPerView = this.calculateCardsPerView();
    }
    
    calculateCardsPerView() {
        if (!this.track || !this.track.parentElement) {
            return 1; // Default fallback value
        }
        const containerWidth = this.track.parentElement.offsetWidth;
        return Math.floor(containerWidth / (this.cardWidth + this.gap));
    }
    
    setupInfiniteLoop() {
        if (!this.infiniteLoopEnabled) return;
        
        // Clear existing cloned cards
        const clonedCards = this.track.querySelectorAll('[data-cloned]');
        clonedCards.forEach(card => card.remove());
        
        // Clone cards for infinite loop
        const cardCount = this.cardsPerView * 2; // Clone enough cards for smooth infinite scroll
        
        // Clone first cards and append to end
        for (let i = 0; i < cardCount; i++) {
            const originalIndex = i % this.totalOriginalCards;
            const originalCard = this.originalCards[originalIndex];
            const clonedCard = originalCard.cloneNode(true);
            clonedCard.setAttribute('data-cloned', 'end');
            this.track.appendChild(clonedCard);
        }
        
        // Clone last cards and prepend to beginning
        for (let i = 0; i < cardCount; i++) {
            const originalIndex = (this.totalOriginalCards - 1 - i % this.totalOriginalCards + this.totalOriginalCards) % this.totalOriginalCards;
            const originalCard = this.originalCards[originalIndex];
            const clonedCard = originalCard.cloneNode(true);
            clonedCard.setAttribute('data-cloned', 'start');
            this.track.insertBefore(clonedCard, this.track.firstChild);
        }
        
        // Update cards array to include cloned cards
        this.cards = this.track.querySelectorAll('.carousel-card');
        
        // Set initial position to show original cards
        this.currentIndex = cardCount;
        this.updateCarousel(false); // Update without animation
    }
    
    createIndicators() {
        this.indicators.innerHTML = '';
        const indicatorCount = this.totalOriginalCards;
        
        for (let i = 0; i < indicatorCount; i++) {
            const indicator = document.createElement('div');
            indicator.classList.add('indicator');
            if (i === 0) indicator.classList.add('active');
            
            indicator.addEventListener('click', () => {
                this.goToSlide(i);
            });
            
            this.indicators.appendChild(indicator);
        }
    }
    
    bindEvents() {
        // Navigation buttons
        this.prevBtn.addEventListener('click', () => this.prevSlide());
        this.nextBtn.addEventListener('click', () => this.nextSlide());
        
        // Touch events for mobile
        this.track.addEventListener('touchstart', (e) => this.handleTouchStart(e));
        this.track.addEventListener('touchend', (e) => this.handleTouchEnd(e));
        
        // Mouse events for desktop drag (optional)
        this.track.addEventListener('mousedown', (e) => this.handleMouseDown(e));
        
        // Hover events to pause auto-scroll
        this.track.addEventListener('mouseenter', () => this.stopAutoScroll());
        this.track.addEventListener('mouseleave', () => this.startAutoScroll());
        
        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') this.prevSlide();
            if (e.key === 'ArrowRight') this.nextSlide();
        });
    }
    
    handleTouchStart(e) {
        this.touchStartX = e.touches[0].clientX;
        this.stopAutoScroll();
    }
    
    handleTouchEnd(e) {
        this.touchEndX = e.changedTouches[0].clientX;
        this.handleSwipe();
        this.startAutoScroll();
    }
    
    handleMouseDown(e) {
        e.preventDefault();
        this.touchStartX = e.clientX;
        this.stopAutoScroll();
        
        const handleMouseMove = (moveEvent) => {
            this.touchEndX = moveEvent.clientX;
        };
        
        const handleMouseUp = () => {
            this.handleSwipe();
            this.startAutoScroll();
            document.removeEventListener('mousemove', handleMouseMove);
            document.removeEventListener('mouseup', handleMouseUp);
        };
        
        document.addEventListener('mousemove', handleMouseMove);
        document.addEventListener('mouseup', handleMouseUp);
    }
    
    handleSwipe() {
        const swipeThreshold = 50;
        const swipeDistance = this.touchStartX - this.touchEndX;
        
        if (Math.abs(swipeDistance) > swipeThreshold) {
            if (swipeDistance > 0) {
                this.nextSlide();
            } else {
                this.prevSlide();
            }
        }
    }
    
    prevSlide() {
        if (this.isAnimating) return;
        
        if (this.infiniteLoopEnabled) {
            this.currentIndex--;
            this.updateCarousel();
            this.checkInfiniteLoop();
        } else {
            if (this.currentIndex > 0) {
                this.currentIndex--;
                this.updateCarousel();
            }
        }
    }
    
    nextSlide() {
        if (this.isAnimating) return;
        
        if (this.infiniteLoopEnabled) {
            this.currentIndex++;
            this.updateCarousel();
            this.checkInfiniteLoop();
        } else {
            if (this.currentIndex < this.totalOriginalCards - this.cardsPerView) {
                this.currentIndex++;
                this.updateCarousel();
            }
        }
    }
    
    goToSlide(index) {
        if (this.isAnimating) return;
        
        if (this.infiniteLoopEnabled) {
            // Calculate the position considering cloned cards
            const clonedCardCount = this.cardsPerView * 2;
            this.currentIndex = clonedCardCount + index;
            this.updateCarousel();
        } else {
            this.currentIndex = Math.max(0, Math.min(this.totalOriginalCards - this.cardsPerView, index));
            this.updateCarousel();
        }
    }
    
    updateCarousel(animate = true) {
        if (this.isAnimating && animate) return;
        
        if (animate) {
            this.isAnimating = true;
        }
        
        // Calculate transform value
        const translateX = -(this.currentIndex * (this.cardWidth + this.gap));
        
        if (animate) {
            this.track.style.transition = 'transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
        } else {
            this.track.style.transition = 'none';
        }
        
        this.track.style.transform = `translateX(${translateX}px)`;
        
        // Update navigation buttons
        this.updateNavigationButtons();
        
        // Update indicators
        this.updateIndicators();
        
        // Reset animation flag after transition
        if (animate) {
            setTimeout(() => {
                this.isAnimating = false;
            }, 600); // Match CSS transition duration
        }
    }
    
    checkInfiniteLoop() {
        if (!this.infiniteLoopEnabled) return;
        
        const clonedCardCount = this.cardsPerView * 2;
        const totalCards = this.cards.length;
        
        setTimeout(() => {
            // If we're at the end clones, jump to beginning of original cards
            if (this.currentIndex >= totalCards - clonedCardCount) {
                this.currentIndex = clonedCardCount;
                this.updateCarousel(false);
            }
            // If we're at the start clones, jump to end of original cards
            else if (this.currentIndex < clonedCardCount) {
                this.currentIndex = totalCards - clonedCardCount - 1;
                this.updateCarousel(false);
            }
        }, 600); // Wait for animation to complete
    }
    
    updateNavigationButtons() {
        if (this.infiniteLoopEnabled) {
            // Never disable arrows in infinite loop mode
            this.prevBtn.classList.remove('disabled');
            this.nextBtn.classList.remove('disabled');
        } else {
            this.prevBtn.classList.toggle('disabled', this.currentIndex <= 0);
            this.nextBtn.classList.toggle('disabled', this.currentIndex >= this.totalOriginalCards - this.cardsPerView);
        }
    }
    
    updateIndicators() {
        const indicators = this.indicators.querySelectorAll('.indicator');
        let activeIndicatorIndex;
        
        if (this.infiniteLoopEnabled) {
            const clonedCardCount = this.cardsPerView * 2;
            const adjustedIndex = this.currentIndex - clonedCardCount;
            activeIndicatorIndex = ((adjustedIndex % this.totalOriginalCards) + this.totalOriginalCards) % this.totalOriginalCards;
        } else {
            activeIndicatorIndex = this.currentIndex;
        }
        
        indicators.forEach((indicator, index) => {
            indicator.classList.toggle('active', index === activeIndicatorIndex);
        });
    }
    
    startAutoScroll() {
        this.stopAutoScroll();
        
        // Auto-scroll every 3 seconds
        this.autoScrollInterval = setInterval(() => {
            this.nextSlide();
        }, 3000);
    }
    
    stopAutoScroll() {
        if (this.autoScrollInterval) {
            clearInterval(this.autoScrollInterval);
            this.autoScrollInterval = null;
        }
    }
    
    // Public method to manually control carousel
    destroy() {
        this.stopAutoScroll();
        // Remove event listeners if needed
        window.removeEventListener('resize', this.updateCardDimensions);
    }
}

// Initialize carousel when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    const carousel = new HorizontalCarousel();
    
    // Handle image loading for better performance
    const images = document.querySelectorAll('.carousel-card img');
    images.forEach(img => {
        img.addEventListener('load', () => {
            img.style.opacity = '1';
        });
        
        img.addEventListener('error', () => {
            // Fallback for broken images
            img.style.background = '#333';
            img.style.display = 'flex';
            img.style.alignItems = 'center';
            img.style.justifyContent = 'center';
            img.innerHTML = '<i class="fas fa-image" style="font-size: 3rem; color: #666;"></i>';
        });
    });
    
    // Intersection Observer for performance optimization
    const observerOptions = {
        root: null,
        rootMargin: '50px',
        threshold: 0.1
    };
    
    const imageObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                if (img.dataset.src) {
                    img.src = img.dataset.src;
                    img.removeAttribute('data-src');
                }
                imageObserver.unobserve(img);
            }
        });
    }, observerOptions);
    
    // Observe all images for lazy loading (if needed)
    images.forEach(img => {
        if (img.dataset.src) {
            imageObserver.observe(img);
        }
    });
});

// Export for potential module usage
if (typeof module !== 'undefined' && module.exports) {
    module.exports = HorizontalCarousel;
}

