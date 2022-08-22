/** @type {import('tailwindcss').Config} */
  // tailwind.config.js
  const colors = require('tailwindcss/colors')

  module.exports = {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
      extend: {
        colors: {
          amber: colors.amber,
          emerald: colors.emerald,
          violet: colors.violet,
          rose: colors.rose,
          purple: colors.purple,
          cyan: colors.cyan,
        }
      },
    },
    plugins: [],
  }