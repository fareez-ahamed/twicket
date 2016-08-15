var elixir = require('laravel-elixir');

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
    mix.sass('app.scss', null, {
    	includePaths : [
    		'./bower_components/bootstrap-sass/assets/stylesheets',
    	]
    }).scripts([
    	'./bower_components/jquery/dist/jquery.js',
    	'./bower_components/bootstrap-sass/assets/javascripts/bootstrap.js',
    ]);
});
