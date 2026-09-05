<?php
/**
 * Faixa de confiança — 4 afirmações curtas logo abaixo do hero.
 *
 * @package Frusantos
 */

$frusantos_trust_items = [
	__('Produção própria em Ferreirim', 'frusantos'),
	__('Mercado nacional e internacional', 'frusantos'),
	__('Logística e transporte próprios', 'frusantos'),
	__('Marcas identitárias portuguesas', 'frusantos'),
];
?>
<div class="flex flex-col gap-4 border-b border-neutral-200 bg-neutral-100 px-6 py-6 text-xs font-semibold uppercase tracking-[.1em] text-neutral-700 sm:flex-row sm:flex-wrap sm:items-center sm:justify-between sm:px-[60px] sm:py-[22px]">
	<?php foreach ($frusantos_trust_items as $frusantos_item) : ?>
		<span class="flex items-center gap-3">
			<span class="h-0.5 w-[22px] shrink-0 bg-primary-400"></span>
			<?php echo esc_html($frusantos_item); ?>
		</span>
	<?php endforeach; ?>
</div>
