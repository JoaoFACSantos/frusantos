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

<?php get_template_part('template-parts/header/utility-bar'); ?>

<header id="masthead" class="sticky top-0 z-40 border-b border-neutral-200 bg-surface/95 backdrop-blur">
	<div class="relative flex items-center justify-between px-6 py-4 lg:px-[60px]">
		<?php get_template_part('template-parts/header/branding'); ?>
		<?php get_template_part('template-parts/header/navigation'); ?>
	</div>
</header>
