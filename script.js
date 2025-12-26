// Small enhancements: menu toggle (if not present) and hero subtle parallax
document.addEventListener('DOMContentLoaded', function () {
  const navToggle = document.getElementById('nav-toggle');
  const nav = document.getElementById('primary-navigation');
  const yearElem = document.getElementById('year');

  if (yearElem) yearElem.textContent = new Date().getFullYear();

  if (navToggle && nav) {
    navToggle.addEventListener('click', function () {
      const expanded = this.getAttribute('aria-expanded') === 'true' || false;
      this.setAttribute('aria-expanded', !expanded);
      nav.classList.toggle('open');
    });

    nav.querySelectorAll('a').forEach(a => a.addEventListener('click', () => {
      nav.classList.remove('open');
      navToggle.setAttribute('aria-expanded', 'false');
    }));
  }

  // Parallax for hero image (picture element)
  if (window.innerWidth > 1024) {
    const heroImg = document.querySelector('.hero-img');
    if (heroImg) {
      window.addEventListener('scroll', () => {
        const scrolled = window.scrollY;
        heroImg.style.transform = `translateY(${scrolled * 0.06}px) scale(1.02)`;
      }, { passive: true });
    }
  }
});
