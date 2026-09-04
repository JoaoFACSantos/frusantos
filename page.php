<?php
/**
 * Template genérico de página.
 *
 * @package Frusantos
 */

get_header();
?>

<main id="main" class="container-site py-section">
	<?php
	while (have_posts()) :
		the_post();
		?>
		<article <?php post_class('fade-in-up mx-auto max-w-3xl'); ?> id="post-<?php the_ID(); ?>">
			<header class="mb-10">
				<h1 class="font-display text-display-md text-ink"><?php the_title(); ?></h1>
			</header>

			<?php if (has_post_thumbnail()) : ?>
				<div class="mb-10 overflow-hidden rounded-theme">
					<?php the_post_thumbnail('large', ['class' => 'w-full']); ?>
				</div>
			<?php endif; ?>

			<div class="prose prose-neutral max-w-none">
				<?php the_content(); ?>
			</div>

			<?php
			wp_link_pages(
				[
					'before' => '<nav class="page-links mt-8">' . esc_html__('Páginas:', 'frusantos'),
					'after'  => '</nav>',
				]
			);
			?>
		</article>

		<?php if (comments_open() || get_comments_number()) : ?>
			<div class="mx-auto mt-16 max-w-3xl">
				<?php comments_template(); ?>
			</div>
		<?php endif; ?>
	<?php endwhile; ?>
</main>

<?php
get_footer();
