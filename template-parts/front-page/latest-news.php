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
<section class="px-6 py-16 lg:px-[60px] lg:py-[88px]">
	<div class="fade-in-up mb-8 flex items-end justify-between">
		<div>
			<p class="eyebrow"><?php esc_html_e('Comunicação', 'frusantos'); ?></p>
			<h2 class="text-2xl sm:text-4xl"><?php esc_html_e('Novidades sempre fresquinhas', 'frusantos'); ?></h2>
		</div>
		<a href="<?php echo esc_url(home_url('/blog/')); ?>" class="link-underline hidden sm:inline-block">
			<?php esc_html_e('Toda a comunicação', 'frusantos'); ?>
		</a>
	</div>

	<div class="grid gap-5 md:grid-cols-3">
		<?php
		$frusantos_i = 0;
		while ($frusantos_latest->have_posts()) :
			$frusantos_latest->the_post();
			?>
			<article class="fade-in-up flex flex-col overflow-hidden rounded-theme border border-neutral-200 bg-white transition duration-250 hover:-translate-y-1 hover:shadow-soft" style="transition-delay: <?php echo esc_attr($frusantos_i * 75); ?>ms">
				<a href="<?php the_permalink(); ?>" class="relative block h-[224px] overflow-hidden">
					<?php if (has_post_thumbnail()) : ?>
						<?php the_post_thumbnail('frusantos-card', ['class' => 'h-full w-full object-cover']); ?>
					<?php else : ?>
						<div class="h-full w-full bg-neutral-200"></div>
					<?php endif; ?>
					<span class="absolute bottom-4 left-4 rounded-full bg-secondary-500 px-3 py-1.5 font-mono text-[11px] uppercase tracking-[.12em] text-white">
						<?php echo esc_html(get_the_date('d M')); ?>
					</span>
				</a>
				<div class="flex flex-1 flex-col p-6">
					<h3 class="mb-2.5 text-lg font-bold normal-case leading-snug tracking-normal text-ink">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h3>
					<p class="mb-5 flex-1 text-[15px] leading-relaxed text-neutral-600">
						<?php echo esc_html(wp_trim_words(get_the_excerpt(), 20)); ?>
					</p>
					<a href="<?php the_permalink(); ?>" class="link-underline self-start !text-xs">
						<?php esc_html_e('Ler mais', 'frusantos'); ?>
					</a>
				</div>
			</article>
			<?php
			$frusantos_i++;
		endwhile;
		wp_reset_postdata();
		?>
	</div>
</section>
