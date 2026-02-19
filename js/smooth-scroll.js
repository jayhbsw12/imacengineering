/* smooth-scroll.js — site-wide inertial scrolling (Lenis) */

(function () {
  "use strict";

  // Respect reduced motion
  if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
    // keep native instant scrolling for accessibility
    document.documentElement.style.scrollBehavior = "auto";
    return;
  }

  // Ensure Lenis is present
  if (!window.Lenis) {
    console.warn("Lenis not found. Include js/lenis.min.js before this file.");
    document.documentElement.style.scrollBehavior = "smooth"; // graceful fallback
    return;
  }

  // ---- auto-detect fixed/sticky header height (no selectors needed)
  let HEADER_OFFSET = 0;
  function detectHeaderOffset() {
    const nodes = Array.from(document.body.getElementsByTagName("*")).slice(
      0,
      2000
    );
    let max = 0;
    for (const el of nodes) {
      const cs = getComputedStyle(el);
      if (cs.position !== "fixed" && cs.position !== "sticky") continue;
      const r = el.getBoundingClientRect();
      if (
        r.top <= 2 &&
        r.height > 0 &&
        cs.visibility !== "hidden" &&
        cs.display !== "none"
      ) {
        max = Math.max(max, r.height);
      }
    }
    HEADER_OFFSET = Math.min(max, 200);
  }
  addEventListener("load", detectHeaderOffset);
  addEventListener("resize", () => {
    clearTimeout(detectHeaderOffset._t);
    detectHeaderOffset._t = setTimeout(detectHeaderOffset, 150);
  });

  // ---- init Lenis (buttery + no jump)
  window.lenis = new Lenis({
    // Lerp mode (don’t set duration)
    lerp: 0.12, // 0.10–0.16; higher = looser, lower = tighter
    easing: (t) => t, // linear, prevents elastic feel

    // Input gains (keeps wheel deltas tame)
    wheelMultiplier: 0.9, // drop to 0.9 if it still “jumps”
    touchMultiplier: 1.0,

    smoothWheel: true,
    smoothTouch: false, // keep false for steadier mobile; set true only if you want inertia
    gestureOrientation: "vertical",
  });

  function raf(time) {
    lenis.raf(time);
    requestAnimationFrame(raf);
  }
  requestAnimationFrame(raf);

  // Helper: scroll to absolute Y with header offset
  function scrollToY(y, opts = {}) {
    lenis.scrollTo(Math.max(0, y - HEADER_OFFSET), {
      immediate: false,
      ...opts,
    });
  }

  // Public API (use anywhere): siteSmoothScrollTo('#contact') or siteSmoothScrollTo(1200)
  window.siteSmoothScrollTo = function (elOrY, opts = {}) {
    if (typeof elOrY === "number") return scrollToY(elOrY, opts);
    const el =
      typeof elOrY === "string" ? document.querySelector(elOrY) : elOrY;
    if (!el) return;
    const r = el.getBoundingClientRect();
    scrollToY(window.scrollY + r.top, opts);
  };

  // Intercept in-page #hash links
  document.addEventListener(
    "click",
    (e) => {
      const a = e.target.closest('a[href^="#"]');
      if (!a) return;
      const href = a.getAttribute("href");
      if (!href || href === "#") return;

      const target = document.querySelector(href);
      if (!target) return; // let browser handle if element not on this page
      e.preventDefault();

      detectHeaderOffset();
      const r = target.getBoundingClientRect();
      scrollToY(window.scrollY + r.top);

      // update URL hash without jump
      if (history.pushState) history.pushState(null, "", href);
      else location.hash = href;
    },
    { passive: false }
  );

  // Smooth to hash on load (/page#id)
  addEventListener("load", () => {
    const hash = location.hash;
    if (!hash) return;
    const target = document.querySelector(hash);
    if (!target) return;
    const r = target.getBoundingClientRect();
    setTimeout(() => scrollToY(window.scrollY + r.top), 50); // let layout settle
  });

  console.log("✅ Lenis inertial smooth scroll initialised.");
})();
