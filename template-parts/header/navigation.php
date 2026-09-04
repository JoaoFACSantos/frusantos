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
<nav class="hidden items-center gap-8 lg:flex" aria-label="<?php esc_attr_e('Menu principal', 'frusantos'); ?>">
	<?php
	wp_nav_menu(
		[
			'theme_location' => 'primary',
			'container'      => false,
			'menu_class'     => 'flex items-center gap-8 text-sm font-medium text-ink',
			'fallback_cb'    => false,
		]
	);
	?>

	<?php if (class_exists('WooCommerce')) : ?>
		<a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="flex items-center gap-1 text-sm font-medium text-ink" aria-label="<?php esc_attr_e('Carrinho', 'frusantos'); ?>">
			<?php esc_html_e('Carrinho', 'frusantos'); ?>
			<span>(<?php echo esc_html(WC()->cart ? WC()->cart->get_cart_contents_count() : 0); ?>)</span>
		</a>
	<?php endif; ?>
</nav>

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
			'menu_class'     => 'flex flex-col gap-4 text-base font-medium text-ink',
			'fallback_cb'    => false,
		]
	);
	?>
</div>
