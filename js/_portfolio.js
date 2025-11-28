    // Portfolio data
const portfolioItems = [
    {
        id: "1",
        title: "Stylish Løft Kitchen",
        category: "Branding",
        categoryFilter: "branding",
        image: "https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&h=356",
        largeImage: "https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1200&h=800",
        description: "Modern minimalist kitchen design with clean lines and premium materials",
        height: 'normal'
    },
    {
        id: "2",
        title: "Scandic Möbler",
        category: "Package",
        categoryFilter: "package",
        image: "https://images.unsplash.com/photo-1586023492125-27b2c045efd7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&h=356",
        largeImage: "https://images.unsplash.com/photo-1586023492125-27b2c045efd7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1200&h=800",
        description: "Scandinavian furniture design with focus on functionality and minimalism",
        height: 'normal'
    },
    {
        id: "3",
        title: "Cozy Jamy Grünerløka",
        category: "3D Rendering",
        categoryFilter: "3d-rendering",
        image: "https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&h=750",
        largeImage: "https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1200&h=1800",
        description: "Cozy interior design with natural materials and warm lighting",
        height: 'tall'
    },
    {
        id: "4",
        title: "Nórdiska Hotel Apartments",
        category: "Artwork",
        categoryFilter: "artwork",
        image: "https://images.unsplash.com/photo-1571003123894-1f0594d2b5d9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&h=356",
        largeImage: "https://images.unsplash.com/photo-1571003123894-1f0594d2b5d9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1200&h=800",
        description: "Nordic hotel design with emphasis on comfort and elegance",
        height: 'normal'
    },
    {
        id: "5",
        title: "Abstract Living Room",
        category: "Concept",
        categoryFilter: "concept",
        image: "https://images.unsplash.com/photo-1586023492125-27b2c045efd7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&h=356",
        largeImage: "https://images.unsplash.com/photo-1586023492125-27b2c045efd7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1200&h=800",
        description: "Abstract conceptual living space with contemporary art elements",
        height: 'normal'
    }
];

// Global variables
let currentFilter = '*';
let lightboxCurrentIndex = 0;
let filteredItems = [...portfolioItems];

// DOM elements
const portfolioGrid = document.getElementById('portfolio-grid');
const lightboxOverlay = document.getElementById('lightbox-overlay');
const lightboxImage = document.getElementById('lightbox-image');
const lightboxCategory = document.getElementById('lightbox-category');
const lightboxTitle = document.getElementById('lightbox-title');
const lightboxDescription = document.getElementById('lightbox-description');
const lightboxCounter = document.getElementById('lightbox-counter');

// Calculate masonry layout positions like original Isotope
function calculatePositions(items) {
    const positions = {};
    const columnHeights = [0, 0, 0]; // Three columns
    const columnWidth = 32; // Each column is 32% width with 2% gap
    const gap = 2; // Gap between items in percentage

    items.forEach((item, index) => {
        // Find the shortest column
        const shortestColumnIndex = columnHeights.indexOf(Math.min(...columnHeights));
        
        // Calculate position like original Isotope layout
        const left = shortestColumnIndex * (columnWidth + gap);
        const top = columnHeights[shortestColumnIndex];
        
        // Item height based on type (matching original theme)
        const itemHeight = item.height === 'tall' ? 400 : 260;
        
        positions[item.id] = {
            left: left,
            top: top,
            opacity: 1
        };
        
        // Update column height
        columnHeights[shortestColumnIndex] += itemHeight + 30; // 30px gap like original
    });

    return positions;
}

// Apply masonry layout
function applyMasonryLayout(items) {
    const positions = calculatePositions(items);
    const allItems = document.querySelectorAll('.portfolio-item-wrap');
    
    // Calculate new container height
    const maxHeight = Math.max(...Object.values(positions).map(pos => pos.top)) + 400;
    portfolioGrid.style.height = Math.max(maxHeight, 650) + 'px';
    
    allItems.forEach(item => {
        const itemId = item.dataset.id;
        const position = positions[itemId];
        const isVisible = items.some(visibleItem => visibleItem.id === itemId);
        
        if (position && isVisible) {
            item.style.position = 'absolute';
            item.style.left = position.left + '%';
            item.style.top = position.top + 'px';
            item.style.opacity = position.opacity;
            item.style.transform = 'translateY(0)';
            item.style.width = '32%';
            item.classList.remove('hidden');
        } else {
            item.style.opacity = '0';
            item.style.transform = 'translateY(30px)';
            item.classList.add('hidden');
        }
    });
}

// Filter portfolio items
function filterPortfolio(filter) {
    currentFilter = filter;
    
    if (filter === '*') {
        filteredItems = [...portfolioItems];
    } else {
        filteredItems = portfolioItems.filter(item => item.categoryFilter === filter);
    }
    
    // Update filter buttons
    document.querySelectorAll('.filter-list a').forEach(link => {
        link.classList.remove('active');
    });
    document.querySelector([data-filter="${filter}"]).classList.add('active');
    
    // Apply masonry layout with animation
    setTimeout(() => {
        applyMasonryLayout(filteredItems);
    }, 100);
}

// Open lightbox
function openLightbox(itemId) {
    const item = portfolioItems.find(p => p.id === itemId);
    if (!item) return;
    
    lightboxCurrentIndex = portfolioItems.findIndex(p => p.id === itemId);
    
    lightboxImage.src = item.largeImage;
    lightboxImage.alt = item.title;
    lightboxCategory.textContent = item.category;
    lightboxTitle.textContent = item.title;
    lightboxDescription.textContent = item.description;
    lightboxCounter.textContent = ${lightboxCurrentIndex + 1} / ${portfolioItems.length};
    
    lightboxOverlay.style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

// Close lightbox
function closeLightbox() {
    lightboxOverlay.style.display = 'none';
    document.body.style.overflow = 'unset';
}

// Navigate lightbox
function navigateLightbox(direction) {
    if (direction === 'next') {
        lightboxCurrentIndex = (lightboxCurrentIndex + 1) % portfolioItems.length;
    } else {
        lightboxCurrentIndex = (lightboxCurrentIndex - 1 + portfolioItems.length) % portfolioItems.length;
    }
    
    const item = portfolioItems[lightboxCurrentIndex];
    lightboxImage.src = item.largeImage;
    lightboxImage.alt = item.title;
    lightboxCategory.textContent = item.category;
    lightboxTitle.textContent = item.title;
    lightboxDescription.textContent = item.description;
    lightboxCounter.textContent = ${lightboxCurrentIndex + 1} / ${portfolioItems.length};
}

// Initialize portfolio
function initPortfolio() {
    // Add event listeners for filter buttons
    document.querySelectorAll('.filter-list a').forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const filter = e.currentTarget.dataset.filter;
            filterPortfolio(filter);
        });
    });
    
    // Add event listeners for lightbox triggers
    document.querySelectorAll('.lightbox-trigger').forEach(trigger => {
        trigger.addEventListener('click', (e) => {
            e.preventDefault();
            const itemId = e.currentTarget.closest('.portfolio-item-wrap').dataset.id;
            openLightbox(itemId);
        });
    });
    
    // Lightbox event listeners
    document.querySelector('.lightbox-close').addEventListener('click', closeLightbox);
    document.querySelector('.lightbox-prev').addEventListener('click', () => navigateLightbox('prev'));
    document.querySelector('.lightbox-next').addEventListener('click', () => navigateLightbox('next'));
    
    // Close lightbox when clicking overlay
    lightboxOverlay.addEventListener('click', (e) => {
        if (e.target === lightboxOverlay) {
            closeLightbox();
        }
    });
    
    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (lightboxOverlay.style.display === 'flex') {
            switch (e.key) {
                case 'Escape':
                    closeLightbox();
                    break;
                case 'ArrowLeft':
                    navigateLightbox('prev');
                    break;
                case 'ArrowRight':
                    navigateLightbox('next');
                    break;
            }
        }
    });
    
    // Initialize masonry layout
    applyMasonryLayout(portfolioItems);
    
    // Add animation class to items after a short delay
    setTimeout(() => {
        document.querySelectorAll('.portfolio-item-wrap').forEach((item, index) => {
            setTimeout(() => {
                item.classList.add('aos-animate');
            }, index * 100);
        });
    }, 100);
}

// Responsive layout adjustment
function handleResize() {
    const width = window.innerWidth;
    
    if (width <= 768) {
        // Mobile: stack items vertically
        document.querySelectorAll('.portfolio-item-wrap').forEach((item, index) => {
            item.style.position = 'relative';
            item.style.left = '0';
            item.style.top = 'auto';
            item.style.width = '100%';
            item.style.marginBottom = '20px';
            item.style.opacity = '1';
            item.style.transform = 'translateY(0)';
            item.classList.remove('hidden');
        });
        portfolioGrid.style.height = 'auto';
    } else if (width <= 1024) {
        // Tablet: two columns
        const positions = calculatePositions(filteredItems);
        document.querySelectorAll('.portfolio-item-wrap').forEach(item => {
            const itemId = item.dataset.id;
            const position = positions[itemId];
            const isVisible = filteredItems.some(visibleItem => visibleItem.id === itemId);
            
            if (position && isVisible) {
                item.style.position = 'absolute';
                item.style.left = (position.left > 34 ? '50%' : '0%');
                item.style.top = position.top + 'px';
                item.style.width = '48%';
                item.style.opacity = position.opacity;
                item.style.transform = 'translateY(0)';
                item.classList.remove('hidden');
            } else {
                item.style.opacity = '0';
                item.classList.add('hidden');
            }
        });
    } else {
        // Desktop: full masonry layout
        applyMasonryLayout(filteredItems);
    }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', initPortfolio);

// Handle window resize