const plugin = require('tailwindcss/plugin')

module.exports = {
    darkMode: 'class',
    mode: 'jit',
    purge: [
        // Path to my php view it will only purge stuf we goin to use
        "./src/**/*.php",
        "./src/**/*.vue",
    ],
    theme: {
      extend: {},
    },
    variants: {
        extend: {
          textOpacity: ['dark']
        }
    },
    plugins: [
        require('daisyui'),
    ],
  }
