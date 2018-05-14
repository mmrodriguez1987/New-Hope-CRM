let mix = require('laravel-mix');

mix.js('resources/assets/js/app.js', 'public/js/')
  .sass('resources/assets/sass/app.scss', 'public/css/')
  .copy('resources/assets/img/', 'public/img/')
  .copy('./node_modules/icheck/skins/square/blue.png', 'public/css/')
  .copy('./node_modules/icheck/skins/square/blue@2x.png', 'public/css/')
  .copy('./node_modules/bootstrap-sass/assets/fonts/bootstrap/*.*', 'public/fonts/')
  .copy('./node_modules/font-awesome/fonts/*.*', 'public/fonts/')
  //.copy('./node_modules/admin-lte/plugins/', 'public/plugins')
  .copy('./node_modules/admin-lte/dist/img/*.*', 'public/img/')
  .copy('./node_modules/ionicons/dist/fonts/*.*', 'public/fonts/');