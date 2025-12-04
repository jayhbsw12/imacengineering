<?php /* ---- Asset version for long-cache busting (auto from latest local asset filemtime) ---- */ ?>
<?php if (!defined('ASSET_VERSION')) {
   // Start with CSS/JS in project root (common assets folders)
   $assetFiles = [];
   $cssFiles = glob(__DIR__ . '/css/*.css') ?: [];
   $jsFiles = glob(__DIR__ . '/js/*.js') ?: [];
   $assetFiles = array_merge($assetFiles, $cssFiles, $jsFiles);

   // Also include common assets (images/fonts) under the `assets/` folder recursively
   $assetDir = __DIR__ . '/assets';
   if (is_dir($assetDir)) {
      $rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($assetDir));
      foreach ($rii as $file) {
         if ($file->isFile()) {
            $ext = strtolower(pathinfo($file->getFilename(), PATHINFO_EXTENSION));
            // track only file types that matter for caching/versioning
            if (in_array($ext, ['css','js','png','jpg','jpeg','webp','avif','svg','woff2','woff','ttf','eot','otf','ico'])) {
               $assetFiles[] = $file->getPathname();
            }
         }
      }
   }

   $latest = 0;
   foreach ($assetFiles as $f) {
      $t = @filemtime($f);
      if ($t && $t > $latest) $latest = $t;
   }

   // If we found any file mtimes use the latest timestamp, otherwise fall back to a manual version
   if ($latest) {
      define('ASSET_VERSION', $latest);
   } else {
      define('ASSET_VERSION', '2025.10.29.1');
   }
} ?>

<!-- ================= PERFORMANCE OPTIMISATIONS (non-visual) ================= -->
<!-- Preconnects / DNS to speed up connections without affecting layout -->
<link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
<link rel="preconnect" href="https://code.jquery.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="dns-prefetch" href="//hbapi.hbsoftweb.com">
<link rel="dns-prefetch" href="//calendly.com">
<link rel="dns-prefetch" href="//assets.calendly.com">
<link rel="dns-prefetch" href="//notifier-configs.airbrake.io">

<!-- Google Fonts: Poppins -->
<link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap">

<!-- ----------------------------------------------------------------------- >
<!-- Background overlay images: prefetch for later use -->
<link rel="prefetch" as="image" href="/assets/image/overlay-background.avif" type="image/avif">
<link rel="prefetch" as="image" href="/assets/image/overlay-background.webp" type="image/webp">
<!-- ----------------------------------------------------------------------- >

<!-- Default-defer shim: any created <script> without async/defer becomes defer by default -->
<script>
   (function () {
      const M = document.createElement; Document.prototype.createElement = function (tag) {
         const el = M.call(this, tag);
         if (tag === 'SCRIPT' && !el.hasAttribute('async') && !el.hasAttribute('defer')) {
            el.setAttribute('defer', '');
         }
         return el;
      };
   })();
</script>
<!-- ======================================================================== -->

<!-- Core, render-critical CSS (apply immediately to prevent FOUC) -->
<link rel="preload" as="style" href="/css/reset.css?v=<?= ASSET_VERSION ?>">
<link rel="stylesheet" href="/css/reset.css?v=<?= ASSET_VERSION ?>">

<link rel="preload" as="style" href="/css/variables.css?v=<?= ASSET_VERSION ?>">
<link rel="stylesheet" href="/css/variables.css?v=<?= ASSET_VERSION ?>">

<link rel="preload" as="style" href="/css/layout.css?v=<?= ASSET_VERSION ?>">
<link rel="stylesheet" href="/css/layout.css?v=<?= ASSET_VERSION ?>">

<link rel="preload" as="style" href="/css/header.css?v=<?= ASSET_VERSION ?>">
<link rel="stylesheet" href="/css/header.css?v=<?= ASSET_VERSION ?>">

<link rel="preload" as="style" href="/css/style.min.css?v=<?= ASSET_VERSION ?>">
<link rel="stylesheet" href="/css/style.min.css?v=<?= ASSET_VERSION ?>">

<!-- Promote popup.css to render-critical so it starts hidden and doesn’t flash -->
<link rel="preload" as="style" href="/css/popup.css?v=<?= ASSET_VERSION ?>">
<link rel="stylesheet" href="/css/popup.css?v=<?= ASSET_VERSION ?>">

<noscript>
   <link rel="stylesheet" href="/css/reset.css?v=<?= ASSET_VERSION ?>">
   <link rel="stylesheet" href="/css/variables.css?v=<?= ASSET_VERSION ?>">
   <link rel="stylesheet" href="/css/layout.css?v=<?= ASSET_VERSION ?>">
   <link rel="stylesheet" href="/css/header.css?v=<?= ASSET_VERSION ?>">
   <link rel="stylesheet" href="/css/style.min.css?v=<?= ASSET_VERSION ?>">
   <link rel="stylesheet" href="/css/popup.css?v=<?= ASSET_VERSION ?>">
</noscript>

<!-- Non-critical CSS (loads without blocking render) -->
<link rel="preload" as="style" href="/css/components.css?v=<?= ASSET_VERSION ?>">
<link rel="stylesheet" href="/css/components.css?v=<?= ASSET_VERSION ?>" media="print" onload="this.media='all'">
<link rel="preload" as="style" href="/css/responsive.css?v=<?= ASSET_VERSION ?>">
<link rel="stylesheet" href="/css/responsive.css?v=<?= ASSET_VERSION ?>" media="print" onload="this.media='all'">
<link rel="stylesheet" href="/css/slider.css?v=<?= ASSET_VERSION ?>" media="print" onload="this.media='all'">
<link rel="stylesheet" href="/css/counter.css?v=<?= ASSET_VERSION ?>" media="print" onload="this.media='all'">
<link rel="stylesheet" href="/css/industries.css?v=<?= ASSET_VERSION ?>" media="print" onload="this.media='all'">
<!-- <link rel="stylesheet" href="/css/insights.css?v=<?= ASSET_VERSION ?>" media="print" onload="this.media='all'"> -->
<link rel="stylesheet" href="/css/logo-slider.css?v=<?= ASSET_VERSION ?>" media="print" onload="this.media='all'">
<!-- <link rel="stylesheet" href="/css/portfolio-n.css?v=<?= ASSET_VERSION ?>" media="print" onload="this.media='all'"> -->
<link rel="stylesheet" href="/css/testimonial.css?v=<?= ASSET_VERSION ?>" media="print" onload="this.media='all'">
<link rel="stylesheet" href="/css/service-hero.css?v=<?= ASSET_VERSION ?>" media="print" onload="this.media='all'">
<link rel="stylesheet" href="/css/banner-logos.css?v=<?= ASSET_VERSION ?>" media="print" onload="this.media='all'">
<link rel="stylesheet" href="/css/service-responsive.css?v=<?= ASSET_VERSION ?>" media="print" onload="this.media='all'">
<link rel="stylesheet" href="/css/cad-outsourcing-service.css?v=<?= ASSET_VERSION ?>" media="print"
   onload="this.media='all'">
<link rel="stylesheet" href="/css/kiosk.css?v=<?= ASSET_VERSION ?>" media="print" onload="this.media='all'">

<noscript>
   <link rel="stylesheet" href="/css/components.css?v=<?= ASSET_VERSION ?>">
   <link rel="stylesheet" href="/css/responsive.css?v=<?= ASSET_VERSION ?>">
   <link rel="stylesheet" href="/css/slider.css?v=<?= ASSET_VERSION ?>">
   <link rel="stylesheet" href="/css/counter.css?v=<?= ASSET_VERSION ?>">
   <link rel="stylesheet" href="/css/industries.css?v=<?= ASSET_VERSION ?>">
   <!-- <link rel="stylesheet" href="/css/insights.css?v=<?= ASSET_VERSION ?>"> -->
   <link rel="stylesheet" href="/css/logo-slider.css?v=<?= ASSET_VERSION ?>">
   <!-- <link rel="stylesheet" href="/css/portfolio-n.css?v=<?= ASSET_VERSION ?>"> -->
   <link rel="stylesheet" href="/css/testimonial.css?v=<?= ASSET_VERSION ?>">
   <link rel="stylesheet" href="/css/service-hero.css?v=<?= ASSET_VERSION ?>">
   <link rel="stylesheet" href="/css/banner-logos.css?v=<?= ASSET_VERSION ?>">
   <link rel="stylesheet" href="/css/service-responsive.css?v=<?= ASSET_VERSION ?>">
   <link rel="stylesheet" href="/css/cad-outsourcing-service.css?v=<?= ASSET_VERSION ?>">
   <link rel="stylesheet" href="/css/kiosk.css?v=<?= ASSET_VERSION ?>">
</noscript>

<!-- Swiper CSS (only if used on this page) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" media="print"
   onload="this.media='all'">
<noscript>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
</noscript>

<!-- Font Awesome (CDN) -->
<link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" media="print"
   onload="this.media='all'">
<noscript>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</noscript>

<!-- Add THIS right after the FA CSS links -->
<link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/webfonts/fa-solid-900.woff2"
   as="font" type="font/woff2" crossorigin>
<link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/webfonts/fa-regular-400.woff2"
   as="font" type="font/woff2" crossorigin>
<link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/webfonts/fa-brands-400.woff2"
   as="font" type="font/woff2" crossorigin>

<style>
   /* Override FA to add font-display without changing your markup */
   @font-face {
      font-family: "Font Awesome 6 Free";
      font-style: normal;
      font-weight: 900;
      font-display: swap;
      src: url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/webfonts/fa-solid-900.woff2") format("woff2");
   }

   @font-face {
      font-family: "Font Awesome 6 Free";
      font-style: normal;
      font-weight: 400;
      font-display: swap;
      src: url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/webfonts/fa-regular-400.woff2") format("woff2");
   }

   @font-face {
      font-family: "Font Awesome 6 Brands";
      font-style: normal;
      font-weight: 400;
      font-display: swap;
      src: url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/webfonts/fa-brands-400.woff2") format("woff2");
   }
</style>


<!-- Move this out of the render path -->
<script src="/js/popup.js?v=<?= ASSET_VERSION ?>" defer></script>

<?php
// Check if the current page is a blog page (blogs list)
if (basename($_SERVER['PHP_SELF']) == 'blogs.php') {
    echo '<link rel="preload" as="style" href="/css/blog-css/blog-components.css?v=' . ASSET_VERSION . '" onload="this.onload=null;this.rel=\'stylesheet\'">';
    echo '<link rel="preload" as="style" href="/css/blog-css/blog-layout.css?v=' . ASSET_VERSION . '" onload="this.onload=null;this.rel=\'stylesheet\'">';
    echo '<link rel="preload" as="style" href="/css/blog-css/main-blog.css?v=' . ASSET_VERSION . '" onload="this.onload=null;this.rel=\'stylesheet\'">';
    echo '<noscript>
                <link rel="stylesheet" href="/css/blog-css/blog-components.css?v=' . ASSET_VERSION . '">
                <link rel="stylesheet" href="/css/blog-css/blog-layout.css?v=' . ASSET_VERSION . '">
                <link rel="stylesheet" href="/css/blog-css/main-blog.css?v=' . ASSET_VERSION . '">
             </noscript>';
}
?>

<?php
// Blog detail pages under /blog/...
$currentPath = $_SERVER['REQUEST_URI'];
if (strpos($currentPath, '/blog/') === 0) {
   echo '<link rel="preload" as="style" href="/css/blog-css/main-blog-detail.css?v=' . ASSET_VERSION . '" onload="this.onload=null;this.rel=\'stylesheet\'">';
   echo '<noscript><link rel="stylesheet" href="/css/blog-css/main-blog-detail.css?v=' . ASSET_VERSION . '"></noscript>';
}
?>

<?php
// Case-study detail by specific slugs or privacy-policy (as per your list)
$pages = ['the-journey-of-nox-advaita.php', 'gynec-bed-by-karma.php', 'ev-scooter-development.php', 'universal-IR-blaster.php', 'gaming-headphones.php', 'pill-cap.php', 'centrifuge-machine.php', 'portable-caravan-fan.php', 'advanced-fire-detection-system.php', 'patient-warmer.php', 'cataract-foot-pedal.php', 'privacy-policy.php'];

if (in_array(basename($_SERVER['PHP_SELF']), $pages)) {
   echo '<link rel="preload" as="style" href="/css/case-study-detail.css?v=' . ASSET_VERSION . '" onload="this.onload=null;this.rel=\'stylesheet\'">';
   echo '<noscript><link rel="stylesheet" href="/css/case-study-detail.css?v=' . ASSET_VERSION . '"></noscript>';
}
?>

<?php
// Portfolio page
if (basename($_SERVER['PHP_SELF']) == 'portfolio.php') {
   echo '<link rel="preload" as="style" href="/css/case-study.css?v=' . ASSET_VERSION . '" onload="this.onload=null;this.rel=\'stylesheet\'">';
   echo '<noscript><link rel="stylesheet" href="/css/case-study.css?v=' . ASSET_VERSION . '"></noscript>';
}
?>

<?php
// Case studies list page
if (basename($_SERVER['PHP_SELF']) == 'case-studies.php') {
   echo '<link rel="preload" as="style" href="/css/case-study.css?v=' . ASSET_VERSION . '" onload="this.onload=null;this.rel=\'stylesheet\'">';
   echo '<noscript><link rel="stylesheet" href="/css/case-study.css?v=' . ASSET_VERSION . '"></noscript>';
}
?>

<?php
// Privacy policy
if (basename($_SERVER['PHP_SELF']) == 'privacy-policy.php') {
   echo '<link rel="preload" as="style" href="/css/case-study.css?v=' . ASSET_VERSION . '" onload="this.onload=null;this.rel=\'stylesheet\'">';
   echo '<noscript><link rel="stylesheet" href="/css/case-study.css?v=' . ASSET_VERSION . '"></noscript>';
}
?>

<?php
// Case-study detail template
if (basename($_SERVER['PHP_SELF']) == 'case-study-detail.php') {
   echo '<link rel="preload" as="style" href="/css/case-study-detail.css?v=' . ASSET_VERSION . '" onload="this.onload=null;this.rel=\'stylesheet\'">';
   echo '<noscript><link rel="stylesheet" href="/css/case-study-detail.css?v=' . ASSET_VERSION . '"></noscript>';
}
?>

<?php
// Contact Us page (Bootstrap + page CSS)
if (basename($_SERVER['PHP_SELF']) == 'contact-us.php') {
    echo '<link rel="preload" as="style" href="/css/bootstrap.min.css?v=' . ASSET_VERSION . '" onload="this.onload=null;this.rel=\'stylesheet\'">';
    echo '<link rel="preload" as="style" href="/css/master-contact.css?v=' . ASSET_VERSION . '" onload="this.onload=null;this.rel=\'stylesheet\'">';
    echo '<noscript>
                <link rel="stylesheet" href="/css/bootstrap.min.css?v=' . ASSET_VERSION . '">
                <link rel="stylesheet" href="/css/master-contact.css?v=' . ASSET_VERSION . '">
             </noscript>';
}
?>

<?php
// About page
$requestUri = $_SERVER['REQUEST_URI'];
if (strpos($requestUri, 'about-us') !== false) {
   echo '<link rel="preload" as="style" href="/css/about-us.css?v=' . ASSET_VERSION . '" onload="this.onload=null;this.rel=\'stylesheet\'">';
   echo '<noscript><link rel="stylesheet" href="/css/about-us.css?v=' . ASSET_VERSION . '"></noscript>';
}
?>

<?php
// Load insights.css on all pages EXCEPT contact-us.php (non-blocking)
$page = basename($_SERVER['PHP_SELF']);
if ($page !== 'contact-us.php') {
   echo '<link rel="stylesheet" href="/css/insights.css?v=' . ASSET_VERSION . '" media="print" onload="this.media=\'all\'">';
   echo '<noscript><link rel="stylesheet" href="/css/insights.css?v=' . ASSET_VERSION . '"></noscript>';
}
?>

<link rel="shortcut icon" href="/assets/icons/fevicon.svg?v=<?= ASSET_VERSION ?>">

<!-- Fonts: preconnect + non-blocking load -->
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preload" as="style"
   href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap">
<link rel="stylesheet"
   href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
   media="print" onload="this.media='all'">
<noscript>
   <link rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap">
</noscript>

<!-- Google Tag Manager (lazy) -->
<link rel="preconnect" href="https://www.googletagmanager.com" crossorigin>

<script>
   // Lightweight dataLayer + strict default consent (no network yet)
   window.dataLayer = window.dataLayer || [];
   function gtag() { dataLayer.push(arguments); }
   gtag('consent', 'default', {
      ad_storage: 'denied',
      ad_user_data: 'denied',
      ad_personalization: 'denied',
      analytics_storage: 'denied',
      functionality_storage: 'denied',
      security_storage: 'granted'
   });

   // Small helper
   function loadScript(src, attrs) {
      var s = document.createElement('script');
      s.src = src;
      if (attrs) for (var k in attrs) s[k] = attrs[k];
      document.head.appendChild(s);
      return s;
   }

   (function scheduleGTM() {
      var fired = false;
      function go() {
         if (fired) return; fired = true;
         // Load GTM AFTER first interaction/idle to avoid hurting LCP/FCP
         loadScript('https://www.googletagmanager.com/gtm.js?id=GTM-PPC4QD4B&l=dataLayer', { async: true });
         // If you have a CMP, call gtag('consent','update', {...}) from there when user grants consent
      }

      // First user interaction
      ['click', 'scroll', 'mousemove', 'keydown', 'touchstart', 'wheel'].forEach(function (evt) {
         window.addEventListener(evt, go, { once: true, passive: true });
      });

      // Idle fallback
      if ('requestIdleCallback' in window) {
         requestIdleCallback(go, { timeout: 4000 });
      } else {
         setTimeout(go, 4000);
      }
   })();
</script>
<!-- End Google Tag Manager (lazy) -->


<!-- INSPECT TOGGLE FOR HEADER (HIDE INSPECT ELEMENT) -->
<!-- =================== SECURITY / ANTI-INSPECT SCRIPT =================== -->
<!-- <script>
(function () {
  'use strict';

  // Disable right-click everywhere
  document.addEventListener('contextmenu', e => e.preventDefault(), true);

  // Disable keyboard shortcuts for DevTools, View Source, Inspect Element
  document.addEventListener('keydown', e => {
    if (
      e.key === 'F12' ||
      (e.ctrlKey && e.shiftKey && ['I', 'J', 'C'].includes(e.key.toUpperCase())) ||
      (e.ctrlKey && e.key.toUpperCase() === 'U')
    ) {
      e.preventDefault();
      e.stopPropagation();
    }
  }, true);

  // Basic text selection / copy / cut disable
  ['copy', 'cut', 'selectstart', 'dragstart'].forEach(evt => {
    document.addEventListener(evt, e => e.preventDefault(), true);
  });

  // DevTools detection (simple heuristic)
  let devtoolsOpen = false;
  const threshold = 160;
  setInterval(() => {
    const widthDiff = window.outerWidth - window.innerWidth;
    const heightDiff = window.outerHeight - window.innerHeight;
    const open = widthDiff > threshold || heightDiff > threshold;
    if (open && !devtoolsOpen) {
      devtoolsOpen = true;
      document.body.innerHTML = ''; // Hide entire page if DevTools detected
      alert('Developer tools are disabled on this website.');
    } else if (!open && devtoolsOpen) {
      devtoolsOpen = false;
      location.reload(); // Restore after closing DevTools
    }
  }, 1000);
})();
</script> -->
<!-- ==================================================================== -->


<?php
// ================= JSON-LD hook (prints any scripts prepared by the page) =================
if (!empty($JSON_LD_SCRIPTS) && is_array($JSON_LD_SCRIPTS)) {
   foreach ($JSON_LD_SCRIPTS as $__jsonLd) {
      if (is_string($__jsonLd) && $__jsonLd !== '') {
         echo '<script type="application/ld+json">' . $__jsonLd . '</script>';
      }
   }
}
// =====================================================================
?>

</head>

<body>

   <div id="mainHeader">
      <header class="main-header">
         <!-- Top Header -->
         <div class="top-header">
            <div class="logo">
               <a href="/"><img src="/assets/image/logo.svg?v=<?= ASSET_VERSION ?>"
                     alt="IMAC Logo" aria-label="iMAC Engineering — home" decoding="async" /></a>
               <a href="#" class="btn-orange open-appointment-modal">
                  Schedule a Consultation <i class="fa-solid fa-arrow-right"></i>
               </a>
            </div>

            <!-- Mobile Toggle -->
            <button class="mobile-toggle" id="mobileToggle" aria-label="Open main menu">
               <i class="fa-solid fa-bars"></i>
            </button>
            <div class="mobile-nav" id="mobileNav">
               <ul>
                  <li><a href="https://imacengineering.com/">Home</a></li>
                  <li><a href="https://imacengineering.com/about-us">About us</a></li>
                  <!-- Services with Dropdown -->
                  <li class="has-submenu">
                     <a href="#">Services <i class="fa-solid fa-chevron-down submenu-toggle"></i></a>
                     <ul class="submenu">
                        <li><a href="https://imacengineering.com/mechanical-cad-drafting-outsourcing-services">CAD
                              Outsourcing Services</a></li>
                        <li><a href="https://imacengineering.com/product-design-and-development-services">Product Design
                              & Development</a></li>
                        <li><a href="https://imacengineering.com/3d-reverse-engineering-services">Reverse Engineering
                              Services</a></li>
                        <li><a href="https://imacengineering.com/sheet-metal-design-and-development-services">Sheet
                              Metal Design</a></li>
                        <li><a href="https://imacengineering.com/3d-printing-services">Additive Manufacturing/<br>3D
                              Printing</a></li>
                        <li><a href="https://imacengineering.com/contract-manufacturing-services">Contract
                              Manufacturing</a></li>
                        <li><a href="https://imacengineering.com/innovation-and-intellectual-property-services">Innovation
                              & IP Strategy</a></li>
                        <li><a href="https://imacengineering.com/medical-device-design-and-development-services">Medical
                              Product Design</a></li>
                        <li><a href="https://imacengineering.com/on-demand-manufacturing-services">On Demand
                              Manufacturing</a></li>
                        <li><a href="https://imacengineering.com/rapid-tooling-design-and-manufacturing-services">Tooling
                              Design <br>and Manufacturing</a></li>
                        <li><a href="https://imacengineering.com/3d-miniature-model-design-services">3D Miniature
                              Design</a></li>
                        <li><a href="https://imacengineering.com/assembly-integration-services">Integration Services</a>
                        </li>
                        <li><a href="https://imacengineering.com/plastic-injection-molding-services">Plastic Injection
                              Modeling</a></li>
                        <li><a href="https://imacengineering.com/kiosk-design-and-development-services">Kiosk Design &
                              Development</a></li>
                     </ul>
                  </li>
                  <li><a href="https://imacengineering.com/portfolio">Portfolio</a></li>
                  <!-- Resources with Dropdown -->
                  <li class="has-submenu">
                     <a href="#">Resources <i class="fa-solid fa-chevron-down submenu-toggle"></i></a>
                     <ul class="submenu">
                        <li><a href="https://imacengineering.com/blogs">Blogs</a></li>
                        <li><a href="https://imacengineering.com/case-studies">Case Studies</a></li>
                     </ul>
                  </li>
                  <li><a href="https://imacengineering.com/contact-us">Get in Touch</a></li>
               </ul>
            </div>
            <div class="contact-group">
               <div class="contact-item">
                  <i class="fa-solid fa-phone-volume"></i>
                  <div class="text">
                     <small>Call Us 24/7</small>
                     <a href="tel:+91 6357173693"><strong>+91 6357173693</strong></a>
                  </div>
               </div>
               <div class="divider"></div>
               <div class="contact-item">
                  <i class="fa-regular fa-envelope"></i>
                  <div class="text">
                     <small>Send Us Mail</small>
                     <a href="mailto:business@imacengineering.com"><strong>business@imacengineering.com</strong></a>
                  </div>
               </div>
            </div>
         </div>
   </div>
   <!-- Mobile Navigation -->
   <!-- Navigation Row -->
   <div class="nav-row">
      <!-- Desktop Nav -->
      <nav class="main-nav">
         <ul>
            <li><a href="https://imacengineering.com/">Home</a></li>
            <li><a href="https://imacengineering.com/about-us">About us</a></li>
            <li class="has-mega-menu">
               <a href="#">Services <span class="arrow">&#9662;</span></a>
               <div class="mega-menu">
                  <div class="mega-menu-left">
                     <div>
                        <h3>iDES Key Offerings</h3>
                        <p>Expert services designed to offer you innovation, solve your challenges with excellent
                           industry knowledge, expertise, and access to
                           the latest technology.</p>
                     </div>
                     <a href="https://imacengineering.com/contact-us" class="get-started">Get Started</a>
                  </div>
                  <div class="mega-menu-right">
                     <ul class="menu-list">
                        <li><a href="https://imacengineering.com/mechanical-cad-drafting-outsourcing-services"><img
                              src="/assets/icons/mega-menu/cad-outsourcing-services.svg?v=<?= ASSET_VERSION ?>" alt=""
                              loading="lazy" decoding="async"> <span>CAD Outsourcing
                              Services</span></a></li>
                        <li><a href="https://imacengineering.com/innovation-and-intellectual-property-services"><img
                              src="/assets/icons/mega-menu/Innovation-&-IP-Strategy.svg?v=<?= ASSET_VERSION ?>" alt=""
                              loading="lazy" decoding="async"> <span>Innovation & IP
                              Strategy</span></a></li>
                        <li><a href="https://imacengineering.com/product-design-and-development-services"><img
                              src="/assets/icons/mega-menu/product-design-development.svg?v=<?= ASSET_VERSION ?>"
                              alt="" loading="lazy" decoding="async"> <span>Product
                              Design and Development</span></a></li>
                        <li><a href="https://imacengineering.com/medical-device-design-and-development-services"><img
                              src="/assets/icons/mega-menu/Medical-Product-Design-&-Development.svg?v=<?= ASSET_VERSION ?>"
                              alt="" loading="lazy" decoding="async">
                           <span>Medical Product Design</span></a></li>
                        <li><a href="https://imacengineering.com/3d-reverse-engineering-services"><img
                              src="/assets/icons/mega-menu/Reverse-Engineering-Services.svg?v=<?= ASSET_VERSION ?>"
                              alt="" loading="lazy" decoding="async"> <span>Reverse
                              Engineering Services</span></a></li>
                        <li><a href="https://imacengineering.com/on-demand-manufacturing-services"><img
                              src="/assets/icons/mega-menu/MVP-Prototyping-&-Manufacturing-as-Services.svg?v=<?= ASSET_VERSION ?>"
                              alt="" loading="lazy" decoding="async">
                           <span>On Demand Manufacturing</span></a></li>
                        <li><a href="https://imacengineering.com/sheet-metal-design-and-development-services"><img
                              src="/assets/icons/mega-menu/Sheet-Metal-Design-Services.svg?v=<?= ASSET_VERSION ?>"
                              alt="" loading="lazy" decoding="async"> <span>Sheet Metal
                              Design</span></a></li>
                        <li><a href="https://imacengineering.com/rapid-tooling-design-and-manufacturing-services"><img
                              src="/assets/icons/mega-menu/Tooling-Design-and-Manufacturing-Services.svg?v=<?= ASSET_VERSION ?>"
                              alt="" loading="lazy" decoding="async">
                           <span>Tooling Design <br>and Manufacturing</span></a></li>
                        <li><a href="https://imacengineering.com/3d-printing-services"><img
                              src="/assets/icons/mega-menu/Additive-Manufacturing.svg?v=<?= ASSET_VERSION ?>" alt=""
                              loading="lazy" decoding="async"> <span>Additive
                              Manufacturing/<br>3D Printing</span></a></li>
                        <li><a href="https://imacengineering.com/3d-miniature-model-design-services"><img
                              src="/assets/icons/mega-menu/3D-Printed-Miniature-Exhibition-Model.svg?v=<?= ASSET_VERSION ?>"
                              alt="" loading="lazy" decoding="async"> <span>3D
                              Miniature Design</span></a></li>
                        <li><a href="https://imacengineering.com/contract-manufacturing-services"><img
                              src="/assets/icons/mega-menu/contract-menufacturing.svg?v=<?= ASSET_VERSION ?>" alt=""
                              loading="lazy" decoding="async"> <span>Contract
                              Manufacturing</span></a></li>
                        <li><a href="https://imacengineering.com/assembly-integration-services"><img
                              src="/assets/icons/mega-menu/Integration-Services.svg?v=<?= ASSET_VERSION ?>" alt=""
                              loading="lazy" decoding="async"> <span>Integration
                              Services</span></a></li>
                        <li><a href="https://imacengineering.com/plastic-injection-molding-services"><img
                              src="/assets/icons/mega-menu/plastic injection moulding.svg?v=<?= ASSET_VERSION ?>"
                              alt="" loading="lazy" decoding="async"> <span>Plastic
                              Injection Modeling</span></a></li>
                        <li><a href="https://imacengineering.com/kiosk-design-and-development-services"><img
                              src="/assets/icons/mega-menu/Kiosk-design-&-development-service icon.svg?v=<?= ASSET_VERSION ?>"
                              alt="Kiosk Design & Development" loading="lazy" decoding="async"> <span>Kiosk Design &
                              Development</span></a></li>
                     </ul>
                  </div>
               </div>
            </li>
            <li><a href="https://imacengineering.com/portfolio">Portfolio</a></li>
            <!-- Resources with Dropdown -->
            <li class="has-mega-menu">
               <a href="#">Resources<span class="arrow">&#9662;</span></a>
               <div class="mega-menu small-megamenu">
                  <div class="mega-menu-right small">
                     <ul class="menu-list">
                        <li><a href="https://imacengineering.com/blogs"><span>Blogs</span></a></li>
                        <li><a href="https://imacengineering.com/case-studies"><span>Case Studies</span></a></li>
                     </ul>
                  </div>
               </div>
            </li>
            <li><a href="https://imacengineering.com/contact-us">Get in Touch</a></li>
         </ul>
      </nav>
      <!-- Desktop Button -->
      <a href="#" class="btn-orange open-appointment-modal">
         Schedule a Consultation <i class="fa-solid fa-arrow-right"></i>
      </a>
      </header>
   </div>
   <header class="header sticky-header">
      <div class="header-container">
         <!-- Logo Section -->
         <div class="logo-section">
            <button class="mobile-menu-toggle" aria-label="Toggle mobile menu">
               <img src="/assets/image/logo.svg?v=<?= ASSET_VERSION ?>" alt="Menu" class="menu-icon" loading="lazy"
                  decoding="async">
            </button>
            <div class="logo-group">
               <div class="logo-icons">
                  <a href="https://imacengineering.com/"> <img src="/assets/image/logo.svg?v=<?= ASSET_VERSION ?>" alt=""
                        class="small-icon" loading="lazy" decoding="async"></a>
               </div>
            </div>
         </div>
         <!-- Navigation -->
         <nav class="navigation">
            <ul class="nav-list">
               <li class="nav-item"><a href="https://imacengineering.com/">Home</a></li>
               <li class="nav-item"><a href="https://imacengineering.com/about-us" class="nav-link">About us</a></li>
               <li class="nav-item has-mega-menu dropdown">
                  <a href="#" class="nav-link">Services</a>
                  <img src="/assets/image/dropdown-icon-1.svg?v=<?= ASSET_VERSION ?>" alt="" class="dropdown-icon"
                     loading="lazy" decoding="async">
                  <div class="mega-menu">
                     <div class="mega-menu-left">
                        <div>
                           <h3>iDES Key Offerings </h3>
                           <p>Expert services designed to offer you innovation, solve your challenges with excellent
                              industry
                              knowledge, expertise, and access to the latest technology.</p>
                        </div>
                        <a href="https://imacengineering.com/contact-us" class="get-started">Get Started</a>
                     </div>
                     <div class="mega-menu-right">
                        <ul class="menu-list">
                           <li>
                              <a href="https://imacengineering.com/mechanical-cad-drafting-outsourcing-services">
                                 <img src="/assets/icons/mega-menu/cad-outsourcing-services.svg?v=<?= ASSET_VERSION ?>"
                                    alt="" loading="lazy" decoding="async"> <span> CAD
                                    Outsourcing Services </span>
                              </a>
                           </li>
                           <li>
                              <a href="https://imacengineering.com/innovation-and-intellectual-property-services">
                                 <img src="/assets/icons/mega-menu/Innovation-&-IP-Strategy.svg?v=<?= ASSET_VERSION ?>"
                                    alt="" loading="lazy" decoding="async"> <span>
                                    Innovation & IP Strategy </span>
                              </a>
                           </li>
                           <li>
                              <a href="https://imacengineering.com/product-design-and-development-services">
                                 <img src="/assets/icons/mega-menu/product-design-development.svg?v=<?= ASSET_VERSION ?>"
                                    alt="" loading="lazy" decoding="async"><span> Product
                                    Design and Development </span>
                              </a>
                           </li>
                           <li>
                              <a href="https://imacengineering.com/medical-device-design-and-development-services">
                                 <img
                                    src="/assets/icons/mega-menu/Medical-Product-Design-&-Development.svg?v=<?= ASSET_VERSION ?>"
                                    alt="" loading="lazy" decoding="async">
                                 <span> Medical Product Design </span>
                              </a>
                           </li>
                           <li>
                              <a href="https://imacengineering.com/3d-reverse-engineering-services">
                                 <img
                                    src="/assets/icons/mega-menu/Reverse-Engineering-Services.svg?v=<?= ASSET_VERSION ?>"
                                    alt="" loading="lazy" decoding="async"> <span>
                                    Reverse Engineering Services </span>
                              </a>
                           </li>
                           <li>
                              <a href="https://imacengineering.com/on-demand-manufacturing-services">
                                 <img
                                    src="/assets/icons/mega-menu/MVP-Prototyping-&-Manufacturing-as-Services.svg?v=<?= ASSET_VERSION ?>"
                                    alt="" loading="lazy" decoding="async"> <span> On Demand Manufacturing </span>
                              </a>
                           </li>
                           <li>
                              <a href="https://imacengineering.com/sheet-metal-design-and-development-services">
                                 <img
                                    src="/assets/icons/mega-menu/Sheet-Metal-Design-Services.svg?v=<?= ASSET_VERSION ?>"
                                    alt="" loading="lazy" decoding="async"> <span> Sheet
                                    Metal Design </span>
                              </a>
                           </li>
                           <li>
                              <a href="https://imacengineering.com/rapid-tooling-design-and-manufacturing-services">
                                 <img
                                    src="/assets/icons/mega-menu/Tooling-Design-and-Manufacturing-Services.svg?v=<?= ASSET_VERSION ?>"
                                    alt="" loading="lazy" decoding="async">
                                 <span> Tooling Design <br> and Manufacturing </span>
                              </a>
                           </li>
                           <li>
                              <a href="https://imacengineering.com/3d-printing-services">
                                 <img src="/assets/icons/mega-menu/Additive-Manufacturing.svg?v=<?= ASSET_VERSION ?>"
                                    alt="" loading="lazy" decoding="async"> <span> Additive
                                    Manufacturing/<br>3D Printing </span>
                              </a>
                           </li>
                           <li>
                              <a href="https://imacengineering.com/3d-miniature-model-design-services">
                                 <img
                                    src="/assets/icons/mega-menu/3D-Printed-Miniature-Exhibition-Model.svg?v=<?= ASSET_VERSION ?>"
                                    alt="" loading="lazy" decoding="async">
                                 <span> 3D Miniature Design </span>
                              </a>
                           </li>
                           <li>
                              <a href="https://imacengineering.com/contract-manufacturing-services">
                                 <img src="/assets/icons/mega-menu/contract-menufacturing.svg?v=<?= ASSET_VERSION ?>"
                                    alt="" loading="lazy" decoding="async"> <span> Contract
                                    Manufacturing </span>
                              </a>
                           </li>

                           <li>
                              <a href="https://imacengineering.com/assembly-integration-services">
                                 <img src="/assets/icons/mega-menu/Integration-Services.svg?v=<?= ASSET_VERSION ?>"
                                    alt="" loading="lazy" decoding="async"> <span> Integration
                                    Services </span>
                              </a>
                           </li>
                           <li>
                              <a href="https://imacengineering.com/plastic-injection-molding-services">
                                 <img src="/assets/icons/mega-menu/plastic injection moulding.svg?v=<?= ASSET_VERSION ?>"
                                    alt="" loading="lazy" decoding="async"> <span> Plastic
                                    Injection Modeling </span>
                              </a>
                           </li>
                           <li>
                              <a href="https://imacengineering.com/kiosk-design-and-development-services">
                                 <img
                                    src="/assets/icons/mega-menu/Kiosk-design-&-development-service icon.svg?v=<?= ASSET_VERSION ?>"
                                    alt="" loading="lazy" decoding="async">
                                 <span> Kiosk Design &<br> Development </span>
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </li>
               <li class="nav-item">
                  <a href="https://imacengineering.com/portfolio" class="nav-link">Portfolio</a>
               </li>
               <li class="nav-item has-mega-menu dropdown">
                  <a href="#" class="nav-link">Resources</a>
                  <img src="/assets/image/dropdown-icon-1.svg?v=<?= ASSET_VERSION ?>" alt="" class="dropdown-icon"
                     loading="lazy" decoding="async">
                  <div class="mega-menu small-megamenu">
                     <div class="mega-menu-right small">
                        <ul class="menu-list">
                           <li><a href="https://imacengineering.com/blogs"><span>Blogs</span></a></li>
                           <li><a href="https://imacengineering.com/case-studies"><span> Case Studies </span></a></li>
                        </ul>
                     </div>
                  </div>
               </li>
               <li class="nav-item">
                  <a href="https://imacengineering.com/contact-us" class="nav-link">Get in Touch</a>
               </li>
            </ul>
         </nav>
         <!-- CTA Section -->
         <div class="cta-section">
            <div class="appointment-btn">
               <a href="#" class="appointment-link open-appointment-modal">Schedule a Consultation </a>
               <img src="https://static.codia.ai/custom_image/2025-07-05/073118/dropdown-arrow.svg" alt=""
                  class="appointment-arrow" loading="lazy" decoding="async">
            </div>
         </div>
      </div>
      <!-- Mobile Navigation -->
      <nav class="mobile-navigation">
         <ul class="mobile-nav-list">
            <li class="mobile-nav-item"><a href="https://imacengineering.com/" class="mobile-nav-link">Home</a></li>
            <li class="mobile-nav-item"><a href="https://imacengineering.com/about-us" class="mobile-nav-link">About
                  us</a></li>
            <li class="mobile-nav-item"><a href="#" class="mobile-nav-link">Services</a></li>
            <li class="mobile-nav-item"><a href="https://imacengineering.com/portfolio"
                  class="mobile-nav-link">Portfolio</a></li>
            <li class="mobile-nav-item"><a href="#" class="mobile-nav-link">Resources</a></li>
            <li class="mobile-nav-item"><a href="https://imacengineering.com/contact-us" class="mobile-nav-link">Get in
                  Touch</a></li>
         </ul>
      </nav>
   </header>
   <!-- Sticky Actions -->
   <div class="sticky-actions" id="stickyActions" aria-live="polite">
      <div class="sticky-actions__rail" aria-hidden="true"></div>

      <div class="sticky-actions__stack">

         <div id="saItems" class="sa-items" role="group" aria-label="Quick actions">
            <!-- WhatsApp -->
            <a class="sa-btn sa-hide-on-collapse" data-tip="WhatsApp" href="https://wa.me/+916357173693" target="_blank"
               rel="noopener" aria-label="WhatsApp">
               <i class="fab fa-whatsapp sa-icon"></i>
            </a>

            <!-- LinkedIn -->
            <a class="sa-btn sa-hide-on-collapse" data-tip="LinkedIn"
               href="https://www.linkedin.com/company/imac-design-engineering-services/" target="_blank" rel="noopener"
               aria-label="LinkedIn">
               <svg class="sa-icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                  <path
                     d="M4.98 3.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5ZM3.5 9h3v12h-3V9Zm6 0h2.9v1.6h.04c.4-.76 1.38-1.56 2.85-1.56 3.05 0 3.61 2.01 3.61 4.62V21h-3v-5.6c0-1.33-.02-3.03-1.85-3.03-1.85 0-2.14 1.44-2.14 2.93V21h-3V9Z" />
               </svg>
            </a>

            <!-- Facebook -->
            <a class="sa-btn sa-hide-on-collapse" data-tip="Facebook" href="https://www.facebook.com/iMACDesigns/"
               target="_blank" rel="noopener" aria-label="Facebook">
               <svg class="sa-icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                  <path
                     d="M22 12.06C22 6.51 17.52 2 12 2S2 6.51 2 12.06c0 5 3.66 9.14 8.44 9.94v-7.03H7.9V12h2.54V9.8c0-2.5 1.49-3.88 3.77-3.88 1.09 0 2.24.2 2.24.2v2.46h-1.26c-1.24 0-1.63.77-1.63 1.56V12h2.78l-.44 2.97h-2.34V22C18.34 21.2 22 17.06 22 12.06Z" />
               </svg>
            </a>

            <!-- Instagram -->
            <a class="sa-btn sa-hide-on-collapse" data-tip="Instagram" href="https://www.instagram.com/imac_designs/"
               target="_blank" rel="noopener" aria-label="Instagram">
               <svg class="sa-icon" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                  <rect x="2" y="2" width="20" height="20" rx="5" stroke="currentColor" stroke-width="2" />
                  <circle cx="12" cy="12" r="4.5" stroke="currentColor" stroke-width="2" />
                  <circle cx="17.5" cy="6.5" r="1.5" fill="currentColor" />
               </svg>
            </a>

         </div>
      </div>
   </div>

   <script>
      document.addEventListener("DOMContentLoaded", function () {
         const menuToggle = document.getElementById("mobileToggle");
         const mobileNav = document.getElementById("mobileNav");

         // Toggle main mobile menu
         menuToggle.addEventListener("click", function () {
            mobileNav.classList.toggle("active");
         });

         // Close mobile nav on link click (optional)
         mobileNav.querySelectorAll("a").forEach(link => {
            link.addEventListener("click", function () {
               if (!this.closest(".has-submenu")) {
                  mobileNav.classList.remove("active");
               }
            });
         });

         // Toggle submenus
         const submenuToggles = document.querySelectorAll(".has-submenu > a");
         submenuToggles.forEach(toggle => {
            toggle.addEventListener("click", function (e) {
               e.preventDefault();
               const parentLi = this.parentElement;
               document.querySelectorAll(".has-submenu").forEach(li => { if (li !== parentLi) li.classList.remove("active"); });
               parentLi.classList.toggle("active");
            });
         });
      });
   </script>