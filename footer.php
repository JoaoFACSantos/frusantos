<?php
/**
 * Rodapé do site.
 *
 * @package Frusantos
 */
?>
<footer id="colophon" class="bg-ink px-6 pb-7 pt-16 text-slate-200 lg:px-[150px] lg:pt-[72px]">
	<div class="grid gap-12 border-b border-white/10 pb-12 lg:grid-cols-[1.5fr_1fr_1fr_1fr] lg:gap-12 lg:pb-12">
		<div>
			<?php if (has_custom_logo()) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<a href="<?php echo esc_url(frusantos_home_url()); ?>" class="mb-[22px] block">
					<img
						src="<?php echo esc_url(FRUSANTOS_URI . '/assets/images/logo.png'); ?>"
						alt="<?php bloginfo('name'); ?>"
						width="1732"
						height="608"
						class="h-12 w-auto brightness-0 invert"
					>
				</a>
			<?php endif; ?>
			<p class="text-[15px] leading-relaxed text-slate-200/90">
				<?php bloginfo('name'); ?> — Frutos Selecionados, S.A.<br>
				<?php esc_html_e('Produção, comercialização e distribuição de produtos agrícolas, no mercado nacional e internacional.', 'frusantos'); ?>
			</p>
		</div>

		<div>
			<h3 class="mb-[18px] text-xs uppercase tracking-[.16em] text-white"><?php esc_html_e('Empresa', 'frusantos'); ?></h3>
			<?php
			wp_nav_menu(
				[
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => 'site-nav flex flex-col gap-[11px] text-[15px] [&_a]:text-slate-200 [&_a:hover]:text-white',
					'fallback_cb'    => 'frusantos_primary_menu_fallback',
				]
			);
			?>
		</div>

		<div>
			<h3 class="mb-[18px] text-xs uppercase tracking-[.16em] text-white"><?php esc_html_e('Políticas', 'frusantos'); ?></h3>
			<?php
			wp_nav_menu(
				[
					'theme_location' => 'footer',
					'container'      => false,
					'menu_class'     => 'site-nav mb-[22px] flex flex-col gap-[11px] text-[15px] [&_a]:text-slate-200 [&_a:hover]:text-white',
					'fallback_cb'    => 'frusantos_footer_menu_fallback',
				]
			);
			?>
			<a href="https://www.livroreclamacoes.pt/Inicio/" target="_blank" rel="noopener">
				<img
					src="<?php echo esc_url(FRUSANTOS_URI . '/assets/images/livro-reclamacoes.webp'); ?>"
					alt="<?php esc_attr_e('Livro de Reclamações', 'frusantos'); ?>"
					class="h-[46px] rounded bg-white px-2 py-1"
				>
			</a>
		</div>

		<div>
			<h3 class="mb-[18px] text-xs uppercase tracking-[.16em] text-white"><?php esc_html_e('Contactos', 'frusantos'); ?></h3>
			<p class="text-[15px] leading-loose text-slate-200/90">
				<?php esc_html_e('Parque Industrial de Ferreirim, Lt. 34', 'frusantos'); ?><br>
				<?php esc_html_e('3640-100 Ferreirim', 'frusantos'); ?><br>
				<a href="tel:+351254595821" class="hover:text-white">+351 254 595 821</a><br>
				<a href="mailto:frusantos@frusantos.com" class="hover:text-white">frusantos@frusantos.com</a>
			</p>
		</div>
	</div>

	<div class="flex flex-col items-center gap-6 pt-[26px] sm:flex-row sm:justify-between">
		<div class="flex items-center gap-[18px]">
			<img src="<?php echo esc_url(FRUSANTOS_URI . '/assets/images/norte2020.webp'); ?>" alt="Norte 2020" class="h-[34px] rounded bg-white px-2 py-1">
			<img src="<?php echo esc_url(FRUSANTOS_URI . '/assets/images/prr.webp'); ?>" alt="PRR" class="h-[34px] rounded bg-white px-2 py-1">
		</div>
		<div class="text-xs uppercase tracking-[.08em] text-slate-500">
			<?php echo esc_html(gmdate('Y')); ?> <?php esc_html_e('Todos os direitos reservados', 'frusantos'); ?>
			<strong class="text-white">&copy; <?php bloginfo('name'); ?> S.A.</strong>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
