const path = require("path");
const mix = require("laravel-mix");
const tailwindcss = require("tailwindcss");
// const { BundleAnalyzerPlugin } = require('webpack-bundle-analyzer')

// mix.config.vue.esModule = true;

mix
  .js("resources/js/app.js", "public/js")
  .sass("resources/sass/app.scss", "public/css")
  .options({
    processCssUrls: false,
    postCss: [tailwindcss("./tailwind.js")]
  })

  .sourceMaps()
  .disableNotifications();

if (mix.inProduction()) {
  mix.version();

  mix.extract([
    "vue",
    "vform",
    "axios",
    "vuex",
    "jquery",
    "popper.js",
    "vue-i18n",
    "vue-meta",
    "js-cookie",
    "bootstrap",
    "vue-router",
    "sweetalert2",
    "vuex-router-sync",
    "@fortawesome/fontawesome",
    "@fortawesome/vue-fontawesome",
    "tailwindcss"
  ]);
}

mix.webpackConfig({
  node: {
    fs: 'empty'
  },
  plugins: [
    // new BundleAnalyzerPlugin()
  ],
  resolve: {
    extensions: [".js", ".json", ".vue"],
    alias: {
      "~": path.join(__dirname, "./resources/js")
    }
  },
  output: {
    chunkFilename: "js/[name].[chunkhash].js",
    publicPath: mix.config.hmr ? "//localhost:8080" : "/"
  }
});
