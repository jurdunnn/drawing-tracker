/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js",
  ],
  safelist: [
    {
      pattern: /bg-(red|green|blue|yellow|orange|purple|teal)-(500|600)/,
      pattern: /text-(red|green|blue|yellow|orange|purple|teal)-(500|600)/,
    },
  ],
  theme: {
    extend: {},
  },
  plugins: [
      require('flowbite/plugin'),
  ],
}
