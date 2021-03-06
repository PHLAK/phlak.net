let mix = require('laravel-mix');
let build = require('./tasks/build.js');
let tailwindcss = require('tailwindcss');

mix.disableSuccessNotifications();
mix.setPublicPath('source/assets/build');
mix.webpackConfig({
    plugins: [
        build.jigsaw,
        build.browserSync(),
        build.watch(['source/**/*.md', 'source/**/*.php', 'source/**/*.scss', '!source/**/_tmp/*']),
    ],
    watchOptions: {
        ignored: /node_modules/
    }
});

mix.js('source/_assets/js/main.js', 'js');

mix.sass('source/_assets/sass/main.scss', 'css').options({
    processCssUrls: false,
    postCss: [tailwindcss('tailwind.config.js')]
}).version();
