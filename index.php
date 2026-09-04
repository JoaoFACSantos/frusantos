<?php
/**
 * Template de fallback — obrigatório no WordPress (é o único template
 * que tem sempre de existir num tema). Na prática, front-page.php,
 * page.php, single.php e archive.php cobrem todos os casos normais deste
 * site; este ficheiro só entra em ação em situações não previstas.
 *
 * @package Frusantos
 */

get_header();
?>

<main id="main" class="container-site py-section">
	<?php if (have_posts()) : ?>
		<div class="grid gap-8 md:grid-cols-3">
			<?php
			while (have_posts()) :
				the_post();
				get_template_part('template-parts/content/entry');
			endwhile;
			?>
		</div>

		<?php frusantos_pagination(); ?>
	<?php else : ?>
		<?php get_template_part('template-parts/content/none'); ?>
	<?php endif; ?>
</main>

<?php
get_footer();
