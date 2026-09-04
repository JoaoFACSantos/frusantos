<?php
/**
 * Funções de apoio usadas nos templates (não hooks — chamadas diretamente
 * a partir de header.php, footer.php, single.php, etc.).
 *
 * @package Frusantos
 */

if (!defined('ABSPATH')) {
	exit;
}

/**
 * Data de publicação, formatada e com <time> semântico.
 */
function frusantos_posted_on(): void {
	printf(
		'<time class="posted-on text-sm text-neutral-500" datetime="%1$s">%2$s</time>',
		esc_attr(get_the_date(DATE_W3C)),
		esc_html(get_the_date())
	);
}

/**
 * Autor do post, com link para o arquivo do autor.
 */
function frusantos_posted_by(): void {
	printf(
		'<span class="byline text-sm text-neutral-500">%1$s <a class="text-ink hover:underline" href="%2$s">%3$s</a></span>',
		esc_html__('por', 'frusantos'),
		esc_url(get_author_posts_url((int) get_the_author_meta('ID'))),
		esc_html(get_the_author())
	);
}

/**
 * Paginação de arquivos/blog, estilizada com classes Tailwind.
 */
function frusantos_pagination(): void {
	the_posts_pagination(
		[
			'mid_size'  => 1,
			'prev_text' => __('&larr; Anteriores', 'frusantos'),
			'next_text' => __('Seguintes &rarr;', 'frusantos'),
			'class'     => 'pagination',
		]
	);
}

/**
 * Título da página de arquivo (blog, categoria, etc.), sem o prefixo
 * "Categoria:" / "Arquivos de:" por omissão do WordPress.
 */
function frusantos_archive_title(): string {
	if (is_category()) {
		return single_cat_title('', false);
	}

	if (is_tag()) {
		return single_tag_title('', false);
	}

	if (is_author()) {
		return get_the_author();
	}

	if (is_search()) {
		return sprintf(__('Resultados para: %s', 'frusantos'), get_search_query());
	}

	if (is_home() || is_front_page()) {
		return __('Comunicação', 'frusantos');
	}

	return __('Arquivo', 'frusantos');
}
