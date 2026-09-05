<?php
/**
 * Internacionalização — secção de contraste (fundo escuro) com o projeto
 * de internacionalização (Norte 2020) e um placeholder para o calendário
 * de comercialização, tal como no design aprovado (a preencher com dados
 * reais quando existirem).
 *
 * @package Frusantos
 */
?>
<section class="grid gap-10 bg-slate px-6 py-16 text-white lg:grid-cols-[1fr_1.15fr] lg:gap-16 lg:px-[60px] lg:py-[88px]">
	<div class="fade-in-up">
		<p class="mb-[18px] font-mono text-xs uppercase tracking-[.22em] text-primary-300"><?php esc_html_e('Internacionalização', 'frusantos'); ?></p>
		<h2 class="mb-5 text-2xl leading-tight sm:text-4xl sm:leading-[1.08]">
			<?php esc_html_e('Produtos portugueses, mercados internacionais', 'frusantos'); ?>
		</h2>
		<p class="mb-8 text-base leading-relaxed text-slate-200 sm:text-[17px]">
			<?php esc_html_e('Levamos a produção nacional a novos mercados, com apoio do projeto de internacionalização da Frusantos no âmbito do Norte 2020.', 'frusantos'); ?>
		</p>
		<div class="flex flex-wrap items-center gap-4">
			<a href="<?php echo esc_url(home_url('/projeto-de-internacionalizacao-da-frusantos/')); ?>" class="btn-accent">
				<?php esc_html_e('Conhecer o projeto', 'frusantos'); ?>
			</a>
			<a href="<?php echo esc_url(home_url('/contactos/')); ?>" class="inline-block border-b-2 border-white/45 pb-1 text-[13px] font-bold uppercase tracking-[.1em] text-white transition duration-250 hover:border-white">
				<?php esc_html_e('Falar com o comercial', 'frusantos'); ?>
			</a>
		</div>
	</div>

	<div class="fade-in-up rounded-theme border border-white/15 bg-white/[0.07] p-7" style="transition-delay: 100ms">
		<div class="mb-6 flex items-baseline justify-between">
			<h3 class="text-lg font-bold uppercase tracking-[.02em] text-white"><?php esc_html_e('Calendário de comercialização', 'frusantos'); ?></h3>
			<span class="font-mono text-[11px] tracking-[.14em] text-primary-300"><?php echo esc_html(gmdate('Y')); ?></span>
		</div>
		<div class="rounded-theme border border-dashed border-white/35 p-7">
			<p class="mb-3.5 font-mono text-[11px] uppercase tracking-[.16em] text-primary-300"><?php esc_html_e('Espaço reservado', 'frusantos'); ?></p>
			<p class="text-[15px] leading-relaxed text-slate-200">
				<?php esc_html_e('Disponibilidade mês a mês de castanha, azeite e hortícolas — a preencher com os dados reais de comercialização.', 'frusantos'); ?>
			</p>
		</div>
		<a href="<?php echo esc_url(home_url('/contactos/')); ?>" class="mt-7 inline-block border-b-2 border-primary-400 pb-1 text-xs font-bold uppercase tracking-[.12em] text-white">
			<?php esc_html_e('Saber mais', 'frusantos'); ?>
		</a>
	</div>
</section>
