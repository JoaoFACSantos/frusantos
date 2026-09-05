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

/**
 * Estrutura de navegação principal, usada como fallback enquanto não
 * existir um menu "Menu Principal" configurado em Aparência > Menus, e
 * como fonte única de verdade para os links reais do site (mesma
 * estrutura de frusantos.com: A Empresa, Marcas, Comunicação, Loja,
 * Alojamentos, Contactos).
 */
function frusantos_nav_links(): array {
	return [
		[
			'label' => __('A Empresa', 'frusantos'),
			'url'   => home_url('/sobre-nos/'),
		],
		[
			'label' => __('Marcas', 'frusantos'),
			'url'   => home_url('/marcas/'),
		],
		[
			'label' => __('Comunicação', 'frusantos'),
			'url'   => home_url('/blog/'),
		],
		[
			'label' => __('Loja', 'frusantos'),
			'url'   => class_exists('WooCommerce') ? wc_get_page_permalink('shop') : home_url('/loja/'),
		],
		[
			'label' => __('Alojamentos', 'frusantos'),
			'url'   => home_url('/alojamentos/'),
		],
		[
			'label' => __('Contactos', 'frusantos'),
			'url'   => home_url('/contactos/'),
		],
	];
}

/**
 * Fallback do menu principal (desktop e mobile partilham a mesma
 * `menu_class`, passada pelo `wp_nav_menu` que chama isto).
 */
function frusantos_primary_menu_fallback(array $args): void {
	echo '<ul class="' . esc_attr($args['menu_class']) . '">';
	foreach (frusantos_nav_links() as $link) {
		printf(
			'<li><a href="%1$s">%2$s</a></li>',
			esc_url($link['url']),
			esc_html($link['label'])
		);
	}
	echo '</ul>';
}

/**
 * Fallback do menu de rodapé — links legais reais do site atual em vez
 * de placeholders (política de privacidade, termos, litígios online). O
 * livro de reclamações eletrónico é mostrado à parte, como selo/imagem
 * (ver footer.php), tal como no site atual.
 */
function frusantos_footer_menu_fallback(array $args): void {
	$links = [
		[
			'label' => __('Política de Privacidade', 'frusantos'),
			'url'   => home_url('/politica-privacidade/'),
		],
		[
			'label' => __('Termos e Condições', 'frusantos'),
			'url'   => home_url('/termos-condicoes/'),
		],
		[
			'label' => __('Litígios Online', 'frusantos'),
			'url'   => home_url('/litigios-online/'),
		],
	];

	echo '<ul class="' . esc_attr($args['menu_class']) . '">';
	foreach ($links as $link) {
		printf(
			'<li><a href="%1$s">%2$s</a></li>',
			esc_url($link['url']),
			esc_html($link['label'])
		);
	}
	echo '</ul>';
}
