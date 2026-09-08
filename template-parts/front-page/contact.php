<?php
/**
 * Contacto + newsletter. A newsletter é apresentada tal como no design
 * aprovado (campos reais), mas sem back-end ligado ainda — falta escolher
 * o provedor (Brevo/Mailchimp/etc.) antes de ativar o envio, tal como o
 * "Calendário de comercialização" também fica reservado para dados reais.
 *
 * @package Frusantos
 */

$frusantos_contact_rows = [
	[
		'icon' => 'icon-cursor.svg',
		'html' => __('Parque Industrial de Ferreirim, Lt. 34<br>3640-100 Ferreirim', 'frusantos'),
		'sub'  => __('Ver no mapa', 'frusantos'),
		'url'  => 'https://goo.gl/maps/s3mmECoEVD4uQ67U6',
	],
	[
		'icon' => 'icon-phone.svg',
		'html' => '+351 254 595 821',
		'sub'  => __('(chamada rede fixa nacional)', 'frusantos'),
		'url'  => 'tel:+351254595821',
	],
	[
		'icon' => 'icon-envelope.svg',
		'html' => 'frusantos@frusantos.com',
		'sub'  => '',
		'url'  => 'mailto:frusantos@frusantos.com',
	],
];
?>
<section class="grid gap-12 bg-neutral-100 px-6 py-16 lg:grid-cols-2 lg:gap-16 lg:px-[150px] lg:py-20">
	<div class="fade-in-up">
		<p class="eyebrow"><?php esc_html_e('Contactos', 'frusantos'); ?></p>
		<h2 class="mb-6 text-2xl sm:text-4xl"><?php esc_html_e('Fale connosco', 'frusantos'); ?></h2>
		<div class="flex flex-col">
			<?php foreach ($frusantos_contact_rows as $frusantos_i => $row) : ?>
				<a href="<?php echo esc_url($row['url']); ?>" class="flex items-start gap-4 border-t border-neutral-300 py-5 <?php echo 2 === $frusantos_i ? 'border-b' : ''; ?>">
					<img src="<?php echo esc_url(FRUSANTOS_URI . '/assets/images/' . $row['icon']); ?>" alt="" class="mt-0.5 h-5 w-5 shrink-0">
					<span class="text-base leading-relaxed text-ink sm:text-lg">
						<?php echo wp_kses_post($row['html']); ?>
						<?php if ($row['sub']) : ?>
							<br><span class="text-sm text-neutral-500"><?php echo esc_html($row['sub']); ?></span>
						<?php endif; ?>
					</span>
				</a>
			<?php endforeach; ?>
		</div>
	</div>

	<div class="fade-in-up rounded-theme border border-neutral-200 bg-white p-7 sm:p-9" style="transition-delay: 100ms">
		<p class="eyebrow"><?php esc_html_e('Newsletter', 'frusantos'); ?></p>
		<h2 class="mb-2.5 text-xl sm:text-[28px]"><?php esc_html_e('Subscreva a nossa newsletter', 'frusantos'); ?></h2>
		<p class="mb-6 text-base text-neutral-600"><?php esc_html_e('Novidades da produção, das marcas e da loja.', 'frusantos'); ?></p>

		<form action="#" method="post" class="flex flex-col gap-3" onsubmit="return false;">
			<label class="sr-only" for="newsletter-name"><?php esc_html_e('Nome', 'frusantos'); ?></label>
			<input type="text" id="newsletter-name" name="name" placeholder="<?php esc_attr_e('Nome', 'frusantos'); ?>" class="rounded-theme border border-neutral-300 px-4 py-[15px] text-[15px] placeholder:text-neutral-400 focus:border-slate focus:outline-none focus:ring-1 focus:ring-slate">

			<label class="sr-only" for="newsletter-email"><?php esc_html_e('Email', 'frusantos'); ?></label>
			<input type="email" id="newsletter-email" name="email" required placeholder="<?php esc_attr_e('Email', 'frusantos'); ?>" class="rounded-theme border border-neutral-300 px-4 py-[15px] text-[15px] placeholder:text-neutral-400 focus:border-slate focus:outline-none focus:ring-1 focus:ring-slate">

			<label class="mt-1 flex items-start gap-2.5 text-sm text-neutral-600">
				<input type="checkbox" required class="mt-0.5 h-[18px] w-[18px] rounded border-neutral-400 text-primary-600 focus:ring-primary-400">
				<span>
					<?php
					printf(
						/* translators: %s: link para a política de privacidade */
						esc_html__('Li e aceito a %s.', 'frusantos'),
						'<a href="' . esc_url(frusantos_lang_url('politica-privacidade')) . '" class="underline">' . esc_html__('política de privacidade', 'frusantos') . '</a>'
					);
					?>
				</span>
			</label>

			<button type="submit" class="btn-primary mt-2 w-full" disabled title="<?php esc_attr_e('Newsletter ainda por ligar a um serviço de email', 'frusantos'); ?>">
				<?php esc_html_e('Enviar', 'frusantos'); ?>
			</button>
			<p class="text-center text-xs text-neutral-400">
				<?php esc_html_e('Newsletter em preparação — brevemente disponível.', 'frusantos'); ?>
			</p>
		</form>
	</div>
</section>
