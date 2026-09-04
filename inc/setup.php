<?php
/**
 * Setup base do tema: theme supports, menus, sidebars, tamanhos de imagem.
 *
 * @package Frusantos
 */

if (!defined('ABSPATH')) {
	exit;
}

function frusantos_setup() {
	load_theme_textdomain('frusantos', FRUSANTOS_DIR . '/languages');

	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support(
		'html5',
		[
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		]
	);
	add_theme_support(
		'custom-logo',
		[
			'height'      => 80,
			'width'       => 240,
			'flex-height' => true,
			'flex-width'  => true,
		]
	);
	add_theme_support('automatic-feed-links');
	add_theme_support('align-wide');
	add_theme_support('responsive-embeds');

	register_nav_menus(
		[
			'primary' => __('Menu Principal', 'frusantos'),
			'footer'  => __('Menu Rodapé', 'frusantos'),
		]
	);

	// Tamanhos de imagem usados nos templates (cartões de produto/notícia, hero).
	add_image_size('frusantos-card', 640, 480, true);
	add_image_size('frusantos-hero', 1920, 1080, true);
}
add_action('after_setup_theme', 'frusantos_setup');

function frusantos_content_width() {
	$GLOBALS['content_width'] = 1280;
}
add_action('after_setup_theme', 'frusantos_content_width', 0);

function frusantos_widgets_init() {
	$shared_args = [
		'before_widget' => '<div class="footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="mb-4 text-sm font-semibold uppercase tracking-wide text-neutral-400">',
		'after_title'   => '</h3>',
	];

	register_sidebar(
		array_merge(
			$shared_args,
			[
				'name' => __('Rodapé — Coluna 1', 'frusantos'),
				'id'   => 'footer-1',
			]
		)
	);

	register_sidebar(
		array_merge(
			$shared_args,
			[
				'name' => __('Rodapé — Coluna 2', 'frusantos'),
				'id'   => 'footer-2',
			]
		)
	);

	register_sidebar(
		array_merge(
			$shared_args,
			[
				'name' => __('Rodapé — Coluna 3', 'frusantos'),
				'id'   => 'footer-3',
			]
		)
	);
}
add_action('widgets_init', 'frusantos_widgets_init');

/**
 * Limpar o <head> de coisas que o WordPress inclui por omissão e que
 * o tema não usa (RSD, wlwmanifest, shortlink, etc.).
 */
function frusantos_cleanup_head() {
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_shortlink_wp_head');
	remove_action('wp_head', 'wp_generator');
}
add_action('init', 'frusantos_cleanup_head');
