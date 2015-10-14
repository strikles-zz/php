/*!
 * gulp
 * $ npm install gulp-ruby-sass gulp-autoprefixer gulp-minify-css gulp-jshint gulp-concat gulp-uglify gulp-imagemin gulp-notify gulp-rename gulp-livereload gulp-cache del --save-dev
 */

'use strict';
// Load plugins
var gulp        = require('gulp'),
    sass        = require('gulp-sass'),
    scsslint    = require('gulp-scss-lint'),
    jshint      = require('gulp-jshint'),
    imagemin    = require('gulp-imagemin'),
    rename      = require('gulp-rename'),
    concatenate = require('gulp-concat'),
    plumber     = require('gulp-plumber'),
    livereload  = require('gulp-livereload'),
    ftp         = require('gulp-ftp'),
    sourcemaps  = require('gulp-sourcemaps'),
    //debug         = require('gulp-debug'),
    //gutil       = require('gulp-util'),
    //notify      = require('gulp-notify'),
    //ruby_sass   = require('gulp-ruby-sass'),

    del         = require('del'),
    source      = require('vinyl-source-stream'),
    browserify  = require('browserify'),
    transform   = require('vinyl-transform'),
    uglifyify   = require('uglifyify');


module.exports = gulp;

/*
    SETTINGS
*/

var assets = {
    custom: {
        scss: ['src/sass/style.scss'],
        js: ['./src/js/main.js'],
        images: ['src/images/**/*']
    },
    vendor: {
        scss: ['src/vendor/vendor.scss'],
        bootstrap: {
            //scss: ['src/vendor/bootstrap.scss'],
            fonts: ['src/vendor/bootstrap/fonts/bootstrap/*']
        },
        fontawesome: {
            //scss: ['src/vendor/font-awesome/scss/font-awesome.scss'],
            fonts: ['src/vendor/font-awesome/fonts/*']
        }
    }
};

var config = {
    output_dir:     'assets',
    input_dir:      'src',
    //bootstrap:      { use: true, scss: true},
    fonts:          { use: true, fontawesome: true, glyphicons: true },
    lr:             { use: true, port: 35721 },
    migration:      { host: 'whatever.com', user: 'le_me', password: 'le_pw' }
};

// Inputs are file path arrays
// create font inputs
var fonts = [];
if(config.fonts.use === true) {

    console.log('> Fonts - enabled');
    if(config.fonts.glyphicons === true) {

        console.log('>>> Glyphicons  - enabled');
        fonts = fonts.concat(assets.vendor.bootstrap.fonts);
    }
    if(config.fonts.fontawesome === true) {
        console.log('>>> Fontawesome  - enabled');
        fonts = fonts.concat(assets.vendor.fontawesome.fonts);
    }
}

// create scss vendor inputs
// var vendor_scss = [];
// if (config.bootstrap.scss === true) {
//     console.log('> Bootstrap scss - enabled');
//     vendor_scss = vendor_scss.concat(assets.vendor.bootstrap.scss);
// }
// if (config.fonts.fontawesome === true) {
//     console.log('> Fontawesome scss - enabled');
//     vendor_scss = vendor_scss.concat(assets.vendor.fontawesome.scss);
// }

// console.log(vendor_scss);
// outputs are folders



/*
    SCRIPTS
*/
// JSHint task

gulp.task('js_lint', function() {
  gulp.src(config.input_dir + '/js/**/*.js')
  .pipe(jshint('.jshintrc'))
  .pipe(jshint.reporter('default'))
  .on('error', function(e){ console.log(e); this.emit('end'); });
});


// user scripts development - watch
gulp.task('scripts_development', function() {

    var b = browserify({debug: true, cache: {}, packageCache: {}, fullPaths: true });
    b.add('./src/js/main.js');
    return b.bundle()
        .on('error', function(e){ console.log(e); this.emit('end'); })
        .pipe(source('scripts.min.js')) // output file name
        .pipe(gulp.dest(config.output_dir + '/js'));
});

// user scripts production
gulp.task('scripts_production', ['js_lint'], function() {

    var b = browserify({debug: true, cache: {}, packageCache: {}, fullPaths: true });
    b.add('./src/js/main.js');
    return b.bundle()
        .on('error', function(e){ console.log(e); this.emit('end'); })
        .pipe(source('scripts.min.js')) // output file name
        .pipe(gulp.dest(config.output_dir + '/js'));
});

/*
    STYLES
*/

// Lint task
gulp.task('sass_lint', function() {
  gulp.src(config.input_dir + '/sass/**/*.scss')
  .pipe(scsslint({config: '.scss-lint.yml'}))
  .on('error', function(e){ console.log(e); this.emit('end'); });
});

// Styles production
gulp.task('styles_production', function() {

    return gulp.src(assets.custom.scss)
        .pipe(plumber())
        .pipe(sass({ outputStyle: 'compressed', errLogToConsole: true }))
        .on('error', function(e){ console.log(e); this.emit('end'); })
        .pipe(rename({basename: 'style', suffix: '.min'}))
        .pipe(gulp.dest(config.output_dir + '/css'));

});

 // Styles vendor production
gulp.task('styles_vendor_production', function() {

    if(assets.vendor.scss.length > 0) {
        return gulp.src(assets.vendor.scss)
            .pipe(plumber())
            .pipe(sass({ outputStyle: 'compressed', errLogToConsole: true }))
            .on('error', function(e){ console.log(e); this.emit('end'); })
            .pipe(rename({basename: 'vendor', suffix: '.min'}))
            .pipe(gulp.dest(config.output_dir + '/css'));
    } else {
        console.log('No vendor files to compile');
        return true;
    }
});

// styles development - watch
gulp.task('styles_development', function() {

    return gulp.src(assets.custom.scss)
        .pipe(plumber())
        .pipe(sourcemaps.init())
        .pipe(sass({ outputStyle: 'expanded', errLogToConsole: true }))
        .pipe(sourcemaps.write())
        .on('error', function(e){ console.log(e); this.emit('end'); })
        .pipe(rename({basename: 'style', suffix: '.min'}))
        .pipe(gulp.dest(config.output_dir + '/css'));
});

 // Styles vendor development - watch
gulp.task('styles_vendor_development', function() {

    if(assets.vendor.scss.length > 0) {
        return gulp.src(assets.vendor.scss)
            .pipe(plumber())
            .pipe(sourcemaps.init())
            .pipe(sass({ outputStyle: 'expanded', errLogToConsole: true }))
            .pipe(sourcemaps.write())
            .on('error', function(e){ console.log(e); this.emit('end'); })
            .pipe(rename({basename: 'vendor', suffix: '.min'}))
            .pipe(gulp.dest(config.output_dir + '/css'));
    } else {
        return true;
    }
});

// Images
gulp.task('images', function() {

    // return gulp.src(config.input_dir + '/images/*')
    //     .pipe(cache(imagemin({ optimizationLevel: 3, progressive: true, interlaced: true })))
    //     .pipe(gulp.dest(config.output_dir + '/img'));
});

// Fonts
gulp.task('fonts', function() {

    if(config.fonts.use === true) {
        gulp.src(fonts)
            .pipe(gulp.dest(config.output_dir + '/fonts/vendor'));

        // gulp.src(config.output_dir + '/fonts/*')
        //     .pipe(gulp.dest('assets/fonts/standard'));

        // console.log('> Fonts - enabled');
        // if(config.fonts.glyphicons === true) {

        //     console.log('>>> Glyphicons  - enabled');
        //     gulp.src(settings.paths.glyphicons_fonts)
        //         .pipe(gulp.dest('assets/fonts/vendor'));
        // }
        // if(settings.use_flags.fonts.fontawesome === true) {
        //     console.log('>>> Fontawesome  - enabled');
        //     gulp.src(settings.paths.fontawesome_fonts)
        //         .pipe(gulp.dest('assets/fonts/vendor'));
        // }
    }
});

// Clean
gulp.task('clean', function(cb) {

    // clean all teh things
    del(['assets/css', 'assets/js'], cb);

});

// migrate
gulp.task('migrate', function () {

    // upload all except for
    return gulp.src(['**/*', '!'+config.input_dir, '!*gulpfile.js', '!*Gruntfile.js', '!.git', '!node_modules'])
        .pipe(ftp({
            host: config.migration.host,
            user: config.migration.user,
            pass: config.migration.password,
        }));
});

// Default
gulp.task('default', ['clean'], function() {

    // run all the production tasks and clean as a dep
    gulp.start('styles_production', 'styles_vendor_production', 'scripts_production', 'fonts');

});


// Watch - Development
gulp.task('watch', function() {

    // Watch user .scss files
    gulp.watch([config.input_dir + '/sass/**/*.scss'], ['styles_development']);

    // Watch vendor .scss files
    if(assets.vendor.scss.length > 0) {
        gulp.watch(assets.vendor.scss, ['styles_vendor_development']);
    }

    // Watch user .js files
    gulp.watch(config.input_dir + '/js/**/*.js', ['scripts_development']);

    // Create LiveReload server
    if(config.lr.use === true) {

        console.log('starting lr on port ' + config.lr.port);

        var server = livereload.listen(config.lr.port);
        var livereload_array = [config.output_dir + '/**'];

        // Watch any files in dist/, reload on change
        gulp.watch(livereload_array).on('change', function(file) { livereload.changed(file.path, config.lr.port); });
    }
});



