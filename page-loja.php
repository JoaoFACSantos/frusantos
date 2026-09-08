<?php
/**
 * Template da página "Loja" — aplicado automaticamente à página com o
 * slug `loja` (hierarquia de templates do WordPress: page-{slug}.php).
 * Baseado no design aprovado (Claude Design), que por sua vez reproduz a
 * estrutura real da loja WooCommerce de frusantos.com: preços "sob
 * consulta" e botão "Pedir orçamento"/"Ver opções" em vez de preço +
 * carrinho — o site atual usa um plugin de pedido de orçamento, não
 * checkout direto.
 *
 * Ainda não instalámos o WooCommerce aqui (decisão tomada antes nesta
 * sessão: fica para depois). Em vez de simular um carrinho a fingir, esta
 * página tem uma "lista de pedidos" real e funcional, só que mais simples:
 * guardada no localStorage do visitante (sem passar por servidor) e, ao
 * enviar, abre o cliente de email do próprio visitante com um rascunho já
 * preenchido para frusantos@frusantos.com — nada de formulário falso que
 * não vai a lado nenhum. O botão "Lista de Pedidos" foi retirado do
 * cabeçalho antes nesta sessão a pedido explícito; a funcionalidade fica
 * só dentro desta página (barra de resumo no fundo da grelha).
 *
 * Os 7 produtos, as respetivas fotos e a árvore de categorias
 * (Azeite, Azeitonas e pickles, Bebidas, Frutas frescas > Citrinos/Maçãs,
 * Frutos secos e sementes, Legumes e tubérculos > Alhos/Batatas/Cebolas,
 * Mel, Sem categoria) são reais, copiados da loja atual — incluindo o
 * facto de estarem todos esgotados e em "Sem categoria" neste momento;
 * as restantes categorias existem na loja real mas ainda sem produtos
 * atribuídos, o que aqui se reflete tal e qual (categoria vazia mostra
 * mensagem honesta em vez de produtos inventados).
 *
 * @package Frusantos
 */

get_header();

$frusantos_shop_categories = [
	['slug' => 'azeite', 'label' => __('Azeite', 'frusantos')],
	['slug' => 'azeitonas-e-pickles', 'label' => __('Azeitonas e pickles', 'frusantos')],
	['slug' => 'bebidas', 'label' => __('Bebidas', 'frusantos')],
	[
		'slug'     => 'frutas-frescas',
		'label'    => __('Frutas frescas', 'frusantos'),
		'children' => [
			['slug' => 'citrinos', 'label' => __('Citrinos', 'frusantos')],
			['slug' => 'macas', 'label' => __('Maçãs', 'frusantos')],
		],
	],
	['slug' => 'frutos-secos-e-sementes', 'label' => __('Frutos secos e sementes', 'frusantos')],
	[
		'slug'     => 'legumes-e-tuberculos',
		'label'    => __('Legumes e tubérculos', 'frusantos'),
		'children' => [
			['slug' => 'alhos', 'label' => __('Alhos', 'frusantos')],
			['slug' => 'batatas', 'label' => __('Batatas', 'frusantos')],
			['slug' => 'cebolas', 'label' => __('Cebolas', 'frusantos')],
		],
	],
	['slug' => 'mel', 'label' => __('Mel', 'frusantos')],
	['slug' => 'sem-categoria', 'label' => __('Sem categoria', 'frusantos')],
];

$frusantos_products = [
	[
		'title'    => 'Azeite Virgem Extra Premium Saudade – Sabores do Coração',
		'category' => 'sem-categoria',
		'cat_label' => __('Sem categoria', 'frusantos'),
		'image'    => 'produtos/azeite-saudade.jpg',
		'size'     => '500 ml',
		'cta'      => __('Pedir orçamento', 'frusantos'),
	],
	[
		'title'    => 'Castanha Saudade – Sabores do Coração 1Kg',
		'category' => 'sem-categoria',
		'cat_label' => __('Sem categoria', 'frusantos'),
		'image'    => 'produtos/castanha-saudade-a.jpg',
		'size'     => '1 Kg',
		'cta'      => __('Ver opções', 'frusantos'),
	],
	[
		'title'    => 'Castanha Saudade – Sabores do Coração 2Kg',
		'category' => 'sem-categoria',
		'cat_label' => __('Sem categoria', 'frusantos'),
		'image'    => 'produtos/castanha-saudade-b.jpg',
		'size'     => '2 Kg',
		'cta'      => __('Ver opções', 'frusantos'),
	],
	[
		'title'    => 'Castanha Saudade – Sabores do Coração 5Kg',
		'category' => 'sem-categoria',
		'cat_label' => __('Sem categoria', 'frusantos'),
		'image'    => 'produtos/castanha-saudade-a.jpg',
		'size'     => '5 Kg',
		'cta'      => __('Ver opções', 'frusantos'),
	],
	[
		'title'    => 'Castanha Saudade – Sabores do Coração 25Kg',
		'category' => 'sem-categoria',
		'cat_label' => __('Sem categoria', 'frusantos'),
		'image'    => 'produtos/castanha-saudade-b.jpg',
		'size'     => '25 Kg',
		'cta'      => __('Ver opções', 'frusantos'),
	],
	[
		'title'    => 'Pack Saudade – Sabores do Coração',
		'category' => 'sem-categoria',
		'cat_label' => __('Sem categoria', 'frusantos'),
		'image'    => 'produtos/azeite-saudade.jpg',
		'size'     => null,
		'cta'      => __('Pedir orçamento', 'frusantos'),
	],
	[
		'title'    => 'Saudade Premium Extra Virgin Olive Oil – Sabores do Coração',
		'category' => 'sem-categoria',
		'cat_label' => __('Sem categoria', 'frusantos'),
		'image'    => 'produtos/azeite-saudade.jpg',
		'size'     => '500 ml',
		'cta'      => __('Pedir orçamento', 'frusantos'),
	],
];
?>

<main id="main">
	<section class="relative flex min-h-[360px] items-center overflow-hidden sm:min-h-[420px]">
		<img
			src="<?php echo esc_url(FRUSANTOS_URI . '/assets/images/produto-loja.jpg'); ?>"
			alt=""
			class="absolute inset-0 h-full w-full object-cover"
			fetchpriority="high"
		>
		<div class="absolute inset-0 bg-gradient-to-r from-ink/90 via-ink/70 to-ink/30"></div>

		<div class="relative px-6 py-16 lg:px-[60px]">
			<div class="mb-5 flex items-center gap-4">
				<span class="h-[3px] w-14 bg-primary-400"></span>
				<span class="font-mono text-xs uppercase tracking-[.24em] text-white"><?php esc_html_e('Loja online', 'frusantos'); ?></span>
			</div>
			<h1 class="text-4xl leading-[1.02] text-primary-400 sm:text-6xl lg:text-[76px]"><?php esc_html_e('Loja', 'frusantos'); ?></h1>
			<p class="mt-6 max-w-xl text-base leading-relaxed text-white sm:text-lg">
				<?php esc_html_e('Castanha e azeite Saudade, castanha Martaínha e os restantes produtos Frusantos. Peça orçamento para quantidades a granel.', 'frusantos'); ?>
			</p>
		</div>
	</section>

	<section class="px-6 py-16 lg:px-[60px] lg:py-[84px]">
		<div class="mb-8 flex items-center gap-3 text-sm text-neutral-500">
			<a href="<?php echo esc_url(home_url('/')); ?>" class="transition duration-250 hover:text-secondary-500"><?php esc_html_e('Início', 'frusantos'); ?></a>
			<span class="text-neutral-300">/</span>
			<span class="font-semibold text-ink"><?php esc_html_e('Loja', 'frusantos'); ?></span>
		</div>

		<div class="flex flex-wrap items-start gap-8 lg:flex-nowrap lg:gap-12">
			<aside class="w-full flex-none lg:sticky lg:top-[104px] lg:w-[280px]">
				<div class="rounded-theme border border-neutral-200 bg-white p-7">
					<h2 class="mb-5 font-mono text-xs font-bold uppercase tracking-[.14em] text-ink"><?php esc_html_e('Categorias de produto', 'frusantos'); ?></h2>
					<div class="flex flex-col">
						<a href="#" data-shop-category="todas" data-shop-base-class="text-neutral-700" class="border-t border-neutral-200 py-3.5 text-sm font-semibold uppercase tracking-[.04em] text-secondary-500 transition duration-250 hover:text-secondary-600"><?php esc_html_e('Todos os produtos', 'frusantos'); ?></a>
						<?php foreach ($frusantos_shop_categories as $frusantos_cat) : ?>
							<a
								href="#"
								data-shop-category="<?php echo esc_attr($frusantos_cat['slug']); ?>"
								data-shop-base-class="text-neutral-700"
								class="border-t border-neutral-200 <?php echo empty($frusantos_cat['children']) ? 'py-3.5' : 'pt-3.5 pb-2'; ?> text-sm font-medium uppercase tracking-[.04em] text-neutral-700 transition duration-250 hover:text-secondary-500"
							>
								<?php echo esc_html($frusantos_cat['label']); ?>
							</a>
							<?php if (!empty($frusantos_cat['children'])) : ?>
								<div class="flex flex-col gap-2 pb-3.5 pl-3.5">
									<?php foreach ($frusantos_cat['children'] as $frusantos_child) : ?>
										<a href="#" data-shop-category="<?php echo esc_attr($frusantos_child['slug']); ?>" data-shop-base-class="text-neutral-500" class="text-[13px] text-neutral-500 transition duration-250 hover:text-secondary-500">
											<?php echo esc_html($frusantos_child['label']); ?>
										</a>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				</div>

				<div class="mt-5 rounded-theme bg-slate p-7 text-white">
					<p class="mb-3.5 font-mono text-xs uppercase tracking-[.2em] text-primary-300"><?php esc_html_e('Grandes quantidades', 'frusantos'); ?></p>
					<p class="mb-6 text-[15px] leading-relaxed text-slate-200">
						<?php esc_html_e('Trabalhamos com grossistas e retalhistas. Junte os produtos à lista e enviamos orçamento.', 'frusantos'); ?>
					</p>
					<a href="mailto:frusantos@frusantos.com?subject=<?php echo esc_attr(rawurlencode(__('Pedido de orçamento — grandes quantidades', 'frusantos'))); ?>" class="btn-primary">
						<?php esc_html_e('Pedir orçamento', 'frusantos'); ?>
					</a>
				</div>
			</aside>

			<div class="w-full min-w-0 flex-1">
				<div class="mb-6 flex flex-wrap items-end justify-between gap-4">
					<div>
						<p class="eyebrow"><?php esc_html_e('Produtos', 'frusantos'); ?></p>
						<h2 class="text-2xl leading-tight sm:text-3xl"><?php esc_html_e('Castanha e azeite Saudade', 'frusantos'); ?></h2>
					</div>
					<p class="text-sm text-neutral-500" data-shop-results>
						<?php
						printf(
							/* translators: %d: número de produtos */
							esc_html__('A mostrar todos os %d resultados', 'frusantos'),
							count($frusantos_products)
						);
						?>
					</p>
				</div>

				<div class="mb-6 flex flex-wrap items-center justify-between gap-4 border-y border-neutral-200 py-3.5">
					<div class="flex flex-wrap items-center gap-2">
						<span class="mr-1 font-mono text-[11px] uppercase tracking-[.14em] text-neutral-500"><?php esc_html_e('Ordenar', 'frusantos'); ?></span>
						<button type="button" data-shop-sort="default" class="rounded-full border border-slate bg-slate px-4 py-2.5 text-[11px] font-bold uppercase tracking-[.08em] text-white transition duration-250"><?php esc_html_e('Padrão', 'frusantos'); ?></button>
						<button type="button" data-shop-sort="az" class="rounded-full border border-neutral-300 bg-transparent px-4 py-2.5 text-[11px] font-bold uppercase tracking-[.08em] text-neutral-700 transition duration-250">A – Z</button>
						<button type="button" data-shop-sort="za" class="rounded-full border border-neutral-300 bg-transparent px-4 py-2.5 text-[11px] font-bold uppercase tracking-[.08em] text-neutral-700 transition duration-250">Z – A</button>
					</div>
					<div class="flex items-center gap-2">
						<span class="mr-1 font-mono text-[11px] uppercase tracking-[.14em] text-neutral-500"><?php esc_html_e('Colunas', 'frusantos'); ?></span>
						<button type="button" data-shop-cols="2" class="flex h-9 w-9 items-center justify-center rounded-theme border border-neutral-300 bg-transparent text-xs font-bold text-neutral-700 transition duration-250">2</button>
						<button type="button" data-shop-cols="3" class="flex h-9 w-9 items-center justify-center rounded-theme border border-slate bg-slate text-xs font-bold text-white transition duration-250">3</button>
					</div>
				</div>

				<div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3" data-shop-grid>
					<?php foreach ($frusantos_products as $frusantos_i => $frusantos_product) : ?>
						<div
							data-shop-card
							data-title="<?php echo esc_attr($frusantos_product['title']); ?>"
							data-category="<?php echo esc_attr($frusantos_product['category']); ?>"
							data-order="<?php echo esc_attr($frusantos_i); ?>"
							class="fade-in-up group flex flex-col overflow-hidden rounded-theme border border-neutral-200 bg-white transition duration-300 hover:-translate-y-1 hover:shadow-soft"
						>
							<div class="relative overflow-hidden bg-gradient-to-b from-neutral-50 to-neutral-100">
								<img
									src="<?php echo esc_url(FRUSANTOS_URI . '/assets/images/' . $frusantos_product['image']); ?>"
									alt="<?php echo esc_attr($frusantos_product['title']); ?>"
									class="aspect-square w-full object-contain p-6 transition duration-300 group-hover:scale-105"
									loading="lazy"
								>
								<span class="absolute left-4 top-4 rounded-full bg-ink/90 px-3 py-1.5 font-mono text-[9px] font-bold uppercase tracking-[.14em] text-white"><?php esc_html_e('Esgotado', 'frusantos'); ?></span>
								<?php if ($frusantos_product['size']) : ?>
									<span class="absolute right-4 top-4 rounded-full border border-neutral-200 bg-white px-3 py-1.5 text-xs font-bold text-ink"><?php echo esc_html($frusantos_product['size']); ?></span>
								<?php endif; ?>
							</div>
							<div class="flex flex-1 flex-col gap-3.5 border-t border-neutral-200 p-6">
								<p class="font-mono text-[10px] font-semibold uppercase tracking-[.16em] text-primary-600"><?php echo esc_html($frusantos_product['cat_label']); ?></p>
								<h3 class="flex-1 text-[15px] font-semibold leading-snug text-ink"><?php echo esc_html($frusantos_product['title']); ?></h3>
								<div class="flex items-baseline gap-2 text-[13px]">
									<span class="font-semibold text-neutral-600"><?php esc_html_e('Preço', 'frusantos'); ?></span>
									<span class="text-neutral-500"><?php esc_html_e('sob consulta', 'frusantos'); ?></span>
								</div>
								<button
									type="button"
									data-shop-toggle
									data-cta="<?php echo esc_attr($frusantos_product['cta']); ?>"
									class="w-full rounded-full border border-secondary-500 px-4 py-3.5 text-[11px] font-bold uppercase tracking-[.1em] text-secondary-500 transition duration-250 hover:bg-secondary-500 hover:text-white"
								>
									<?php echo esc_html($frusantos_product['cta']); ?>
								</button>
							</div>
						</div>
					<?php endforeach; ?>
				</div>

				<p data-shop-empty class="hidden rounded-theme border border-dashed border-neutral-300 px-6 py-12 text-center text-sm text-neutral-500">
					<?php esc_html_e('Sem produtos nesta categoria de momento.', 'frusantos'); ?>
				</p>

				<div data-shop-summary class="mt-6 hidden items-center justify-between gap-4 rounded-theme border border-neutral-200 bg-white p-6">
					<p data-shop-summary-count class="text-[15px] text-ink"></p>
					<a data-shop-summary-link href="#" class="btn-primary"><?php esc_html_e('Enviar pedido de orçamento', 'frusantos'); ?></a>
				</div>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
