document.addEventListener('DOMContentLoaded', function() {
    const logoColumns = document.querySelectorAll('.logo-column');
    
    // Clone logo items for seamless loop
    logoColumns.forEach(column => {
        const items = column.querySelectorAll('.logo-item');
        items.forEach(item => {
            const clone = item.cloneNode(true);
            column.appendChild(clone);
        });
    });
    
    // Start animations
    logoColumns.forEach(column => {
        if (column.classList.contains('slide-up')) {
            column.style.animationName = 'slideUp';
        } else if (column.classList.contains('slide-down')) {
            column.style.animationName = 'slideDown';
        }
    });
});
