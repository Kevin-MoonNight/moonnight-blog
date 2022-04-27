const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/nav.js', 'public/js/nav')
    .js('resources/js/home.js', 'public/js/home')
    .js('resources/js/contact.js', 'public/js/contact')
    .js('resources/js/articles.js', 'public/js/articles')
    .js('resources/js/markdown-edit.js', 'public/js/markdown-edit')
    .js('resources/js/markdown-preview.js', 'public/js/markdown-preview')
    .js('resources/js/clipboard.js', 'public/js/clipboard')
    .vue()
    .postCss("resources/css/app.css", "public/css", [
        require('tailwindcss'),
    ])
    .copyDirectory('resources/js/views/assets/images', 'public/images')
    .version()
    .disableNotifications();
