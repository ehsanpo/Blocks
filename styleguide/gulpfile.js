var gulp = require('gulp');
var rename = require('gulp-rename');
var sass = require('gulp-sass');
var sassGlob = require('gulp-sass-glob');

gulp.task('sass', function(){
    return gulp.src('base/all.scss')
      .pipe(sassGlob())
      .pipe(sass().on('error', sass.logError))
      .pipe(rename('site.css'))
      .pipe(gulp.dest('./public/stylesheets'))
  });



// watcher
gulp.task('watch', function(){
	// don't watch our import file for changes, watch the underlying partials for changes. If changes, run styles task to re-compile
	gulp.watch(['base/**.scss' , 'components/**/*.scss'] , gulp.series('sass')); 
})

// make sure you run fractal with "fractal start --sync" to use livereload in conjunction with this