# Overrides de templates WooCommerce

Esta pasta espelha a estrutura de `wp-content/plugins/woocommerce/templates/`.
Qualquer ficheiro copiado para aqui (mantendo o mesmo caminho relativo) sobrepõe-se
ao template por omissão do WooCommerce — é o mecanismo standard de overrides do
próprio WooCommerce, não precisa de código adicional no `functions.php`.

Ainda vazio de propósito: este é o próximo passo do projeto, depois da estrutura
base do tema estar validada. Candidatos prováveis para os primeiros overrides:

- `archive-product.php` — grelha da loja
- `single-product.php` / `content-single-product.php` — ficha de produto
- `content-product.php` — cartão de produto nas grelhas
- `cart/cart.php` e `checkout/form-checkout.php` — se o fluxo B2C precisar de ajuste
- algo para a "Lista de Pedidos" / request-quote B2B, consoante o plugin usado no
  site atual para isso (confirmar qual é ao obter acesso ao admin)

Antes de copiar um template, confirmar a versão do WooCommerce instalada e copiar
a partir dessa versão exata (os templates mudam entre versões).
