const colors = require('tailwindcss/colors');

module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                blueGray: colors.blueGray,
            }
        }
    },
    plugins: [],
}
