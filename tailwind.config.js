const plugin = require('tailwindcss/plugin')

module.exports = {
    darkMode: 'class',
    purge: [
        // Path to my php view it will only purge stuf we goin to use
        "/src/App/Views/**/*.php",
        "/resources/js/**/*.vue",
    ],
    theme: {
      extend: {},
    },
    variants: {
        extend: {
          textOpacity: ['dark']
        }
    },
    plugins: [],
  }
