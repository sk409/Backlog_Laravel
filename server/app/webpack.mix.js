let mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
  .js("resources/assets/js/app.js", "public/js")
  .js("resources/assets/js/dashboard.js", "public/js")
  .js("resources/assets/js/login.js", "public/js")
  .js("resources/assets/js/project.show.js", "public/js")
  .js("resources/assets/js/register.js", "public/js")
  .js("resources/assets/js/tasks.create.js", "public/js")
  .js("resources/assets/js/tasks.index.js", "public/js")
  .sass("resources/assets/sass/app.scss", "public/css")
  .sass("resources/assets/sass/dashboard.scss", "public/css")
  .sass("resources/assets/sass/project.show.scss", "public/css")
  .sass("resources/assets/sass/tasks.index.scss", "public/css");
