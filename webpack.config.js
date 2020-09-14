const path = require('path');
const postCSSPlugins = 
    // list of plugins we need
    //! this line breaks the webpack build!!!
    // require('postcss-import');

    require('postcss-simple-vars');
    require('postcss-nested');
    require('autoprefixer');


//!  tell webpack what we want it to do
module.exports = {
    entry: './public/scripts/App.js',
    output: {
        //what the bundled file should be named
        filename: 'bundled.js',
        //where it should be saved
        path: path.resolve(__dirname, 'public/js')
    },
    devServer:{
        contentBase: path.join(__dirname, 'app'),
        hot: true, 
        port: 3000,
        host: '0.0.0.0',
        before: function(app, server){
            server._watch('./app/**/*.php')
        },
    },
    mode: 'development',
    watch: true,
    module: {
        rules: [
            // what webpack should do when is runs a css file
            {
                //if the files that end in .css
                test: /\.css$/i,
                //use the css-loader
                //      use               , understand
                use: ['style-loader', 'css-loader', {loader: 'postcss-loader', options: {postcssOptions: {plugins: [postCSSPlugins, require.resolve('postcss-simple-vars'),
                require.resolve('postcss-nested'), require.resolve('autoprefixer'), postCSSPlugins({ myOption: true })]}}}]
              }
            ]
          }
        }