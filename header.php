<?php
/**
 * Cabeçalho do site (<head> + <header>). Não abre <main> aqui — cada
 * template abre e fecha o seu próprio <main id="main">, para que as
 * páginas WooCommerce (que envolvem o conteúdo via hooks, ver
 * inc/woocommerce.php) não fiquem com <main> duplicado.
 *
 * @package Frusantos
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="sr-only focus:not-sr-only focus:absolute focus:left-4 focus:top-4 focus:z-50 focus:rounded-theme focus:bg-white focus:px-4 focus:py-2" href="#main">
	<?php esc_html_e('Saltar para o conteúdo', 'frusantos'); ?>
</a>

<div id="site-header" class="site-header fixed inset-x-0 top-0 z-40 bg-surface/95 backdrop-blur">
	<?php get_template_part('template-parts/header/utility-bar'); ?>

	<header id="masthead" class="border-b border-neutral-200">
		<div class="relative mx-auto flex max-w-[1440px] items-center justify-between px-6 py-4 transition-[padding] duration-300 ease-out lg:px-[150px]" data-header-row>
			<?php get_template_part('template-parts/header/branding'); ?>
			<?php get_template_part('template-parts/header/navigation'); ?>
		</div>
	</header>
</div>

<?php /* Fora de #site-header de propósito: esse elemento tem `backdrop-blur`, e
o backdrop-filter cria um "containing block" para descendentes `fixed` — se o
painel de pesquisa ficasse lá dentro, o `fixed inset-0` ficava confinado à
altura do cabeçalho em vez de cobrir o ecrã todo. */ ?>
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
