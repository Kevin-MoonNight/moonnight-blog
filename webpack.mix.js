const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .options({
        processCssUrls: false
    })
    .vue()
    .postCss("resources/css/app.css", "public/css", [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ])
    .copyDirectory('resources/images', 'public/images')
    .version()
    .disableNotifications();
