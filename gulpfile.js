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
            'last 2 versions',
            'ie >= 9'
        ],
        cascade: false
    }
};



// Cleanup Tasks
gulp.task('clean', ['clean:fonts', 'clean:sass', 'clean:js']);
gulp.task('clean:fonts', function() {
    return del(config.appPath + '/fonts/**.*');
});
gulp.task('clean:sass', function() {
    return del([config.appPath + '/!(rtl).css',
                config.appPath + '/maps/**.*']);
});
gulp.task('clean:js', function() {
    return del(config.appPath + '/js/**.min.js');
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
gulp.task('sass', ['clean:sass'], function() {
    return gulp.src([config.appPath + '/sass/**.scss',
                     config.bowerDir + '/font-awesome/scss/font-awesome.scss'])
        .pipe(sourcemaps.init())
            .pipe(sass()).on('error', sass.logError)
            .pipe(autoprefixer(config.autoprefixer))
            .pipe(cleancss())
        .pipe(sourcemaps.write('maps', {
            includeContent: false
        }))
        .pipe(gulp.dest(config.appPath));
});
gulp.task('js', ['clean:js'], function() {
    return gulp.src([config.bowerDir + '/jquery/dist/jquery.min.js',
                     config.bowerDir + '/bootstrap/dist/js/bootstrap.min.js',
                     config.bowerDir + '/tether/dist/js/tether.min.js'])
        .pipe(gulp.dest(config.appPath + '/js'));
});