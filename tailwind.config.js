import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/**
 * Design tokens — PLACEHOLDER.
 *
 * As cores, tipografia e escala abaixo são um ponto de partida coerente
 * (paleta terrosa: verde-oliva + terracota, inspirada em azeite/castanha),
 * NÃO a paleta extraída do site atual. Assim que enviares as capturas de
 * ecrã, atualizo apenas os valores em `theme.extend.colors` e `fontFamily`
 * — a estrutura dos templates não muda.
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
        // Verde-oliva — hortícolas / azeite
        primary: {
          50: '#f4f6f1',
          100: '#e5ebdc',
          200: '#ccd8ba',
          300: '#adc090',
          400: '#8ba668',
          500: '#6b8a49',
          600: '#526e37',
          700: '#40562c',
          800: '#354625',
          900: '#2c3a20',
          DEFAULT: '#6b8a49',
        },
        // Terracota/âmbar — castanha / colheita
        secondary: {
          50: '#fdf6ee',
          100: '#f9e8d2',
          200: '#f2cea3',
          300: '#e8ac6b',
          400: '#dd8a3f',
          500: '#c66d28',
          600: '#a1541f',
          700: '#7f421c',
          800: '#67361c',
          900: '#572e1a',
          DEFAULT: '#c66d28',
        },
        // Neutros quentes (pedra) — para texto, fundos e bordas
        neutral: {
          50: '#faf9f6',
          100: '#f2f0ea',
          200: '#e4e0d6',
          300: '#cfc9ba',
          400: '#a9a08c',
          500: '#857965',
          600: '#665c4c',
          700: '#4d453a',
          800: '#362f28',
          900: '#24201b',
        },
        // Aliases semânticos usados nos templates em vez de neutral-XXX direto
        surface: '#faf9f6',
        ink: '#24201b',
      },
      fontFamily: {
        // Serif de exibição com carácter — títulos e hero
        display: [
          'Fraunces Variable',
          'Fraunces',
          'ui-serif',
          'Georgia',
          'serif',
        ],
        // Grotesco neutro e legível — corpo de texto e UI
        sans: [
          'Inter Variable',
          'Inter',
          'ui-sans-serif',
          'system-ui',
          '-apple-system',
          'sans-serif',
        ],
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
