var gulp = require('gulp'),
    bower = require('gulp-bower'),
    del = require('del'),
    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps'),
    cleancss = require('gulp-clean-css'),
    concat = require('gulp-concat'),
    autoprefixer = require('gulp-autoprefixer');

var config = {
    appPath: './app',
    bowerDir: './bower_components'
};



gulp.task('clean', function() {
    return del([
        config.appPath + '/fonts/**.*',
        config.appPath + '/css/juliaday*.*'
    ]);
});

gulp.task('bower', function() {
   return bower()
        .pipe(gulp.dest(config.bowerDir));
});

gulp.task('fonts', function() {
    return gulp.src(config.bowerDir + '/font-awesome/fonts/**.*')
        .pipe(gulp.dest(config.appPath + '/fonts'));
});

gulp.task('sass', function() {
    return gulp.src(config.appPath + '/sass/juliaday.scss')
        .pipe(sourcemaps.init())
            .pipe(sass()).on('error', sass.logError)
            .pipe(autoprefixer({browsers: ['last 2 versions']}))
            .pipe(cleancss())
        .pipe(sourcemaps.write('.', {
            includeContent: false
        }))
        .pipe(gulp.dest(config.appPath + '/css'));
});