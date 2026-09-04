<?php
/**
 * Cartão de post usado nos loops de arquivo/blog.
 *
 * @package Frusantos
 */
?>
<article <?php post_class('fade-in-up'); ?>>
	<a href="<?php the_permalink(); ?>" class="block">
		<?php if (has_post_thumbnail()) : ?>
			<div class="aspect-[4/3] overflow-hidden rounded-theme bg-neutral-200">
				<?php the_post_thumbnail('frusantos-card', ['class' => 'h-full w-full object-cover']); ?>
			</div>
		<?php endif; ?>
		<h2 class="mt-4 font-display text-lg text-ink"><?php the_title(); ?></h2>
	</a>

	<div class="mt-2">
		<?php frusantos_posted_on(); ?>
	</div>

	<p class="mt-3 text-neutral-600"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 20)); ?></p>
</article>
