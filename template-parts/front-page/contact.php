<?php
/**
 * Contactos + newsletter.
 *
 * O formulário de newsletter é placeholder (action="#") — ligar ao
 * provedor real (Brevo/Mailchimp/etc.) quando for escolhido.
 *
 * @package Frusantos
 */
?>
<section class="border-t border-neutral-200 bg-primary-900 text-white">
	<div class="container-site grid gap-12 py-section lg:grid-cols-2">
		<div class="fade-in-up">
			<h2 class="font-display text-display-sm"><?php esc_html_e('Fale connosco', 'frusantos'); ?></h2>
			<p class="mt-4 max-w-md text-primary-100">
				<?php esc_html_e('Para encomendas, orçamentos ou parcerias comerciais.', 'frusantos'); ?>
			</p>
			<a href="<?php echo esc_url(home_url('/contactos')); ?>" class="btn mt-8 bg-white text-primary-900 hover:bg-primary-50">
				<?php esc_html_e('Ver contactos', 'frusantos'); ?>
			</a>
		</div>

		<div class="fade-in-up" style="transition-delay: 100ms">
			<h3 class="font-display text-xl"><?php esc_html_e('Newsletter', 'frusantos'); ?></h3>
			<p class="mt-2 text-primary-100">
				<?php esc_html_e('Novidades e calendário de comercialização, por email.', 'frusantos'); ?>
			</p>
			<form action="#" method="post" class="mt-6 flex flex-col gap-3 sm:flex-row">
				<label class="sr-only" for="newsletter-email"><?php esc_html_e('Email', 'frusantos'); ?></label>
				<input
					type="email"
					id="newsletter-email"
					name="email"
					required
					placeholder="<?php esc_attr_e('o.seu@email.com', 'frusantos'); ?>"
					class="w-full rounded-theme border-0 px-4 py-3 text-ink placeholder:text-neutral-400 focus:ring-2 focus:ring-white"
				>
				<button type="submit" class="btn bg-secondary-500 text-white hover:bg-secondary-600">
					<?php esc_html_e('Subscrever', 'frusantos'); ?>
				</button>
			</form>
		</div>
	</div>
</section>
