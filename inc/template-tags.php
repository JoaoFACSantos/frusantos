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
 * URL de uma página fixa do tema (marcas, loja, contactos, …) já no idioma
 * atual. Todas as traduções destas páginas usam o MESMO slug (só o prefixo
 * /en//fr//es/ muda, via Polylang) — por isso basta juntar o slug à raiz do
 * idioma atual, em vez de um home_url('/slug/') fixo que ficaria sempre em
 * português. Sem Polylang ativo, cai para home_url() normal.
 */
/**
 * Cada página fixa tem um slug diferente por idioma (URLs traduzidas a
 * sério, ex: /marcas/ em português mas /en/brands/ em inglês — em vez de
 * forçar o mesmo slug em todas as línguas, que criava páginas ambíguas
 * para o WordPress/Polylang e confundia o redirecionamento canónico).
 * A chave usada em todo o tema continua a ser sempre o slug em português.
 */
function frusantos_lang_slug(string $key): string {
	$map = [
		'marcas'               => ['en' => 'brands', 'fr' => 'marques', 'es' => 'marcas'],
		'sobre-nos'            => ['en' => 'about-us', 'fr' => 'entreprise', 'es' => 'sobre-nosotros'],
		'loja'                 => ['en' => 'shop', 'fr' => 'boutique', 'es' => 'tienda'],
		'blog'                 => ['en' => 'news', 'fr' => 'actualites', 'es' => 'comunicacion'],
		'contactos'            => ['en' => 'contact', 'fr' => 'contacts', 'es' => 'contacto'],
		'alojamentos'          => ['en' => 'accommodation', 'fr' => 'hebergements', 'es' => 'alojamientos'],
		'politica-privacidade' => ['en' => 'privacy-policy', 'fr' => 'politique-de-confidentialite', 'es' => 'politica-de-privacidad'],
		'termos-condicoes'     => ['en' => 'terms-and-conditions', 'fr' => 'conditions-generales', 'es' => 'terminos-y-condiciones'],
		'litigios-online'      => ['en' => 'online-dispute-resolution', 'fr' => 'litiges-en-ligne', 'es' => 'litigios-en-linea'],
	];

	$lang = function_exists('pll_current_language') ? pll_current_language() : 'pt';

	return $map[$key][$lang] ?? $key;
}

function frusantos_lang_url(string $slug): string {
	$localized = frusantos_lang_slug($slug);

	if (function_exists('pll_home_url')) {
		return trailingslashit(pll_home_url()) . $localized . '/';
	}

	return home_url('/' . $localized . '/');
}

/**
 * Início do site no idioma atual (equivalente a home_url('/'), mas
 * respeitando o prefixo /en//fr//es/ do Polylang).
 */
function frusantos_home_url(): string {
	return function_exists('pll_home_url') ? pll_home_url() : home_url('/');
}

/**
 * Seletor de idioma (PT/EN/FR/ES, via Polylang) — só a bandeira atual
 * fica visível; ao clicar abre uma lista com as restantes por baixo.
 * Cada bandeira liga à tradução da página atual, ou à página inicial
 * desse idioma se essa tradução ainda não existir. Usado no cabeçalho
 * (desktop) e no menu mobile — a função é chamada duas vezes na mesma
 * página, por isso o id do painel tem de ser único em cada chamada.
 */
function frusantos_language_switcher(): void {
	if (!function_exists('pll_the_languages')) {
		return;
	}

	$languages = pll_the_languages(['raw' => 1, 'hide_if_empty' => 0]);
	if (empty($languages)) {
		return;
	}

	static $frusantos_lang_switcher_instance = 0;
	$frusantos_lang_switcher_instance++;
	$panel_id = 'lang-panel-' . $frusantos_lang_switcher_instance;

	$current = null;
	foreach ($languages as $language) {
		if ($language['current_lang']) {
			$current = $language;
			break;
		}
	}
	$current = $current ?? reset($languages);
	?>
	<div class="relative">
		<button
			type="button"
			class="flex items-center gap-1.5"
			data-lang-toggle
			aria-expanded="false"
			aria-controls="<?php echo esc_attr($panel_id); ?>"
		>
			<span class="sr-only"><?php esc_html_e('Idioma', 'frusantos'); ?>: <?php echo esc_html($current['name']); ?></span>
			<img
				src="<?php echo esc_url(FRUSANTOS_URI . '/assets/images/flag-' . $current['slug'] . '.svg'); ?>"
				alt=""
				aria-hidden="true"
				class="block h-4 w-5 rounded-sm object-cover"
			>
			<svg data-lang-caret width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true" class="text-neutral-500 transition duration-250">
				<path stroke-linecap="round" stroke-linejoin="round" d="m6 9 6 6 6-6" />
			</svg>
		</button>

		<div
			id="<?php echo esc_attr($panel_id); ?>"
			data-lang-panel
			role="group"
			aria-label="<?php esc_attr_e('Idioma', 'frusantos'); ?>"
			class="hidden absolute right-0 top-full z-10 mt-2 min-w-[170px] rounded-theme border border-neutral-200 bg-white py-2 shadow-soft"
		>
			<?php foreach ($languages as $language) : ?>
				<a
					href="<?php echo esc_url($language['url']); ?>"
					class="flex items-center gap-2.5 px-4 py-2 text-sm normal-case tracking-normal transition duration-250 <?php echo $language['current_lang'] ? 'font-semibold text-ink' : 'text-neutral-600 hover:bg-neutral-100'; ?>"
					<?php echo $language['current_lang'] ? 'aria-current="true"' : ''; ?>
				>
					<img
						src="<?php echo esc_url(FRUSANTOS_URI . '/assets/images/flag-' . $language['slug'] . '.svg'); ?>"
						alt=""
						aria-hidden="true"
						class="block h-4 w-5 rounded-sm object-cover"
					>
					<?php echo esc_html($language['name']); ?>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
	<?php
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
			'url'   => frusantos_lang_url('sobre-nos'),
		],
		[
			'label' => __('Marcas', 'frusantos'),
			'url'   => frusantos_lang_url('marcas'),
		],
		[
			'label' => __('Comunicação', 'frusantos'),
			'url'   => frusantos_lang_url('blog'),
		],
		[
			'label' => __('Loja', 'frusantos'),
			'url'   => class_exists('WooCommerce') ? wc_get_page_permalink('shop') : frusantos_lang_url('loja'),
		],
		[
			'label' => __('Alojamentos', 'frusantos'),
			'url'   => frusantos_lang_url('alojamentos'),
		],
		[
			'label' => __('Contactos', 'frusantos'),
			'url'   => frusantos_lang_url('contactos'),
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
			'url'   => frusantos_lang_url('politica-privacidade'),
		],
		[
			'label' => __('Termos e Condições', 'frusantos'),
			'url'   => frusantos_lang_url('termos-condicoes'),
		],
		[
			'label' => __('Litígios Online', 'frusantos'),
			'url'   => frusantos_lang_url('litigios-online'),
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
