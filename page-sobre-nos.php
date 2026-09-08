<?php
/**
 * Template da página "Sobre nós" / "A Empresa" — aplicado automaticamente
 * à página com o slug `sobre-nos` (hierarquia de templates do WordPress:
 * page-{slug}.php). Estrutura e conteúdo copiados do design aprovado
 * (Claude Design), adaptados ao sistema visual já existente no tema
 * (Figtree, tokens de cor, componentes .btn, .eyebrow, .link-underline,
 * padrão de scroll-reveal) em vez do Poppins/estilos inline do design.
 *
 * Fotos e selos são ficheiros reais de frusantos.com. O separador
 * "Empresa" dos 6 da secção "A empresa em detalhe" tem texto real; os
 * outros 5 ficam com uma nota honesta em vez de texto inventado — tal
 * como o próprio design assinalava.
 *
 * @package Frusantos
 */

get_header();

$frusantos_products = [
	__('Castanha', 'frusantos'),
	__('Batata de semente e de consumo', 'frusantos'),
	__('Cebola', 'frusantos'),
	__('Azeite', 'frusantos'),
];

$frusantos_seasonal = [
	__('Cereja', 'frusantos'),
	__('Maçã', 'frusantos'),
	__('Melancia', 'frusantos'),
	__('Melão', 'frusantos'),
	__('Frutos secos', 'frusantos'),
];

$frusantos_eu_markets = [
	__('Itália', 'frusantos'),
	__('Espanha', 'frusantos'),
	__('França', 'frusantos'),
	__('Alemanha', 'frusantos'),
];

$frusantos_non_eu_markets = [
	__('Suíça', 'frusantos'),
	__('Canadá', 'frusantos'),
	__('Brasil', 'frusantos'),
	__('Estados Unidos', 'frusantos'),
];

$frusantos_gallery = ['galeria-2.webp', 'galeria-3.webp', 'galeria-4.webp', 'galeria-9.webp', 'galeria-6.webp', 'galeria-8.webp', 'galeria-10.webp', 'galeria-11.webp', 'galeria-12.webp'];

$frusantos_tabs = [
	[
		'label' => __('Empresa', 'frusantos'),
		'lead'  => __('Somos uma empresa familiar com visão comum, aspiração e legado:', 'frusantos'),
		'items' => [
			__('Visão de crescimento e perenidade;', 'frusantos'),
			__('Aspiração comum, planos e metas;', 'frusantos'),
			__('Compromisso com o senso de legado de geração para geração;', 'frusantos'),
			__('Preocupação com a qualidade, segurança alimentar e ambiental.', 'frusantos'),
		],
	],
	['label' => __('Missão e visão', 'frusantos')],
	['label' => __('Serviços', 'frusantos')],
	['label' => __('História', 'frusantos')],
	['label' => __('Vantagens competitivas', 'frusantos')],
	['label' => __('Política da empresa', 'frusantos')],
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

		<div class="relative px-6 py-16 sm:py-20 lg:px-[60px]">
			<div class="mb-5 flex items-center gap-4">
				<span class="h-[3px] w-14 bg-primary-400"></span>
				<span class="font-mono text-xs uppercase tracking-[.24em] text-white"><?php esc_html_e('Frutos Selecionados, S.A.', 'frusantos'); ?></span>
			</div>
			<h1 class="max-w-2xl text-4xl leading-[1.05] text-primary-400 sm:text-6xl lg:text-[76px] lg:leading-[1.02]">
				<?php esc_html_e('Sobre a nossa empresa', 'frusantos'); ?>
			</h1>
			<p class="mt-6 max-w-xl text-base leading-relaxed text-white sm:text-lg">
				<?php esc_html_e('Produção, comercialização e distribuição de produtos agrícolas, no mercado nacional e internacional.', 'frusantos'); ?>
			</p>
			<div class="mt-9 flex flex-wrap gap-3">
				<a href="<?php echo esc_url(home_url('/contactos/')); ?>" class="btn-primary"><?php esc_html_e('Contactar a empresa', 'frusantos'); ?></a>
				<a href="#galeria" class="btn-outline"><?php esc_html_e('Ver a galeria', 'frusantos'); ?></a>
			</div>
		</div>
	</section>

	<section class="fade-in-up grid gap-12 px-6 py-16 lg:grid-cols-2 lg:gap-16 lg:px-[60px] lg:py-[100px]">
		<div>
			<p class="eyebrow"><?php esc_html_e('Quem somos', 'frusantos'); ?></p>
			<h2 class="mb-7 text-2xl leading-tight sm:text-4xl"><?php esc_html_e('Uma empresa familiar de frutos selecionados', 'frusantos'); ?></h2>
			<div class="space-y-5 text-[17px] leading-relaxed text-neutral-700">
				<p><?php esc_html_e('Na Frusantos – Frutos Selecionados, S.A., dedicamo-nos à produção, comercialização e distribuição de produtos agrícolas, no mercado nacional e internacional, a partir da sede, em Ferreirim – Sernancelhe, na Beira Alta e da filial, em Samora Correia – Benavente, no Ribatejo, em Portugal.', 'frusantos'); ?></p>
				<p><?php esc_html_e('Distinguimo-nos nos produtos: castanha, batata de semente e consumo, cebola e azeite, contudo apostamos igualmente em vários outros, de acordo com a sua sazonalidade: cereja, maçã, melancia, melão, frutos secos.', 'frusantos'); ?></p>
				<p><?php esc_html_e('A nível comercial trabalhamos com grossistas (as agroindústrias) e com retalhistas (centrais de compras de hipermercados, supermercados e mercados abastecedores), com exceção da batata de semente e produtos fitossanitários que trabalhamos com retalhistas e consumidor final.', 'frusantos'); ?></p>
				<p><?php esc_html_e('Com um volume de exportação de 50%, destacamo-nos no mercado comunitário: Itália, Espanha, França, Alemanha, e extracomunitário: Suíça, Canadá, Brasil e Estados Unidos. Continuamos a trabalhar na identificação de parceiros comerciais, dispostos a valorizar os nossos produtos, em novos mercados.', 'frusantos'); ?></p>
			</div>
		</div>

		<div class="flex flex-col gap-5">
			<div class="rounded-theme bg-white p-6 shadow-soft">
				<img
					src="<?php echo esc_url(FRUSANTOS_URI . '/assets/images/empresa-quem-somos.webp'); ?>"
					alt="<?php esc_attr_e('Frutos selecionados Frusantos', 'frusantos'); ?>"
					class="h-auto w-full rounded-theme"
					loading="lazy"
				>
			</div>
			<div class="grid grid-cols-3 gap-4">
				<div class="rounded-theme bg-white p-5 shadow-soft">
					<div class="font-display text-3xl font-extrabold text-secondary-500">50%</div>
					<div class="mt-2 text-xs leading-snug text-neutral-600"><?php esc_html_e('volume de exportação', 'frusantos'); ?></div>
				</div>
				<div class="rounded-theme bg-white p-5 shadow-soft">
					<div class="font-display text-3xl font-extrabold text-secondary-500">8</div>
					<div class="mt-2 text-xs leading-snug text-neutral-600"><?php esc_html_e('mercados de destino', 'frusantos'); ?></div>
				</div>
				<div class="rounded-theme bg-white p-5 shadow-soft">
					<div class="font-display text-3xl font-extrabold text-secondary-500">2</div>
					<div class="mt-2 text-xs leading-snug text-neutral-600"><?php esc_html_e('unidades: Ferreirim e Samora Correia', 'frusantos'); ?></div>
				</div>
			</div>
		</div>
	</section>

	<section class="fade-in-up bg-slate px-6 py-16 text-white lg:px-[60px] lg:py-[88px]">
		<div class="mb-10 flex flex-wrap items-end justify-between gap-6">
			<div>
				<p class="mb-3.5 font-mono text-xs uppercase tracking-[.22em] text-primary-300"><?php esc_html_e('Produtos', 'frusantos'); ?></p>
				<h2 class="text-2xl sm:text-4xl"><?php esc_html_e('Os nossos produtos', 'frusantos'); ?></h2>
			</div>
			<p class="max-w-xs text-sm leading-relaxed text-slate-200"><?php esc_html_e('Quatro produtos de referência e uma carteira sazonal que acompanha o calendário agrícola.', 'frusantos'); ?></p>
		</div>

		<div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
			<?php foreach ($frusantos_products as $i => $product) : ?>
				<div class="rounded-theme border border-white/15 bg-white/[0.07] p-6">
					<div class="font-mono text-xs font-bold tracking-[.14em] text-primary-300"><?php echo esc_html(sprintf('%02d', $i + 1)); ?></div>
					<div class="mt-7 text-lg font-bold uppercase leading-snug text-white"><?php echo esc_html($product); ?></div>
				</div>
			<?php endforeach; ?>
		</div>

		<div class="mt-8 flex flex-wrap items-center gap-2.5">
			<span class="mr-2 text-xs font-semibold uppercase tracking-[.16em] text-slate-300"><?php esc_html_e('Sazonais', 'frusantos'); ?></span>
			<?php foreach ($frusantos_seasonal as $item) : ?>
				<span class="rounded-full border border-white/25 px-4 py-2 text-sm text-white"><?php echo esc_html($item); ?></span>
			<?php endforeach; ?>
		</div>
	</section>

	<section class="fade-in-up px-6 py-16 lg:px-[60px] lg:py-[100px]">
		<p class="eyebrow"><?php esc_html_e('Mercados', 'frusantos'); ?></p>
		<h2 class="mb-10 text-2xl sm:text-4xl"><?php esc_html_e('Onde chegamos', 'frusantos'); ?></h2>

		<div class="grid gap-5 lg:grid-cols-3">
			<div class="rounded-theme bg-white p-7 shadow-soft">
				<p class="mb-4 text-xs font-bold uppercase tracking-[.14em] text-primary-600"><?php esc_html_e('Mercado comunitário', 'frusantos'); ?></p>
				<div class="flex flex-col">
					<?php foreach ($frusantos_eu_markets as $market) : ?>
						<span class="border-t border-neutral-200 py-3.5 text-lg font-semibold text-ink"><?php echo esc_html($market); ?></span>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="rounded-theme bg-white p-7 shadow-soft">
				<p class="mb-4 text-xs font-bold uppercase tracking-[.14em] text-primary-600"><?php esc_html_e('Extracomunitário', 'frusantos'); ?></p>
				<div class="flex flex-col">
					<?php foreach ($frusantos_non_eu_markets as $market) : ?>
						<span class="border-t border-neutral-200 py-3.5 text-lg font-semibold text-ink"><?php echo esc_html($market); ?></span>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="flex flex-col justify-between gap-7 rounded-theme bg-slate p-8 text-white">
				<p class="text-xl font-semibold leading-relaxed"><?php esc_html_e('Continuamos a trabalhar na identificação de parceiros comerciais, dispostos a valorizar os nossos produtos, em novos mercados.', 'frusantos'); ?></p>
				<a href="<?php echo esc_url(home_url('/contactos/')); ?>" class="btn-primary self-start"><?php esc_html_e('Falar com a Frusantos', 'frusantos'); ?></a>
			</div>
		</div>
	</section>

	<section class="fade-in-up grid gap-12 border-t border-neutral-200 px-6 py-16 lg:grid-cols-2 lg:gap-16 lg:px-[60px] lg:py-[84px]">
		<div>
			<p class="eyebrow"><?php esc_html_e('Reconhecimento', 'frusantos'); ?></p>
			<h3 class="mb-3 text-xl"><?php esc_html_e('Os nossos prémios', 'frusantos'); ?></h3>
			<p class="mb-6 max-w-md text-[15px] leading-relaxed text-neutral-600"><?php esc_html_e('Reconhecimento do desempenho e da solidez da empresa.', 'frusantos'); ?></p>
			<img src="<?php echo esc_url(FRUSANTOS_URI . '/assets/images/premio-pme.webp'); ?>" alt="<?php esc_attr_e('PME Excelência e PME Líder', 'frusantos'); ?>" class="h-[70px] w-auto" loading="lazy">
		</div>
		<div>
			<p class="eyebrow"><?php esc_html_e('Qualidade', 'frusantos'); ?></p>
			<h3 class="mb-3 text-xl"><?php esc_html_e('As nossas certificações', 'frusantos'); ?></h3>
			<p class="mb-6 max-w-md text-[15px] leading-relaxed text-neutral-600"><?php esc_html_e('Qualidade, segurança alimentar e ambiente auditados por entidades independentes.', 'frusantos'); ?></p>
			<div class="flex flex-wrap items-center gap-7">
				<img src="<?php echo esc_url(FRUSANTOS_URI . '/assets/images/cert-fssc.webp'); ?>" alt="FSSC 22000" class="h-[48px] w-auto" loading="lazy">
				<img src="<?php echo esc_url(FRUSANTOS_URI . '/assets/images/cert-iso.webp'); ?>" alt="Certificação ISO 14001" class="h-[48px] w-auto" loading="lazy">
			</div>
		</div>
	</section>

	<section class="fade-in-up grid gap-5 border-t border-neutral-200 px-6 py-16 lg:grid-cols-3 lg:px-[60px] lg:py-[96px]">
		<div class="flex min-h-[260px] flex-col justify-between gap-7 rounded-theme bg-slate p-8 text-white">
			<div>
				<p class="font-mono text-xs uppercase tracking-[.22em] text-primary-300"><?php esc_html_e('Vídeo', 'frusantos'); ?></p>
				<h3 class="mt-5 text-xl leading-tight"><?php esc_html_e('Vídeo institucional', 'frusantos'); ?></h3>
			</div>
			<a href="https://www.youtube.com/watch?v=J6n2oyGmxRs" target="_blank" rel="noopener" class="btn-primary self-start"><?php esc_html_e('Clique aqui para ver', 'frusantos'); ?></a>
		</div>
		<div class="min-h-[260px] rounded-theme bg-white p-8 shadow-soft">
			<p class="eyebrow"><?php esc_html_e('Pessoas', 'frusantos'); ?></p>
			<h3 class="mb-3 text-xl leading-tight"><?php esc_html_e('Equipa multidisciplinar', 'frusantos'); ?></h3>
			<p class="text-[15px] leading-relaxed text-neutral-600"><?php esc_html_e('Somos uma equipa polivalente e especializada. Acompanhamos todo o ciclo produtivo para garantirmos a qualidade e cumprimento das normas de mercado.', 'frusantos'); ?></p>
		</div>
		<div class="min-h-[260px] rounded-theme bg-white p-8 shadow-soft">
			<p class="eyebrow"><?php esc_html_e('Herança', 'frusantos'); ?></p>
			<h3 class="mb-3 text-xl leading-tight"><?php esc_html_e('Lagar de Santo António', 'frusantos'); ?></h3>
			<p class="text-[15px] leading-relaxed text-neutral-600"><?php esc_html_e('Integramos o Lagar de Santo António, com mais de um século de história e na família há várias gerações. Oriundo das terras ricas da Beira Alta, o azeite é a relíquia desta região…', 'frusantos'); ?></p>
		</div>
	</section>

	<section class="fade-in-up border-t border-neutral-200 px-6 py-16 lg:px-[60px] lg:py-[88px]">
		<p class="eyebrow"><?php esc_html_e('Detalhe', 'frusantos'); ?></p>
		<h2 class="mb-8 text-2xl sm:text-4xl"><?php esc_html_e('A empresa em detalhe', 'frusantos'); ?></h2>

		<div class="mb-7 flex flex-wrap gap-2.5" role="tablist" aria-label="<?php esc_attr_e('A empresa em detalhe', 'frusantos'); ?>">
			<?php foreach ($frusantos_tabs as $i => $tab) : ?>
				<button
					type="button"
					role="tab"
					id="tab-btn-<?php echo esc_attr($i); ?>"
					aria-controls="tab-panel-<?php echo esc_attr($i); ?>"
					aria-selected="<?php echo 0 === $i ? 'true' : 'false'; ?>"
					data-tab-button
					data-tab-group="empresa-detalhe"
					data-tab-target="tab-panel-<?php echo esc_attr($i); ?>"
					class="rounded-full border px-6 py-3.5 text-xs font-bold uppercase tracking-[.1em] transition duration-250 <?php echo 0 === $i ? 'border-slate bg-slate text-white' : 'border-neutral-300 bg-transparent text-neutral-700 hover:border-slate'; ?>"
				>
					<?php echo esc_html($tab['label']); ?>
				</button>
			<?php endforeach; ?>
		</div>

		<?php foreach ($frusantos_tabs as $i => $tab) : ?>
			<div
				id="tab-panel-<?php echo esc_attr($i); ?>"
				role="tabpanel"
				aria-labelledby="tab-btn-<?php echo esc_attr($i); ?>"
				data-tab-panel
				data-tab-group="empresa-detalhe"
				class="<?php echo 0 === $i ? '' : 'hidden'; ?> rounded-theme bg-neutral-100 p-7 sm:p-10"
			>
				<h3 class="mb-6 text-xl sm:text-2xl"><?php echo esc_html($tab['label']); ?></h3>
				<?php if (!empty($tab['lead'])) : ?>
					<p class="mb-5 max-w-2xl text-lg font-semibold leading-relaxed text-ink"><?php echo esc_html($tab['lead']); ?></p>
				<?php endif; ?>
				<?php if (!empty($tab['items'])) : ?>
					<div class="flex flex-col">
						<?php foreach ($tab['items'] as $item) : ?>
							<div class="flex gap-3.5 border-t border-neutral-200 py-3.5">
								<span class="mt-2.5 h-1.5 w-1.5 shrink-0 rounded-full bg-primary-400"></span>
								<span class="text-base leading-relaxed text-neutral-700"><?php echo esc_html($item); ?></span>
							</div>
						<?php endforeach; ?>
					</div>
				<?php else : ?>
					<p class="rounded-theme border border-dashed border-neutral-300 bg-white p-5 text-sm leading-relaxed text-neutral-500">
						<?php esc_html_e('Conteúdo por inserir — envie o texto real deste separador para colocarmos aqui.', 'frusantos'); ?>
					</p>
				<?php endif; ?>
			</div>
		<?php endforeach; ?>
	</section>

	<section id="galeria" class="fade-in-up border-t border-neutral-200 px-6 py-16 lg:px-[60px] lg:py-[96px]">
		<p class="eyebrow"><?php esc_html_e('Galeria', 'frusantos'); ?></p>
		<h2 class="mb-8 text-2xl sm:text-4xl"><?php esc_html_e('Campo, lagar e armazém', 'frusantos'); ?></h2>

		<div class="grid grid-cols-2 gap-3.5 sm:grid-cols-3 lg:grid-cols-4">
			<?php foreach ($frusantos_gallery as $frusantos_photo) : ?>
				<div class="aspect-[4/3] overflow-hidden rounded-theme">
					<img
						src="<?php echo esc_url(FRUSANTOS_URI . '/assets/images/' . $frusantos_photo); ?>"
						alt="<?php esc_attr_e('Frusantos', 'frusantos'); ?>"
						class="h-full w-full object-cover transition duration-500 hover:scale-105"
						loading="lazy"
					>
				</div>
			<?php endforeach; ?>
		</div>
	</section>
</main>

<?php
get_footer();
