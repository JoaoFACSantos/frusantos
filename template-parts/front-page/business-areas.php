<?php
/**
 * As três áreas de negócio da empresa: hortícolas, azeite, transportes.
 *
 * Conteúdo em array por agora — candidato natural a página de opções do
 * customizer ou campos ACF quando o resto do site estiver estável.
 *
 * @package Frusantos
 */

$frusantos_areas = [
	[
		'title' => __('Hortícolas', 'frusantos'),
		'text'  => __('Produção e comercialização de produtos hortícolas selecionados.', 'frusantos'),
		'link'  => home_url('/horticolas'),
	],
	[
		'title' => __('Azeite', 'frusantos'),
		'text'  => __('Azeite produzido e engarrafado nos nossos olivais em Lamego.', 'frusantos'),
		'link'  => home_url('/azeite'),
	],
	[
		'title' => __('Transportes', 'frusantos'),
		'text'  => __('Transportes rodoviários de mercadorias, nacionais e internacionais.', 'frusantos'),
		'link'  => home_url('/transportes'),
	],
];
?>
<section class="border-t border-neutral-200 bg-neutral-50">
	<div class="container-site py-section">
		<h2 class="fade-in-up font-display text-display-sm text-ink">
			<?php esc_html_e('O que fazemos', 'frusantos'); ?>
		</h2>

		<div class="mt-12 grid gap-8 md:grid-cols-3">
			<?php foreach ($frusantos_areas as $i => $area) : ?>
				<a
					href="<?php echo esc_url($area['link']); ?>"
					class="fade-in-up group block rounded-theme bg-white p-8 shadow-soft transition duration-250 hover:-translate-y-1"
					style="transition-delay: <?php echo esc_attr($i * 75); ?>ms"
				>
					<h3 class="font-display text-xl text-ink"><?php echo esc_html($area['title']); ?></h3>
					<p class="mt-3 text-neutral-600"><?php echo esc_html($area['text']); ?></p>
					<span class="mt-4 inline-flex items-center gap-1 text-sm font-medium text-primary-700">
						<?php esc_html_e('Saber mais', 'frusantos'); ?>
						<span aria-hidden="true" class="transition duration-250 group-hover:translate-x-1">&rarr;</span>
					</span>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>
