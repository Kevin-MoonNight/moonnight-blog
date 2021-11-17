const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js').sourceMaps()
    .options({
        processCssUrls: false
    })
    .vue()
    .postCss("resources/css/app.css", "public/css", [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ])
    .copyDirectory('resources/js/views/assets/images', 'public/images')
    .version()
    .disableNotifications();
