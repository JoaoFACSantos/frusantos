# Tema Frusantos

Tema WordPress à medida para [frusantos.com](https://frusantos.com), construído
de raiz para substituir o tema comercial atual (Woodmart + Elementor +
WooCommerce). Sem page builder — tema clássico (`functions.php` + templates
PHP) com Tailwind CSS + Vite para o frontend.

Este scaffold cobre a estrutura inicial do tema (setup, enqueue de assets,
templates base). Os overrides de templates WooCommerce (loja, ficha de
produto, carrinho) ficam para a fase seguinte — ver `woocommerce/README.md`.

## Stack

- WordPress (tema clássico, sem Elementor) + WooCommerce
- Tailwind CSS 3 + Vite 5
- PHP 8.0+
- Node 18+ (para o build do frontend)

## Estrutura

```
frusantos-theme/
├── functions.php              # bootstrap — só faz require dos ficheiros em inc/
├── style.css                  # cabeçalho de metadados do tema (exigido pelo WP; sem CSS real aqui)
├── header.php / footer.php    # não abrem/fecham <main> — ver nota abaixo
├── front-page.php             # home: hero + áreas de negócio + notícias + contacto
├── page.php                   # página genérica
├── single.php                 # post de blog (Comunicação)
├── archive.php                # categorias/tags/autor/blog
├── index.php                  # fallback obrigatório do WordPress
├── 404.php
├── inc/
│   ├── setup.php               # theme supports, menus, sidebars, tamanhos de imagem
│   ├── enqueue.php              # integração Vite (dev server / manifest.json)
│   ├── template-tags.php        # helpers usados nos templates
│   └── woocommerce.php          # suporte base WooCommerce (carregado só se o plugin existir)
├── template-parts/
│   ├── header/                  # branding, navegação (+ menu mobile)
│   ├── front-page/               # hero, áreas de negócio, notícias, contacto
│   └── content/                  # cartão de post (entry), estado vazio (none)
├── woocommerce/                 # overrides de templates WooCommerce (vazio por agora)
├── src/
│   ├── css/main.css             # entry Tailwind + @font-face + componentes
│   ├── js/main.js               # entry JS — scroll reveal, menu mobile
│   └── fonts/                   # fontes variáveis .woff2 (por adicionar, ver abaixo)
├── tailwind.config.js           # design tokens (cores, tipografia, espaçamento)
├── vite.config.js
├── postcss.config.js
└── package.json
```

**Nota sobre `<main>`:** `header.php` não abre `<main>` — cada template
(`front-page.php`, `page.php`, `single.php`, `archive.php`, `index.php`)
abre e fecha o seu próprio `<main id="main">`. Isto evita `<main>` duplicado
nas páginas WooCommerce, que envolvem o conteúdo automaticamente através dos
hooks `woocommerce_before_main_content` / `woocommerce_after_main_content`
(ver `inc/woocommerce.php`).

## Como correr localmente (Local WP + VS Code)

1. Colocar esta pasta em `wp-content/themes/frusantos` no site Local WP.
2. Ativar o tema "Frusantos" no wp-admin.
3. Instalar dependências e arrancar o Vite:

   ```bash
   npm install
   npm run dev
   ```

   Isto arranca o servidor Vite em `http://localhost:5173` e cria um
   ficheiro `hot` na raiz do tema — enquanto esse ficheiro existir,
   `inc/enqueue.php` carrega os assets diretamente do servidor Vite, com
   hot module replacement. Parar o `npm run dev` (Ctrl+C) remove o `hot`
   automaticamente.

4. Para gerar os ficheiros finais (produção):

   ```bash
   npm run build
   ```

   Isto cria `dist/` com os ficheiros compilados e `dist/.vite/manifest.json`,
   que `inc/enqueue.php` lê para enfileirar os assets com hash (cache
   busting automático). `dist/` não é versionado (ver `.gitignore`) — corre
   sempre `npm run build` antes de publicar em produção.

## Fontes

`src/css/main.css` já tem as declarações `@font-face`, mas os ficheiros
`.woff2` **não estão incluídos** neste scaffold. Antes do primeiro build,
adicionar:

```
src/fonts/fraunces-variable.woff2   (Fraunces — display/títulos)
src/fonts/inter-variable.woff2      (Inter — corpo de texto)
```

Ambas variable fonts, licença OFL, disponíveis em Google Fonts / Fontsource.
São uma escolha placeholder — ver secção seguinte.

## Design tokens — placeholders

As cores e fontes em `tailwind.config.js` são um ponto de partida coerente
(paleta terrosa: verde-oliva + terracota), **não** a paleta real extraída do
site atual. Assim que as capturas de ecrã forem enviadas e analisadas, só é
preciso atualizar os valores em `theme.extend.colors` e `fontFamily` — a
estrutura dos templates não muda.

## Próximos passos

1. Enviar capturas de ecrã do site atual → extrair paleta e tipografia reais
   → atualizar `tailwind.config.js`.
2. Adicionar os ficheiros de fonte reais em `src/fonts/`.
3. Overrides de templates WooCommerce em `woocommerce/` (loja, ficha de
   produto, carrinho) — ver `woocommerce/README.md`.
4. Resolver o acesso (domínio, alojamento, conteúdos, base de dados,
   email) junto da agência atual.
5. Conteúdo definitivo do hero e das áreas de negócio (atualmente com
   texto placeholder claramente assinalado com `TODO` nos ficheiros
   `template-parts/front-page/*.php`).
