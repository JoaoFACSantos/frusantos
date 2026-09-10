<?php
/**
 * Template da página "Contactos" — aplicado automaticamente à página com
 * o slug `contactos` e, via postmeta `_wp_page_template`, às traduções em
 * EN/FR/ES (slugs `contact`/`contacts`/`contacto` — ver frusantos_lang_slug()
 * em inc/template-tags.php). Layout dedicado em vez do genérico `page.php`
 * porque esta página tem cartões de contacto rápido, formulário e um mapa
 * por instalação.
 *
 * Moradas, telefones, coordenadas e horário são reais, copiados das
 * páginas equivalentes em frusantos.com. O formulário não tem back-end
 * (não há WooCommerce nem servidor de email próprio) — ao submeter, abre
 * o cliente de email do próprio visitante com a mensagem preenchida,
 * seguindo o mesmo padrão já usado na "lista de pedidos" da Loja.
 *
 * @package Frusantos
 */

get_header();

$frusantos_locations = [
	[
		'id'      => 'sede',
		'label'   => __('Sede', 'frusantos'),
		'region'  => __('Ferreirim', 'frusantos'),
		'address' => __('Parque Industrial de Ferreirim, Lt. 34<br>3640-100 Ferreirim — Sernancelhe', 'frusantos'),
		'phones'  => ['+351 915 399 740', '+351 254 595 821'],
		'gps'     => '40.939752, -7.504893',
		'maps'    => 'https://maps.google.com/maps?q=40.939752,-7.504893',
		'embed'   => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3013.906195115395!2d-7.507002823552483!3d40.93972302364275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd3ca3ea46a37407%3A0x2a18c9d7fca35ed!2sFrusantos!5e0!3m2!1spt-PT!2spt!4v1754927711156!5m2!1spt-PT!2spt',
	],
	[
		'id'      => 'filial',
		'label'   => __('Filial', 'frusantos'),
		'region'  => __('Samora Correia', 'frusantos'),
		'address' => __('Estrada da Samorena, n.º 12<br>2135-316 Samora Correia — Benavente', 'frusantos'),
		'phones'  => ['+351 263 650 130'],
		'gps'     => '38.919354, -8.871625',
		'maps'    => 'https://maps.google.com/maps?q=38.919354,-8.871625',
		'embed'   => 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3104.2020917961718!2d-8.874199923628138!3d38.91935814540746!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzjCsDU1JzA5LjciTiA4wrA1MicxNy45Ilc!5e0!3m2!1spt-PT!2spt!4v1754927905331!5m2!1spt-PT!2spt',
	],
	[
		'id'      => 'lagar',
		'label'   => __('Lagar de Sto. António', 'frusantos'),
		'region'  => __('Penso', 'frusantos'),
		'address' => __('Largo de Sto. António, n.º 138<br>3640-160 Penso — Sernancelhe', 'frusantos'),
		'phones'  => ['+351 915 399 738', '+351 254 107 006'],
		'gps'     => '40.9212407, -7.5382673',
		'maps'    => 'https://maps.google.com/maps?q=40.9212407,-7.5382673',
		'embed'   => 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3014.7491968935446!2d-7.540842223553154!3d40.921244724778845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNDDCsDU1JzE2LjUiTiA3wrAzMicxNy44Ilc!5e0!3m2!1spt-PT!2spt!4v1754927968198!5m2!1spt-PT!2spt',
	],
];
?>

<main id="main">
	<section class="relative flex min-h-[420px] items-center overflow-hidden sm:min-h-[520px]">
		<img
			src="<?php echo esc_url(FRUSANTOS_URI . '/assets/images/empresa-hero.webp'); ?>"
			alt=""
			class="absolute inset-0 h-full w-full object-cover"
			style="object-position: center 45%"
			fetchpriority="high"
		>
		<div class="absolute inset-0 bg-gradient-to-r from-ink/90 via-ink/70 to-ink/40"></div>

		<div class="relative px-6 py-16 sm:py-20 lg:px-[150px]">
			<div class="mb-5 flex items-center gap-4">
				<span class="h-[3px] w-14 bg-primary-400"></span>
				<span class="font-mono text-xs uppercase tracking-[.24em] text-white"><?php esc_html_e('Fale connosco', 'frusantos'); ?></span>
			</div>
			<h1 class="max-w-xl text-4xl leading-[1.05] text-primary-400 sm:text-6xl lg:text-[68px] lg:leading-[1.05]">
				<?php esc_html_e('Contactos', 'frusantos'); ?>
			</h1>
			<p class="mt-6 max-w-xl text-base leading-relaxed text-white sm:text-lg">
				<?php esc_html_e('Sede em Ferreirim, filial em Samora Correia e lagar em Penso. Escolha o ponto mais próximo ou envie-nos uma mensagem.', 'frusantos'); ?>
			</p>
		</div>
	</section>

	<section class="px-6 py-16 lg:px-[150px] lg:pb-0 lg:pt-[72px]">
		<div class="mb-9 flex items-center gap-3 text-sm text-neutral-500">
			<a href="<?php echo esc_url(frusantos_home_url()); ?>" class="transition duration-250 hover:text-secondary-500"><?php esc_html_e('Início', 'frusantos'); ?></a>
			<span class="text-neutral-300">/</span>
			<span class="font-semibold text-ink"><?php esc_html_e('Contactos', 'frusantos'); ?></span>
		</div>

		<div class="grid gap-5 sm:grid-cols-3">
			<a href="tel:+351254595821" class="rounded-theme border border-neutral-200 bg-white p-6 shadow-soft transition duration-250 hover:border-primary-400">
				<p class="eyebrow mb-3"><?php esc_html_e('Telefone', 'frusantos'); ?></p>
				<p class="text-xl font-bold text-ink">+351 254 595 821</p>
				<p class="mt-1.5 text-sm text-neutral-500"><?php esc_html_e('Chamada para a rede fixa nacional', 'frusantos'); ?></p>
			</a>
			<a href="mailto:frusantos@frusantos.com" class="rounded-theme border border-neutral-200 bg-white p-6 shadow-soft transition duration-250 hover:border-primary-400">
				<p class="eyebrow mb-3"><?php esc_html_e('Email', 'frusantos'); ?></p>
				<p class="break-words text-xl font-bold text-ink">frusantos@frusantos.com</p>
				<p class="mt-1.5 text-sm text-neutral-500"><?php esc_html_e('Resposta em 1 dia útil', 'frusantos'); ?></p>
			</a>
			<div class="rounded-theme border border-neutral-200 bg-white p-6 shadow-soft">
				<p class="eyebrow mb-3"><?php esc_html_e('Horário', 'frusantos'); ?></p>
				<p class="text-xl font-bold text-ink"><?php esc_html_e('Seg — Sex, 09:00 — 18:00', 'frusantos'); ?></p>
				<p class="mt-1.5 text-sm text-neutral-500"><?php esc_html_e('Escritórios e atendimento comercial', 'frusantos'); ?></p>
			</div>
		</div>
	</section>

	<section class="fade-in-up px-6 py-16 lg:px-[150px] lg:py-[100px]">
		<div class="grid gap-8 lg:grid-cols-2 lg:items-stretch lg:gap-10">
			<div class="rounded-theme border border-neutral-200 bg-white p-7 shadow-soft sm:p-10">
				<div class="mb-4 flex items-center gap-4">
					<span class="h-[3px] w-10 bg-secondary-500"></span>
					<span class="font-mono text-xs uppercase tracking-[.2em] text-secondary-500"><?php esc_html_e('Mensagem', 'frusantos'); ?></span>
				</div>
				<h2 class="mb-2.5 text-2xl leading-tight sm:text-3xl"><?php esc_html_e('Fale connosco', 'frusantos'); ?></h2>
				<p class="mb-7 max-w-md text-base leading-relaxed text-neutral-700"><?php esc_html_e('Diga-nos o que precisa — produto, quantidade ou prazo — e a equipa comercial responde com uma proposta.', 'frusantos'); ?></p>

				<form data-contact-form class="flex flex-col gap-3.5">
					<div class="grid gap-3.5 sm:grid-cols-2">
						<div>
							<label class="sr-only" for="contact-name"><?php esc_html_e('Nome', 'frusantos'); ?></label>
							<input type="text" id="contact-name" name="name" required placeholder="<?php esc_attr_e('Nome', 'frusantos'); ?>" class="w-full rounded-theme border border-neutral-300 px-4 py-3.5 text-[15px] text-ink shadow-none focus:border-slate focus:outline-none focus:ring-0">
						</div>
						<div>
							<label class="sr-only" for="contact-email"><?php esc_html_e('Email', 'frusantos'); ?></label>
							<input type="email" id="contact-email" name="email" required placeholder="<?php esc_attr_e('Email', 'frusantos'); ?>" class="w-full rounded-theme border border-neutral-300 px-4 py-3.5 text-[15px] text-ink shadow-none focus:border-slate focus:outline-none focus:ring-0">
						</div>
					</div>
					<div>
						<label class="sr-only" for="contact-subject"><?php esc_html_e('Assunto', 'frusantos'); ?></label>
						<input type="text" id="contact-subject" name="subject" required placeholder="<?php esc_attr_e('Assunto', 'frusantos'); ?>" class="w-full rounded-theme border border-neutral-300 px-4 py-3.5 text-[15px] text-ink shadow-none focus:border-slate focus:outline-none focus:ring-0">
					</div>
					<div>
						<label class="sr-only" for="contact-message"><?php esc_html_e('Mensagem', 'frusantos'); ?></label>
						<textarea id="contact-message" name="message" required rows="6" placeholder="<?php esc_attr_e('Mensagem', 'frusantos'); ?>" class="w-full resize-y rounded-theme border border-neutral-300 px-4 py-3.5 text-[15px] leading-relaxed text-ink shadow-none focus:border-slate focus:outline-none focus:ring-0"></textarea>
					</div>
					<label class="flex items-start gap-3 text-sm leading-relaxed text-neutral-700">
						<input type="checkbox" name="consent" required class="mt-1 h-4 w-4 shrink-0 rounded border-neutral-300 text-primary-500 focus:ring-primary-400">
						<span>
							<?php
							printf(
								/* translators: %s: link para a política de privacidade */
								esc_html__('Li e aceito a %s.', 'frusantos'),
								'<a href="' . esc_url(frusantos_lang_url('politica-privacidade')) . '" class="link-underline text-ink">' . esc_html__('política de privacidade', 'frusantos') . '</a>'
							);
							?>
						</span>
					</label>
					<div class="mt-1 flex flex-wrap items-center gap-4">
						<button type="submit" class="btn-primary"><?php esc_html_e('Enviar mensagem', 'frusantos'); ?></button>
						<span class="hidden text-sm font-semibold text-primary-600" data-contact-confirm><?php esc_html_e('A abrir o seu cliente de email com a mensagem preenchida…', 'frusantos'); ?></span>
					</div>
				</form>
			</div>

			<div class="flex flex-col gap-7 rounded-theme bg-slate p-7 text-white sm:p-10">
				<div>
					<p class="mb-3.5 font-mono text-xs uppercase tracking-[.2em] text-primary-300"><?php esc_html_e('Informação de contacto', 'frusantos'); ?></p>
					<h2 class="text-2xl font-bold leading-tight sm:text-[28px]"><?php esc_html_e('Prefere falar diretamente?', 'frusantos'); ?></h2>
					<p class="mt-4 max-w-sm text-[15px] leading-relaxed text-slate-200"><?php esc_html_e('A nossa equipa está disponível em horário de escritório para encomendas, orçamentos e questões comerciais.', 'frusantos'); ?></p>
				</div>
				<div class="flex flex-col gap-5">
					<div>
						<p class="mb-1.5 font-mono text-xs uppercase tracking-[.16em] text-slate-300"><?php esc_html_e('Comercial', 'frusantos'); ?></p>
						<a href="tel:+351915399740" class="text-lg font-semibold text-white transition duration-250 hover:text-primary-300">+351 915 399 740</a>
					</div>
					<div>
						<p class="mb-1.5 font-mono text-xs uppercase tracking-[.16em] text-slate-300"><?php esc_html_e('Geral', 'frusantos'); ?></p>
						<a href="mailto:frusantos@frusantos.com" class="break-words text-lg font-semibold text-white transition duration-250 hover:text-primary-300">frusantos@frusantos.com</a>
					</div>
					<div>
						<p class="mb-1.5 font-mono text-xs uppercase tracking-[.16em] text-slate-300"><?php esc_html_e('Reservas de alojamento', 'frusantos'); ?></p>
						<a href="mailto:reservas@frusantos.com" class="break-words text-lg font-semibold text-white transition duration-250 hover:text-primary-300">reservas@frusantos.com</a>
					</div>
				</div>
				<p class="mt-auto border-t border-white/15 pt-6 text-[13.5px] leading-relaxed text-slate-300"><?php esc_html_e('* Chamada para a rede fixa e móvel nacional.', 'frusantos'); ?></p>
			</div>
		</div>
	</section>

	<section class="fade-in-up px-6 py-16 lg:px-[150px] lg:pt-0 lg:pb-[100px]">
		<div class="mb-9 flex flex-wrap items-end justify-between gap-6">
			<div>
				<p class="eyebrow mb-2"><?php esc_html_e('Instalações', 'frusantos'); ?></p>
				<h2 class="text-2xl leading-tight sm:text-4xl"><?php esc_html_e('Onde estamos', 'frusantos'); ?></h2>
			</div>
			<p class="max-w-md text-base leading-relaxed text-neutral-700"><?php esc_html_e('Três instalações entre a Beira Alta e o Ribatejo. Selecione uma para ver a morada, os contactos e o mapa.', 'frusantos'); ?></p>
		</div>

		<div class="grid gap-8 lg:grid-cols-[1fr_1.15fr] lg:gap-10">
			<div class="flex flex-col gap-3">
				<?php foreach ($frusantos_locations as $frusantos_i => $frusantos_loc) : ?>
					<button
						type="button"
						aria-pressed="<?php echo 0 === $frusantos_i ? 'true' : 'false'; ?>"
						data-location-button
						data-loc-label="<?php echo esc_attr($frusantos_loc['label']); ?>"
						data-loc-maps="<?php echo esc_url($frusantos_loc['maps']); ?>"
						data-loc-embed="<?php echo esc_url($frusantos_loc['embed']); ?>"
						class="rounded-theme border-2 bg-white px-5 py-4 text-left transition duration-250 <?php echo 0 === $frusantos_i ? 'border-primary-400' : 'border-neutral-200 hover:border-slate'; ?>"
					>
						<span class="flex items-center justify-between gap-3 text-xs font-bold uppercase tracking-[.14em]">
							<span class="text-secondary-500"><?php echo esc_html($frusantos_loc['label']); ?></span>
							<span class="text-neutral-400"><?php echo esc_html($frusantos_loc['region']); ?></span>
						</span>
						<span class="mt-2.5 block text-[15px] font-medium leading-relaxed text-ink"><?php echo wp_kses_post($frusantos_loc['address']); ?></span>
						<span class="mt-3 flex flex-wrap gap-x-4 gap-y-1 text-sm text-neutral-600">
							<?php foreach ($frusantos_loc['phones'] as $frusantos_phone) : ?>
								<span><?php echo esc_html($frusantos_phone); ?> *</span>
							<?php endforeach; ?>
						</span>
						<span class="mt-2.5 block font-mono text-xs uppercase tracking-[.1em] text-secondary-500">GPS <?php echo esc_html($frusantos_loc['gps']); ?></span>
					</button>
				<?php endforeach; ?>
			</div>

			<div class="flex flex-col overflow-hidden rounded-theme border border-neutral-200 bg-white shadow-soft">
				<div class="flex flex-wrap items-center justify-between gap-4 px-6 py-5">
					<div>
						<p class="mb-1.5 text-xs font-bold uppercase tracking-[.16em] text-neutral-400"><?php esc_html_e('A ver no mapa', 'frusantos'); ?></p>
						<p class="text-lg font-bold text-ink" data-location-label><?php echo esc_html($frusantos_locations[0]['label']); ?></p>
					</div>
					<a
						href="<?php echo esc_url($frusantos_locations[0]['maps']); ?>"
						target="_blank"
						rel="noopener"
						data-location-maps-link
						class="btn border border-neutral-300 text-ink transition duration-250 hover:border-slate"
					>
						<?php esc_html_e('Abrir no Maps', 'frusantos'); ?>
					</a>
				</div>
				<iframe
					data-location-embed
					src="<?php echo esc_url($frusantos_locations[0]['embed']); ?>"
					title="<?php esc_attr_e('Mapa das instalações Frusantos', 'frusantos'); ?>"
					class="h-[320px] w-full flex-1 border-0 sm:h-[380px]"
					loading="lazy"
				></iframe>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
