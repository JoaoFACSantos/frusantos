<?php
/**
 * Barra de utilidade — acima do cabeçalho principal. Contactos rápidos +
 * link do projeto de internacionalização (mesma estrutura do design
 * aprovado / do site atual).
 *
 * @package Frusantos
 */
?>
<div class="hidden items-center justify-between bg-slate px-[60px] py-[11px] text-[13px] text-slate-200 lg:flex">
	<div class="flex items-center gap-[26px]">
		<a href="tel:+351254595821" class="flex items-center gap-[9px] hover:text-white">
			<img src="<?php echo esc_url(FRUSANTOS_URI . '/assets/images/icon-phone.svg'); ?>" alt="" class="h-3.5 w-3.5 shrink-0 brightness-0 invert">
			+351 254 595 821 <span class="text-slate-400">(chamada para a rede fixa nacional)</span>
		</a>
		<a href="mailto:frusantos@frusantos.com" class="flex items-center gap-[9px] hover:text-white">
			<img src="<?php echo esc_url(FRUSANTOS_URI . '/assets/images/icon-envelope.svg'); ?>" alt="" class="h-3.5 w-3.5 shrink-0 brightness-0 invert">
			frusantos@frusantos.com
		</a>
	</div>
	<div class="flex items-center gap-[22px]">
		<a href="<?php echo esc_url(home_url('/projeto-de-internacionalizacao-da-frusantos/')); ?>" class="text-xs uppercase tracking-[.08em] hover:text-white">
			<?php esc_html_e('Projeto de internacionalização', 'frusantos'); ?>
		</a>
	</div>
</div>
