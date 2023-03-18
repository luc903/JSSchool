const { src, dest, series, parallel, watch, task } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const browserSync = require('browser-sync').create();

function css() {
    return src('./src/scss/style.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(dest('./dist'))
    .pipe(browserSync.stream());
}

function initBrowserSync() {
    browserSync.init({
        proxy: 'http://localhost:8080/'
    });
}

task('default', function() {
    initBrowserSync();
    watch('src/scss/**/*.scss', series(css));
});