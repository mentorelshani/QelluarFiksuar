var webpack = require('webpack')

module.exports = {
  entry: {
    app: './resources/app/main.js',
    admin: './resources/admin/main.admin.js'
  },
  output: {
    path: "/public/js",
    publicPath: "/public/",
    filename: "[name].js"
  },
  module: {
    loaders: [
      {
        test: /\.js$/,
        // excluding some local linked packages.
        // for normal use cases only node_modules is needed.
        exclude: /node_modules|vue\/src|vue-router\//,
        loader: 'babel'
      },
      {
        test: /\.scss$/,
        loaders: ['style', 'css', 'sass']
      },
      {
        test: /\.vue$/,
        loader: 'vue'
      }
    ]
  },
  babel: {
    presets: ['es2015'],
    plugins: ['transform-runtime']
  },
  resolve: {
    modulesDirectories: ['node_modules'],
    alias: {
      'vue$': 'vue/dist/vue.common.js'
    }
  }
}
