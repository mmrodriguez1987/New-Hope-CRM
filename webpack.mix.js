let mix = require('laravel-mix');
  mix.scripts([
          'resources/assets/js/jquery.js',
          'resources/assets/js/jquery-ui.js',
          'resources/assets/js/bootstrap.js',
          './nod_modules/vue/dist/vue.js',
          './node_modules/icheck/icheck.js',
          './node_modules/admin-lte/dist/js/adminlte.js',
          './node_modules/toastr/build/toastr.js',
          './node_modules/glyphicons/glyphicons.js',
          'resources/assets/js/app.js'
      ],
      'public/js/app.js')
      .styles([
          'resources/assets/css/bootstrap.css',
          './node_modules/font-awesome/css/font-awesome.css',
          'resources/assets/css/ionicons.css',
          './node_modules/icheck/skins/square/blue.css resources/assets/css/blue.css',
          './node_modules/toastr/build/toastr.css',
          './node_modules/admin-lte/dist/css/AdminLTE.css',
          './node_modules/admin-lte/dist/css/skins/_all-skins.css',
          'resources/assets/css/app.css'
          ],'public/css/all.css')
      .copy('resources/assets/img/', 'public/img/')
      .copy('./node_modules/icheck/skins/square/blue.png', 'public/css/')
      .copy('./node_modules/icheck/skins/square/blue@2x.png', 'public/css/')
      .copy('./node_modules/bootstrap-sass/assets/fonts/bootstrap/*.*', 'public/fonts/')
      .copy('./node_modules/font-awesome/fonts/*.*', 'public/fonts/')
      .copy('./node_modules/admin-lte/plugins/', 'public/plugins')
      .copy('./node_modules/admin-lte/dist/img/*.*', 'public/img/')
      .copy('./node_modules/ionicons/dist/fonts/*.*', 'public/fonts/')
      .sourceMaps();
