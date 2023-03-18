const { src, dest, series, parallel, watch, task } = require('gulp');
const sass = require('gulp-sass')(require('sass'));

function css() {
    return src('./src/scss/style.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(dest('./dist'));
}

task('default', function() {
    watch('src/scss/**/*.scss', series(css));
});