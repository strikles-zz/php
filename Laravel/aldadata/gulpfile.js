/*!
 * gulp
 */

'use strict';

// Load plugins
var gulp        = require('gulp'),
    sass        = require('gulp-sass'),
    scsslint    = require('gulp-scss-lint'),
    jshint      = require('gulp-jshint'),
    imagemin    = require('gulp-imagemin'),
    rename      = require('gulp-rename'),
    concat      = require('gulp-concat'),
    plumber     = require('gulp-plumber'),
    livereload  = require('gulp-livereload'),
    ftp         = require('gulp-ftp'),
    sourcemaps  = require('gulp-sourcemaps'),
    stripify    = require("stripify"),
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
        scss: ['app/assets/sass/style.scss'],
        js: ['./app/assets/js/main.js'],
        images: ['app/assets/images/**/*']
    },
    vendor: {
        scss: ['app/assets/vendor.scss'],
        bootstrap: {
            fonts: 'app/assets/vendor/bootstrap-sass-official/assets/fonts/bootstrap/**/*.{ttf,woff,woff2,eof,svg}'
        },
        fontawesome: {
            fonts: 'app/assets/vendor/fontawesome/fonts/**/*.{ttf,woff,woff2,eof,svg}'
        }
    }
};

var config = {
    output_dir:     'public/assets',
    input_dir:      'app/assets',
    //bootstrap:      { use: true, scss: true},
    fonts:          { use: true, fontawesome: true, glyphicons: true },
    lr:             { use: true, port: 35730 },
    migration:      { host: 'whatever.com', user: 'le_me', password: 'le_pw' }
};

// Inputs are file path arrays
// create font inputs
var fonts = [];
if(config.fonts.use === true) {

    console.log('> Fonts - enabled');
    if(config.fonts.glyphicons === true) {

        console.log('>>> Glyphicons  - enabled');
        fonts.push(assets.vendor.bootstrap.fonts);
    }
    if(config.fonts.fontawesome === true) {
        console.log('>>> Fontawesome  - enabled');
        fonts.push(assets.vendor.fontawesome.fonts);
    }

    console.log('fonts', fonts);
}

// default layout dist concat
gulp.task('admin_vendor_styles_concat', function() {
  return gulp.src(
    [
        config.input_dir+'/vendor/colorbox/example2/volorbox.css',
        config.input_dir+'/vendor/colorbox/example2/colorbox.css',
        config.input_dir+'/vendor/jquery-ui/themes/ui-lightness/jquery-ui.css',
        config.input_dir+'/vendor/jquery-ui/themes/ui-lightness/jquery.ui.theme.css',
        config.input_dir+'/vendor/jquery-ui-bootstrap/jquery.ui.theme.css',
        config.input_dir+'/vendor/jquery-ui-bootstrap/jquery.ui.theme.font-awesome.css',
        config.input_dir+'/vendor/bootstrap-star-rating/css/star-rating.min.css',
        config.input_dir+'/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.css',
        config.input_dir+'/vendor/jquery-timepicker-addon/jquery-ui-timepicker-addon.css',
        config.input_dir+'/vendor/dropzone/dist/dropzone.css'
    ])
    .pipe(concat('admin_vendor_concat.css'))
    .pipe(gulp.dest(config.output_dir+'/css'));
});

gulp.task('admin_vendor_scripts_concat', function() {
  return gulp.src(
    [
        //config.input_dir+'/vendor/jquery/dist/jquery.js',
        config.input_dir+'/vendor/DataTables/media/js/jquery.js',
        config.input_dir+'/vendor/underscore/underscore.js',
        config.input_dir+'/vendor/bootstrap/dist/js/bootstrap.js',
        config.input_dir+'/vendor/jquery-ui/ui/jquery-ui.js',
        config.input_dir+'/vendor/colorbox/jquery.volorbox.js',
        config.input_dir+'/vendor/colorbox/jquery.colorbox.js',
        config.input_dir+'/vendor/DataTables/media/js/jquery.dataTables.js',
        config.input_dir+'/vendor/dropzone/dist/dropzone.js',
        config.input_dir+'/vendor/typeahead.js/dist/typeahead.bundle.js',
        config.input_dir+'/vendor/bootstrap-star-rating/js/star-rating.js',
        config.input_dir+'/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.js',
        config.input_dir+'/vendor/jquery-timepicker-addon/jquery-ui-timepicker-addon.js',
    ])
    .pipe(concat('admin_vendor_concat.js'))
    .pipe(gulp.dest(config.output_dir+'/js'));
});

// default layout dist concat
gulp.task('angular_vendor_styles_concat', function() {
  return gulp.src(
    [
        //config.input_dir+'/vendor/colorbox/example2/colorbox.css',
        config.input_dir+'/vendor/angular-loading-bar/build/loading-bar.css'
    ])
    .pipe(concat('angular_vendor_concat.css'))
    .pipe(gulp.dest(config.output_dir+'/css'));
});

// angular promoters dist concats
gulp.task('angular_vendor_scripts_concat', function() {
  return gulp.src(
    [
        config.input_dir+'/vendor/angular/angular.js',
        config.input_dir+'/vendor/angular-resource/angular-resource.js',
        config.input_dir+'/vendor/angular-ui-router/release/angular-ui-router.js',
        config.input_dir+'/vendor/angular-animate/angular-animate.js',
        config.input_dir+'/vendor/angular-filter/dist/angular-filter.js',
        config.input_dir+'/vendor/angular-bootstrap/ui-bootstrap.js',
        config.input_dir+'/vendor/angular-bootstrap/ui-bootstrap-tpls.js',
        config.input_dir+'/vendor/angularjs-file-upload/angular-file-upload-all.js',
        config.input_dir+'/vendor/angular-loading-bar/build/loading-bar.js',
        config.input_dir+'/vendor/highcharts/highcharts.js',
        config.input_dir+'/vendor/highcharts-ng/dist/highcharts-ng.js',
    ])
    .pipe(concat('angular_vendor_concat.js'))
    .pipe(gulp.dest(config.output_dir+'/js'));
});

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

// JSHint task
gulp.task('js_lint_angular', function() {
  gulp.src(config.input_dir + '/js/angular/*.js')
  .pipe(jshint('.jshintrc'))
  .pipe(jshint.reporter('default'))
  .on('error', function(e){ console.log(e); this.emit('end'); });
});

// user scripts development - watch
gulp.task('scripts_development', ['js_lint'], function() {

    var b = browserify({debug: true, cache: {}, packageCache: {}, fullPaths: true });
    b.add('./app/assets/js/main.js');
    return b.bundle()
        .on('error', function(e){ console.log(e); this.emit('end'); })
        .pipe(source('scripts.min.js')) // output file name
        .pipe(gulp.dest(config.output_dir + '/js'));
});

// user scripts production
gulp.task('scripts_production', ['js_lint'], function() {

    var b = browserify({debug: true, cache: {}, packageCache: {}, fullPaths: true });
    b.add('./app/assets/js/main.js');
    //b.transform("stripify");  // strip alerts and console.log
    return b.bundle()
        .on('error', function(e){ console.log(e); this.emit('end'); })
        .pipe(source('scripts.min.js')) // output file name
        .pipe(gulp.dest(config.output_dir + '/js'));
});

// user scripts development - watch
gulp.task('angular_scripts_development', ['js_lint_angular'], function() {

    var b = browserify({debug: true, cache: {}, packageCache: {}, fullPaths: true });
    b.add('./app/assets/js/angular/main.js');
    return b.bundle()
        .on('error', function(e){ console.log(e); this.emit('end'); })
        .pipe(source('angular_scripts.min.js')) // output file name
        .pipe(gulp.dest(config.output_dir + '/js'));
});

// user scripts production
gulp.task('angular_scripts_production', ['js_lint_angular'], function() {

    var b = browserify({debug: true, cache: {}, packageCache: {}, fullPaths: true });
    b.add('./app/assets/js/angular/main.js');
    b.transform("stripify");  // strip alerts and console.log
    return b.bundle()
        .on('error', function(e){ console.log(e); this.emit('end'); })
        .pipe(source('angular_scripts.min.js')) // output file name
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
gulp.task('styles_production', ['sass_lint'], function() {

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

        fonts.forEach(function(entry) {

            console.log(entry);
            gulp.src(entry)
                .pipe(gulp.dest(config.output_dir + '/fonts'));
        });

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
    del(['assets/css', 'assets/js', 'assets/fonts'], cb);

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
gulp.task('default', function() {

    // run all the production tasks and clean as a dep
    gulp.start(
        'styles_production',
        'scripts_production',
        'styles_vendor_production',
        'fonts',
        'admin_vendor_styles_concat',
        'admin_vendor_scripts_concat',
        'angular_vendor_styles_concat',
        'angular_vendor_scripts_concat',
        'angular_scripts_production'
    );
});


// Watch - Development
gulp.task('watch', function() {

    // STYLES

    // Watch user .scss files
    gulp.watch([config.input_dir + '/sass/**/*.scss'], ['styles_development']);

    // Watch vendor .scss files
    if(assets.vendor.scss.length > 0) {
        gulp.watch(assets.vendor.scss, ['styles_vendor_development']);
    }

    // Watch .js main files
    gulp.watch(config.input_dir + '/js/*.js', ['scripts_development']);

    // watch .js main angular files
    gulp.watch(config.input_dir + '/js/angular/**/*.js', ['angular_scripts_development']);

    // VENDOR CONCATS
    gulp.watch([config.input_dir + '/vendor/**/*.js'], ['admin_vendor_scripts_concat', 'angular_vendor_scripts_concat']);
    gulp.watch([config.input_dir + '/vendor/**/*.css'], ['admin_vendor_styles_concat', 'angular_vendor_styles_concat']);

    // Create LiveReload server
    if(config.lr.use === true) {

        console.log('starting lr on port ' + config.lr.port);

        var server = livereload.listen(config.lr.port);
        var livereload_array = [config.output_dir + '/**'];

        // Watch any files in dist/, reload on change
        gulp.watch(livereload_array).on('change', function(file) { livereload.changed(file.path, config.lr.port); });
    }
});



