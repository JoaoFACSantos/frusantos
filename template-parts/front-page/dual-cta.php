<?php
/**
 * Banner duplo — Loja online e Alojamentos, os dois "outros negócios"
 * que ainda não têm secção própria acima na página.
 *
 * @package Frusantos
 */

$frusantos_cta_cards = [
	[
		'label' => __('Loja', 'frusantos'),
		'title' => __('Loja online Frusantos', 'frusantos'),
		'text'  => __('Os produtos das nossas marcas, à venda diretamente.', 'frusantos'),
		'cta'   => __('Visitar a loja', 'frusantos'),
		'url'   => class_exists('WooCommerce') ? wc_get_page_permalink('shop') : frusantos_lang_url('loja'),
		'image' => 'produto-loja.jpg',
	],
	[
		'label' => __('Alojamentos', 'frusantos'),
		'title' => __('Ficar na nossa região', 'frusantos'),
		'text'  => __('Alojamentos Frusantos para quem visita Ferreirim e o Douro.', 'frusantos'),
		'cta'   => __('Ver alojamentos', 'frusantos'),
		'url'   => frusantos_lang_url('alojamentos'),
		'image' => 'hero-full.webp',
	],
];
?>
<section class="grid gap-5 px-6 pb-16 sm:grid-cols-2 lg:px-[150px] lg:pb-[88px]">
	<?php foreach ($frusantos_cta_cards as $frusantos_i => $card) : ?>
		<a
			href="<?php echo esc_url($card['url']); ?>"
			class="fade-in-up group relative block h-[260px] overflow-hidden rounded-theme sm:h-[300px]"
			style="transition-delay: <?php echo esc_attr($frusantos_i * 75); ?>ms"
		>
			<img
				src="<?php echo esc_url(FRUSANTOS_URI . '/assets/images/' . $card['image']); ?>"
				alt=""
				class="absolute inset-0 h-full w-full object-cover transition duration-500 group-hover:scale-105"
				loading="lazy"
			>
			<div class="absolute inset-0 bg-gradient-to-t from-ink/90 via-ink/15 to-transparent"></div>
			<div class="relative flex h-full flex-col justify-end p-8 text-white">
				<p class="mb-2.5 font-mono text-[11px] uppercase tracking-[.2em] text-primary-300"><?php echo esc_html($card['label']); ?></p>
				<h3 class="mb-2 text-2xl"><?php echo esc_html($card['title']); ?></h3>
				<p class="mb-[18px] max-w-sm text-sm leading-relaxed text-slate-200"><?php echo esc_html($card['text']); ?></p>
				<span class="link-underline self-start !border-primary-400 !text-white">
					<?php echo esc_html($card['cta']); ?>
				</span>
			</div>
		</a>
	<?php endforeach; ?>
</section>
