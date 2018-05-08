var gulp = (gulp = require("gulp")),
  gutil = require("gulp-util"),
  sass = require("gulp-sass"),
  include = require("gulp-include"),
  eslint = require("gulp-eslint"),
  sourcemaps = require("gulp-sourcemaps"),
  concat = require("gulp-concat"),
  imagemin = require("gulp-imagemin"),
  plumber = require("gulp-plumber"),
  notify = require("gulp-notify"),
  uglify = require("gulp-uglify"),
  rename = require("gulp-rename"),
  pngquant = require("gulp-pngquant"),
  postcss = require("gulp-postcss"),
  cache = require("gulp-cache"),
  size = require("gulp-size"),
  cssnano = require("gulp-cssnano"),
  del = require("del"),
  runSequence = require("run-sequence"),
  prefix = require("gulp-autoprefixer"),
  order = require("gulp-order"),
  combineMq = require("gulp-combine-mq"),
  cleanCss = require("gulp-clean-css"),
  babel = require("gulp-babel");

// Destination folder
var destFolder = "assets";

// Working folder
var workingFolder = "work-assets";

var wpFolderName = "gsn";

// SASS OUTPUT OPTION
var sassOptions = {
  outputStyle: "expanded"
};

// CSS VENDOR PREFIX OPTION
var prefixerOptions = {
  browsers: ["> 1%", "last 3 versions", "iOS >=7"]
};

////// Theme Styles TASK ///////
gulp.task("theme-styles", function() {
  return gulp
    .src(`${workingFolder}/scss/theme/**/*.scss`)
    .pipe(plumber(plumberErrorHandler))
    .pipe(sourcemaps.init())
    .pipe(sass(sassOptions))
    .pipe(prefix(prefixerOptions))
    .pipe(sourcemaps.init({ loadMaps: true }))
    .pipe(
      cleanCss({
        format: "beautify",
        level: {
          2: {
            removeUnusedAtRules: true
          }
        }
      })
    )
    .pipe(
      combineMq({
        beautify: false
      })
    )
    .pipe(concat("theme.css"))
    .pipe(
      rename({
        //renames the concatenated CSS file
        basename: "theme", //the base name of the renamed CSS file
        extname: ".min.css" //the extension fo the renamed CSS file
      })
    )
    .pipe(gulp.dest(`${destFolder}/css/theme/`))
    .pipe(size({ gzip: true, showFiles: true }));
});

////// Dashboard Styles TASK ///////
gulp.task("dashboard-styles", function() {
  return gulp
    .src(`${workingFolder}/scss/dashboard/**/*.scss`)
    .pipe(plumber(plumberErrorHandler))
    .pipe(sourcemaps.init())
    .pipe(sass(sassOptions))
    .pipe(prefix(prefixerOptions))
    .pipe(sourcemaps.init({ loadMaps: true }))
    .pipe(
      cleanCss({
        format: "beautify",
        level: {
          2: {
            removeUnusedAtRules: true
          }
        }
      })
    )
    .pipe(
      combineMq({
        beautify: false
      })
    )
    .pipe(concat("dashboard.css"))
    .pipe(
      rename({
        //renames the concatenated CSS file
        basename: "dashboard", //the base name of the renamed CSS file
        extname: ".min.css" //the extension fo the renamed CSS file
      })
    )
    .pipe(gulp.dest(`${destFolder}/css/dashboard/`))
    .pipe(size({ gzip: true, showFiles: true }));
});

////// Landing Styles TASK ///////
gulp.task("landing-styles", function() {
  return gulp
    .src(`${workingFolder}/scss/landing/**/*.scss`)
    .pipe(plumber(plumberErrorHandler))
    .pipe(sourcemaps.init())
    .pipe(sass(sassOptions))
    .pipe(prefix(prefixerOptions))
    .pipe(sourcemaps.init({ loadMaps: true }))
    .pipe(
      cleanCss({
        format: "beautify",
        level: {
          2: {
            removeUnusedAtRules: true
          }
        }
      })
    )
    .pipe(
      combineMq({
        beautify: false
      })
    )
    .pipe(concat("landing.css"))
    .pipe(
      rename({
        //renames the concatenated CSS file
        basename: "landing", //the base name of the renamed CSS file
        extname: ".min.css" //the extension fo the renamed CSS file
      })
    )
    .pipe(gulp.dest(`${destFolder}/css/landing/`))
    .pipe(size({ gzip: true, showFiles: true }));
});

// JS LINT
gulp.task("lint", function() {
  return (
    gulp
      .src(`${workingFolder}/js/**`)
      .pipe(
        eslint({
          rules: {
            quotes: [1, "single"],
            semi: [1, "always"]
          }
        })
      )
      .pipe(eslint.format())
      // Brick on failure to be super strict
      .pipe(eslint.failOnError())
  );
});

/////////// ALL VENDOR Script TASK /////////////
gulp.task("vendors-only-scripts", function() {
  return gulp
    .src(`${workingFolder}/js/vendors/*.js`)
    .pipe(sourcemaps.init())
    .pipe(include())
    .pipe(order([
      'jquery-3.3.1.min.js',
      'jquery-validate.min.js',
      'jquery-ui.js',
      'tether.min.js',
      'bootstrap.min.js',
      'bootstrap-datepicker.min.js',
      'slick.min.js',
    ]))
    .pipe(concat("all-vendors.min.js"))
    .pipe(uglify())
    .on("error", function(err) {
      gutil.log(gutil.colors.red("[Error]"), err.toString());
    })
    .pipe(
      size({
        gzip: true,
        showFiles: true
      })
    )
    .pipe(gulp.dest(`${destFolder}/js/vendors/`));
});

/////////// THEME VENDOR Script TASK /////////////
gulp.task("theme-vendor-scripts", function() {
  return gulp
    .src(`${workingFolder}/js/theme/vendors/*.js`)
    .pipe(sourcemaps.init())
    .pipe(include())
    .pipe(order([]))
    .pipe(babel({
      presets: ['env']
    }))
    .pipe(concat("vendor.min.js"))
    .pipe(uglify())
    .on("error", function(err) {
      gutil.log(gutil.colors.red("[Error]"), err.toString());
    })
    .pipe(
      size({
        gzip: true,
        showFiles: true
      })
    )
    .pipe(gulp.dest(`${destFolder}/js/theme/`));
});

/////////// THEME CUSTOM Script TASK /////////////
gulp.task("theme-custom-scripts", function() {
  return gulp
    .src(`${workingFolder}/js/theme/custom/*.js`)
    .pipe(sourcemaps.init())
    .pipe(include())
    .on("error", console.log)
    .pipe(order([]))
    .pipe(babel({
      presets: ['env']
    }))
    .pipe(concat("theme.min.js"))
    .pipe(uglify())
    .pipe(
      size({
        gzip: true,
        showFiles: true
      })
    )
    .pipe(gulp.dest(`${destFolder}/js/theme/`));
});

/////////// DASHBOARD VENDOR Script TASK /////////////
gulp.task("dashboard-vendor-scripts", function() {
  return gulp
    .src(`${workingFolder}/js/dashboard/vendors/*.js`)
    .pipe(sourcemaps.init())
    .pipe(include())
    .pipe(order([]))
    .pipe(babel({
      presets: ['env']
    }))
    .pipe(concat("vendor.min.js"))
    .pipe(uglify())
    .on("error", function(err) {
      gutil.log(gutil.colors.red("[Error]"), err.toString());
    })
    .pipe(
      size({
        gzip: true,
        showFiles: true
      })
    )
    .pipe(gulp.dest(`${destFolder}/js/dashboard/`));
});

/////////// DASHBOARD CUSTOM Script TASK /////////////
gulp.task("dashboard-custom-scripts", function() {
  return gulp
    .src(`${workingFolder}/js/dashboard/custom/*.js`)
    .pipe(sourcemaps.init())
    .pipe(include())
    .on("error", console.log)
    .pipe(order([]))
    .pipe(babel({
      presets: ['env']
    }))
    .pipe(concat("dashboard.min.js"))
    .pipe(uglify())
    .pipe(
      size({
        gzip: true,
        showFiles: true
      })
    )
    .pipe(gulp.dest(`${destFolder}/js/dashboard/`));
});

/////////// LANDING VENDOR Script TASK /////////////
gulp.task("landing-vendor-scripts", function() {
  return gulp
    .src(`${workingFolder}/js/landing/vendors/*.js`)
    .pipe(sourcemaps.init())
    .pipe(include())
    .pipe(order([]))
    .pipe(babel({
      presets: ['env']
    }))
    .pipe(concat("vendor.min.js"))
    .pipe(uglify())
    .on("error", function(err) {
      gutil.log(gutil.colors.red("[Error]"), err.toString());
    })
    .pipe(
      size({
        gzip: true,
        showFiles: true
      })
    )
    .pipe(gulp.dest(`${destFolder}/js/landing/`));
});

/////////// LANDING CUSTOM Script TASK /////////////
gulp.task("landing-custom-scripts", function() {
  return gulp
    .src(`${workingFolder}/js/landing/custom/*.js`)
    .pipe(sourcemaps.init())
    .pipe(include())
    .on("error", console.log)
    .pipe(order([]))
    .pipe(babel({
      presets: ['env']
    }))
    .pipe(concat("landing.min.js"))
    .pipe(uglify())
    .pipe(
      size({
        gzip: true,
        showFiles: true
      })
    )
    .pipe(gulp.dest(`${destFolder}/js/landing/`));
});

/////////// ADMIN CUSTOM Script TASK /////////////
gulp.task("admin-custom-scripts", function() {
  return gulp
    .src(`${workingFolder}/js/admin/custom/*.js`)
    .pipe(sourcemaps.init())
    .pipe(include())
    .on("error", console.log)
    .pipe(order([]))
    .pipe(babel({
      presets: ['env']
    }))
    .pipe(concat("all-admin.js"))
    .pipe(uglify())
    .pipe(
      size({
        gzip: true,
        showFiles: true
      })
    )
    .pipe(gulp.dest(`${destFolder}/js/admin/`));
});

////// Optimize Image TASK ///////
gulp.task("img", function() {
  return gulp
    .src(`${workingFolder}/images/*.+(png|jpg|jpeg|gif|svg)`)
    .pipe(
      cache(
        imagemin({
          optimizationLevel: 7,
          interlaced: true,
          progressive: true,
          svgoPlugins: [{ removeViewBox: false }],
          use: [pngquant()]
        })
      )
    )
    .pipe(gulp.dest(`${destFolder}/images/`));
});

// Cleaning
gulp.task("clean", function() {
  return del.sync(`${destFolder}`).then(function(cb) {
    return cache.clearAll(cb);
  });
});

gulp.task(`clean:${destFolder}`, function() {
  return del.sync([
    `${destFolder}/**/*`,
    `!${destFolder}/images`,
    `!${destFolder}/images/**/*`,
    `!${destFolder}/css`,
    `!${destFolder}/css/theme`,
    `!${destFolder}/css/dashboard`,
    `!${destFolder}/css/landing`,
    `!${destFolder}/js`,
    `!${destFolder}/js/vendors`,
    `!${destFolder}/js/theme`,
    `!${destFolder}/js/dashboard`,
    `!${destFolder}/js/landing`,
    `!${destFolder}/js/admin`
  ]);
});

////// PLUMBER TASK ///////
var plumberErrorHandler = {
  errorHandler: notify.onError({
    title: "Gulp",
    message: "Error: <%= error.message %>"
  })
};

//Watch task
gulp.task(
  "watch",
  [
    "theme-styles",
    "dashboard-styles",
    "landing-styles",
    "vendors-only-scripts",
    "img",
    "theme-vendor-scripts",
    "theme-custom-scripts",
    "dashboard-vendor-scripts",
    "dashboard-custom-scripts",
    "landing-vendor-scripts",
    "landing-custom-scripts",
    "admin-custom-scripts",
  ],
  function() {
    gulp.watch(`${workingFolder}/scss/theme/**/*.scss`, ["theme-styles"]);
    gulp.watch(`${workingFolder}/scss/dashboard/**/*.scss`, [
      "dashboard-styles"
    ]);
    gulp.watch(`${workingFolder}/scss/landing/**/*.scss`, [
      "landing-styles"
    ]);
    gulp.watch(`${workingFolder}/js/vendors/*.js`, [
      "vendors-only-scripts"
    ]);
    gulp.watch(`${workingFolder}/js/theme/custom/*.js`, [
      "theme-custom-scripts"
    ]);
    gulp.watch(`${workingFolder}/js/theme/vendors/*.js`, [
      "theme-vendor-scripts"
    ]);
    gulp.watch(`${workingFolder}/js/dashboard/custom/*.js`, [
      "dashboard-custom-scripts"
    ]);
    gulp.watch(`${workingFolder}/js/dashboard/vendors/*.js`, [
      "dashboard-vendor-scripts"
    ]);
    gulp.watch(`${workingFolder}/js/landing/custom/*.js`, [
      "landing-custom-scripts"
    ]);
    gulp.watch(`${workingFolder}/js/landing/vendors/*.js`, [
      "landing-vendor-scripts"
    ]);
    gulp.watch(`${workingFolder}/js/admin/custom/*.js`, [
      "admin-custom-scripts"
    ]);
    gulp.watch(`${workingFolder}/images/*.+(png|jpg|jpeg|gif|svg)`, ["img"]);
  }
);

gulp.task("default", function(callback) {
  runSequence(["theme-styles", "dashboard-styles", "watch", "img"], callback);
});

gulp.task("build", function(callback) {
  runSequence(
    `clean:${destFolder}`,
    [
      "theme-styles",
      "dashboard-styles",
      "landing-styles",
      "vendors-only-scripts",
      "theme-vendor-scripts",
      "theme-custom-scripts",
      "dashboard-vendor-scripts",
      "dashboard-custom-scripts",
      "landing-vendor-scripts",
      "landing-custom-scripts",
      "admin-custom-scripts",
      "img"
    ],
    callback
  );
});
