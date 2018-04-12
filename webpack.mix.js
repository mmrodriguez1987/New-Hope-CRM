let mix = require('laravel-mix');

mix.copy('resources/assets/js/', 'public/js/')
  .copy('resources/assets/css/', 'public/css/')
  //.copy('resources/assets/img/', 'public/img/')
  //.copy('resources/assets/fonts/', 'public/fonts/')

  //iCheck
  .copy('./node_modules/icheck/skins/square/blue.png', 'public/css/')
  .copy('./node_modules/icheck/skins/square/blue@2x.png', 'public/css/')
  .copy('./node_modules/icheck/icheck.js', 'public/js/')
  .copy('./node_modules/icheck/icheck.min.js', 'public/js/')
  .copy('./node_modules/icheck/skins/square/blue.css', 'public/css/')

  //Bootstrap
  .sass('resources/assets/sass/bootstrap.scss', 'public/css/')
  .copy('./node_modules/bootstrap-sass/assets/fonts/bootstrap/*.*', 'public/fonts/')
  .copy('./node_modules/bootstrap-sass/assets/javascripts/bootstrap.js', 'public/js/')
  .copy('./node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js', 'public/js/')

  //FontAwesome
  .copy('./node_modules/font-awesome/css/font-awesome.css', 'public/css/')
  .copy('./node_modules/font-awesome/css/font-awesome.min.css', 'public/css/')
  .copy('./node_modules/font-awesome/fonts/*.*', 'public/fonts/')

  //AdminLTE
  .copy('./node_modules/admin-lte/dist/css/AdminLTE.css', 'public/css/AdminLTE.css')
  .copy('./node_modules/admin-lte/dist/css/AdminLTE.min.css', 'public/css/AdminLTE.min.css')
  .copy('./node_modules/admin-lte/plugins', 'public/plugins')
  .copy('./node_modules/admin-lte/dist/css/skins/*.*', 'public/css/skins/')
  .copy('./node_modules/admin-lte/dist/img/*.*', 'public/img/')
  .copy('./node_modules/admin-lte/dist/js/adminlte.js', 'public/js/AdminLTE.js')
  .copy('./node_modules/admin-lte/dist/js/adminlte.min.js', 'public/js/AdminLTE.min.js')

  //Toastr
  .copy('./node_modules/toastr/build/toastr.min.css', 'public/css/')
  .copy('./node_modules/toastr/build/toastr.css', 'public/css/')
  .copy('./node_modules/toastr/build/toastr.min.js', 'public/js/')

  //ionicons
  .copy('./node_modules/ionicons/dist/css/ionicons.css', 'public/css')
  .copy('./node_modules/ionicons/dist/css/ionicons.css.map', 'public/css')
  .copy('./node_modules/ionicons/dist/css/ionicons.min.css', 'public/css')
  .copy('./node_modules/ionicons/dist/css/ionicons.min.css.map', 'public/css')
  .copy('./node_modules/ionicons/dist/fonts/*.*', 'public/fonts/')

  //JQuery
  .copy('./node_modules/jquery/dist/jquery.js', 'public/js/')
  .copy('./node_modules/jquery/dist/jquery.min.js', 'public/js/')
