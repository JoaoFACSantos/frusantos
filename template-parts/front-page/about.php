<?php
/**
 * "A empresa" — colagem de 3 fotos + texto institucional (35 anos de
 * experiência), com CTAs para "Sobre nós" e "Marcas".
 *
 * @package Frusantos
 */
?>
<section class="fade-in-up grid gap-10 px-6 py-16 lg:grid-cols-2 lg:items-center lg:gap-[72px] lg:px-[150px] lg:py-[96px]">
	<div class="grid grid-cols-2 grid-rows-[160px_200px] gap-3 sm:grid-rows-[200px_240px] sm:gap-4">
		<img
			src="<?php echo esc_url(FRUSANTOS_URI . '/assets/images/hero-castanha.webp'); ?>"
			alt="<?php esc_attr_e('Castanha Frusantos', 'frusantos'); ?>"
			class="col-span-2 h-full w-full rounded-theme object-cover"
			loading="lazy"
		>
		<img
			src="<?php echo esc_url(FRUSANTOS_URI . '/assets/images/produto-saudade.jpg'); ?>"
			alt="<?php esc_attr_e('Produto Saudade', 'frusantos'); ?>"
			class="h-full w-full rounded-theme object-cover"
			loading="lazy"
		>
		<img
			src="<?php echo esc_url(FRUSANTOS_URI . '/assets/images/produto-loja.jpg'); ?>"
			alt="<?php esc_attr_e('Loja Frusantos', 'frusantos'); ?>"
			class="h-full w-full rounded-theme object-cover"
			loading="lazy"
		>
	</div>

	<div>
		<p class="eyebrow"><?php esc_html_e('A empresa', 'frusantos'); ?></p>
		<h2 class="mb-6 text-3xl leading-tight sm:text-[50px] sm:leading-[1.03]">
			<?php esc_html_e('35 anos', 'frusantos'); ?><br>
			<span class="text-secondary-500"><?php esc_html_e('de experiência', 'frusantos'); ?></span>
		</h2>
		<p class="mb-8 text-base leading-relaxed text-neutral-700 sm:text-lg">
			<?php esc_html_e('Procuramos marcar a diferença, valorizamos a produção portuguesa e apostamos em produtos identitários de elevada qualidade, proporcionando através das nossas marcas, experiências degustativas, sensoriais e emocionais, que nos definem e caracterizam, que são nossas, da nossa região e do nosso país, Portugal.', 'frusantos'); ?>
		</p>
		<div class="flex flex-wrap items-center gap-4">
			<a href="<?php echo esc_url(home_url('/sobre-nos/')); ?>" class="btn-dark">
				<?php esc_html_e('Sobre nós', 'frusantos'); ?>
			</a>
			<a href="<?php echo esc_url(home_url('/marcas/')); ?>" class="link-underline">
				<?php esc_html_e('Ver as marcas', 'frusantos'); ?>
			</a>
		</div>
	</div>
</section>
