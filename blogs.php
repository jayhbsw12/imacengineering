<?php include("header-top.php"); ?>
<meta name="robots" content="index,follow">
<title> Keep Yourself Updated on Product Design & Development </title>
<meta name="description"
  content="We publish informational, well-researched, & helpful blogs on Product Design & Development, 3D Printing, Contract Manufacturing, CAD Outsourcing, etc.">
<link rel="canonical" href="https://imacengineering.com/blogs" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Keep Yourself Updated on Product Design & Development" />
<meta property="og:url" content="https://imacengineering.com/blogs" />
<meta property="og:description"
  content="We publish informational, well-researched, & helpful blogs on Product Design & Development, 3D Printing, Contract Manufacturing, CAD Outsourcing, etc." />
<meta property="og:image" content="https://imacengineering.com/assets/image/about/img-s-28.webp" />
<meta property="og:image:type" content="image/webp" />
<meta property="og:image:alt" content="About imac" />
<meta name="keywords" content="">
<?php include("header.php"); ?>

<!-- JS flag so CSS can hide dynamic areas BEFORE first paint -->
<script>document.documentElement.classList.add('js');</script>

<!-- Minimal FOUC fix (no layout changes) -->
<style>
  /* Keep hero + grid invisible until data is injected, but reserve layout space */
  .js .custom-latest-blog-wrapper,
  .js .articles-grid {
    visibility: hidden;
    opacity: 0;
    transition: opacity .28s ease;
  }
  .js .custom-latest-blog-wrapper.is-ready,
  .js .articles-grid.is-ready {
    visibility: visible;
    opacity: 1;
  }

  /* Make card images render smoothly without shifting (doesn't alter layout structure) */
  .article-card .article-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
  }
</style>

<main class="main-container">
  <section class="content-section">
    <div class="content-box">
      <!-- Filter Buttons -->
      <nav class="filter-nav" id="category-filters" style="display:none;">
        <button class="filter-btn filter-btn--active" data-id="all">All</button>
      </nav>

      <!-- Hero Article -->
      <div class="custom-latest-blog-wrapper" style="margin-top: 150px;">
        <article class="hero-article">
          <div class="hero-image">
            <time class="hero-date">
              <span class="hero-day">21</span>
              <span class="hero-month">February<br>2025</span>
            </time>
          </div>
          <div class="hero-content">
            <h1 class="hero-title">Hard Water Hurting Your Industry? Find An Eco-friendly Solution!</h1>
            <p class="hero-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
              incididunt ut labore et dolore magna aliqua.</p>
            <div class="hero-meta">
              <div class="hero-icon"></div>
              <span class="hero-author">Vivek Donga</span>
              <span class="hero-category">Water Treatment</span>
            </div>
          </div>
        </article>
      </div>
      <!-- Article Grid -->
      <div class="articles-grid">
        <!-- Hidden template for dynamic blogs -->
        <div class="blog-listing">
          <article class="article-card" id="blog-template" style="display: none;">
            <div class="article-image">
              <img src="" alt="article grid" />
            </div>
            <time class="article-date">
              <span class="article-day">00</span>
              <!-- FIX: avoid invalid nested <time> tag, keep class the same -->
              <span class="article-meta-date">Month<br>Year</span>
            </time>
            <div class="article-content">
              <h2 class="article-title">Blog Title</h2>
              <p class="article-description">Short description</p>
              <div class="hero-meta-blog">
                <div class="hero-icon"></div>
                <span class="hero-author">Author Name</span>
                <span class="hero-category">Category</span>
              </div>
            </div>
          </article>
        </div>
      </div>
    </div>
  </section>
</main>
<script>
  const categoryApi = 'https://hbapi.hbsoftweb.com/api/frontend/categories?token=bd01414decae90b5c477217977dde3b44a8f0d32dd142f52d60e7d83d450d11b';
  const blogApiBase = 'https://hbapi.hbsoftweb.com/api/frontend/blogs?token=bd01414decae90b5c477217977dde3b44a8f0d32dd142f52d60e7d83d450d11b';

  const categoryFilters = document.getElementById('category-filters');
  const blogTemplate = document.getElementById('blog-template');
  const blogTemplateClone = blogTemplate.cloneNode(true);
  blogTemplate.remove(); // keep a clean DOM; we'll clone from the saved copy

  // Fetch and populate categories (kept identical; does NOT change display from none)
  fetch(categoryApi)
    .then(res => res.json())
    .then(json => {
      if (!json || json.isSuccessfull === false || !Array.isArray(json.data)) return;

      // Add category buttons
      json.data.forEach(cat => {
        const btn = document.createElement('button');
        btn.className = 'filter-btn';
        btn.textContent = cat.categoryName;
        btn.setAttribute('data-id', String(cat.categoryId));
        categoryFilters.appendChild(btn);
      });

      // Set click listeners (after rendering)
      document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', () => {
          document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('filter-btn--active'));
          btn.classList.add('filter-btn--active');
          const categoryId = btn.getAttribute('data-id');
          fetchBlogs(categoryId === 'all' ? null : categoryId);
        });
      });
    })
    .catch(() => { /* fail silently for filters */ });

  // Initial load
  fetchBlogs(null); // 'All' on page load

  function fetchBlogs(categoryId = null) {
    const apiUrl = categoryId ? `${blogApiBase}&categoryId=${encodeURIComponent(categoryId)}` : blogApiBase;

    // keep dynamic blocks hidden while fetching (prevents brief unstyled content)
    const wrapper = document.querySelector('.custom-latest-blog-wrapper');
    const grid = document.querySelector('.articles-grid');
    if (wrapper) wrapper.classList.remove('is-ready');
    if (grid) grid.classList.remove('is-ready');

    fetch(apiUrl)
      .then(res => res.json())
      .then(json => {
        const heroArticle = document.querySelector('.hero-article');
        const heroImageDiv = heroArticle ? heroArticle.querySelector('.hero-image') : null;
        const container = document.querySelector('.articles-grid');

        // Safety guards
        if (!container || !heroArticle) return;

        // Clear existing grid
        container.innerHTML = '';

        // Validate response
        if (!json || json.isSuccessfull === false || !Array.isArray(json.data) || json.data.length === 0) {
          heroArticle.style.display = 'none';
          // reveal blocks even if empty (avoids permanent hidden)
          if (wrapper) wrapper.classList.add('is-ready');
          if (grid) grid.classList.add('is-ready');
          return;
        }

        const blogs = json.data.slice(); // shallow copy

        // Sort blogs by publishDate in descending order (latest first)
        blogs.sort((a, b) => new Date(b.publishDate || 0) - new Date(a.publishDate || 0));

        // Show hero and set data
        const hero = blogs[0];
        heroArticle.style.display = 'flex';

        if (heroImageDiv) {
          heroImageDiv.style.backgroundImage = hero.blogImage ? `url('${hero.blogImage}')` : '';
          heroImageDiv.style.backgroundSize = 'cover';
          heroImageDiv.style.backgroundPosition = 'center';
          heroImageDiv.style.backgroundRepeat = 'no-repeat';
        }

        const [day, month, year] = formatDateParts(hero.publishDate);
        const heroDayEl = heroArticle.querySelector('.hero-day');
        const heroMonthEl = heroArticle.querySelector('.hero-month');
        const heroTitleEl = heroArticle.querySelector('.hero-title');
        const heroDescEl = heroArticle.querySelector('.hero-description');
        const heroAuthorEl = heroArticle.querySelector('.hero-author');
        const heroCategoryEl = heroArticle.querySelector('.hero-category');

        if (heroDayEl) heroDayEl.textContent = day;
        if (heroMonthEl) heroMonthEl.innerHTML = `${month}<br>${year}`;
        if (heroTitleEl) heroTitleEl.textContent = hero.blogTitle || '';
        if (heroDescEl) heroDescEl.textContent = truncate(hero.blogDescription || '', 200);
        if (heroAuthorEl) heroAuthorEl.textContent = hero.authorName || '';

        // REQUIREMENT: Do not show category anywhere
        if (heroCategoryEl) heroCategoryEl.remove();

        // Avoid stacking multiple listeners on filter clicks
        heroArticle.onclick = () => {
          window.location.href = `/blog/${hero.blogUrl}`;
        };

        // If more than 1 blog, show the rest in the grid
        if (blogs.length > 1) {
          const rest = blogs.slice(1);
          rest.forEach(blog => {
            const clone = blogTemplateClone.cloneNode(true);
            clone.id = '';
            clone.style.display = '';

            const imgEl = clone.querySelector('img');
            const titleEl = clone.querySelector('.article-title');
            const descEl = clone.querySelector('.article-description');
            const authorEl = clone.querySelector('.hero-author');
            const categoryEl = clone.querySelector('.hero-category');
            const dayEl = clone.querySelector('.article-day');
            const metaDateEl = clone.querySelector('.article-meta-date');

            const [bDay, bMonth, bYear] = formatDateParts(blog.publishDate);

            if (dayEl) dayEl.textContent = bDay;
            if (imgEl) {
              imgEl.src = blog.blogImage || '';
              imgEl.alt = blog.blogTitle || '';
              // Smooth image paint without blocking
              imgEl.loading = 'lazy';
              imgEl.decoding = 'async';
            }
            if (titleEl) titleEl.textContent = blog.blogTitle || '';
            if (descEl) descEl.textContent = truncate(blog.blogDescription || '', 150);
            if (authorEl) authorEl.textContent = blog.authorName || '';
            // REQUIREMENT: remove category from cards
            if (categoryEl) categoryEl.remove();
            if (metaDateEl) metaDateEl.innerHTML = `${bMonth}<br>${bYear}`;

            clone.addEventListener('click', () => {
              window.location.href = `/blog/${blog.blogUrl}`;
            });

            container.appendChild(clone);
          });
        }

        // Reveal after DOM updates to prevent any flash
        requestAnimationFrame(() => {
          if (wrapper) wrapper.classList.add('is-ready');
          if (grid) grid.classList.add('is-ready');
        });
      })
      .catch(err => {
        console.error('Blog fetch error:', err);
        const heroArticle = document.querySelector('.hero-article');
        if (heroArticle) heroArticle.style.display = 'none';
        const wrapper = document.querySelector('.custom-latest-blog-wrapper');
        const grid = document.querySelector('.articles-grid');
        if (wrapper) wrapper.classList.add('is-ready');
        if (grid) grid.classList.add('is-ready');
      });
  }

  function formatDateParts(dateStr) {
    const d = new Date(dateStr);
    if (isNaN(d.getTime())) {
      return ['00', 'Month', 'Year'];
    }
    const day = String(d.getDate()).padStart(2, '0');
    const month = d.toLocaleString('default', { month: 'long' });
    const year = d.getFullYear();
    return [day, month, year];
  }

  function truncate(str, max) {
    if (typeof str !== 'string') return '';
    return str.length > max ? str.slice(0, max) + '...' : str;
  }
</script>

<script src="js/blog-script.js"></script>
<script src="js/slider.js"></script>
<script src="js/slider-testimonial.js"></script>
<script src="js/logo-slider.js"></script>

<?php include("footer.php"); ?>