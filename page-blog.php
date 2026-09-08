<?php
/**
 * Template da página "Comunicação" — aplicado automaticamente à página
 * com o slug `blog` (hierarquia de templates do WordPress:
 * page-{slug}.php). Lista posts reais do WordPress (não um array
 * estático como no design original) — publicar um post normal atualiza
 * esta página sozinho, mesmo padrão já usado em
 * template-parts/front-page/latest-news.php.
 *
 * Os 10 posts e as 2 categorias (Blog, Press Release) foram criados a
 * partir do conteúdo real do site atual — ver histórico do projeto.
 *
 * Filtro por categoria e paginação feitos via parâmetros de URL
 * (?categoria=&pg=) em vez da hierarquia de arquivos nativa do
 * WordPress, para manter tudo dentro desta página dedicada.
 *
 * @package Frusantos
 */

get_header();

$frusantos_per_page = 10;
$frusantos_categoria = isset($_GET['categoria']) ? sanitize_title(wp_unslash($_GET['categoria'])) : '';
$frusantos_paged = isset($_GET['pg']) ? max(1, (int) $_GET['pg']) : 1;

$frusantos_filters = [
	''              => __('Todos', 'frusantos'),
	'noticias-blog' => __('Blog', 'frusantos'),
	'noticias-press' => __('Press Release', 'frusantos'),
];

function frusantos_blog_filter_url(string $slug): string {
	$args = [];
	if ($slug) {
		$args['categoria'] = $slug;
	}
	return $args ? add_query_arg($args, home_url('/blog/')) : home_url('/blog/');
}

$frusantos_query_args = [
	'post_type'           => 'post',
	'posts_per_page'      => $frusantos_per_page,
	'paged'               => $frusantos_paged,
	'ignore_sticky_posts' => true,
];

if ($frusantos_categoria) {
	$frusantos_query_args['category_name'] = $frusantos_categoria;
}

$frusantos_posts = new WP_Query($frusantos_query_args);
$frusantos_has_featured = 1 === $frusantos_paged && $frusantos_posts->found_posts > 1;
?>

<main id="main">
	<section class="relative flex min-h-[360px] items-center overflow-hidden sm:min-h-[420px]">
		<img
			src="<?php echo esc_url(FRUSANTOS_URI . '/assets/images/comunicacao-hero.jpg'); ?>"
			alt=""
			class="absolute inset-0 h-full w-full object-cover"
			fetchpriority="high"
		>
		<div class="absolute inset-0 bg-gradient-to-r from-ink/90 via-ink/70 to-ink/30"></div>

		<div class="relative px-6 py-16 lg:px-[60px]">
			<div class="mb-5 flex items-center gap-4">
				<span class="h-[3px] w-14 bg-primary-400"></span>
				<span class="font-mono text-xs uppercase tracking-[.24em] text-white"><?php esc_html_e('Comunicação', 'frusantos'); ?></span>
			</div>
			<h1 class="text-4xl leading-[1.02] text-primary-400 sm:text-6xl lg:text-[76px]"><?php esc_html_e('Novidades', 'frusantos'); ?></h1>
			<p class="mt-6 max-w-xl text-base leading-relaxed text-white sm:text-lg">
				<?php esc_html_e('Notas de imprensa, feiras internacionais, marcas e o que vai acontecendo na Frusantos.', 'frusantos'); ?>
			</p>
		</div>
	</section>

	<section class="px-6 py-16 lg:px-[60px] lg:py-[84px]">
		<div class="mb-9 flex flex-wrap items-center justify-between gap-4">
			<div class="flex flex-wrap gap-2.5">
				<?php foreach ($frusantos_filters as $slug => $label) : ?>
					<?php $frusantos_is_active = $frusantos_categoria === $slug; ?>
					<a
						href="<?php echo esc_url(frusantos_blog_filter_url($slug)); ?>"
						class="rounded-full border px-6 py-3 text-xs font-bold uppercase tracking-[.1em] transition duration-250 <?php echo $frusantos_is_active ? 'border-slate bg-slate text-white' : 'border-neutral-300 bg-transparent text-neutral-700 hover:border-slate'; ?>"
					>
						<?php echo esc_html($label); ?>
					</a>
				<?php endforeach; ?>
			</div>
			<p class="text-sm text-neutral-500">
				<?php
				printf(
					/* translators: %s: número de publicações */
					esc_html(_n('%s publicação', '%s publicações', $frusantos_posts->found_posts, 'frusantos')),
					esc_html(number_format_i18n($frusantos_posts->found_posts))
				);
				?>
			</p>
		</div>

		<?php if (!$frusantos_posts->have_posts()) : ?>
			<?php get_template_part('template-parts/content/none'); ?>
		<?php else : ?>
			<?php
			$frusantos_i = 0;
			while ($frusantos_posts->have_posts()) :
				$frusantos_posts->the_post();
				$frusantos_cats = get_the_category();
				$frusantos_cat_name = !empty($frusantos_cats) ? $frusantos_cats[0]->name : '';
				?>

				<?php if (0 === $frusantos_i && $frusantos_has_featured) : ?>
					<a href="<?php the_permalink(); ?>" class="fade-in-up mb-5 grid overflow-hidden rounded-theme bg-white shadow-soft transition duration-300 hover:shadow-lg sm:grid-cols-2">
						<div class="relative min-h-[260px]">
							<?php if (has_post_thumbnail()) : ?>
								<?php the_post_thumbnail('frusantos-card', ['class' => 'absolute inset-0 h-full w-full object-cover']); ?>
							<?php else : ?>
								<div class="absolute inset-0 bg-neutral-200"></div>
							<?php endif; ?>
							<div class="absolute left-5 top-5 rounded-theme bg-white px-3.5 py-2.5 text-center leading-none shadow-soft">
								<div class="text-xl font-extrabold text-ink"><?php echo esc_html(get_the_date('d')); ?></div>
								<div class="mt-1 font-mono text-[10px] uppercase tracking-[.14em] text-neutral-500"><?php echo esc_html(get_the_date('M')); ?></div>
							</div>
						</div>
						<div class="flex flex-col justify-center gap-4 p-8 sm:p-10">
							<div class="flex flex-wrap items-center gap-3">
								<?php if ($frusantos_cat_name) : ?>
									<span class="rounded bg-secondary-500 px-3 py-1.5 font-mono text-[11px] uppercase tracking-[.1em] text-white"><?php echo esc_html($frusantos_cat_name); ?></span>
								<?php endif; ?>
								<span class="font-mono text-xs uppercase tracking-[.14em] text-primary-600"><?php esc_html_e('Em destaque', 'frusantos'); ?></span>
							</div>
							<h2 class="text-2xl leading-snug sm:text-3xl"><?php the_title(); ?></h2>
							<p class="max-w-xl text-base leading-relaxed text-neutral-600"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 30)); ?></p>
							<span class="btn-primary mt-1 self-start"><?php esc_html_e('Ler mais', 'frusantos'); ?></span>
						</div>
					</a>
				<?php else : ?>
					<?php if ($frusantos_has_featured && 1 === $frusantos_i) : ?>
						<div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
					<?php elseif (!$frusantos_has_featured && 0 === $frusantos_i) : ?>
						<div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
					<?php endif; ?>

					<article class="fade-in-up flex flex-col overflow-hidden rounded-theme bg-white shadow-soft transition duration-300 hover:-translate-y-1 hover:shadow-lg">
						<a href="<?php the_permalink(); ?>" class="relative block aspect-[16/10] overflow-hidden">
							<?php if (has_post_thumbnail()) : ?>
								<?php the_post_thumbnail('frusantos-card', ['class' => 'h-full w-full object-cover']); ?>
							<?php else : ?>
								<div class="h-full w-full bg-neutral-200"></div>
							<?php endif; ?>
							<div class="absolute left-4 top-4 rounded-theme bg-white px-3 py-2 text-center leading-none shadow-soft">
								<div class="text-lg font-extrabold text-ink"><?php echo esc_html(get_the_date('d')); ?></div>
								<div class="mt-0.5 font-mono text-[9px] uppercase tracking-[.14em] text-neutral-500"><?php echo esc_html(get_the_date('M')); ?></div>
							</div>
							<?php if ($frusantos_cat_name) : ?>
								<span class="absolute -bottom-3 left-4 rounded bg-secondary-500 px-3 py-1.5 font-mono text-[10px] uppercase tracking-[.1em] text-white"><?php echo esc_html($frusantos_cat_name); ?></span>
							<?php endif; ?>
						</a>
						<div class="flex flex-1 flex-col gap-3.5 p-6 pt-7">
							<h3 class="text-lg font-bold normal-case leading-snug tracking-normal text-ink">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h3>
							<p class="flex-1 text-sm leading-relaxed text-neutral-600"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 18)); ?></p>
							<a href="<?php the_permalink(); ?>" class="text-xs font-bold uppercase tracking-[.1em] text-secondary-500"><?php esc_html_e('Ler mais', 'frusantos'); ?></a>
						</div>
					</article>
				<?php endif; ?>

				<?php
				$frusantos_i++;
			endwhile;
			?>
			</div>
			<?php wp_reset_postdata(); ?>

			<?php
			$frusantos_total_pages = $frusantos_posts->max_num_pages;
			if ($frusantos_total_pages > 1) :
				?>
				<div class="mt-11 flex flex-wrap items-center justify-center gap-2.5">
					<?php for ($frusantos_p = 1; $frusantos_p <= $frusantos_total_pages; $frusantos_p++) : ?>
						<?php $frusantos_page_url = add_query_arg(array_filter(['categoria' => $frusantos_categoria, 'pg' => 1 === $frusantos_p ? null : $frusantos_p]), home_url('/blog/')); ?>
						<a
							href="<?php echo esc_url($frusantos_page_url); ?>"
							class="flex h-11 w-11 items-center justify-center rounded-full text-sm font-bold transition duration-250 <?php echo $frusantos_p === $frusantos_paged ? 'bg-secondary-500 text-white' : 'border border-neutral-300 text-ink hover:border-secondary-500 hover:text-secondary-500'; ?>"
						>
							<?php echo esc_html($frusantos_p); ?>
						</a>
					<?php endfor; ?>
				</div>
			<?php endif; ?>
		<?php endif; ?>
	</section>
</main>

<?php
get_footer();
