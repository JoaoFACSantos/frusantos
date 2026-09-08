<?php
/**
 * Template da página "Marcas" — aplicado automaticamente à página com o
 * slug `marcas` (convenção de hierarquia de templates do WordPress:
 * page-{slug}.php). Layout dedicado em vez do genérico `page.php`
 * porque esta página tem hero + secções de marca a toda a largura, fora
 * do contentor `.prose` usado nas páginas de texto simples.
 *
 * Estrutura e conteúdo copiados do design aprovado (Claude Design). Os
 * logótipos da Saudade e da Flôr do Távora são os ficheiros reais do
 * site atual; a foto do hero também. Ainda não há fotos reais para o
 * produto da Flôr do Távora (garrafa de azeite) nem para uma panorâmica
 * do vale do Távora — em vez de inventar uma imagem, essas secções
 * ficam com um painel de cor em vez de foto, até termos os ficheiros.
 *
 * @package Frusantos
 */

get_header();
?>

<main id="main">
	<section class="relative flex min-h-[420px] items-center overflow-hidden sm:min-h-[520px]">
		<img
			src="<?php echo esc_url(FRUSANTOS_URI . '/assets/images/marcas-hero.webp'); ?>"
			alt=""
			class="absolute inset-0 h-full w-full object-cover"
			fetchpriority="high"
		>
		<div class="absolute inset-0 bg-gradient-to-r from-ink/90 via-ink/70 to-ink/40"></div>

		<div class="relative px-6 py-16 sm:py-20 lg:px-[60px]">
			<div class="mb-5 flex items-center gap-4">
				<span class="h-[3px] w-14 bg-primary-400"></span>
				<span class="font-mono text-xs uppercase tracking-[.24em] text-white"><?php esc_html_e('Descubra as nossas marcas', 'frusantos'); ?></span>
			</div>
			<h1 class="max-w-2xl text-4xl leading-[1.05] text-primary-400 sm:text-6xl lg:text-[76px] lg:leading-[1.02]">
				<?php esc_html_e('Marcas', 'frusantos'); ?>
			</h1>
			<p class="mt-6 max-w-xl text-base leading-relaxed text-white sm:text-lg">
				<?php esc_html_e('Procuramos marcar a diferença, valorizamos a produção portuguesa e apostamos em produtos identitários de elevada qualidade, proporcionando através das nossas marcas experiências degustativas, sensoriais e emocionais que nos definem e caracterizam — que são nossas, da nossa região e do nosso país, Portugal.', 'frusantos'); ?>
			</p>
			<div class="mt-9 flex flex-wrap gap-3">
				<a href="#saudade" class="btn-primary">
					Saudade <span class="ml-1 font-normal opacity-70"><?php esc_html_e('Sabores do Coração', 'frusantos'); ?></span>
				</a>
				<a href="#flor-do-tavora" class="btn-outline">
					Flôr do Távora <span class="ml-1 font-normal opacity-70"><?php esc_html_e('Azeite', 'frusantos'); ?></span>
				</a>
			</div>
		</div>
	</section>

	<section id="saudade" class="fade-in-up grid gap-12 px-6 py-16 lg:grid-cols-2 lg:items-center lg:gap-16 lg:px-[60px] lg:py-[130px]">
		<div class="order-2 aspect-[4/3] overflow-hidden rounded-theme lg:order-1">
			<img
				src="<?php echo esc_url(FRUSANTOS_URI . '/assets/images/produto-saudade.jpg'); ?>"
				alt="<?php esc_attr_e('Produto Saudade', 'frusantos'); ?>"
				class="h-full w-full object-cover"
				loading="lazy"
			>
		</div>
		<div class="order-1 lg:order-2">
			<img
				src="<?php echo esc_url(FRUSANTOS_URI . '/assets/images/logo-saudade.png'); ?>"
				alt="<?php esc_attr_e('Saudade — Sabores do Coração', 'frusantos'); ?>"
				class="mx-auto mb-8 h-auto w-full max-w-[480px]"
			>
			<p class="text-base leading-relaxed text-neutral-700 sm:text-lg">
				<?php esc_html_e('Palavra portuguesa sem tradução, reconhecida mundialmente, de personalidade forte e relacional, que tão bem caracteriza Portugal — é a marca que dá corpo, forma e rosto aos nossos produtos, a maioria deles sazonais, cujas características, qualidade e sabor nos despertam saudade e nos transportam para boas memórias e sentimentos universais.', 'frusantos'); ?>
			</p>
			<a href="<?php echo esc_url(class_exists('WooCommerce') ? wc_get_page_permalink('shop') : home_url('/loja/')); ?>" class="link-underline mt-7 inline-flex items-center gap-2">
				<?php esc_html_e('Ver produtos na loja', 'frusantos'); ?> <span aria-hidden="true">&rarr;</span>
			</a>
		</div>
	</section>

	<section id="flor-do-tavora" class="fade-in-up grid gap-12 px-6 py-16 lg:grid-cols-2 lg:items-center lg:gap-16 lg:px-[60px] lg:py-[130px]">
		<div>
			<img
				src="<?php echo esc_url(FRUSANTOS_URI . '/assets/images/logo-flor-tavora.png'); ?>"
				alt="<?php esc_attr_e('Flôr do Távora', 'frusantos'); ?>"
				class="mx-auto mb-8 h-auto w-full max-w-[320px]"
			>
			<p class="text-base leading-relaxed text-neutral-700 sm:text-lg">
				<?php esc_html_e('Inspirada no rio Távora, que nasce na região e vai desaguar no rio Douro, guiando-nos por magníficas paisagens de vales rasgados, montanhas imponentes e encostas verdejantes com soutos de castanheiros, vinhas, olivais e searas — onde selecionamos a Flor do Távora, um azeite de sabor e aroma inconfundíveis.', 'frusantos'); ?>
			</p>
			<a href="<?php echo esc_url(class_exists('WooCommerce') ? wc_get_page_permalink('shop') : home_url('/loja/')); ?>" class="link-underline mt-7 inline-flex items-center gap-2">
				<?php esc_html_e('Ver produtos na loja', 'frusantos'); ?> <span aria-hidden="true">&rarr;</span>
			</a>
		</div>
		<?php
		/**
		 * TODO: substituir por fotografia real da garrafa de azeite Flôr
		 * do Távora assim que existir — painel de cor em vez de placeholder
		 * tracejado, para não parecer uma secção "por acabar".
		 */
		?>
		<div class="flex aspect-[4/3] items-end overflow-hidden rounded-theme bg-gradient-to-br from-slate to-ink p-8">
			<img
				src="<?php echo esc_url(FRUSANTOS_URI . '/assets/images/logo-flor-tavora.png'); ?>"
				alt=""
				aria-hidden="true"
				class="mx-auto h-1/2 w-auto opacity-90 brightness-0 invert"
			>
		</div>
	</section>
</main>

<?php
get_footer();
