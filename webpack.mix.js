const mix = require('laravel-mix');

mix.js('resources/js/nav.js', 'public/js/nav')
    .js('resources/js/home.js', 'public/js/home')
    .js('resources/js/contact.js', 'public/js/contact')
    .js('resources/js/articles.js', 'public/js/articles')
    .js('resources/js/clipboard.js', 'public/js/clipboard')
    .js('resources/js/avatar-selector.js', 'public/js/avatar-selector')
    .vue()
    .postCss("resources/css/app.css", "public/css", [
        require('tailwindcss')('tailwind.config.js'),
    ])
    .postCss("resources/css/backend.css", "public/css", [
        require('tailwindcss')('tailwind-backend.config.js')
    ])
    .copyDirectory('resources/js/views/assets/images', 'public/images')
    .version()
    .disableNotifications();
