import typography from '@tailwindcss/typography';
import forms from '@tailwindcss/forms';
import aspectRatio from '@tailwindcss/aspect-ratio';

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    'node_modules/preline/dist/*.js',

  ],
  theme: {
    extend: {
      colors: {
          'pastel-blue': '#a8d5e2',
          'pastel-green': '#b4e1d0',
          'pastel-pink': '#f3d1dc',
          'pastel-yellow': '#f7e3af',
          'pastel-purple': '#d4c1ec',
      },
  },  },
  
  plugins: [
    typography,
    forms,
    aspectRatio,
    require('preline/plugin'),

  ],
}