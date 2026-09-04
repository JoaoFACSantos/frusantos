import '../css/main.css';

/**
 * Fade-in discreto ao scroll (200–300ms), aplicado a qualquer elemento
 * com a classe .fade-in-up. Sem dependências — um único IntersectionObserver
 * observa todos os elementos e liberta-os assim que ficam visíveis.
 */
function initScrollReveal() {
  const targets = document.querySelectorAll('.fade-in-up');
  if (!targets.length) return;

  if (!('IntersectionObserver' in window)) {
    targets.forEach((el) => el.classList.add('is-visible'));
    return;
  }

  const observer = new IntersectionObserver(
    (entries, obs) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          obs.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.15, rootMargin: '0px 0px -40px 0px' }
  );

  targets.forEach((el) => observer.observe(el));
}

/**
 * Menu mobile — toggle simples baseado em atributos aria, sem dependências.
 * Espera um botão [data-menu-toggle] e um painel [data-menu-panel]
 * (ver template-parts/header/navigation.php).
 */
function initMobileMenu() {
  const toggle = document.querySelector('[data-menu-toggle]');
  const panel = document.querySelector('[data-menu-panel]');
  if (!toggle || !panel) return;

  toggle.addEventListener('click', () => {
    const isOpen = toggle.getAttribute('aria-expanded') === 'true';
    toggle.setAttribute('aria-expanded', String(!isOpen));
    panel.classList.toggle('hidden', isOpen);
  });
}

document.addEventListener('DOMContentLoaded', () => {
  initScrollReveal();
  initMobileMenu();
});
