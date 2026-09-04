<?php
/**
 * Template 404.
 *
 * @package Frusantos
 */

get_header();
?>

<main id="main" class="container-site py-section text-center">
	<h1 class="font-display text-display-md text-ink"><?php esc_html_e('Página não encontrada', 'frusantos'); ?></h1>
	<p class="mx-auto mt-4 max-w-md text-neutral-600">
		<?php esc_html_e('O conteúdo que procura pode ter sido movido ou já não existe.', 'frusantos'); ?>
	</p>
	<a href="<?php echo esc_url(home_url('/')); ?>" class="btn-primary mt-8 inline-flex">
		<?php esc_html_e('Voltar ao início', 'frusantos'); ?>
	</a>
</main>

<?php
get_footer();
