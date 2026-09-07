<?php
/**
 * Navegação principal + menu mobile.
 *
 * O toggle mobile é controlado por src/js/main.js (initMobileMenu),
 * através dos atributos data-menu-toggle / data-menu-panel.
 *
 * @package Frusantos
 */
?>
<nav class="hidden items-center gap-[30px] text-[13px] font-semibold uppercase tracking-[.1em] lg:flex" aria-label="<?php esc_attr_e('Menu principal', 'frusantos'); ?>">
	<?php
	wp_nav_menu(
		[
			'theme_location' => 'primary',
			'container'      => false,
			'menu_class'     => 'site-nav flex items-center gap-[30px]',
			'fallback_cb'    => 'frusantos_primary_menu_fallback',
		]
	);
	?>
</nav>

<?php if (class_exists('WooCommerce')) : ?>
	<div class="hidden items-center gap-4 text-sm lg:flex">
		<a
			href="<?php echo esc_url(wc_get_cart_url()); ?>"
			class="flex items-center gap-2 rounded-full border border-neutral-300 px-4 py-[9px] font-semibold text-neutral-700 transition duration-250 hover:border-slate hover:text-ink"
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
	</div>
<?php endif; ?>

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
</div>
