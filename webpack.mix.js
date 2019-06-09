let mix = require('laravel-mix');

mix.js('resources/assets/js/app.js', 'public/js/')
  //.sass('resources/assets/sass/app.scss', 'public/css/')

  .copy([
    './node_modules/@coreui/coreui/js/dist/ajax-load.js',
    './node_modules/@coreui/coreui/js/dist/sidebar.js'
  ],'public/js/');

  // .webpackConfig({
  //   module: {
  //     rules: [
  //       {
  //         test: /\.jsx?$/,
  //         exclude: /node_modules(?!\/foundation-sites)|bower_components/,
  //         use: [
  //           {
  //             loader: 'babel-loader',
  //             options: Config.babel()
  //           }
  //         ]
  //       }
  //     ]
  //   },
  //   resolve: {
  //     alias: {
  //       'vue$': 'vue/dist/vue.common.js'
  //     }
  //   }
  // })
  // .sourceMaps();


