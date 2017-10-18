var gulp = require('gulp');
var sass = require('gulp-sass');
var webpack = require('webpack-stream');
var watch = require('gulp-watch');
var batch = require('gulp-batch');
var copy = require('gulp-copy');
var concat = require('gulp-concat');
var minifyCSS = require('gulp-minify-css');
var uglify = require('gulp-uglify');

// CONNECT SCRIPTS
var php = require('gulp-connect-php');
var bs = require('browser-sync').create();

gulp.task('php', function() {
    php.server({ base: './public', port: 8080, keepalive: true});
});


gulp.task('browser-sync', ['sass', 'adminScss', 'php', 'webpack', 'build.index', 'watchSrc', 'image', 'fonts'], function() {
     bs.init({
        host: 'localhost',
        proxy: '127.0.0.1:8080',
        port: 3000,
        open: true,
        notify: false
    });
});

// Run webpack
gulp.task('webpack', function(){
  return gulp.src(['./resources/app/main.js', './resources/admin/main.admin.js'])
    .pipe(webpack( require('./webpack.config.js') ))
    .pipe(gulp.dest('public/js/'))
    .pipe(bs.reload({stream: true}));
});


gulp.task('sass', function () {
      return gulp.src('./resources/app/scss/main.scss')
            .pipe(sass())
            .pipe(minifyCSS())
            .pipe(concat('app.min.css'))
            .pipe(gulp.dest('public/css'))
            .pipe(bs.reload({stream: true}));
});

gulp.task('watchSrc', function () {
  return gulp.src(["./resources/app/components/*.vue", "./resources/admin/components/**/*.vue"])
        .pipe(bs.reload({stream: true}));
});

// =============== ADMIN ==============

  gulp.task('adminScss', function () {
      return gulp.src('./resources/admin/scss/admin.scss')
            .pipe(sass())
            .pipe(minifyCSS())
            .pipe(concat('admin.min.css'))
            .pipe(gulp.dest('public/css'))
            .pipe(bs.reload({stream: true}));
  });


// =====================================


// Copy Home.html file
gulp.task('build.index', function(){
  return gulp.src(['./resources/views/index.blade.php', './resources/views/admin/dashboard.blade.php']);
});

gulp.task('image', function () {
  gulp.src('./resources/img/*')
    .pipe(gulp.dest('./public/img'));
});

gulp.task('fonts', function () {
  gulp.src('./resources/fonts/*')
    .pipe(gulp.dest('./public/fonts'));
});

// LIBRARIES

gulp.task('cssPlugins', function () {
  return gulp.src([
      'bower_components/bootstrap/dist/css/bootstrap.min.css',
      'bower_components/bootstrap/dist/css/bootstrap-theme.min.css',
      'bower_components/font-awesome/css/font-awesome.min.css',
      'bower_components/toastr/toastr.min.css',
      'bower_components/sweetalert/dist/sweetalert.css',
      'bower_components/wow/css/libs/animate.css'
    ])
  // .pipe(minifyCSS())
  .pipe(concat('build.min.css'))
  .pipe(gulp.dest('public/css'));
});

gulp.task('jsPlugins', function () {
    return gulp.src([
        'bower_components/jquery/dist/jquery.min.js',
        'bower_components/bootstrap/dist/js/bootstrap.min.js',
        'bower_components/toastr/toastr.min.js',
        'bower_components/sweetalert/dist/sweetalert.min.js',
        'bower_components/wow/dist/wow.min.js',
        'bower_components/rellax/rellax.min.js'
      ])
    .pipe(concat('base.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('public/js'))
});


gulp.task('watch', ['browser-sync'], function () {
    gulp.watch(["./resources/app/scss/**/*.scss"], ['sass']);
    gulp.watch("./resources/admin/scss/**/*.scss", ['adminScss']);
    gulp.watch(["./resources/views/index.blade.php",
                "./resources/views/admin/dashboard.blade.php",
                "./resources/app/components/*.vue",
                "./resources/admin/components/**/*.vue",
                "./resources/app/components/templates/*.html",
                "./resources/admin/components/templates/*.html"],
                ['build.index', 'webpack']).on('change', bs.reload);
});

// BUILD SCRIPTS
gulp.task('build', ['jsPlugins', 'cssPlugins', 'image', 'fonts'], function () {
  console.log("***************");
  console.log("All scripts builded");
  console.log("***************");
});


// Default task
// gulp.task('default', ['webpack', 'build.index', 'sass']);
