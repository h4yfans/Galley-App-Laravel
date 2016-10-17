const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {
    mix.styles([
        "ripples.css",
        "bootstrap-material-design.css"
    ]);

    mix.scripts([
        "app.js"
    ]);

    mix.version([
        "css/all.css",
        'js/app.js'
    ]);
});
