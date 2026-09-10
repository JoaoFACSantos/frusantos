<?php
/**
 * Navegação principal + menu mobile + pesquisa + seletor de idioma.
 *
 * O menu principal fica centrado na barra através de posicionamento
 * absoluto dentro de [data-header-row] (que é `relative`) — assim o
 * centro não desloca consoante a largura do logótipo ou do bloco da
 * direita (pesquisa/idioma/carrinho), ao contrário de um simples
 * `justify-between` de 2 colunas.
 *
 * O toggle mobile é controlado por src/js/main.js (initMobileMenu),
 * através dos atributos data-menu-toggle / data-menu-panel. A pesquisa
 * usa o mesmo padrão (data-search-toggle / data-search-panel).
 *
 * @package Frusantos
 */
?>
<nav
	class="site-nav absolute left-1/2 hidden -translate-x-1/2 items-center gap-[30px] text-[13px] font-semibold uppercase tracking-[.1em] lg:flex"
	aria-label="<?php esc_attr_e('Menu principal', 'frusantos'); ?>"
>
	<?php
	wp_nav_menu(
		[
			'theme_location' => 'primary',
			'container'      => false,
			'menu_class'     => 'flex items-center gap-[30px]',
			'fallback_cb'    => 'frusantos_primary_menu_fallback',
		]
	);
	?>
</nav>

<div class="ml-auto hidden items-center gap-6 lg:flex">
	<?php if (class_exists('WooCommerce')) : ?>
		<a
			href="<?php echo esc_url(wc_get_cart_url()); ?>"
			class="flex items-center gap-2 rounded-full border border-neutral-300 px-4 py-[9px] text-sm font-semibold text-neutral-700 transition duration-250 hover:border-slate hover:text-ink"
		>
			<?php
			$frusantos_cart_count = WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
			$frusantos_cart_total = WC()->cart ? WC()->cart->get_cart_total() : wc_price(0);
			printf(
				/* translators: 1: número de artigos, 2: total do carrinho */
				esc_html(_n('%1$s item / %2$s', '%1$s items / %2$s', $frusantos_cart_count, 'frusantos')),
				esc_html($frusantos_cart_count),
				wp_kses_post($frusantos_cart_total)
			);
			?>
		</a>
	<?php endif; ?>

	<button type="button" class="text-ink transition duration-250 hover:text-primary-600" data-search-toggle aria-expanded="false" aria-controls="site-search-panel">
		<span class="sr-only"><?php esc_html_e('Pesquisar', 'frusantos'); ?></span>
		<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true">
			<circle cx="11" cy="11" r="7" />
			<path stroke-linecap="round" d="m20 20-3.2-3.2" />
		</svg>
	</button>

	<?php frusantos_language_switcher(); ?>
</div>

<button type="button" class="lg:hidden" data-menu-toggle aria-expanded="false" aria-controls="mobile-menu">
	<span class="sr-only"><?php esc_html_e('Abrir menu', 'frusantos'); ?></span>
	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
		<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5M3.75 17.25h16.5" />
	</svg>
</button>

<div id="mobile-menu" class="hidden absolute inset-x-0 top-full border-b border-neutral-200 bg-surface p-6 lg:hidden" data-menu-panel>
	<?php
	wp_nav_menu(
		[
			'theme_location' => 'primary',
			'container'      => false,
			'menu_class'     => 'site-nav flex flex-col gap-4 text-base font-semibold uppercase tracking-[.06em]',
			'fallback_cb'    => 'frusantos_primary_menu_fallback',
		]
	);
	?>

	<form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="mt-6 flex items-center gap-2 border-t border-neutral-200 pt-6">
		<label class="sr-only" for="site-search-input-mobile"><?php esc_html_e('Pesquisar', 'frusantos'); ?></label>
		<input type="search" id="site-search-input-mobile" name="s" placeholder="<?php esc_attr_e('Pesquisar no site…', 'frusantos'); ?>" class="w-full rounded-theme border border-neutral-300 px-4 py-3 text-sm normal-case tracking-normal shadow-none focus:border-slate focus:outline-none focus:ring-0">
		<button type="submit" class="btn-primary shrink-0 !px-4 !py-3">
			<span class="sr-only"><?php esc_html_e('Pesquisar', 'frusantos'); ?></span>
			<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="11" cy="11" r="7" /><path stroke-linecap="round" d="m20 20-3.2-3.2" /></svg>
		</button>
	</form>

	<div class="mt-6 border-t border-neutral-200 pt-6">
		<?php frusantos_language_switcher(); ?>
	</div>
</div>

<div id="site-search-panel" class="hidden fixed inset-0 z-50 opacity-0 transition-opacity duration-200" data-search-panel>
	<div class="absolute inset-0 bg-ink/70 backdrop-blur-sm" data-search-backdrop></div>

	<div class="relative flex min-h-full items-start justify-center px-6 pt-[16vh]">
		<div
			data-search-card
			class="w-full max-w-xl -translate-y-3 scale-95 rounded-2xl bg-white opacity-0 shadow-2xl transition duration-200 ease-out"
		>
			<form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-4 px-6 py-5">
				<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" class="shrink-0 text-primary-500" aria-hidden="true">
					<circle cx="11" cy="11" r="7" />
					<path stroke-linecap="round" d="m20 20-3.2-3.2" />
				</svg>
				<label class="sr-only" for="site-search-input"><?php esc_html_e('Pesquisar', 'frusantos'); ?></label>
				<input
					type="search"
					id="site-search-input"
					name="s"
					placeholder="<?php esc_attr_e('Pesquisar no site…', 'frusantos'); ?>"
					class="w-full border-0 bg-transparent p-0 text-lg normal-case tracking-normal text-ink shadow-none placeholder:text-neutral-400 focus:outline-none focus:ring-0"
					autocomplete="off"
				>
				<button type="submit" class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-primary-400 text-white transition duration-250 hover:bg-primary-500">
					<span class="sr-only"><?php esc_html_e('Pesquisar', 'frusantos'); ?></span>
					<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
						<path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M13 6l6 6-6 6" />
					</svg>
				</button>
				<button type="button" class="shrink-0 text-neutral-400 transition duration-250 hover:text-ink" data-search-close>
					<span class="sr-only"><?php esc_html_e('Fechar', 'frusantos'); ?></span>
					<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true">
						<path stroke-linecap="round" d="M6 6l12 12M18 6 6 18" />
					</svg>
				</button>
			</form>
		</div>
	</div>
</div>
