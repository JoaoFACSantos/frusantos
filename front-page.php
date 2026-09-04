<?php
/**
 * Template da página inicial — hero estático + 3 áreas de negócio +
 * últimas notícias + contacto/newsletter (substitui o slider automático
 * e os posts fixos de 2017/2021 do site atual).
 *
 * @package Frusantos
 */

get_header();
?>

<main id="main">
	<?php
	get_template_part('template-parts/front-page/hero');
	get_template_part('template-parts/front-page/business-areas');
	get_template_part('template-parts/front-page/latest-news');
	get_template_part('template-parts/front-page/contact');
	?>
</main>

<?php
get_footer();
