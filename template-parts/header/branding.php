<?php
/**
 * Logótipo / nome do site no cabeçalho.
 *
 * @package Frusantos
 */
?>
<div class="site-branding">
	<?php if (has_custom_logo()) : ?>
		<?php the_custom_logo(); ?>
	<?php else : ?>
		<a href="<?php echo esc_url(home_url('/')); ?>" class="block" aria-label="<?php bloginfo('name'); ?>">
			<img
				src="<?php echo esc_url(FRUSANTOS_URI . '/assets/images/logo.png'); ?>"
				alt="<?php bloginfo('name'); ?> — <?php esc_attr_e('Frutos Selecionados', 'frusantos'); ?>"
				width="1732"
				height="608"
				class="h-14 w-auto"
			>
		</a>
	<?php endif; ?>
</div>
