const path = require("path");
const UglifyJsPlugin = require("uglifyjs-webpack-plugin");
const webpack = require("webpack");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");
const webpackDashboard = require("webpack-dashboard/plugin");
const HtmlWebpackPlugin = require("html-webpack-plugin");
const CleanObsoleteChunks = require("webpack-clean-obsolete-chunks");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");
const FaviconsWebpackPlugin = require("favicons-webpack-plugin");
require("dotenv").config();

config = {
	/**
	 * Define your assets path here. Assets path are your theme
	 * path without host.
	 * E.g. your theme path is http://test.dev/wp-content/themes/
	 * then your assets path is /wp-content/themes/
	 *
	 * This is for Webpack that it can handle assets relative path right.
	 */
	assetsPath: "./web/app/themes/blockpress/assets/",

	/**
	 * Define here your dev server url here.
	 *
	 * This is for Browsersync.
	 */
	devUrl: process.env.DEVURL,
};

module.exports = (env, argv) => {
	const devMode = argv.mode !== "production";
	return {
		entry: {
			main: config.assetsPath + "scripts/main.js",
			critical: config.assetsPath + "sass/critical.scss",
			css: config.assetsPath + "sass/main.scss",
		},
		optimization: {
			minimizer: [
				new CleanWebpackPlugin({
					cleanOnceBeforeBuildPatterns: ["dist"],
					//root: path.resolve(__dirname, config.assetsPath),
					verbose: true,
				}),
				new UglifyJsPlugin({
					uglifyOptions: {
						output: {
							comments: false, // remove comments
						},
						warnings: false,
						compress: {
							inline: false,
							unused: true,
						},
						mangle: true, // Note `mangle.properties` is `false` by default.
						ie8: false,
						keep_fnames: true,
						comments: false,
					},
					cache: true,
					parallel: true,
					sourceMap: false, // set to true if you want JS source maps
				}),
				new OptimizeCSSAssetsPlugin({}),
			],
		},
		plugins: [
			new webpackDashboard(),
			new BrowserSyncPlugin({
				host: "localhost",
				port: 3000,
				proxy: config.devUrl, // YOUR DEV-SERVER URL
				files: [
					path.resolve(__dirname, config.assetsPath + "/**/*.scss"),
					path.resolve(__dirname, config.assetsPath + "/**/*.js"),
					path.resolve(__dirname, config.assetsPath + "/**/*.php"),
					path.resolve(__dirname, config.assetsPath + "/**/*.twig"),
				],
			}),
			new FaviconsWebpackPlugin({
				logo: path.resolve(
					__dirname,
					config.assetsPath + "/img/favicon.png"
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
			new HtmlWebpackPlugin({
				chunks: ["css", "critical", "main"],
				template: config.assetsPath + "template.html",
				filename: "assets.php",
				minify: false,
				inject: false,
			}),
			new HtmlWebpackPlugin({
				chunks: ["css", "critical", "main"],
				template: config.assetsPath + "Style.html",
				filename: "Styleguide.html",
				minify: false,
				inject: true,
			}),
			new webpack.ProvidePlugin({
				$: "jquery",
				jQuery: "jquery",
			}),
			new MiniCssExtractPlugin({
				// Options similar to the same options in webpackOptions.output
				// both options are optional
				// filename: devMode ? "[name].css" : "[name].[hash].css"
				filename: devMode ? "[name].css" : "[name].css",
			}),
		],
		output: {
			filename: "[name].min.js",
			path: path.resolve(__dirname, config.assetsPath + "dist"),
		},
		module: {
			rules: [
				{
					test: /\.js$/,
					exclude: /(node_modules|bower_components)/,
					use: {
						loader: "babel-loader",
						options: {
							presets: ["babel-preset-env"],
						},
					},
				},
				{
					test: /\.scss$/,
					use: [
						MiniCssExtractPlugin.loader,
						//"style-loader", // creates style nodes from JS strings
						"css-loader", // translates CSS into CommonJS
						{
							loader: "postcss-loader",
							options: {
								plugins: () => [require("autoprefixer")()],
							},
						},
						"sass-loader",
					],
				},
				{
					test: /\.(woff|woff2|eot|ttf)$/,
					loader: "url-loader?limit=100000",
				},
				{
					test: /\.(png|svg)$/,
					use: {
						loader: "url-loader",
						options: {
							limit: 100000,
							name:
								"/web/themes/blockpress/assets/fonts/[name].[ext]",
						},
					},
				},
			],
		},
	};
};