var gulp = require('gulp'),
    uglify = require('gulp-uglify'),
    rename = require('gulp-rename');

gulp.task('minjs', function() {
    return gulp.src(['./assets/passfield.js'])
        .pipe(uglify())
        .pipe(rename({
            suffix: ".min"
        }))
        .pipe(gulp.dest('./assets'));
});

gulp.task('default', ['minjs'], function() {});