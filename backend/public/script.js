// ─── PAGE INTRO ───────────────────────────────────────────────────────────────
window.addEventListener("load", () => {
  setTimeout(() => document.body.classList.add("loaded"), 100);
});

// ─── CURSOR ───────────────────────────────────────────────────────────────────
const cursor = document.getElementById("cursor");
const ring = document.getElementById("cursor-ring");
let mx = 0,
  my = 0,
  rx = 0,
  ry = 0;

document.addEventListener("mousemove", (e) => {
  mx = e.clientX;
  my = e.clientY;
  cursor.style.left = mx + "px";
  cursor.style.top = my + "px";
});

(function animRing() {
  rx += (mx - rx) * 0.12;
  ry += (my - ry) * 0.12;
  ring.style.left = rx + "px";
  ring.style.top = ry + "px";
  requestAnimationFrame(animRing);
})();

document
  .querySelectorAll(
    "a, button, .service-item, .showcase-item, select, input, textarea",
  )
  .forEach((el) => {
    el.addEventListener("mouseenter", () =>
      document.body.classList.add("cursor-hover"),
    );
    el.addEventListener("mouseleave", () =>
      document.body.classList.remove("cursor-hover"),
    );
  });

// ─── REVEAL ON SCROLL ─────────────────────────────────────────────────────────
const revealEls = document.querySelectorAll(".reveal");
const observer = new IntersectionObserver(
  (entries) => {
    entries.forEach((e) => {
      if (e.isIntersecting) {
        e.target.classList.add("visible");
        const counter = e.target.querySelector("[data-count]");
        if (counter) animateCounter(counter);
        observer.unobserve(e.target);
      }
    });
  },
  { threshold: 0.15 },
);

revealEls.forEach((el) => observer.observe(el));

// Also observe stats bar items directly
document.querySelectorAll("[data-count]").forEach((el) => {
  const parent = el.closest(".stat-item");
  if (parent) {
    const statObs = new IntersectionObserver(
      (entries) => {
        entries.forEach((e) => {
          if (e.isIntersecting) {
            animateCounter(el);
            statObs.unobserve(e.target);
          }
        });
      },
      { threshold: 0.5 },
    );
    statObs.observe(parent);
  }
});

// ─── COUNTER ANIMATION ────────────────────────────────────────────────────────
function animateCounter(el) {
  const target = parseInt(el.dataset.count);
  const duration = 1400;
  const start = performance.now();
  (function tick(now) {
    const p = Math.min((now - start) / duration, 1);
    const ease = 1 - Math.pow(1 - p, 3);
    el.textContent =
      Math.round(ease * target) + (el.dataset.count === "99" ? "%" : "+");
    if (p < 1) requestAnimationFrame(tick);
    else el.textContent = target + (el.dataset.count === "99" ? "%" : "+");
  })(start);
}

// ─── NAV SCROLL BLEND ─────────────────────────────────────────────────────────
const nav = document.getElementById("navbar");
window.addEventListener("scroll", () => {
  nav.style.background =
    window.scrollY > 80 ? "rgba(255, 251, 241, 0.92)" : "transparent";
  nav.style.backdropFilter = window.scrollY > 80 ? "blur(12px)" : "none";
  nav.style.borderBottom =
    window.scrollY > 80 ? "1px solid var(--border)" : "none";
});

// ─── FORM SUBMIT ──────────────────────────────────────────────────────────────
function handleSubmit(e) {
  e.preventDefault();
  const btn = e.target.querySelector(".btn-submit span");
  const origText = btn.textContent;
  btn.textContent = "Sending...";
  setTimeout(() => {
    btn.textContent = "Message Sent ✓";
    e.target.reset();
    setTimeout(() => (btn.textContent = origText), 3000);
  }, 1200);
}

// ─── MAGNETIC BUTTON ──────────────────────────────────────────────────────────
document.querySelectorAll(".btn-submit").forEach((btn) => {
  btn.addEventListener("mousemove", (e) => {
    const r = btn.getBoundingClientRect();
    const cx = r.left + r.width / 2;
    const cy = r.top + r.height / 2;
    const dx = (e.clientX - cx) * 0.3;
    const dy = (e.clientY - cy) * 0.3;
    btn.style.transform = `translate(${dx}px, ${dy}px)`;
  });
  btn.addEventListener("mouseleave", () => {
    btn.style.transform = "";
  });
});

// ─── PARALLAX HERO IMAGE ──────────────────────────────────────────────────────
window.addEventListener(
  "scroll",
  () => {
    const img = document.querySelector(".hero-img-wrap svg");
    if (img) {
      const offset = window.scrollY * 0.15;
      img.style.transform = `translateY(${offset}px)`;
    }
  },
  { passive: true },
);
