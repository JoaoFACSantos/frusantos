import '../css/main.css';

/**
 * Revela/esconde elementos .fade-in-up consoante entram ou saem do
 * viewport — ao contrário de um reveal único, a classe .is-visible é
 * removida quando o elemento sai por cima (scroll para cima), para a
 * animação se repetir ao voltar a descer. Sem dependências.
 */
function initScrollReveal() {
  const targets = document.querySelectorAll('.fade-in-up');
  if (!targets.length) return;

  if (!('IntersectionObserver' in window)) {
    targets.forEach((el) => el.classList.add('is-visible'));
    return;
  }

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        entry.target.classList.toggle('is-visible', entry.isIntersecting);
      });
    },
    { threshold: 0.15, rootMargin: '0px 0px -40px 0px' }
  );

  targets.forEach((el) => observer.observe(el));
}

/**
 * Toggle genérico aria-expanded/hidden entre um botão [data-*-toggle] e
 * o respetivo painel [data-*-panel] — usado pelo menu mobile e pela
 * pesquisa (ver template-parts/header/navigation.php).
 */
function initToggle(toggleSelector, panelSelector) {
  const toggle = document.querySelector(toggleSelector);
  const panel = document.querySelector(panelSelector);
  if (!toggle || !panel) return;

  toggle.addEventListener('click', () => {
    const isOpen = toggle.getAttribute('aria-expanded') === 'true';
    toggle.setAttribute('aria-expanded', String(!isOpen));
    panel.classList.toggle('hidden', isOpen);

    if (!isOpen) {
      panel.querySelector('input')?.focus();
    }
  });
}

/**
 * Cabeçalho fixo — adiciona .is-scrolled a #site-header a partir de um
 * limiar de scroll, para a barra de utilidade colapsar e o cabeçalho
 * encolher (transições em src/css/main.css).
 *
 * O cabeçalho é `position: fixed` (não `sticky`) de propósito: um
 * cabeçalho sticky que muda de altura perto do topo da página entra em
 * conflito com o "scroll anchoring" do browser (que ajusta o scroll
 * automaticamente quando o conteúdo por cima se desloca), criando um
 * ciclo — a barra encolhe, o scroll é corrigido, o que despoleta o
 * listener outra vez — e o resultado é o "tranco"/oscilação sentido ao
 * descer a página. Sendo `fixed`, o cabeçalho sai do fluxo do documento
 * e essa realimentação deixa de existir.
 *
 * Dois limiares diferentes para ligar/desligar (histerese) evitam que a
 * classe oscile quando o scroll está mesmo em cima do limite (ex: no
 * fim do "bounce" do scroll no fim da página).
 */
function initHeaderScroll() {
  const header = document.getElementById('site-header');
  if (!header) return;

  const ON = 40;
  const OFF = 10;
  let scrolled = false;
  let ticking = false;

  function update() {
    const y = window.scrollY;
    if (!scrolled && y > ON) {
      scrolled = true;
    } else if (scrolled && y < OFF) {
      scrolled = false;
    }
    header.classList.toggle('is-scrolled', scrolled);
    ticking = false;
  }

  update();

  window.addEventListener(
    'scroll',
    () => {
      if (ticking) return;
      ticking = true;
      window.requestAnimationFrame(update);
    },
    { passive: true }
  );
}

/**
 * O cabeçalho é `position: fixed`, por isso não reserva o seu próprio
 * espaço no documento — sem isto, o conteúdo abria por baixo dele. Um
 * ResizeObserver mantém o padding-top do body sempre igual à altura
 * atual do cabeçalho, incluindo durante a transição de encolher (o
 * padding acompanha em sincronia, sem depender da posição de scroll).
 */
function initHeaderOffset() {
  const header = document.getElementById('site-header');
  if (!header) return;

  const apply = () => {
    document.body.style.paddingTop = `${header.offsetHeight}px`;
  };

  apply();

  if ('ResizeObserver' in window) {
    new ResizeObserver(apply).observe(header);
  } else {
    window.addEventListener('resize', apply);
  }
}

/**
 * Separadores (tabs) genéricos — usados em "A empresa em detalhe"
 * (page-sobre-nos.php). Botões [data-tab-button] e painéis
 * [data-tab-panel] partilham um [data-tab-group]; clicar num botão
 * mostra o painel com o id em [data-tab-target] e esconde os restantes
 * do mesmo grupo. Suporta vários grupos de separadores na mesma página.
 */
function initTabs() {
  const buttons = document.querySelectorAll('[data-tab-button]');
  if (!buttons.length) return;

  buttons.forEach((button) => {
    button.addEventListener('click', () => {
      const group = button.dataset.tabGroup;
      const targetId = button.dataset.tabTarget;

      document.querySelectorAll(`[data-tab-button][data-tab-group="${group}"]`).forEach((btn) => {
        const isActive = btn === button;
        btn.setAttribute('aria-selected', String(isActive));
        btn.classList.toggle('bg-slate', isActive);
        btn.classList.toggle('border-slate', isActive);
        btn.classList.toggle('text-white', isActive);
        btn.classList.toggle('border-neutral-300', !isActive);
        btn.classList.toggle('text-neutral-700', !isActive);
      });

      document.querySelectorAll(`[data-tab-panel][data-tab-group="${group}"]`).forEach((panel) => {
        panel.classList.toggle('hidden', panel.id !== targetId);
      });
    });
  });
}

document.addEventListener('DOMContentLoaded', () => {
  initScrollReveal();
  initToggle('[data-menu-toggle]', '[data-menu-panel]');
  initToggle('[data-search-toggle]', '[data-search-panel]');
  initHeaderScroll();
  initHeaderOffset();
  initTabs();
});
