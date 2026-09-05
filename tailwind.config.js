import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/**
 * Design tokens — paleta do design aprovado (Claude Design canvas, "Turno
 * 4a" — versão mais recente da homepage). Valores exatos copiados do HTML
 * do design, não aproximados:
 *
 *   verde CTA/hover:    #7DBE4E / #6FAD42     laranja CTA/hover: #E8801F / #CF6F16
 *   verde eyebrow:      #5E9E33               verde claro (fundo escuro): #A8D585
 *   teal escuro (topo/secções contraste): #2F4650      preto-azulado (rodapé/texto): #1C2226
 *   bege secções:       #F3F1EA               fundo base: #FFFDFA      borda: #E7E4DC
 *
 * @type {import('tailwindcss').Config}
 */
export default {
  content: [
    './*.php',
    './inc/**/*.php',
    './template-parts/**/*.php',
    './woocommerce/**/*.php',
  ],
  theme: {
    extend: {
      colors: {
        // Verde — CTAs secundários, eyebrows, acentos
        primary: {
          50: '#f2f9ec',
          100: '#e2f2d2',
          200: '#c5e5a8',
          300: '#a8d585', // verde claro usado sobre fundo escuro
          400: '#7dbe4e', // verde CTA
          500: '#6fad42', // hover do CTA verde
          600: '#5e9e33', // verde eyebrow/label
          700: '#4a7d29',
          800: '#3d6522',
          900: '#33531d',
          DEFAULT: '#7dbe4e',
        },
        // Laranja — CTA principal (botão "Conheça as marcas", datas, "Enviar")
        secondary: {
          50: '#fdf3e9',
          100: '#fbe1c6',
          200: '#f6c48c',
          300: '#f0a355',
          400: '#ea8f34',
          500: '#e8801f', // cor exata do CTA
          600: '#cf6f16', // hover exato
          700: '#a85813',
          800: '#864613',
          900: '#6f3b13',
          DEFAULT: '#e8801f',
        },
        // Neutros quentes — texto, fundos de secção, bordas (bege, não cinza)
        neutral: {
          50: '#fffdfa', // = surface
          100: '#f3f1ea', // fundo bege de secção
          200: '#e7e4dc', // borda
          300: '#dad6cb', // borda de inputs
          400: '#98a0a6',
          500: '#7a828a',
          600: '#586066',
          700: '#454d52',
          800: '#4a5359',
          900: '#1c2226', // = ink
        },
        // Teal escuro — barra de utilidades, secção de internacionalização
        slate: {
          200: '#dce4e7',
          300: '#c9d6d2',
          400: '#9db0b8',
          500: '#7a828a',
          DEFAULT: '#2f4650',
          900: '#1c2226', // rodapé (mais escuro que o DEFAULT)
        },
        // Aliases semânticos usados nos templates em vez de neutral-XXX direto
        surface: '#fffdfa',
        ink: '#1c2226',
      },
      fontFamily: {
        // Grotesco geométrico — títulos (bold/uppercase) e corpo de texto
        display: ['Figtree', 'ui-sans-serif', 'system-ui', 'sans-serif'],
        sans: ['Figtree', 'ui-sans-serif', 'system-ui', '-apple-system', 'sans-serif'],
        // Monoespaçada — eyebrows, badges, metadados (labels em maiúsculas)
        mono: ['IBM Plex Mono', 'ui-monospace', 'SFMono-Regular', 'monospace'],
      },
      fontSize: {
        // Escala com contraste forte para títulos (complementa a de omissão do Tailwind)
        'display-sm': ['clamp(1.75rem, 1.4rem + 1.5vw, 2.5rem)', { lineHeight: '1.1', letterSpacing: '-0.01em' }],
        'display-md': ['clamp(2.25rem, 1.7rem + 2.2vw, 3.5rem)', { lineHeight: '1.05', letterSpacing: '-0.015em' }],
        'display-lg': ['clamp(2.75rem, 2rem + 3vw, 4.5rem)', { lineHeight: '1.02', letterSpacing: '-0.02em' }],
      },
      spacing: {
        // Alias semântico para o padding vertical de secções (usar antes py-24 / py-28 / py-32)
        section: '7rem', // 112px — ponto médio do intervalo 96–128px pedido
      },
      borderRadius: {
        // Raio único e consistente em todo o site, em vez de misturar tamanhos
        theme: '0.5rem',
      },
      boxShadow: {
        // Sombra discreta — evitar as sombras pesadas por omissão do Tailwind
        soft: '0 1px 2px 0 rgb(36 32 27 / 0.04), 0 2px 6px -1px rgb(36 32 27 / 0.06)',
      },
      transitionDuration: {
        250: '250ms', // dentro do intervalo 200–300ms pedido para animações discretas
      },
    },
  },
  plugins: [forms, typography],
};
