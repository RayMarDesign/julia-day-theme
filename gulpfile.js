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
    bowerDir: './bower_components',
    autoprefixer: {
        browsers: [
            'latest 2 versions',
            'ie >= 9'
        ],
        cascade: false
    }
};



// Cleanup Tasks
gulp.task('clean', ['clean:fonts', 'clean:css']);
gulp.task('clean:fonts', function() {
    return del(config.appPath + '/fonts/**.*');
});
gulp.task('clean:css', function() {
    return del(config.appPath + '/css/**.*');
});

// Bower Tasks
gulp.task('bower', function() {
    return bower()
        .pipe(gulp.dest(config.bowerDir));
});

// Compile Tasks
gulp.task('fonts', ['clean:fonts'], function() {
    return gulp.src(config.bowerDir + '/font-awesome/fonts/**.*')
        .pipe(gulp.dest(config.appPath + '/fonts'));
});
gulp.task('sass', ['clean:css'], function() {
    return gulp.src([config.appPath + '/sass/**.scss',
                     config.bowerDir + '/font-awesome/scss/font-awesome.scss'])
        .pipe(sourcemaps.init())
            .pipe(sass()).on('error', sass.logError)
            .pipe(autoprefixer(config.autoprefixer))
            .pipe(cleancss())
        .pipe(sourcemaps.write('.', {
            includeContent: false
        }))
        .pipe(gulp.dest(config.appPath + '/css'));
});