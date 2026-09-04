<?php
/**
 * Suporte base ao WooCommerce.
 *
 * Este ficheiro só declara compatibilidade e ajusta os wrappers — NÃO
 * inclui ainda os overrides visuais de templates. Esses ficam para a
 * fase seguinte, em /woocommerce (ver woocommerce/README.md).
 *
 * @package Frusantos
 */

if (!defined('ABSPATH')) {
	exit;
}

function frusantos_woocommerce_setup(): void {
	add_theme_support(
		'woocommerce',
		[
			'thumbnail_image_width'         => 640,
			'gallery_thumbnail_image_width' => 160,
			'single_image_width'            => 900,
			'product_grid'                  => [
				'default_rows'    => 3,
				'min_rows'        => 1,
				'default_columns' => 3,
				'min_columns'     => 1,
				'max_columns'     => 4,
			],
		]
	);
	add_theme_support('wc-product-gallery-zoom');
	add_theme_support('wc-product-gallery-lightbox');
	add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'frusantos_woocommerce_setup');

/**
 * A loja é estilizada inteiramente pelo Tailwind (via overrides de
 * templates), por isso desligamos o CSS por omissão do WooCommerce.
 */
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

/**
 * Trocar o wrapper por omissão do WooCommerce (<div class="woocommerce">)
 * pelo container do tema, para manter a largura e o padding consistentes
 * com o resto do site.
 */
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

function frusantos_woocommerce_wrapper_start(): void {
	echo '<main id="main" class="container-site py-section">';
}
add_action('woocommerce_before_main_content', 'frusantos_woocommerce_wrapper_start', 10);

function frusantos_woocommerce_wrapper_end(): void {
	echo '</main>';
}
add_action('woocommerce_after_main_content', 'frusantos_woocommerce_wrapper_end', 10);

/**
 * Número de produtos por linha na grelha da loja — alinhado com o
 * product_grid declarado acima.
 */
add_filter(
	'loop_shop_columns',
	function () {
		return 3;
	}
);
