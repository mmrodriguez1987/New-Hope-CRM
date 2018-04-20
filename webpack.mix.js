let mix = require('laravel-mix');

  mix.scripts([
          './node_modules/jquery/dist/jquery.min.js',
          './node_modules/bootstrap/dist/js/bootstrap.min.js',
          './nod_modules/vue/dist/vue.min.js',
          './node_modules/icheck/icheck.min.js',
          './node_modules/admin-lte/dist/js/adminlte.min.js',
          './node_modules/admin-lte/dist/js/pages/dashboard.js',
          './node_modules/admin-lte/dist/js/pages/dashboard2.js',
          './node_modules/admin-lte/dist/js/demo.js',
          './node_modules/toastr/build/toastr.min.js',
          './node_modules/glyphicons/glyphicons.js',
          'resources/assets/js/app.js'
      ],
      'public/js/app.js')
      .styles([
          './node_modules/bootstrap/dist/css/bootstrap.min.css',
          './node_modules/font-awesome/css/font-awesome.min.css',
          './node_modules/ionicons/dist/css/ionicons.min.css',
          './node_modules/icheck/skins/square/blue.css resources/assets/css/blue.css',
          './node_modules/toastr/build/toastr.min.css',
          'resources/assets/css/pratt_landing.min.css',
          './node_modules/admin-lte/dist/css/AdminLTE.min.css',
          './node_modules/admin-lte/dist/css/skins/_all-skins.min.css',
          'resources/assets/css/app.css'
          ],'public/css/all.css')
      .copy('resources/assets/img/', 'public/img/')
      .copy('./node_modules/icheck/skins/square/blue.png', 'public/css/')
      .copy('./node_modules/icheck/skins/square/blue@2x.png', 'public/css/')
      .copy('./node_modules/bootstrap-sass/assets/fonts/bootstrap/*.*', 'public/fonts/')
      .copy('./node_modules/font-awesome/fonts/*.*', 'public/fonts/')
      .copy('./node_modules/admin-lte/plugins/', 'public/plugins')
      .copy('./node_modules/admin-lte/dist/img/*.*', 'public/img/')
      .copy('./node_modules/ionicons/dist/fonts/*.*', 'public/fonts/');
