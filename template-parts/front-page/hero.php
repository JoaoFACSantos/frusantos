<?php
/**
 * Hero estático — substitui o slider automático do site atual.
 *
 * TODO: texto e imagem finais. O importante nesta fase é a estrutura:
 * um título que diga a um comprador o que a empresa faz (ao contrário do
 * slogan vago atual "Sabores que se sentem há 35 anos"), sem carrossel.
 *
 * @package Frusantos
 */
?>
<section class="relative overflow-hidden">
	<div class="container-site grid items-center gap-12 py-section lg:grid-cols-2">
		<div class="fade-in-up">
			<h1 class="font-display text-display-lg text-ink">
				<?php esc_html_e('Castanha, azeite e hortícolas de Lamego, direto para o mundo.', 'frusantos'); ?>
			</h1>
			<p class="mt-6 max-w-xl text-lg text-neutral-600">
				<?php esc_html_e('35 anos a produzir, selecionar e distribuir produtos agrícolas de qualidade — para mercado nacional e internacional.', 'frusantos'); ?>
			</p>
			<div class="mt-10 flex flex-wrap gap-4">
				<a href="<?php echo esc_url(class_exists('WooCommerce') ? wc_get_page_permalink('shop') : home_url('/loja')); ?>" class="btn-primary">
					<?php esc_html_e('Ver produtos', 'frusantos'); ?>
				</a>
				<a href="<?php echo esc_url(home_url('/contactos')); ?>" class="btn-secondary">
					<?php esc_html_e('Pedir orçamento', 'frusantos'); ?>
				</a>
			</div>
		</div>

		<div class="fade-in-up aspect-[4/3] w-full rounded-theme bg-neutral-200" style="transition-delay: 100ms">
			<?php // TODO: fotografia real (grande, sem moldura) — é o maior ativo visual da empresa. ?>
		</div>
	</div>
</section>
