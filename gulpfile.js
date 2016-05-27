var elixir = require('laravel-elixir');

elixir.config.sourcemaps = false;

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

elixir(function(mix) {
    mix.less('bootstrap.less', 'public/css/bootstrap.css')
    .styles([
        'bootstrap.css',
        'custom.css',
        'bootstrap-panel-tabs.css',
        'awesome-bootstrap-checkbox.css'
    ], 'public/css/all.css', 'public/css/')
    .scripts([
        '../bootstrap/dist/js/bootstrap.js',
        'bootstrap-list-filter.src.js',
        'fuse.js'
        ], 'public/js/all.js')
    .version(['css/all.css', '/js/all.js']);
});
