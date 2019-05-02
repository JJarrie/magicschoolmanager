var Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')
    .addEntry('app', './assets/ts/app.ts')
    .splitEntryChunks()
    .enableSingleRuntimeChunk()
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())
    .configureBabel(
        () => {
        }, {
            useBuiltIns: 'usage',
            corejs: 3
        }
    )
    .enableSassLoader()
    .enableTypeScriptLoader()
;

module.exports = Encore.getWebpackConfig();
