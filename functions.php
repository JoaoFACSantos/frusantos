<?php
/**
 * Tema Frusantos — bootstrap.
 *
 * Tema clássico (PHP + functions.php), sem page builder. Estrutura pensada
 * para preservar o WooCommerce existente (produtos, encomendas, clientes,
 * URLs) enquanto substitui completamente a camada visual.
 *
 * @package Frusantos
 */

if (!defined('ABSPATH')) {
	exit; // Acesso direto não permitido.
}

define('FRUSANTOS_VERSION', wp_get_theme()->get('Version'));
define('FRUSANTOS_DIR', get_template_directory());
define('FRUSANTOS_URI', get_template_directory_uri());

require FRUSANTOS_DIR . '/inc/setup.php';
require FRUSANTOS_DIR . '/inc/enqueue.php';
require FRUSANTOS_DIR . '/inc/template-tags.php';

// Só carregar o suporte WooCommerce se o plugin estiver ativo — evita fatais
// em ambientes de desenvolvimento onde ainda não foi instalado.
if (class_exists('WooCommerce')) {
	require FRUSANTOS_DIR . '/inc/woocommerce.php';
}
