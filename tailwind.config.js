/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js",
    ],
    safelist: [
        {
            pattern: /bg-(gray|red|green|blue|yellow|orange|purple|teal)-(500|600)/,
            variants: ['hover'],
        },
        {
            pattern: /text-(gray|red|green|blue|yellow|orange|purple|teal)-(500|600)/,
            variants: ['hover'],
        },
        {
            pattern: /bg-primary-dark/,
        },
    ],
    theme: {
        extend: {
            colors: {
                'primary': {
                    'main': '#0F102B',
                    'dark': '#434458'
                },
            },
        },
    },
    plugins: [
        require('flowbite/plugin'),
    ],
}
