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
 * Pesquisa (desktop) — modal centrado com fundo escurecido, em vez do
 * initToggle() genérico usado no menu mobile: aqui há animação de
 * entrada/saída (opacidade + escala do cartão) e fecha ao clicar no
 * fundo escuro ou premir Esc, não só pelo ícone/botão de fechar.
 */
function initSearchModal() {
  const toggle = document.querySelector('[data-search-toggle]');
  const panel = document.querySelector('[data-search-panel]');
  const card = panel?.querySelector('[data-search-card]');
  const backdrop = panel?.querySelector('[data-search-backdrop]');
  const closeButton = panel?.querySelector('[data-search-close]');
  if (!toggle || !panel || !card) return;

  function isOpen() {
    return toggle.getAttribute('aria-expanded') === 'true';
  }

  function open() {
    panel.classList.remove('hidden');
    toggle.setAttribute('aria-expanded', 'true');
    document.body.classList.add('overflow-hidden');

    // Duas classes mudadas em frames separados para o browser animar a
    // transição em vez de saltar logo para o estado final (remover
    // "hidden" e mudar a opacidade no mesmo frame não anima nada).
    requestAnimationFrame(() => {
      requestAnimationFrame(() => {
        panel.classList.remove('opacity-0');
        card.classList.remove('opacity-0', 'scale-95', '-translate-y-3');
      });
    });

    panel.querySelector('input')?.focus();
  }

  function close() {
    if (!isOpen()) return;
    toggle.setAttribute('aria-expanded', 'false');
    panel.classList.add('opacity-0');
    card.classList.add('opacity-0', 'scale-95', '-translate-y-3');
    document.body.classList.remove('overflow-hidden');
    window.setTimeout(() => panel.classList.add('hidden'), 200);
  }

  toggle.addEventListener('click', () => (isOpen() ? close() : open()));
  closeButton?.addEventListener('click', close);
  backdrop?.addEventListener('click', close);

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') close();
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

/**
 * Página da Loja (page-loja.php) — filtro de categoria, ordenação,
 * alternância de colunas e "lista de pedidos". A lista fica guardada no
 * localStorage do visitante (não há WooCommerce nem servidor a processar
 * pedidos ainda) e o botão final abre o cliente de email do próprio
 * visitante com um rascunho preenchido — funcional de verdade, sem
 * simular um checkout que não existe.
 */
const FRUSANTOS_SHOP_LIST_KEY = 'frusantos-lista-pedidos';

function frusantosGetShopList() {
  try {
    const raw = JSON.parse(localStorage.getItem(FRUSANTOS_SHOP_LIST_KEY) || '[]');
    return Array.isArray(raw) ? raw : [];
  } catch (e) {
    return [];
  }
}

function frusantosSetShopList(list) {
  try {
    localStorage.setItem(FRUSANTOS_SHOP_LIST_KEY, JSON.stringify(list));
  } catch (e) {
    /* localStorage indisponível (privado/bloqueado) — segue sem guardar */
  }
}

function initShopPage() {
  const grid = document.querySelector('[data-shop-grid]');
  if (!grid) return;

  const cards = Array.from(grid.querySelectorAll('[data-shop-card]'));
  const emptyState = document.querySelector('[data-shop-empty]');
  const summaryBar = document.querySelector('[data-shop-summary]');
  const summaryCount = document.querySelector('[data-shop-summary-count]');
  const summaryLink = document.querySelector('[data-shop-summary-link]');

  function renderList() {
    const list = frusantosGetShopList();

    cards.forEach((card) => {
      const btn = card.querySelector('[data-shop-toggle]');
      if (!btn) return;
      const inList = list.includes(card.dataset.title);
      btn.textContent = inList ? 'Na lista ✕' : btn.dataset.cta;
      btn.classList.toggle('bg-slate', inList);
      btn.classList.toggle('border-slate', inList);
      btn.classList.toggle('text-white', inList);
      btn.classList.toggle('border-secondary-500', !inList);
      btn.classList.toggle('text-secondary-500', !inList);
    });

    if (summaryBar) {
      summaryBar.classList.toggle('hidden', list.length === 0);
      summaryBar.classList.toggle('flex', list.length > 0);
      summaryBar.classList.toggle('flex-wrap', list.length > 0);
    }
    if (summaryCount) {
      summaryCount.textContent =
        list.length === 1 ? '1 produto na lista de pedidos' : list.length + ' produtos na lista de pedidos';
    }
    if (summaryLink) {
      const subject = encodeURIComponent('Pedido de orçamento — Loja Frusantos');
      const body = encodeURIComponent(
        'Olá,\n\nGostaria de pedir orçamento para os seguintes produtos:\n- ' + list.join('\n- ')
      );
      summaryLink.href = 'mailto:frusantos@frusantos.com?subject=' + subject + '&body=' + body;
    }
  }

  cards.forEach((card) => {
    const btn = card.querySelector('[data-shop-toggle]');
    if (!btn) return;
    btn.addEventListener('click', () => {
      const title = card.dataset.title;
      const list = frusantosGetShopList();
      const idx = list.indexOf(title);
      if (idx >= 0) {
        list.splice(idx, 1);
      } else {
        list.push(title);
      }
      frusantosSetShopList(list);
      renderList();
    });
  });

  const categoryLinks = Array.from(document.querySelectorAll('[data-shop-category]'));
  categoryLinks.forEach((link) => {
    link.addEventListener('click', (e) => {
      e.preventDefault();
      const category = link.dataset.shopCategory;

      categoryLinks.forEach((l) => {
        const active = l === link;
        l.classList.toggle('text-secondary-500', active);
        l.classList.toggle(l.dataset.shopBaseClass, !active);
      });

      let visibleCount = 0;
      cards.forEach((card) => {
        const show = category === 'todas' || card.dataset.category === category;
        card.classList.toggle('hidden', !show);
        if (show) visibleCount += 1;
      });

      if (emptyState) emptyState.classList.toggle('hidden', visibleCount > 0);
    });
  });

  const sortButtons = Array.from(document.querySelectorAll('[data-shop-sort]'));
  sortButtons.forEach((btn) => {
    btn.addEventListener('click', () => {
      sortButtons.forEach((b) => {
        const active = b === btn;
        b.classList.toggle('bg-slate', active);
        b.classList.toggle('border-slate', active);
        b.classList.toggle('text-white', active);
        b.classList.toggle('border-neutral-300', !active);
        b.classList.toggle('text-neutral-700', !active);
      });

      const mode = btn.dataset.shopSort;
      const sorted = cards.slice().sort((a, b) => {
        if (mode === 'az') return a.dataset.title.localeCompare(b.dataset.title, 'pt');
        if (mode === 'za') return b.dataset.title.localeCompare(a.dataset.title, 'pt');
        return Number(a.dataset.order) - Number(b.dataset.order);
      });
      sorted.forEach((card) => grid.appendChild(card));
    });
  });

  const colButtons = Array.from(document.querySelectorAll('[data-shop-cols]'));
  colButtons.forEach((btn) => {
    btn.addEventListener('click', () => {
      colButtons.forEach((b) => {
        const active = b === btn;
        b.classList.toggle('bg-slate', active);
        b.classList.toggle('border-slate', active);
        b.classList.toggle('text-white', active);
        b.classList.toggle('border-neutral-300', !active);
        b.classList.toggle('text-neutral-700', !active);
      });

      grid.classList.toggle('lg:grid-cols-2', btn.dataset.shopCols === '2');
      grid.classList.toggle('lg:grid-cols-3', btn.dataset.shopCols === '3');
    });
  });

  renderList();
}

/**
 * Seletor de idioma (ver frusantos_language_switcher() em
 * inc/template-tags.php) — a função pode aparecer duas vezes na mesma
 * página (cabeçalho desktop + menu mobile), por isso cada botão
 * [data-lang-toggle] controla o [data-lang-panel] dentro do seu próprio
 * wrapper `.relative`, em vez de um único toggle/painel fixo como
 * initToggle(). Fecha também ao clicar fora.
 */
function initLanguageSwitcher() {
  const toggles = document.querySelectorAll('[data-lang-toggle]');
  if (!toggles.length) return;

  function close(toggle) {
    const wrapper = toggle.closest('.relative');
    const panel = wrapper?.querySelector('[data-lang-panel]');
    if (!panel) return;
    panel.classList.add('hidden');
    toggle.setAttribute('aria-expanded', 'false');
    toggle.querySelector('[data-lang-caret]')?.classList.remove('rotate-180');
  }

  toggles.forEach((toggle) => {
    const wrapper = toggle.closest('.relative');
    const panel = wrapper?.querySelector('[data-lang-panel]');
    if (!panel) return;

    toggle.addEventListener('click', (e) => {
      e.stopPropagation();
      const isOpen = toggle.getAttribute('aria-expanded') === 'true';
      toggles.forEach(close);
      if (!isOpen) {
        panel.classList.remove('hidden');
        toggle.setAttribute('aria-expanded', 'true');
        toggle.querySelector('[data-lang-caret]')?.classList.add('rotate-180');
      }
    });
  });

  document.addEventListener('click', () => toggles.forEach(close));
}

document.addEventListener('DOMContentLoaded', () => {
  initScrollReveal();
  initToggle('[data-menu-toggle]', '[data-menu-panel]');
  initSearchModal();
  initHeaderScroll();
  initHeaderOffset();
  initTabs();
  initShopPage();
  initLanguageSwitcher();
});
