let mix = require('laravel-mix');

mix.js('resources/assets/js/app.js', 'public/js/')
  .sass('resources/assets/sass/app.scss', 'public/css/')

  .copy([
    './node_modules/@coreui/coreui-pro/js/dist/ajax-load.js',
    './node_modules/@coreui/coreui-pro/js/dist/sidebar.js'   
  ],'public/js/')
  .copy('resources/assets/img/','public/images/')

  .sourceMaps();


