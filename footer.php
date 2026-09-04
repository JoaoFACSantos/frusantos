<?php
/**
 * Rodapé do site.
 *
 * @package Frusantos
 */
?>
<footer id="colophon" class="border-t border-neutral-200 bg-neutral-50">
	<div class="container-site grid gap-12 py-16 lg:grid-cols-4">
		<div class="lg:col-span-1">
			<?php if (has_custom_logo()) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<p class="font-display text-lg font-semibold text-ink"><?php bloginfo('name'); ?></p>
			<?php endif; ?>
			<?php if (get_bloginfo('description')) : ?>
				<p class="mt-4 text-sm text-neutral-500"><?php bloginfo('description'); ?></p>
			<?php endif; ?>
		</div>

		<?php if (is_active_sidebar('footer-1')) : ?>
			<div><?php dynamic_sidebar('footer-1'); ?></div>
		<?php endif; ?>

		<?php if (is_active_sidebar('footer-2')) : ?>
			<div><?php dynamic_sidebar('footer-2'); ?></div>
		<?php endif; ?>

		<?php if (is_active_sidebar('footer-3')) : ?>
			<div><?php dynamic_sidebar('footer-3'); ?></div>
		<?php endif; ?>
	</div>

	<div class="border-t border-neutral-200">
		<div class="container-site flex flex-col gap-4 py-6 text-xs text-neutral-500 sm:flex-row sm:items-center sm:justify-between">
			<p>
				&copy; <?php echo esc_html(gmdate('Y')); ?> <?php bloginfo('name'); ?>.
				<?php esc_html_e('Todos os direitos reservados.', 'frusantos'); ?>
			</p>

			<?php
			wp_nav_menu(
				[
					'theme_location' => 'footer',
					'container'      => false,
					'menu_class'     => 'flex flex-wrap gap-4',
					'fallback_cb'    => false,
				]
			);
			?>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
