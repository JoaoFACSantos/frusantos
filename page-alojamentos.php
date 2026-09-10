<?php
/**
 * Template da página "Alojamentos" — aplicado automaticamente à página
 * com o slug `alojamentos` (hierarquia de templates do WordPress:
 * page-{slug}.php) e, via postmeta `_wp_page_template`, às traduções em
 * EN/FR/ES (slugs diferentes por idioma — ver frusantos_lang_slug() em
 * inc/template-tags.php). Layout dedicado em vez do genérico `page.php`
 * porque esta página tem hero + cartão com mapa incorporado, fora do
 * contentor `.prose` usado nas páginas de texto simples.
 *
 * Conteúdo, morada, coordenadas e contacto de reservas são reais,
 * copiados tal e qual da página equivalente em frusantos.com. A foto
 * (Vila da Ponte) também é real — 1024×575px é a única resolução
 * disponível no site atual (verificado, sem versão maior).
 *
 * @package Frusantos
 */

get_header();

$frusantos_amenities = [
	__('Wi-Fi gratuito', 'frusantos'),
	__('Ar condicionado', 'frusantos'),
	__('Casa de banho privativa', 'frusantos'),
	__('Cozinha partilhada', 'frusantos'),
	__('Sala comum', 'frusantos'),
	__('Estacionamento', 'frusantos'),
];

$frusantos_location_pills = [
	__('Vila da Ponte', 'frusantos'),
	__('Sernancelhe', 'frusantos'),
	__('Beira Alta', 'frusantos'),
];
?>

<main id="main">
	<section class="relative flex min-h-[420px] items-center overflow-hidden sm:min-h-[520px]">
		<img
			src="<?php echo esc_url(FRUSANTOS_URI . '/assets/images/alojamento-flor-tavora.jpg'); ?>"
			alt=""
			class="absolute inset-0 h-full w-full object-cover"
			fetchpriority="high"
		>
		<div class="absolute inset-0 bg-gradient-to-r from-ink/90 via-ink/70 to-ink/40"></div>

		<div class="relative px-6 py-16 sm:py-20 lg:px-[150px]">
			<div class="mb-5 flex items-center gap-4">
				<span class="h-[3px] w-14 bg-primary-400"></span>
				<span class="font-mono text-xs uppercase tracking-[.24em] text-white"><?php esc_html_e('Hospitalidade', 'frusantos'); ?></span>
			</div>
			<h1 class="max-w-xl text-4xl leading-[1.05] text-primary-400 sm:text-6xl lg:text-[68px] lg:leading-[1.05]">
				<?php esc_html_e('Alojamentos locais', 'frusantos'); ?>
			</h1>
			<p class="mt-6 max-w-xl text-base leading-relaxed text-white sm:text-lg">
				<?php esc_html_e('Estadias tranquilas e autênticas, distribuídas por diferentes regiões de Portugal, com o mesmo rigor que definimos no campo.', 'frusantos'); ?>
			</p>
		</div>
	</section>

	<section class="px-6 py-16 lg:px-[150px] lg:pb-0 lg:pt-[72px]">
		<div class="mb-9 flex items-center gap-3 text-sm text-neutral-500">
			<a href="<?php echo esc_url(frusantos_home_url()); ?>" class="transition duration-250 hover:text-secondary-500"><?php esc_html_e('Início', 'frusantos'); ?></a>
			<span class="text-neutral-300">/</span>
			<span class="font-semibold text-ink"><?php esc_html_e('Alojamentos', 'frusantos'); ?></span>
		</div>

		<div class="grid gap-12 lg:grid-cols-2 lg:gap-16">
			<div>
				<p class="eyebrow"><?php esc_html_e('Conheça', 'frusantos'); ?></p>
				<h2 class="mb-7 text-2xl leading-tight sm:text-4xl"><?php esc_html_e('Conheça os alojamentos Frusantos', 'frusantos'); ?></h2>
				<div class="space-y-5 text-base leading-relaxed text-neutral-700 sm:text-lg">
					<p><?php esc_html_e('A Frusantos, reconhecida pela sua qualidade e confiança no setor agroalimentar, dá agora um novo passo ao levar a sua dedicação e exigência também ao setor da hospitalidade. Com uma forte ligação à terra, aos produtos e às tradições, a marca expande a sua experiência para os alojamentos locais, mantendo os mesmos valores que sempre a definiram: rigor, cuidado e autenticidade.', 'frusantos'); ?></p>
					<p><?php esc_html_e('Esta extensão natural da Frusantos traduz-se num conjunto de alojamentos pensados para proporcionar estadias tranquilas, confortáveis e verdadeiramente autênticas, distribuídas por diferentes regiões de Portugal. Mais do que simples espaços para pernoitar, estes alojamentos foram criados para oferecer uma experiência completa de descanso e bem-estar, onde o ambiente acolhedor convida a desligar da rotina e a viver o tempo de forma mais leve.', 'frusantos'); ?></p>
				</div>
			</div>
			<div class="space-y-5 text-base leading-relaxed text-neutral-700 sm:text-lg lg:pt-[68px]">
				<p><?php esc_html_e('Cada unidade combina funcionalidade e conforto, com comodidades essenciais que garantem uma estadia agradável, como quartos equipados, acesso Wi-Fi e áreas pensadas para relaxar e conviver. Tudo é preparado com atenção ao detalhe, refletindo a mesma exigência de qualidade presente em toda a atividade da Frusantos.', 'frusantos'); ?></p>
				<p><?php esc_html_e('Inseridos em ambientes calmos e próximos da natureza, os alojamentos permitem também uma ligação genuína ao território envolvente, com possibilidade de explorar paisagens naturais, gastronomia regional, património histórico e atividades ao ar livre, como caminhadas e passeios pela região.', 'frusantos'); ?></p>
				<p><?php esc_html_e('Seja para uma escapadinha de fim de semana, umas férias em família ou uma pausa merecida da rotina, cada espaço foi pensado para proporcionar uma sensação de conforto e familiaridade, como se estivesse em casa, mas com o valor acrescentado de uma experiência diferente e enriquecedora.', 'frusantos'); ?></p>
				<p class="border-l-2 border-primary-400 pl-5 font-medium text-ink"><?php esc_html_e('Na Frusantos, valorizamos a proximidade, a qualidade e o cuidado em cada detalhe, garantindo que cada estadia seja marcada por tranquilidade, autenticidade e uma ligação especial ao que é genuinamente local.', 'frusantos'); ?></p>
			</div>
		</div>
	</section>

	<section class="fade-in-up px-6 py-16 lg:px-[150px] lg:py-[100px]">
		<div class="overflow-hidden rounded-theme border border-neutral-200 bg-white shadow-soft">

			<div class="flex flex-wrap items-center justify-between gap-4 border-b border-neutral-200 px-6 py-7 sm:px-10">
				<div>
					<p class="eyebrow mb-2"><?php esc_html_e('Alojamento local', 'frusantos'); ?></p>
					<h2 class="text-2xl leading-tight sm:text-3xl"><?php esc_html_e('Flôr do Távora', 'frusantos'); ?></h2>
				</div>
				<div class="flex flex-wrap gap-2.5">
					<?php foreach ($frusantos_location_pills as $frusantos_pill) : ?>
						<span class="rounded-full bg-neutral-100 px-3.5 py-1.5 text-sm font-semibold text-neutral-700"><?php echo esc_html($frusantos_pill); ?></span>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="grid gap-10 px-6 py-10 sm:px-10 lg:grid-cols-2 lg:gap-12">
				<div>
					<div class="aspect-[4/3] overflow-hidden rounded-theme">
						<img
							src="<?php echo esc_url(FRUSANTOS_URI . '/assets/images/alojamento-flor-tavora.jpg'); ?>"
							alt="<?php esc_attr_e('Vila da Ponte, Sernancelhe — vista sobre o rio Távora', 'frusantos'); ?>"
							class="h-full w-full object-cover"
							loading="lazy"
						>
					</div>
					<div class="mt-4 grid grid-cols-2 gap-2.5 sm:grid-cols-3">
						<?php foreach ($frusantos_amenities as $frusantos_amenity) : ?>
							<div class="flex items-center gap-2.5 rounded-theme bg-neutral-100 px-3.5 py-3 text-[13.5px] font-medium text-ink">
								<span class="h-1.5 w-1.5 shrink-0 rounded-full bg-primary-400"></span>
								<span><?php echo esc_html($frusantos_amenity); ?></span>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
				<div>
					<h3 class="mb-5 text-xl font-bold leading-snug text-slate sm:text-2xl"><?php esc_html_e('O seu refúgio na Beira Alta de Portugal', 'frusantos'); ?></h3>
					<div class="space-y-4 text-[15.5px] leading-relaxed text-neutral-700">
						<p>
							<?php
							printf(
								/* translators: %s: nome do alojamento em destaque */
								esc_html__('Situado na tranquila aldeia de Vila da Ponte, no concelho de Sernancelhe, o %s é o local ideal para quem procura descansar, desligar da rotina e aproveitar o melhor da Beira Alta de Portugal.', 'frusantos'),
								'<strong class="font-semibold text-ink">' . esc_html__('Alojamento Flôr do Távora', 'frusantos') . '</strong>'
							);
							?>
						</p>
						<p><?php esc_html_e('Este espaço acolhedor combina conforto, simplicidade e autenticidade, oferecendo quartos equipados com ar condicionado, casa de banho privativa e acesso Wi-Fi gratuito, para uma estadia prática e relaxante.', 'frusantos'); ?></p>
						<p><?php esc_html_e('Os hóspedes podem ainda usufruir de áreas comuns, como cozinha e sala partilhadas, ideais para momentos de convívio, num ambiente tranquilo e familiar. Envolvido pela natureza e pela riqueza cultural da região, o alojamento convida também à descoberta — seja através de caminhadas, da gastronomia local ou da visita a pontos de interesse nas proximidades.', 'frusantos'); ?></p>
						<p>
							<?php
							printf(
								/* translators: %s: nome do alojamento em destaque */
								esc_html__('Se procura um lugar onde possa verdadeiramente descansar e sentir-se em casa, o %s é a escolha certa.', 'frusantos'),
								'<strong class="font-semibold text-ink">' . esc_html__('Alojamento Flôr do Távora', 'frusantos') . '</strong>'
							);
							?>
						</p>
					</div>
				</div>
			</div>

			<div class="grid gap-10 bg-slate px-6 py-10 text-white sm:px-10 lg:grid-cols-2 lg:gap-12 lg:py-12">
				<div>
					<p class="mb-3.5 font-mono text-xs uppercase tracking-[.22em] text-primary-300"><?php esc_html_e('O cenário', 'frusantos'); ?></p>
					<h3 class="text-xl font-bold leading-snug sm:text-2xl"><?php esc_html_e('Descubra Vila da Ponte – o cenário do Flôr do Távora', 'frusantos'); ?></h3>
					<p class="mt-5 text-[15.5px] leading-relaxed text-slate-200"><?php esc_html_e('Vila da Ponte é o lugar perfeito para isso: uma joia serena da Beira Alta, onde o rio acompanha as casas de granito e o tempo corre no seu próprio compasso.', 'frusantos'); ?></p>
				</div>
				<div class="space-y-4 text-[15.5px] leading-relaxed text-slate-200 lg:pt-[52px]">
					<p><?php esc_html_e('Agora, imagine começar o seu fim de semana acordando com esta paisagem à janela. É exatamente essa a experiência que o Alojamento Local Flôr do Távora proporciona.', 'frusantos'); ?></p>
					<p><?php esc_html_e('Aqui, as manhãs são embaladas pelo canto dos pássaros e as noites convidam a um jantar reconfortante junto à lareira. Entre passeios pela aldeia histórica e momentos de descanso à beira-rio, cada instante aproxima-o da natureza e das tradições que tornam este lugar tão especial.', 'frusantos'); ?></p>
				</div>
			</div>

			<div class="grid gap-10 px-6 py-10 sm:px-10 lg:grid-cols-2 lg:gap-12 lg:py-12">
				<div>
					<h3 class="mb-6 text-xl font-bold leading-snug text-ink sm:text-2xl"><?php esc_html_e('Localização e reservas', 'frusantos'); ?></h3>
					<div class="flex flex-col gap-5">
						<div>
							<p class="mb-1.5 font-mono text-xs uppercase tracking-[.16em] text-neutral-500"><?php esc_html_e('Morada', 'frusantos'); ?></p>
							<p class="text-base font-medium leading-relaxed text-ink"><?php echo wp_kses_post(__('Rua da Estalagem, n.º 10 | 3640-305<br>Vila da Ponte — Sernancelhe', 'frusantos')); ?></p>
						</div>
						<div>
							<p class="mb-1.5 font-mono text-xs uppercase tracking-[.16em] text-neutral-500"><?php esc_html_e('Coordenadas geográficas', 'frusantos'); ?></p>
							<p class="text-base font-medium text-ink">40.915983, -7.514198</p>
						</div>
						<div>
							<p class="mb-1.5 font-mono text-xs uppercase tracking-[.16em] text-neutral-500"><?php esc_html_e('Reservas', 'frusantos'); ?></p>
							<div class="flex flex-col gap-1 text-base font-medium">
								<a href="tel:+351962577731" class="text-ink transition duration-250 hover:text-secondary-500">(+351) 962 577 731</a>
								<a href="mailto:reservas@frusantos.com" class="text-ink transition duration-250 hover:text-secondary-500">reservas@frusantos.com</a>
							</div>
						</div>
						<div class="mt-1 flex flex-wrap gap-3">
							<a href="mailto:reservas@frusantos.com" class="btn-primary"><?php esc_html_e('Pedir reserva', 'frusantos'); ?></a>
							<a
								href="https://maps.google.com/maps?q=alojamento%20local%20flor%20do%20tavora"
								target="_blank"
								rel="noopener"
								class="btn border border-neutral-300 text-ink transition duration-250 hover:border-slate"
							>
								<?php esc_html_e('Abrir no Maps', 'frusantos'); ?>
							</a>
						</div>
					</div>
				</div>
				<div>
					<p class="mb-3.5 font-mono text-xs uppercase tracking-[.16em] text-secondary-500"><?php esc_html_e('Coordenadas GPS: 40.915983, -7.514198', 'frusantos'); ?></p>
					<div class="overflow-hidden rounded-theme">
						<iframe
							src="https://maps.google.com/maps?q=alojamento%20local%20flor%20do%20tavora&t=m&z=11&output=embed&iwloc=near"
							title="<?php esc_attr_e('Mapa do Alojamento Local Flôr do Távora', 'frusantos'); ?>"
							class="h-[300px] w-full border-0 sm:h-[340px]"
							loading="lazy"
						></iframe>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
