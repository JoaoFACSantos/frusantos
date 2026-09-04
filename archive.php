<?php
/**
 * Template de arquivo (categorias, tags, autores, blog "Comunicação").
 *
 * @package Frusantos
 */

get_header();
?>

<main id="main" class="container-site py-section">
	<header class="fade-in-up mb-12">
		<h1 class="font-display text-display-md text-ink"><?php echo esc_html(frusantos_archive_title()); ?></h1>

		<?php
		$frusantos_description = get_the_archive_description();
		if ($frusantos_description) :
			?>
			<div class="mt-4 max-w-2xl text-neutral-600"><?php echo wp_kses_post($frusantos_description); ?></div>
		<?php endif; ?>
	</header>

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
