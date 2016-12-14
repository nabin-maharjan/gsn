var gulp = require('gulp'),
  gutil = require('gulp-util'),
 sass = require('gulp-sass'),
 include  = require("gulp-include")
 sourcemaps = require('gulp-sourcemaps'),
 jshint = require('gulp-jshint'),
 concat = require('gulp-concat'),
 imagemin = require('gulp-imagemin'),
 plumber = require('gulp-plumber'),
 notify = require('gulp-notify'),
  minifyCss = require('gulp-minify-css'),
 browserSync = require('browser-sync').create(),
 reload      = browserSync.reload, 
 uglify = require('gulp-uglify'),
  rename = require('gulp-rename'),
  pngquant = require('pngquant'),
  postcss = require('gulp-postcss'),
  cache = require('gulp-cache'),
  size = require('gulp-size'),
  cssnano = require('gulp-cssnano'),
  del = require('del'),
  runSequence = require('run-sequence'),
  prefix = require('gulp-autoprefixer'),
  order = require('gulp-order'),
  combineMq = require('gulp-combine-mq');
  
  
  var wpFolderName="gsn";

/ SASS OUTPUT OPTION /
var sassOptions = {
  outputStyle: 'expanded'
};
/ CSS VENDOR PREFIX OPTION /
var prefixerOptions = {
  browsers: ['last 2 versions', 'ie 9']
};


////// Styles TASK ///////

gulp.task('sass', function () {
 return gulp.src('work-assests/scss/**/*.scss')
  .pipe(plumber(plumberErrorHandler))
  
  .pipe(sourcemaps.init()) 
  .pipe(sass(sassOptions))
  .pipe(prefix(prefixerOptions))
  .pipe(combineMq({
        beautify: false
    }))
  .pipe(minifyCss())
  .pipe(concat('style.css'))
  .pipe(rename({              //renames the concatenated CSS file
      basename : 'style',       //the base name of the renamed CSS file
      extname : '.min.css'      //the extension fo the renamed CSS file
    }))
  .pipe(gulp.dest('assets/css/'))
  .pipe(size({ gzip: true, showFiles: true }))  
  .pipe(reload({stream:true}));
});


/////////// Script TASK /////////////
gulp.task("global-scripts", function() {
  return gulp.src("work-assests/js/custom/**/*.js")
   .pipe(sourcemaps.init()) 
   .pipe(jshint())
   .pipe(include())      
   .on('error', console.log)
   .pipe(jshint.reporter('default'))
   .pipe(order([
		"work-assests/js/custom/**/*.js"
	  ]))
	.pipe(concat("all.js"))
    .pipe(uglify())
    .pipe(size({ gzip: true, showFiles: true }))
	
   .pipe(gulp.dest("assets/js/custom/"))
    .pipe(reload({stream:true}));
});

/////////// Script TASK /////////////
gulp.task("global-scripts-admin", function() {
  return gulp.src("work-assests/js/admin/*.js")
   .pipe(sourcemaps.init()) 
   .pipe(jshint())
   .pipe(include())      
   .on('error', console.log)
   .pipe(jshint.reporter('default'))
   .pipe(order([
		"work-assests/js/admin/**/*.js"
	  ]))
	.pipe(concat("all-admin.js"))
    .pipe(uglify())
    .pipe(size({ gzip: true, showFiles: true }))
	
   .pipe(gulp.dest("assets/js/admin/"))
    .pipe(reload({stream:true}));
});




////// Optimize Image TASK ///////
gulp.task('img', function() {
  return gulp.src('work-assests/images/*.+(png|jpg|jpeg|gif|svg)')
    .pipe(cache(imagemin({
      optimizationLevel: 7,
      interlaced: true,
      progressive: true,
      svgoPlugins: [{removeViewBox: false}],
      use: [pngquant()]
    })))
    .pipe(gulp.dest('assets/images'))
});

//Copy Fonts
//gulp.task('fonts', function(){
//  return gulp.src('work-assests/fonts/**/*')
//    .pipe(gulp.dest('assets/fonts'))
//});

// Cleaning 
gulp.task('clean', function() {
  return del.sync('assets').then(function(cb) {
    return cache.clearAll(cb);
  });
})

gulp.task('clean:assets', function() {
  return del.sync(['assets/**/*', '!assets/images', '!assets/images/**/*']);
});

// browser-sync task for starting the server.
gulp.task('browser-sync', function() {
  //watch files
  var files = [
    './**/*.php',
    './*.php',
    './*.js',
	'./**/*.js',
    './*.css'
  ];
  //initialize browsersync
  browserSync.init(files, {
  //browsersync with a php server
	 proxy: "http://localhost/"+wpFolderName+"/",
   // host: 'nabin.com',
    injectChanges: true,
    open: 'internal',
    notify: false
  });
});

////// PLUMBER TASK ///////

var plumberErrorHandler = { errorHandler: notify.onError({
    title: 'Gulp',
    message: 'Error: <%= error.message %>'
  })
};


//Watch task
gulp.task('watch',['browser-sync', 'sass', 'img', 'global-scripts','global-scripts-admin'], function(){
   gulp.watch('work-assests/scss/**/*.scss', ['sass']); 
   gulp.watch('work-assests/js/**/*.js', ['global-scripts']);
    gulp.watch('work-assests/js/admin/**/*.js', ['global-scripts-admin']);
   gulp.watch('work-assests/images/*.+(png|jpg|jpeg|gif|svg)', ['img']);
    gulp.watch('./*.php', reload);
});

// Default task to be run with `gulp`

// gulp.task('default', ['sass', 'browser-sync','img','global-scripts'], function () {
//    gulp.watch("sass/**/*.scss", ['sass']);
//    gulp.watch('scss/**/*.scss', ['sass']); 
//    gulp.watch('working-js/*.js', ['global-scripts']);
//    gulp.watch('images/*.+(png|jpg|jpeg|gif|svg)', ['img']);
// });

gulp.task('default', function (callback) {
  runSequence(['sass','browser-sync', 'watch', 'img'],
    callback
  )
});


gulp.task('build', function(callback){
  runSequence(
    'clean:assets',
    ['sass', 'global-scripts', 'img','global-scripts-admin'],
    callback
  )
});