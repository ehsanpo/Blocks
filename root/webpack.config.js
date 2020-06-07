/*eslint global-require: "error"*/
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");
const FaviconWebpackPlugin = require("favicons-webpack-plugin");
const webpack = require("webpack");
const path = require("path");
const HtmlWebpackPlugin = require("html-webpack-plugin");
const BundleAnalyzerPlugin = require("webpack-bundle-analyzer")
  .BundleAnalyzerPlugin;
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");
const TerserPlugin = require("terser-webpack-plugin");
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");
require("dotenv-extended").load();
var HtmlWebpackHarddiskPlugin = require('html-webpack-harddisk-plugin');
const vars = {
	themesPath: "./web/app/themes/blockpress/",
  assetsPath: "./web/app/themes/blockpress/assets/",
  //assetsPath: "./src/",
  devUrl: process.env.DEVURL,
  fontPath: process.env.export
    ? "/wp-content/themes/blockpress/assets/build/fonts/"
    : "/app/themes/blockpress/assets/fonts/",
};

const config = {
  entry: {
    mainScript: vars.assetsPath + "scripts/main.js",
    critical: vars.assetsPath + "sass/critical.scss",
    main: vars.assetsPath + "sass/main.scss",
  },
  output: {
    path: path.resolve(__dirname, vars.assetsPath + "dist"),
    filename: "[name].min.js",
  },
  optimization: {
    minimizer: [
      new CleanWebpackPlugin({
        //cleanOnceBeforeBuildPatterns: ["dist"],
        verbose: true,
      }),
      new TerserPlugin(),
      new OptimizeCSSAssetsPlugin({
        // cssProcessorOptions: {
        //   map: {
        //     inline: false,
        //   },
        // },
      }),
    ],
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        use: "babel-loader",
        exclude: /node_modules/,
      },
      {
        test: /\.scss$/,
        use: [
          MiniCssExtractPlugin.loader,
          {
            loader: "css-loader",
            options: { sourceMap: true },
          },
          {
            loader: "sass-loader",
            options: { sourceMap: true },
          },
        ],
      },
      {
        test: /\.(woff(2)?|ttf|eot|svg)(\?v=\d+\.\d+\.\d+)?$/,
        use: [
          {
            loader: "file-loader",
            options: {
              name: "[name].[ext]",
              outputPath: vars.fontPath,
            },
          },
        ],
      },
      {
        test: /\.png$/,
        use: [
          {
            loader: "url-loader",
            options: {
              mimetype: "image/png",
              name: vars.fontPath,
            },
          },
        ],
      },
    ],
  },
  plugins: [
		new webpack.ProvidePlugin({
			$: "jquery",
			jQuery: "jquery",
		}),
		new BrowserSyncPlugin({
			host: "localhost",
			port: 3000,
			proxy: vars.devUrl, // YOUR DEV-SERVER URL
			files: [
				path.resolve(__dirname, vars.assetsPath + "/**/*.scss"),
				path.resolve(__dirname, vars.assetsPath + "/**/*.js"),
				path.resolve(__dirname, vars.assetsPath + "/**/*.php"),
				path.resolve(__dirname, vars.assetsPath + "/**/*.twig"),
			],
			},
			{
				reload: false
			}
		),
		new HtmlWebpackPlugin({
			chunks: ["css", "critical", "main"],
			template: vars.assetsPath + "Style.html",
			filename: "Styleguide.html",
			// minify: false,
			// inject: true,
			alwaysWriteToDisk: true
		}),
		new HtmlWebpackHarddiskPlugin(),


		new FaviconWebpackPlugin({
			logo: path.resolve(
				__dirname,
				vars.assetsPath + "/img/favicon.png"
			),
			inject: true,
			prefix: "favicons/",
			icons: {
				android: false,
				appleIcon: true,
				appleStartup: false,
				coast: false,
				favicons: true,
				firefox: false,
				opengraph: false,
				twitter: false,
				yandex: false,
				windows: false,
			},
		}),
		new MiniCssExtractPlugin(),
		//new CleanWebpackPlugin(),
  ],
};
module.exports = config;
