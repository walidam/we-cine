// webpack.config.js
var Encore = require("@symfony/webpack-encore");

if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}

Encore
    // the project directory where all compiled assets will be stored
    .setOutputPath("public/build/")

    // the public path used by the web server to access the previous directory
    .setPublicPath("/build")

    .addEntry("app", "./public/js/app.js")
    .addEntry("movies", "./public/js/movies.js")

    // prevent duplication by “splitting” shared code into separate files
    .enableSingleRuntimeChunk()

    .splitEntryChunks()

    // allow sass/scss files to be processed
    .enableSassLoader()

    // autoprefixer
    .enablePostCssLoader()

    // allow legacy applications to use $/jQuery as a global variable
    .autoProvidejQuery()

    .enableSourceMaps(!Encore.isProduction())

    // empty the outputPath dir before each build
    .cleanupOutputBeforeBuild()

    // show OS notifications when builds finish/fail
    .enableBuildNotifications()

    // create hashed filenames (e.g. app.abc123.css)
    .enableVersioning();

// export the final configuration
module.exports = Encore.getWebpackConfig();
