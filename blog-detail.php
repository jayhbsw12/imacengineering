<?php
// blog-detail.php

// --- Helper: safely get the blogUrl from query (supports BlogUrl or blogUrl) ---
$slug = '';
if (isset($_GET['BlogUrl']) && $_GET['BlogUrl'] !== '') {
  $slug = (string) $_GET['BlogUrl'];
} elseif (isset($_GET['blogUrl']) && $_GET['blogUrl'] !== '') {
  $slug = (string) $_GET['blogUrl'];
}
$slug = trim($slug);

// --- Server-side fetch from API (keeps token private and avoids CORS/client exposure) ---
$BLOG_DATA = null;
$api_error = null;
if ($slug !== '') {
  $apiToken = 'bd01414decae90b5c477217977dde3b44a8f0d32dd142f52d60e7d83d450d11b';
  $endpoint = 'https://hbapi.hbsoftweb.com/api/frontend/blog-by-url?blogUrl=' . rawurlencode($slug) . '&token=' . $apiToken;

  try {
    $ch = curl_init();
    curl_setopt_array($ch, [
      CURLOPT_URL => $endpoint,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_TIMEOUT => 15,
      CURLOPT_HTTPHEADER => [
        'Accept: application/json',
        // Origin header required by the API per your Postman example
        'Origin: https://imacengineering.com'
      ],
    ]);
    $resp = curl_exec($ch);
    if ($resp === false) {
      $api_error = 'Request failed: ' . curl_error($ch);
    } else {
      $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
      if ($status < 200 || $status >= 300) {
        $api_error = 'Unexpected status ' . $status;
      } else {
        $json = json_decode($resp, true);
        if (!is_array($json) || empty($json['isSuccessfull']) || empty($json['data'])) {
          $api_error = 'Malformed or unsuccessful response.';
        } else {
          // Minimal sanitisation on sections
          if (!empty($json['data']['sections']) && is_array($json['data']['sections'])) {
            foreach ($json['data']['sections'] as $idx => $sec) {
              if (isset($sec['description']) && is_string($sec['description'])) {
                // strip any <script>...</script>
                $desc = preg_replace('#<\s*script[^>]*>.*?<\s*/\s*script>#is', '', $sec['description']);
                // decode entities so CMS strings like &lt;section data-faq&gt; become real HTML
                $desc = html_entity_decode($desc, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                // strip inline on* handlers and javascript: URLs
                $desc = preg_replace('/\s+on\w+\s*=\s*(["\']).*?\1/iu', '', $desc);
                $desc = preg_replace('/\s+(href|src)\s*=\s*(["\'])\s*javascript:[\s\S]*?\2/iu', ' $1="#"', $desc);
                $json['data']['sections'][$idx]['description'] = $desc;
              }
              if (isset($sec['sectionTitle']) && is_string($sec['sectionTitle'])) {
                $json['data']['sections'][$idx]['sectionTitle'] = trim($sec['sectionTitle']);
              }
              if (empty($sec['titleTag']) || !preg_match('/^h[1-6]$/i', $sec['titleTag'])) {
                $json['data']['sections'][$idx]['titleTag'] = 'h2';
              }
            }
          }
          $BLOG_DATA = $json['data'];
        }
      }
    }
    curl_close($ch);
  } catch (Throwable $e) {
    $api_error = 'Exception: ' . $e->getMessage();
  }
}

// Fallback title parts used before/after render
$pageTitleSuffix = ($BLOG_DATA && !empty($BLOG_DATA['blogTitle'])) ? $BLOG_DATA['blogTitle'] : ($slug !== '' ? $slug : 'Blog Details');

// Include your standard head start + header
include("header-top.php"); // Make sure header-top.php opens <head> correctly

// ================== DYNAMIC SEO (HEAD) FROM API ==================
$hasBlog = is_array($BLOG_DATA) && !empty($BLOG_DATA);
$seoTitle = $hasBlog ? trim($BLOG_DATA['metaTitle'] ?: ($BLOG_DATA['blogTitle'] ?? '')) : 'Blog Details';
$seoDesc = $hasBlog ? trim($BLOG_DATA['metaDescription'] ?: ($BLOG_DATA['blogDescription'] ?? '')) : '';
$ogImage = $hasBlog ? trim($BLOG_DATA['ogImage'] ?: ($BLOG_DATA['blogImage'] ?? '')) : '';

$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'] ?? 'imacengineering.com';
$request = $_SERVER['REQUEST_URI'] ?? '/';
$currUrl = $scheme . '://' . $host . $request;

$slugVal = $hasBlog ? trim($BLOG_DATA['blogUrl'] ?? '') : '';
$canonical = $slugVal !== ''
  ? 'https://imacengineering.com/blog/' . rawurlencode($slugVal)
  : $currUrl;

$published = $hasBlog ? trim($BLOG_DATA['publishDate'] ?? '') : '';
$author = $hasBlog ? trim($BLOG_DATA['authorName'] ?? '') : '';
$robots = $hasBlog ? 'index, follow' : 'index, follow';

// NEW: derive ISO and human-readable date (UI = date-only; SEO = ISO)
$publishedISO = $published ? date('c', strtotime($published)) : '';
$publishedHuman = $published ? date('d M Y', strtotime($published)) : '';
?>
<!-- ===== Dynamic SEO for Blog Detail (from API) ===== -->
<title><?php echo htmlspecialchars($seoTitle ?: 'IMAC Engineering Blog', ENT_QUOTES, 'UTF-8'); ?></title>
<meta name="description" content="<?php echo htmlspecialchars($seoDesc, ENT_QUOTES, 'UTF-8'); ?>">
<link rel="canonical" href="<?php echo htmlspecialchars($canonical, ENT_QUOTES, 'UTF-8'); ?>">
<meta name="robots" content="index, follow">

<meta property="og:type" content="article">
<meta property="og:site_name" content="IMAC Engineering">
<meta property="og:title" content="<?php echo htmlspecialchars($seoTitle, ENT_QUOTES, 'UTF-8'); ?>">
<meta property="og:description" content="<?php echo htmlspecialchars($seoDesc, ENT_QUOTES, 'UTF-8'); ?>">
<meta property="og:url" content="<?php echo htmlspecialchars($canonical, ENT_QUOTES, 'UTF-8'); ?>">
<?php if ($ogImage): ?>
  <meta property="og:image" content="<?php echo htmlspecialchars($ogImage, ENT_QUOTES, 'UTF-8'); ?>">
  <!-- Preload hero to avoid background pop-in -->
  <link rel="preload" as="image" href="<?php echo htmlspecialchars($ogImage, ENT_QUOTES, 'UTF-8'); ?>">
<?php endif; ?>
<?php if ($publishedISO): ?>
  <meta property="article:published_time" content="<?php echo htmlspecialchars($publishedISO, ENT_QUOTES, 'UTF-8'); ?>">
<?php endif; ?>
<?php if ($author): ?>
  <meta property="article:author" content="<?php echo htmlspecialchars($author, ENT_QUOTES, 'UTF-8'); ?>">
<?php endif; ?>

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo htmlspecialchars($seoTitle, ENT_QUOTES, 'UTF-8'); ?>">
<meta name="twitter:description" content="<?php echo htmlspecialchars($seoDesc, ENT_QUOTES, 'UTF-8'); ?>">
<?php if ($ogImage): ?>
  <meta name="twitter:image" content="<?php echo htmlspecialchars($ogImage, ENT_QUOTES, 'UTF-8'); ?>">
<?php endif; ?>

<!-- Font Awesome for FAQ chevrons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.2/css/all.min.css">

<!-- Sticky sidebar CSS for Table of Contents -->
<link rel="stylesheet" href="css/blog-detail-sidebar.css">
<?php
// ===== Build JSON-LD here and let header.php print it via $JSON_LD_SCRIPTS =====
$JSON_LD_SCRIPTS = [];

if ($hasBlog) {
  $publisherLogo = "https://imacengineering.com/assets/image/logo.svg";
  $images = [];
  if (!empty($ogImage)) {
    $images[] = $ogImage;
  }

  $ld = [
    "@context" => "https://schema.org",
    "@type" => "BlogPosting",
    "mainEntityOfPage" => [
      "@type" => "WebPage",
      "@id" => $canonical
    ],
    "headline" => $seoTitle,
    "description" => $seoDesc,
    "image" => $images,
    "author" => [
      "@type" => "Person",
      "name" => $author ?: "IMAC Engineering"
    ],
    "publisher" => [
      "@type" => "Organization",
      "name" => "IMAC Engineering",
      "logo" => [
        "@type" => "ImageObject",
        "url" => $publisherLogo
      ]
    ],
    // Use ISO here (keeps time for SEO), UI shows date-only below
    "datePublished" => $publishedISO ?: null,
    "dateModified" => date('c'),
    "url" => $canonical
  ];
  $JSON_LD_SCRIPTS[] = json_encode($ld, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
}
?>
<!-- ===== /Dynamic SEO ===== -->

<?php /* ===== Smooth page fade-in (scoped to this template) ===== */ ?>
<script>
  // Add a flag to <html> ASAP (executes only on this template because it's in this file)
  document.documentElement.classList.add('pgfade-init-blogdetail');
</script>
<style>
  @media (prefers-reduced-motion: no-preference) {
    html.pgfade-init-blogdetail body {
      opacity: 0;
    }

    html.pgfaderdy-blogdetail body {
      opacity: 1;
      transition: opacity 220ms ease-out;
    }
  }

  @media (prefers-reduced-motion: reduce) {
    html.pgfade-init-blogdetail body {
      opacity: 1;
    }
  }
</style>
<script>
  // Reveal on DOM ready (faster than waiting for all assets)
  document.addEventListener('DOMContentLoaded', function () {
    document.documentElement.classList.add('pgfaderdy-blogdetail');
  });
</script>
<?php /* ===== /Smooth page fade-in ===== */ ?>

<?php
// Now continue the rest of your <head> / body as-is
include("header.php");
?>

<?php
// Server-side hero BG to stop pop-in (no layout change)
$heroInlineStyle = '';
if (!empty($ogImage)) {
  $heroInlineStyle = "background-image:url('" . htmlspecialchars($ogImage, ENT_QUOTES, 'UTF-8') . "');background-size:cover;background-position:center;";
} elseif ($hasBlog && !empty($BLOG_DATA['blogImage'])) {
  $heroInlineStyle = "background-image:url('" . htmlspecialchars($BLOG_DATA['blogImage'], ENT_QUOTES, 'UTF-8') . "');background-size:cover;background-position:center;";
}
?>

<section class="hero-section-blog-detail" style="<?php echo $heroInlineStyle; ?>">
  <div class="text-content-blog-detail">
    <h1 id="hero-title">
      <?php echo htmlspecialchars($BLOG_DATA['blogTitle'] ?? 'Loading title...', ENT_QUOTES, 'UTF-8'); ?>
    </h1>
    <p id="hero-subtitle">
      <?php echo htmlspecialchars($BLOG_DATA['metaDescription'] ?? 'Loading subtitle...', ENT_QUOTES, 'UTF-8'); ?>
    </p>
  </div>
</section>

<div class="main-container-blog-detail">
  <div class="wrapper">
    <header class="article-header">
      <div class="header-meta">
        <div class="author-info">
          <div class="author-icon"></div>
          <span class="author-name"
            id="author-name"><?php echo htmlspecialchars($BLOG_DATA['authorName'] ?? 'Loading author...', ENT_QUOTES, 'UTF-8'); ?></span>
        </div>
        <div class="date-info">
          <div class="date-icon"></div>
          <span class="date" id="publish-date">
            <?php echo htmlspecialchars($publishedHuman ?: 'Loading date...', ENT_QUOTES, 'UTF-8'); ?>
          </span>
        </div>
        <div class="read-time">
          <div class="time-icon"></div>
          <span class="time">3 min</span>
        </div>
      </div>
      <div class="header-divider"></div>
    </header>

    <main class="content-wrapper-blog">
      <aside class="sidebar" id="tableOfContents">
        <div class="sidebar-sticky-wrapper">
          <nav class="toc-nav">
            <h3 class="toc-title" id="toc-title">Table of Contents</h3>
            <ul class="toc-list" id="toc-list">
              <!-- Dynamic TOC items -->
            </ul>
          </nav>
        </div>
      </aside>

      <article class="main-article">
        <section class="article-content" id="article-sections">
          <!-- Server-side render sections to ensure content without JS -->
          <?php
          if ($BLOG_DATA && !empty($BLOG_DATA['sections']) && is_array($BLOG_DATA['sections'])) {
            $i = 0;
            foreach ($BLOG_DATA['sections'] as $sec) {
              $i++;
              $id = 'section-' . ($i - 1);
              $titleTag = preg_match('/^h[1-6]$/i', $sec['titleTag'] ?? '') ? strtolower($sec['titleTag']) : 'h2';
              $secTitle = htmlspecialchars($sec['sectionTitle'] ?? '', ENT_QUOTES, 'UTF-8');
              $desc = $sec['description'] ?? '';
              echo '<section id="' . htmlspecialchars($id, ENT_QUOTES, 'UTF-8') . '">';
              echo '<' . $titleTag . ' class="solution-title">' . $secTitle . '</' . $titleTag . '>';
              // IMPORTANT: $desc is already entity-decoded and sanitised above; output raw so <section data-faq> works
              echo '<div class="solution-description">' . $desc . '</div>';
              echo '</section>';
            }
          }
          ?>
        </section>

        <div class="content-divider"></div>

        <section class="author-section">
          <div class="author-card">
            <div class="author-content">
              <div class="author-image">
                <img id="author-img"
                  src="<?php echo !empty($BLOG_DATA['authorImage']) ? htmlspecialchars($BLOG_DATA['authorImage'], ENT_QUOTES, 'UTF-8') : 'assets/images/author-placeholder.png'; ?>"
                  alt="Author" class="author-avatar" />
              </div>
              <div class="author-details">
                <h4 class="author-title" id="author-name-card">
                  <?php echo htmlspecialchars($BLOG_DATA['authorName'] ?? 'Loading author...', ENT_QUOTES, 'UTF-8'); ?>
                </h4>
                <p class="author-role">CEO & Technical Director</p>
                <p class="author-bio" id="author-bio">
                  Keshav Bhavsar is the CEO and Technical Director of iMAC Design &amp; Engineering Services,
                  bringing over 7 years of expertise in mechanical design and product development. he has
                  successfully led end-to-end product development projects across industries including
                  consumer electronics, medical devices, automotive, and industrial machinery.
                  Under his leadership, iMAC has grown into a trusted partner for startups
                  and enterprises worldwide, delivering innovative design, prototyping,
                  and manufacturing solutions.
                </p>
              </div>
            </div>
          </div>
        </section>
      </article>
    </main>
  </div>
</div>

<?php
// Prepare data for client-side hydration (no token, safe JSON)
$BLOG_DATA_JSON = json_encode($BLOG_DATA, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
$PAGE_TITLE = htmlspecialchars($pageTitleSuffix, ENT_QUOTES, 'UTF-8');
?>

<!-- Strong marker-hiding + tidy FAQ UX without touching site layout -->
<style>
  /* Force-hide native disclosure arrows (prevents double icons) */
  #article-sections .solution-description section[data-faq] details>summary {
    list-style: none;
  }

  #article-sections .solution-description section[data-faq] details>summary::-webkit-details-marker {
    display: none !important;
  }

  #article-sections .solution-description section[data-faq] details>summary::marker {
    content: "" !important;
    font-size: 0 !important;
  }

  /* --- NEW: Prevent FOUC of FAQ answers before JS enhancement --- */
  #article-sections .solution-description section[data-faq]:not(.faq-ready) details>*:not(summary) {
    display: none;
  }

  /* Clean spacing & hover affordance */
  #article-sections .solution-description section[data-faq] details {
    border-top: 1px solid #e8e8e8;
    background: #fff;
  }

  #article-sections .solution-description section[data-faq] details:first-of-type {
    border-top: none;
  }

  #article-sections .solution-description section[data-faq] details:last-child {
    border-bottom: 1px solid #e8e8e8;
  }

  #article-sections .solution-description section[data-faq] details>summary {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    padding: 14px 0;
    font-size: 18px;
    font-weight: 600;
    cursor: pointer;
  }

  #article-sections .solution-description section[data-faq] details>summary:hover {
    color: #ff4612;
  }

  /* FA chevron size + reserve width to avoid jiggle */
  #article-sections .solution-description section[data-faq] .faq-fa-icon {
    font-size: 1.1rem;
    line-height: 1;
    margin-left: .5rem;
    transition: transform .25s ease;
    width: 1.1rem;
    /* reserve space */
    min-width: 1.1rem;
    /* reserve space */
    text-align: right;
  }

  #article-sections .solution-description section[data-faq] .faq-fa-icon.open {
    transform: rotate(180deg);
  }

  /* Animated answer body (applied post-enhancement) */
  #article-sections .solution-description section[data-faq] .faq-body {
    overflow: hidden;
    max-height: 0;
    opacity: 0;
    transition: max-height .32s ease, opacity .2s ease;
    color: #555;
    line-height: 1.7;
    padding: 0 0 6px 0;
  }
</style>

<script>
  // Embed the already-fetched data (null if not available)
  const BLOG_DATA = <?php echo $BLOG_DATA_JSON !== false ? $BLOG_DATA_JSON : 'null'; ?>;

  (function hydrate() {
    const hasData = !!BLOG_DATA;

    // Elements
    const heroSection = document.querySelector(".hero-section-blog-detail");
    const heroTitle = document.getElementById("hero-title");
    const heroSubtitle = document.getElementById("hero-subtitle");
    const authorNameA = document.getElementById("author-name");
    const authorNameB = document.getElementById("author-name-card");
    const authorImg = document.getElementById("author-img");
    const publishDate = document.getElementById("publish-date");
    const tocList = document.getElementById("toc-list");
    const articleSecs = document.getElementById("article-sections");

    if (!hasData) {
      if (heroTitle) heroTitle.textContent = "Post not found";
      if (heroSubtitle) heroSubtitle.textContent = "We couldn't load this article. Please check the URL.";
      if (publishDate) publishDate.textContent = "";
      if (tocList) tocList.innerHTML = "";
      return;
    }

    // Hero texts
    if (heroTitle && BLOG_DATA.blogTitle) heroTitle.textContent = BLOG_DATA.blogTitle;
    if (heroSubtitle && BLOG_DATA.metaDescription) heroSubtitle.textContent = BLOG_DATA.metaDescription;

    // (Hero background is now set server-side to avoid pop-in)

    // Author & date
    if (authorNameA && BLOG_DATA.authorName) authorNameA.textContent = BLOG_DATA.authorName;
    if (authorNameB && BLOG_DATA.authorName) authorNameB.textContent = BLOG_DATA.authorName;

    // Helper: convert any incoming publishDate to DATE-ONLY (e.g., 06 Oct 2025)
    function toDateOnly(input) {
      if (!input) return "";
      const d1 = new Date(input);
      if (!isNaN(d1)) {
        return d1.toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' });
      }
      const part = String(input).split(/[T\s]/)[0];
      const d2 = new Date(part);
      if (!isNaN(d2)) {
        return d2.toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' });
      }
      return part;
    }
    if (publishDate && BLOG_DATA.publishDate) {
      publishDate.textContent = toDateOnly(BLOG_DATA.publishDate);
    }

    // Author image fallback
    if (authorImg) {
      if (BLOG_DATA.authorImage) {
        authorImg.src = BLOG_DATA.authorImage;
      } else if (!authorImg.getAttribute('src')) {
        authorImg.src = 'assets/images/author-placeholder.png';
      }
    }

    // TOC links for server-rendered sections
    if (tocList) tocList.innerHTML = "";
    const sectionEls = articleSecs ? articleSecs.querySelectorAll("section[id^='section-']") : [];
    const sections = Array.isArray(BLOG_DATA.sections) ? BLOG_DATA.sections : [];
    if (sectionEls.length && tocList) {
      sectionEls.forEach((sectionEl, idx) => {
        const secData = sections[idx] || null;
        const title = (secData && secData.sectionTitle) ? secData.sectionTitle : ("Section " + (idx + 1));
        const li = document.createElement("li");
        const a = document.createElement("a");
        a.href = "#" + sectionEl.id; // preserve query string in URL
        a.className = "toc-link";
        a.textContent = title;
        li.appendChild(a);
        tocList.appendChild(li);
      });
    }

    // =========================
    // FAQ: Cleanup + Enhancement + JSON-LD (for ANY section with data-faq)
    // =========================

    function cleanupFaqMarkup(container) {
      if (!container) return;
      // remove empty <p>
      container.querySelectorAll("p").forEach(p => {
        const text = (p.textContent || "").replace(/\u00A0/g, " ").trim();
        if (!text && p.children.length === 0) p.remove();
      });
      // unwrap <p> that wrap a single block node
      container.querySelectorAll("p").forEach(p => {
        if (p.children.length === 1) {
          const child = p.firstElementChild;
          if (!child) return;
          const tag = child.tagName;
          if (["DETAILS", "SECTION", "DIV", "SUMMARY"].includes(tag)) {
            p.replaceWith(child);
          }
        }
      });
    }

    // Animate helpers
    function getBody(detailsEl) {
      let body = detailsEl.querySelector(".answer");
      if (!body) {
        body = Array.from(detailsEl.children).find(el =>
          el.tagName !== "SUMMARY" &&
          el.tagName !== "SCRIPT" &&
          !(el.tagName === "P" && (el.textContent || "").trim() === "")
        );
      }
      if (!body) return null;
      body.classList.add("faq-body");
      body.style.overflow = "hidden";
      body.style.transition = "max-height 320ms ease, opacity 200ms ease";
      return body;
    }
    function openItem(d) {
      const body = getBody(d);
      const icon = d.querySelector(".faq-fa-icon");
      if (!body) return;
      body.style.maxHeight = body.scrollHeight + "px";
      body.style.opacity = "1";
      if (icon) icon.classList.add("open");
      d.setAttribute("open", "");
      const summary = d.querySelector("summary");
      if (summary) summary.setAttribute("aria-expanded", "true");
    }
    function closeItem(d) {
      const body = d.querySelector(".faq-body") || getBody(d);
      const icon = d.querySelector(".faq-fa-icon");
      if (!body) return;
      body.style.maxHeight = body.scrollHeight + "px";
      void body.getBoundingClientRect();
      body.style.maxHeight = "0px";
      body.style.opacity = "0";
      if (icon) icon.classList.remove("open");
      d.removeAttribute("open");
      const summary = d.querySelector("summary");
      if (summary) summary.setAttribute("aria-expanded", "false");
    }

    // Enhance ONE faq container (single-open behaviour inside that container)
    function enhanceOneFaqContainer(faqContainer) {
      if (!faqContainer) return;

      cleanupFaqMarkup(faqContainer);

      const items = Array.from(faqContainer.querySelectorAll("details"));
      if (!items.length) {
        // even if empty, mark ready so initial CSS un-hides container structure
        faqContainer.classList.add("faq-ready");
        return;
      }

      items.forEach((d) => {
        const summary = d.querySelector("summary");
        if (!summary) return;

        if (!summary.querySelector(".faq-fa-icon")) {
          const i = document.createElement("i");
          i.className = "fa-solid fa-chevron-down faq-fa-icon";
          i.setAttribute("aria-hidden", "true");
          summary.appendChild(i);
        }

        // initial states
        if (d.hasAttribute("open")) openItem(d); else closeItem(d);

        // single-open within this container
        d.addEventListener("toggle", () => {
          if (d.open) {
            items.forEach(other => { if (other !== d && other.open) closeItem(other); });
            openItem(d);
          } else {
            closeItem(d);
          }
        });
      });

      // if multiple initially open, keep only the first open
      const initiallyOpen = items.filter(d => d.hasAttribute("open"));
      if (initiallyOpen.length > 1) {
        initiallyOpen.slice(1).forEach(closeItem);
        openItem(initiallyOpen[0]);
      }

      // Mark as ready so CSS stops hiding answers
      faqContainer.classList.add("faq-ready");
    }

    // Enhance ALL faq containers present in the article
    function enhanceAllFaqs(root) {
      if (!root) return [];
      const allFaqs = Array.from(root.querySelectorAll(".solution-description section[data-faq]"));
      allFaqs.forEach(enhanceOneFaqContainer);
      return allFaqs;
    }

    // Extract QA pairs from ALL faq containers for JSON-LD
    function extractFaqPairsFromAll(root) {
      const out = [];
      if (!root) return out;

      const allFaqs = Array.from(root.querySelectorAll(".solution-description section[data-faq]"));
      allFaqs.forEach(faqContainer => {
        cleanupFaqMarkup(faqContainer);
        faqContainer.querySelectorAll("details").forEach((d) => {
          const sum = d.querySelector("summary");
          const q = sum ? (sum.textContent || "").trim() : "";
          let ans = d.querySelector(".answer");
          if (!ans) {
            ans = Array.from(d.children).find(el => el.tagName !== "SUMMARY" && el.tagName !== "SCRIPT");
          }
          const aHtml = ans ? (ans.innerHTML || "").trim() : "";
          if (q && aHtml) out.push({ q, a: aHtml });
        });
      });

      // de-dup
      const uniq = [];
      const seen = new Set();
      out.forEach(({ q, a }) => {
        const key = q + "|" + a;
        if (!seen.has(key)) { seen.add(key); uniq.push({ q, a }); }
      });
      return uniq;
    }

    function injectFaqJsonLd(pairs) {
      if (!pairs || !pairs.length) return;
      try {
        const data = {
          "@context": "https://schema.org",
          "@type": "FAQPage",
          "mainEntity": pairs.map(p => ({
            "@type": "Question",
            "name": (function stripHtml(html) {
              const d = document.createElement("div");
              d.innerHTML = html || "";
              return (d.textContent || d.innerText || "").trim();
            })(p.q),
            "acceptedAnswer": { "@type": "Answer", "text": p.a }
          }))
        };
        document.querySelectorAll('script[data-jsonld="faq"]').forEach(s => s.remove());
        const s = document.createElement("script");
        s.type = "application/ld+json";
        s.setAttribute("data-jsonld", "faq");
        s.textContent = JSON.stringify(data);
        document.head.appendChild(s);
      } catch (e) {
        console.warn("FAQ JSON-LD inject failed", e);
      }
    }

    // --- run on the current page ---
    enhanceAllFaqs(articleSecs);
    const faqPairs = extractFaqPairsFromAll(articleSecs);
    if (faqPairs.length) injectFaqJsonLd(faqPairs);

  })();
</script>

<!-- Keep your existing scripts; no functional changes needed -->
<script src="js/blog-script.js"></script>
<script src="js/slider.js"></script>
<script src="js/slider-testimonial.js"></script>
<script src="js/logo-slider.js"></script>
<script src="js/portfolio.js"></script>

<?php include("footer.php"); ?>