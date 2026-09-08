<?php
/**
 * Hero — imagem de fundo a toda a largura com gradiente escuro, título,
 * texto e duas chamadas para ação. Estrutura copiada do design aprovado
 * (Claude Design, "Turno 4a").
 *
 * @package Frusantos
 */
?>
<section class="relative h-[420px] overflow-hidden sm:h-[560px] lg:h-[680px]">
	<img
		src="<?php echo esc_url(FRUSANTOS_URI . '/assets/images/hero-full.webp'); ?>"
		alt=""
		class="absolute inset-0 h-full w-full object-cover"
		fetchpriority="high"
	>
	<div class="absolute inset-0 bg-gradient-to-r from-ink/90 via-ink/60 to-ink/10 sm:via-ink/50 sm:to-ink/10"></div>

	<div class="relative flex h-full max-w-3xl flex-col justify-center px-6 text-white lg:px-[150px]">
		<div class="mb-6 flex items-center gap-3.5">
			<span class="h-[3px] w-12 bg-primary-400"></span>
			<span class="font-mono text-xs uppercase tracking-[.24em] text-slate-300">
				<?php esc_html_e('Frutos Selecionados, S.A.', 'frusantos'); ?>
			</span>
		</div>

		<h1 class="mb-6 text-3xl leading-[1.05] text-primary-400 sm:text-5xl lg:text-[78px] lg:leading-[1.02]">
			<?php esc_html_e('Sabores que se sentem há 35 anos', 'frusantos'); ?>
		</h1>

		<p class="mb-8 max-w-md text-base leading-relaxed text-slate-200 sm:mb-10 sm:max-w-lg sm:text-lg">
			<?php esc_html_e('Produção, comercialização e distribuição de produtos agrícolas, no mercado nacional e internacional.', 'frusantos'); ?>
		</p>

		<div class="flex flex-wrap gap-3">
			<a href="<?php echo esc_url(home_url('/marcas/')); ?>" class="btn-primary">
				<?php esc_html_e('Conheça as nossas marcas', 'frusantos'); ?>
			</a>
			<a href="<?php echo esc_url(home_url('/contactos/')); ?>" class="btn-outline">
				<?php esc_html_e('Contactar a empresa', 'frusantos'); ?>
			</a>
		</div>
	</div>
</section>
