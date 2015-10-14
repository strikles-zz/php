'use strict';
process.env.DISABLE_NOTIFIER = true;

var elixir = require('laravel-elixir');

require('laravel-elixir-jshint');
require('laravel-elixir-browserify');
require('laravel-elixir-scss-lint');
//require('laravel-elixir-ruby-sass');


var bower_path = "./vendor/bower_components";
var paths = {
    'jquery': bower_path+'/jquery/',
    'bootstrap': bower_path+'/bootstrap-sass-official/assets/',
    'jqueryui': bower_path+'/jquery.ui/',
    'timepicker': bower_path+'/jquery-timepicker/',
    'fontawesome': bower_path+'/fontawesome/',
    'underscore': bower_path+'/underscore/',
    'datatables': bower_path+'/DataTables/'
};

/*
 |--------------------------------------------------------------------------
 | Elixir raw gulp tasks extensions
 |--------------------------------------------------------------------------
 |
 | Complex tasks can be run by extending elixir
 |
 */


var gulp = require('gulp'),
    sass        = require('gulp-sass'),
    rename      = require('gulp-rename'),
    plumber     = require('gulp-plumber'),
    scsslint    = require('gulp-scss-lint'),
    sourcemaps  = require('gulp-sourcemaps'),
    concatenate = require('gulp-concat'),
    shell       = require("gulp-shell");

elixir.extend('vendorScss', function(callback) {

    gulp.task('vendorStyles', function() {
        gulp.src('resources/assets/sass/vendor.scss')
            .on('error', function(e){ console.log(e);  })
            .pipe(plumber())
            .pipe(sourcemaps.init())
            .pipe(sass({ outputStyle: 'nested', errLogToConsole: true }))
            .pipe(sourcemaps.write())
            .pipe(rename({basename: 'vendor'}))
            .pipe(gulp.dest('./public/css'));
    });

    this.registerWatcher('vendorStyles', this.assetsDir + 'sass/vendor.scss');
    return this.queueTask('vendorStyles');
});

elixir.extend('mainScss', function(callback) {

    gulp.task('mainStyles', function() {
        //console.log('test');
        gulp.src('resources/assets/sass/style.scss')
            .pipe(scsslint({config: '.scss-lint.yml'}))
            .on('error', function(e){ console.log(e);  })
            .pipe(plumber())
            .pipe(sourcemaps.init())
            .pipe(sass({ outputStyle: 'nested', errLogToConsole: true }))
            .pipe(sourcemaps.write())
            .pipe(rename({basename: 'style'}))
            .pipe(gulp.dest('./public/css'));
    });

    // gulp.task('combineStyles', ['compileScss'], function() {
    //  setTimeout(function() {
    //  gulp.src(['public/css/vendor.css', 'public/css/custom.css'])
    //         .pipe(concatenate('style.css'))
    //         .pipe(gulp.dest('./public/css'));
    //      }, 1000);
    // });

    this.registerWatcher('mainStyles', this.assetsDir + 'sass/**/*');
    return this.queueTask('mainStyles');
});

// elixir.extend("message", function(message) {
//     gulp.task("say", shell.task(["echo " + message]));
//     return this.queueTask("say");
//  });

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */
elixir(function(mix) {

    // elixir config
    elixir.config.production = false;
    if(elixir.config.production === true) {

        elixir.config.sourcemaps = false;
        elixir.config.watchify   = false;

    } else {

        elixir.config.sourcemaps = true;
        // ???
        elixir.config.watchify   = false;
    }

    console.log(elixir);

    mix
        // sass
        .scssLint()
        .vendorScss()
        .mainScss()
        // sass - paths relative to resources/assets/sass
        //.sass(["vendor.scss", "style.scss"], 'public/css/', {indentedSyntax: true, outputStyle: 'expanded', includePaths: [paths.bootstrap + 'stylesheets/', paths.fontawesome + '/scss', './resources/assets/sass']})

        // vendor scripts - paths relative to resources/js
        .scripts([
            paths.jquery + "dist/jquery.js",
            paths.bootstrap + "javascripts/bootstrap.js",
            paths.timepicker + "include/ui-1.10.0/jquery.ui.core.min.js",
            paths.timepicker + "include/ui-1.10.0/jquery.ui.position.min.js",
            paths.timepicker + "jquery.ui.timepicker.js",
        ], 'public/js/vendor.js', './')

        // user js - paths relative to resources/assets/js
        .browserify("main.js", {
            debug: true,
            cache: {}, packageCache: {}, fullPaths: true,
            insertGlobals: true,
            output: "public/js",
            rename: "app.js"
        })
        //.watchify()

        // guids for caching resolution
        .version([
            "public/css/style.css",
            "public/css/vendor.css",
            "public/js/app.js",
            "public/js/vendor.js"
        ]);

    // separate mix tasks for fonts
    mix
        .copy(paths.timepicker + "include/ui-1.10.0/ui-lightness/jquery-ui-1.10.0.custom.min.css", 'public/css')
        .copy(paths.timepicker + "include/ui-1.10.0/ui-lightness/images/**", 'public/css/images')
        .copy(paths.timepicker + "jquery.ui.timepicker.css", 'public/css')
        .copy(paths.bootstrap + 'fonts/bootstrap/**', 'public/fonts/bootstrap')
        .copy(paths.fontawesome + 'fonts/**', 'public/fonts/fontawesome')
        .copy('./public/css/style.css.map', 'public/build/css/style.css.map')
        .copy('./public/css/vendor.css.map', 'public/build/css/vendor.css.map')
        .copy('./public/js/vendor.js.map', 'public/build/js/vendor.js.map');
});
