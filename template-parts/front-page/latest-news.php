<?php
/**
 * Últimas notícias — WP_Query dinâmica, ao contrário do site atual que
 * tinha posts fixos de 2017/2021 diretamente na home (o que dava sensação
 * de site parado). Com isto, basta publicar para a home atualizar sozinha;
 * a secção desaparece sozinha se ainda não houver posts.
 *
 * @package Frusantos
 */

$frusantos_latest = new WP_Query(
	[
		'post_type'           => 'post',
		'posts_per_page'      => 3,
		'ignore_sticky_posts' => true,
		'no_found_rows'       => true,
	]
);

if (!$frusantos_latest->have_posts()) {
	return;
}
?>
<section class="border-t border-neutral-200">
	<div class="container-site py-section">
		<div class="fade-in-up flex items-end justify-between">
			<h2 class="font-display text-display-sm text-ink"><?php esc_html_e('Últimas notícias', 'frusantos'); ?></h2>
			<a href="<?php echo esc_url(home_url('/comunicacao')); ?>" class="text-sm font-medium text-primary-700 hover:underline">
				<?php esc_html_e('Ver todas', 'frusantos'); ?>
			</a>
		</div>

		<div class="mt-12 grid gap-8 md:grid-cols-3">
			<?php
			$frusantos_i = 0;
			while ($frusantos_latest->have_posts()) :
				$frusantos_latest->the_post();
				?>
				<article class="fade-in-up" style="transition-delay: <?php echo esc_attr($frusantos_i * 75); ?>ms">
					<a href="<?php the_permalink(); ?>" class="block">
						<?php if (has_post_thumbnail()) : ?>
							<div class="aspect-[4/3] overflow-hidden rounded-theme bg-neutral-200">
								<?php the_post_thumbnail('frusantos-card', ['class' => 'h-full w-full object-cover']); ?>
							</div>
						<?php endif; ?>
						<h3 class="mt-4 font-display text-lg text-ink"><?php the_title(); ?></h3>
					</a>
					<?php frusantos_posted_on(); ?>
				</article>
				<?php
				$frusantos_i++;
			endwhile;
			wp_reset_postdata();
			?>
		</div>
	</div>
</section>
