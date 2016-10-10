var config = require('./config');

var gulp = require('gulp'),
    bower = require('gulp-bower'),
    del = require('del'),
    sass = require('gulp-sass'),
    cleancss = require('gulp-clean-css'),
    concat = require('gulp-concat'),
    autoprefixer = require('gulp-autoprefixer');



// Cleanup Tasks
gulp.task('clean', ['clean:sass', 'clean:js']);
gulp.task('clean:sass', function () {
    return del(config.tasks.sass.clean);
});
gulp.task('clean:js', function () {
    return del(config.tasks.js.clean);
});

// Bower Tasks
gulp.task('bower', function () {
    return bower()
        .pipe(gulp.dest(config.paths.components));
});

// Compile Tasks
gulp.task('sass', ['clean:sass'], function () {
    return gulp.src(config.tasks.sass.src)
        .pipe(sass(config.tasks.sass.config))
            .on('error', sass.logError)
        .pipe(autoprefixer(config.tasks.sass.autoprefixer))
        /*.pipe(cleancss(config.tasks.sass.cleancss),
            details => {
                console.log(details.name + ': ' +
                    details.stats.originalSize + ' -> ' +
                    details.stats.minifiedSize + ' ' +
                    details.stats.efficiency);
            })*/
        .pipe(gulp.dest(config.tasks.sass.dest));
});
gulp.task('js', ['clean:js'], function () {
    return gulp.src(config.tasks.js.src)
        .pipe(gulp.dest(config.tasks.js.dest));
});

// Deployment Tasks
gulp.task('deploy:dev', function () {
    return gulp.src([
        config.tasks.deploy.src + '/**/*.php',
        config.tasks.deploy.src + '/**/*.css',
        config.tasks.deploy.src + '/**/*.js'])
        .pipe(gulp.dest(config.tasks.deploy.dev));
});
