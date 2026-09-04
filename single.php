<?php
/**
 * Template de post individual (blog / Comunicação).
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
				<?php
				$frusantos_categories = get_the_category();
				if (!empty($frusantos_categories)) :
					?>
					<p class="mb-3 text-sm font-medium uppercase tracking-wide text-primary-700">
						<?php echo esc_html($frusantos_categories[0]->name); ?>
					</p>
				<?php endif; ?>

				<h1 class="font-display text-display-md text-ink"><?php the_title(); ?></h1>

				<div class="mt-4 flex items-center gap-3">
					<?php frusantos_posted_by(); ?>
					<span class="text-neutral-300" aria-hidden="true">&middot;</span>
					<?php frusantos_posted_on(); ?>
				</div>
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
			$frusantos_tags = get_the_tag_list('', ', ');
			if ($frusantos_tags) :
				?>
				<footer class="mt-10 border-t border-neutral-200 pt-6">
					<p class="text-sm text-neutral-500"><?php echo wp_kses_post($frusantos_tags); ?></p>
				</footer>
			<?php endif; ?>
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
