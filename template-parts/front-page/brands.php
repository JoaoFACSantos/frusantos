<?php
/**
 * "As nossas marcas" — teaser com os logótipos reais das marcas
 * (Saudade, Flor do Távora), os mesmos ficheiros usados em
 * page-marcas.php. Grid a 4 colunas no desktop para já acomodar
 * eventuais marcas futuras sem alterar a estrutura.
 *
 * @package Frusantos
 */

$frusantos_brands = [
	[
		'name' => __('Saudade', 'frusantos'),
		'logo' => 'logo-saudade.png',
	],
	[
		'name' => __('Flor do Távora', 'frusantos'),
		'logo' => 'logo-flor-tavora.svg',
	],
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
		<?php foreach ($frusantos_brands as $frusantos_i => $frusantos_brand) : ?>
			<a
				href="<?php echo esc_url(home_url('/marcas/')); ?>"
				class="fade-in-up flex aspect-[3/2] items-center justify-center rounded-2xl border border-neutral-200 bg-white p-8 transition duration-250 hover:border-primary-300 hover:shadow-soft"
				style="transition-delay: <?php echo esc_attr($frusantos_i * 75); ?>ms;"
			>
				<img
					src="<?php echo esc_url(FRUSANTOS_URI . '/assets/images/' . $frusantos_brand['logo']); ?>"
					alt="<?php echo esc_attr($frusantos_brand['name']); ?>"
					class="h-auto max-h-full w-full max-w-[180px] object-contain"
					loading="lazy"
				>
			</a>
		<?php endforeach; ?>
		<a href="<?php echo esc_url(home_url('/marcas/')); ?>" class="fade-in-up sm:hidden col-span-2 link-underline mt-2 text-center">
			<?php esc_html_e('Ver todas as marcas', 'frusantos'); ?>
		</a>
	</div>
</section>
