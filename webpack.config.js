const path = require("path");
const webpack = require("webpack");
const UglifyJsPlugin = require("uglifyjs-webpack-plugin");
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
//const HtmlWebpackPlugin = require('html-webpack-plugin')
const copyWebpackPlugin = require('copy-webpack-plugin');

module.exports = env => {

  let plugins = [];
  let dev = env.NODE_ENV === "development";
  if(!dev){
    plugins.push(new UglifyJsPlugin({
      sourceMap: true
    }));
  }
  plugins.push(new MiniCssExtractPlugin(
      {
        filename: "[name].css",
        disable: dev,
        ignoreOrder: dev
      }
    )
  );
  plugins.push(new webpack.LoaderOptionsPlugin({
    options: {
      devTool: dev ? "eval-cheap-module-source-map" : "source-map"
    }
  })
  );

  plugins.push(new copyWebpackPlugin({
      patterns:[
          { from: './node_modules/tinymce/plugins', to: './plugins' },
          { from: './node_modules/tinymce/themes', to: './themes' },
          { from: './node_modules/tinymce/skins', to: './skins' },
          { from: './node_modules/tinymce/icons', to: './icons' }
        ]
  }
  )
  );

  plugins.push(new webpack.ProvidePlugin({
    $: 'jquery',
    jQuery: 'jquery'
  })
  );

  /*plugins.push(new HtmlWebpackPlugin({
    options: {
      filename: 'index.html',
      template: 'aec_src/index.html'
    }
  })
  );*/

  return {

    mode: "development",
    entry: {
      app: "./aec_public/aec_vuejs/index.js"
    },
    watch: dev,
    output: {
        path: path.resolve("aec_public/aec_vuejs/aec_dist"),
        filename: "[name].js",
        publicPath: "/aec_vuejs/aec_dist/"
    },


    module: {

        rules: [
          //Les fichier javascript
          {
            test: /\.?js$/,
            exclude: /(node_modules|bower_components)/,
            use: ['babel-loader']
          },
          //HTML
            {
              test: /\.html$/i,
              loader: 'html-loader',
            },
            //HANDLEBAR
            {
              test:  /\.(hbs|handlebars)$/i,
              loader: "handlebars-loader"            },
          //Les fichier css
          {
                test: /\.(scss|css)$/,
                use: [
                  {
                    loader: MiniCssExtractPlugin.loader,
                    options: {
                      reloadAll: true
                    }
                  },
                  {
                    loader: 'css-loader', 
                    options: {
                        import: true,
                        url: true,
                      }
                  },
                  {
                    loader: 'postcss-loader'
                  },
                  {
                    loader: 'resolve-url-loader'
                  },
                  //'style-loader',
                  'sass-loader'
              ]
          },
          {
            test: /\.(png|jpe?g|gif|ico)$/i,
            use: [
              /*{
                loader: 'url-loader',
                options: {
                  limit: 10000,
                },
              },*/
              {
                loader: 'file-loader',
                options: {
                  outputPath: "./images",
                  name: "[name].[ext]"
                }
              },
              {
                loader:'img-loader',
                options: {
                  enable: true
                }
              }
            ]
          },
          {
            test: /\.(svg|woff2?|eot|ttf|otf|wav)$/i,
            use: [
              {
                loader: 'file-loader',
                options: {
                  outputPath: "./fonts",
                  name: "[name].[ext]"
                }
              },
            ]
          },
          {
            test: path.resolve('tinymce/tinymce'),
            loaders: [
                'imports?this=>window',
                'exports?window.tinymce'
            ]
        },
        {
            test: /tinymce\/(themes|plugins|icons|skins)\//,
            loaders: [
                'imports?this=>window'
            ]
        }
          
        ]
      },
    plugins: plugins

  };

};
