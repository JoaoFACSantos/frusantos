import { defineConfig } from 'vite';
import { writeFileSync, rmSync } from 'node:fs';

/**
 * Integração Vite <-> WordPress (tema clássico, sem plugin dedicado).
 *
 * Em `npm run dev`, este plugin escreve um ficheiro `hot` na raiz do tema
 * com o URL do servidor de desenvolvimento. O `functions.php` (ver
 * `inc/enqueue.php`) verifica se este ficheiro existe: se existir, carrega
 * os scripts diretamente do servidor Vite (com HMR); caso contrário, lê
 * `dist/.vite/manifest.json` e carrega os ficheiros compilados com hash.
 *
 * É o mesmo padrão usado pelo Laravel Mix/Vite (ficheiro "hot"), adaptado
 * para não depender de nenhum plugin externo.
 */
const HOT_FILE = 'hot';

function wordpressHotFile() {
  const cleanup = () => {
    try {
      rmSync(HOT_FILE);
    } catch {
      // ficheiro não existe, nada a fazer
    }
  };

  return {
    name: 'wordpress-hot-file',
    configureServer(server) {
      server.httpServer?.once('listening', () => {
        const address = server.httpServer.address();
        const port = typeof address === 'object' && address ? address.port : 5173;
        writeFileSync(HOT_FILE, `http://localhost:${port}`);
      });

      process.on('exit', cleanup);
      process.on('SIGINT', () => {
        cleanup();
        process.exit();
      });
      process.on('SIGTERM', () => {
        cleanup();
        process.exit();
      });
    },
    buildStart() {
      // garante que um build de produção nunca deixa o tema "preso" em modo dev
      cleanup();
    },
  };
}

export default defineConfig({
  plugins: [wordpressHotFile()],
  server: {
    host: 'localhost',
    port: 5173,
    strictPort: true,
    cors: true,
    origin: 'http://localhost:5173',
  },
  build: {
    manifest: true,
    outDir: 'dist',
    // false porque o servidor local (nginx/PHP-FPM) por vezes mantém um
    // handle aberto a ficheiros dentro de dist/assets, o que impede o
    // Vite de apagar a pasta antes de escrever os novos ficheiros
    // (EBUSY no Windows). dist/ está no .gitignore, por isso ficheiros
    // antigos acumulados ali não têm impacto nenhum no repositório.
    emptyOutDir: false,
    rollupOptions: {
      input: {
        main: 'src/js/main.js',
      },
    },
  },
});
