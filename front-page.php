<?php
/**
 * Template da página inicial. Estrutura e conteúdo copiados do design
 * aprovado (Claude Design canvas, "Turno 4a" — versão mais recente):
 * hero + faixa de confiança + empresa + áreas de negócio + marcas +
 * internacionalização + notícias + loja/alojamentos + contacto/newsletter.
 *
 * @package Frusantos
 */

get_header();
?>

<main id="main">
	<?php
	get_template_part('template-parts/front-page/hero');
	get_template_part('template-parts/front-page/trust-strip');
	get_template_part('template-parts/front-page/about');
	get_template_part('template-parts/front-page/business-areas');
	get_template_part('template-parts/front-page/brands');
	get_template_part('template-parts/front-page/international');
	get_template_part('template-parts/front-page/latest-news');
	get_template_part('template-parts/front-page/dual-cta');
	get_template_part('template-parts/front-page/contact');
	?>
</main>

<?php
get_footer();
