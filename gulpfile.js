var elixir = require('laravel-elixir');
require('laravel-elixir-vueify');
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
	mix.stylesIn('resources/assets/css');
	mix.browserify('app.js');
	mix.browserify('home.js');
	mix.scripts('base.js', 'public/js/base.js');
	mix.browserSync();
});
 