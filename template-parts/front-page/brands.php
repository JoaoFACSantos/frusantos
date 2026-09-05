<?php
/**
 * "As nossas marcas" — teaser com placeholders para os logótipos das
 * marcas (Saudade, Flor do Távora, …). Os placeholders são intencionais
 * — tal como no design aprovado — até termos os ficheiros reais de cada
 * logótipo de marca.
 *
 * @package Frusantos
 */

$frusantos_brand_names = [
	__('Saudade', 'frusantos'),
	__('Flor do Távora', 'frusantos'),
];
?>
<section class="bg-neutral-100 px-6 py-16 lg:px-[60px] lg:py-[88px]">
	<div class="fade-in-up mb-8 flex items-end justify-between">
		<div>
			<p class="eyebrow"><?php esc_html_e('Marcas próprias', 'frusantos'); ?></p>
			<h2 class="text-2xl sm:text-4xl"><?php esc_html_e('As nossas marcas', 'frusantos'); ?></h2>
		</div>
		<a href="<?php echo esc_url(home_url('/marcas/')); ?>" class="link-underline hidden sm:inline-block">
			<?php esc_html_e('Ver todas', 'frusantos'); ?>
		</a>
	</div>

	<div class="grid grid-cols-2 gap-5 lg:grid-cols-4">
		<?php foreach ($frusantos_brand_names as $frusantos_i => $frusantos_brand) : ?>
			<a
				href="<?php echo esc_url(home_url('/marcas/')); ?>"
				class="fade-in-up flex aspect-[3/2] items-center justify-center rounded-2xl border border-neutral-200 bg-white text-center font-mono text-xs text-neutral-400 transition duration-250 hover:border-primary-300 hover:text-neutral-600"
				style="transition-delay: <?php echo esc_attr($frusantos_i * 75); ?>ms; background-image: repeating-linear-gradient(135deg, #efede4 0 8px, #f7f5ee 8px 16px);"
			>
				<?php echo esc_html__('logótipo', 'frusantos') . '<br>' . esc_html($frusantos_brand); ?>
			</a>
		<?php endforeach; ?>
		<a href="<?php echo esc_url(home_url('/marcas/')); ?>" class="fade-in-up sm:hidden col-span-2 link-underline mt-2 text-center">
			<?php esc_html_e('Ver todas as marcas', 'frusantos'); ?>
		</a>
	</div>
</section>
