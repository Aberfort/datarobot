const gulp = require('gulp');
const sass = require('gulp-sass');
const del = require('del');

gulp.task('styles', () => {
  return gulp.src('css/**/*.scss')
      .pipe(sass().on('error', sass.logError))
      .pipe(gulp.dest('./css/'));
});

gulp.task('clean', () => {
  return del([
    'css/custom.css',
  ]);
});

gulp.task('default', gulp.series(['clean', 'styles']));