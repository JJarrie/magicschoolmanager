const Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')
    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())
    .addEntry('js/vendor', './assets/js/vendor.js')
    .addEntry('js/app', './assets/ts/app.ts')
    .addStyleEntry('css/app', './assets/sass/app.scss')
    .enableSassLoader()
    .autoProvidejQuery()
    .enableTypeScriptLoader()
    .enableSingleRuntimeChunk()
;


module.exports = Encore.getWebpackConfig();
