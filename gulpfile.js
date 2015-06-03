var gulp = require('gulp');
var autoprefix = require('gulp-autoprefixer');
var concat = require('gulp-concat');
var minifyCSS = require('gulp-minify-css');
var sass = require('gulp-sass');

gulp.task('styles', function() {
    return gulp.src([
        'assets/css/fonts.css',
        'assets/css/pure.min.css',
        'assets/css/grids-responsive.min.css',
        'assets/sass/style.scss'
    ])
        .pipe(sass({ style: "expanded" }))
        .pipe(concat('all.css'))
        .pipe(autoprefix('last 2 versions'))
        .pipe(minifyCSS({aggressiveMerging: false }))
        .pipe(gulp.dest('./source/css/'))
});
