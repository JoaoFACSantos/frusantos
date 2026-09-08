<?php
/**
 * As três áreas de negócio da empresa: hortícolas, azeite, transportes
 * (mesma estrutura da secção "O que fazemos" de frusantos.com e do
 * design aprovado). Todas apontam para "Sobre nós", onde a informação
 * detalhada de cada área já existe.
 *
 * @package Frusantos
 */

$frusantos_areas = [
	[
		'title' => __('Produtos Hortícolas', 'frusantos'),
		'text'  => __('Produção e Comércio por grosso de frutos e de produtos hortícolas', 'frusantos'),
		'image' => 'hero-castanha.webp',
	],
	[
		'title' => __('Produção de Azeite', 'frusantos'),
		'text'  => __('Produção e Comércio de Azeite', 'frusantos'),
		'image' => 'produto-saudade.jpg',
	],
	[
		'title' => __('Transportes', 'frusantos'),
		'text'  => __('Transportes Rodoviários de Mercadorias', 'frusantos'),
		'image' => 'produto-loja.jpg',
	],
];
?>
<section class="px-6 pb-16 lg:px-[150px] lg:pb-[96px]">
	<div class="fade-in-up mb-8 flex items-end justify-between">
		<div>
			<p class="eyebrow"><?php esc_html_e('Áreas de negócio', 'frusantos'); ?></p>
			<h2 class="text-2xl sm:text-4xl"><?php esc_html_e('O que fazemos', 'frusantos'); ?></h2>
		</div>
		<span class="hidden font-mono text-xs tracking-[.2em] text-neutral-400 sm:block">01 — 03</span>
	</div>

	<div class="grid gap-5 md:grid-cols-3">
		<?php foreach ($frusantos_areas as $i => $area) : ?>
			<a
				href="<?php echo esc_url(home_url('/sobre-nos/')); ?>"
				class="fade-in-up group overflow-hidden rounded-theme border border-neutral-200 bg-white transition duration-300 hover:-translate-y-1.5 hover:border-primary-300 hover:shadow-soft"
				style="transition-delay: <?php echo esc_attr($i * 75); ?>ms"
			>
				<div class="relative h-[200px] overflow-hidden">
					<img
						src="<?php echo esc_url(FRUSANTOS_URI . '/assets/images/' . $area['image']); ?>"
						alt=""
						class="h-full w-full object-cover transition duration-500 ease-out group-hover:scale-110"
						loading="lazy"
					>
					<div class="absolute inset-0 bg-ink/0 transition duration-300 group-hover:bg-ink/10"></div>
					<span class="absolute left-4 top-4 rounded-full bg-surface/90 px-2.5 py-1.5 font-mono text-[11px] tracking-[.1em] transition duration-300 group-hover:bg-secondary-500 group-hover:text-white">
						<?php echo esc_html(sprintf('%02d', $i + 1)); ?>
					</span>
				</div>
				<div class="p-6">
					<h3 class="mb-2.5 text-[19px] font-bold uppercase tracking-[.03em] text-ink transition duration-250 group-hover:text-secondary-500"><?php echo esc_html($area['title']); ?></h3>
					<p class="text-[15px] leading-relaxed text-neutral-600"><?php echo esc_html($area['text']); ?></p>
					<span class="mt-3 flex items-center gap-1.5 text-xs font-bold uppercase tracking-[.1em] text-primary-600 opacity-0 transition duration-300 group-hover:opacity-100">
						<?php esc_html_e('Saber mais', 'frusantos'); ?>
						<span aria-hidden="true" class="inline-block transition duration-300 -translate-x-1 group-hover:translate-x-0">&rarr;</span>
					</span>
				</div>
			</a>
		<?php endforeach; ?>
	</div>
</section>
