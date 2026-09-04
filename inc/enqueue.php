<?php
/**
 * Enqueue dos assets compilados pelo Vite.
 *
 * Modo desenvolvimento: se existir um ficheiro `hot` na raiz do tema
 * (criado automaticamente por `npm run dev`, ver vite.config.js), os
 * scripts são carregados diretamente do servidor Vite, com HMR.
 *
 * Modo produção: lê `dist/.vite/manifest.json`, gerado por `npm run build`,
 * e carrega os ficheiros já compilados e com hash no nome (cache busting
 * automático — não é preciso gerir versões manualmente).
 *
 * @package Frusantos
 */

if (!defined('ABSPATH')) {
	exit;
}

const FRUSANTOS_VITE_ENTRY = 'src/js/main.js';

function frusantos_vite_is_dev(): bool {
	return file_exists(FRUSANTOS_DIR . '/hot');
}

function frusantos_vite_dev_server_url(): string {
	$hot = trim((string) file_get_contents(FRUSANTOS_DIR . '/hot'));
	return $hot !== '' ? $hot : 'http://localhost:5173';
}

function frusantos_vite_manifest(): array {
	static $manifest = null;

	if ($manifest !== null) {
		return $manifest;
	}

	$manifest_path = FRUSANTOS_DIR . '/dist/.vite/manifest.json';

	if (!file_exists($manifest_path)) {
		$manifest = [];
		return $manifest;
	}

	$contents = file_get_contents($manifest_path);
	$manifest = json_decode((string) $contents, true);

	if (!is_array($manifest)) {
		$manifest = [];
	}

	return $manifest;
}

function frusantos_enqueue_assets(): void {
	if (frusantos_vite_is_dev()) {
		$dev_url = frusantos_vite_dev_server_url();

		wp_enqueue_script('vite-client', $dev_url . '/@vite/client', [], null, false);
		wp_enqueue_script('frusantos-main', $dev_url . '/' . FRUSANTOS_VITE_ENTRY, [], null, true);

		return;
	}

	$manifest = frusantos_vite_manifest();

	if (empty($manifest[ FRUSANTOS_VITE_ENTRY ])) {
		// Build ainda não foi feito (`npm run build`). Não gerar fatal —
		// a página fica sem estilos/scripts em vez de rebentar.
		return;
	}

	$entry = $manifest[ FRUSANTOS_VITE_ENTRY ];

	if (!empty($entry['css'])) {
		foreach ($entry['css'] as $i => $css_file) {
			wp_enqueue_style(
				0 === $i ? 'frusantos-main' : "frusantos-main-{$i}",
				FRUSANTOS_URI . '/dist/' . $css_file,
				[],
				FRUSANTOS_VERSION
			);
		}
	}

	wp_enqueue_script(
		'frusantos-main',
		FRUSANTOS_URI . '/dist/' . $entry['file'],
		[],
		FRUSANTOS_VERSION,
		true
	);
}
add_action('wp_enqueue_scripts', 'frusantos_enqueue_assets');

/**
 * Os ficheiros gerados pelo Vite são módulos ES nativos — o WordPress não
 * marca isso sozinho, é preciso adicionar type="module" à tag <script>.
 */
function frusantos_add_module_type(string $tag, string $handle): string {
	if (!in_array($handle, ['frusantos-main', 'vite-client'], true)) {
		return $tag;
	}

	if (str_contains($tag, 'type=')) {
		return $tag;
	}

	return str_replace(' src=', ' type="module" src=', $tag);
}
add_filter('script_loader_tag', 'frusantos_add_module_type', 10, 2);

/**
 * Impedir que o WordPress tente concatenar os módulos ES com outros
 * scripts (script concatenation parte módulos, porque perdem o contexto
 * de module scope quando combinados).
 */
function frusantos_dont_concat_module(bool $do_concat, string $handle): bool {
	if (in_array($handle, ['frusantos-main', 'vite-client'], true)) {
		return false;
	}

	return $do_concat;
}
add_filter('js_do_concat', 'frusantos_dont_concat_module', 10, 2);
