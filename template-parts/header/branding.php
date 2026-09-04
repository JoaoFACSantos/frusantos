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
		<a href="<?php echo esc_url(home_url('/')); ?>" class="font-display text-xl font-semibold text-ink">
			<?php bloginfo('name'); ?>
		</a>
	<?php endif; ?>
</div>
