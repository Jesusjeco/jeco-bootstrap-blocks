const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const cleanCSS = require('gulp-clean-css');

// Paths to your files
const paths = {
    scss: './blocks/**/*.scss', // SCSS files in the blocks folder
    css: './blocks', // Output folder for compiled CSS
    bootstrapJs: './node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', // Path to Bootstrap JS
    popperJs: './node_modules/@popperjs/core/dist/umd/popper.min.js', // Popper.js path
    jsDest: './js' // Output folder for compiled JS in the root
};

// Task to compile and minify SCSS to CSS
gulp.task('styles', function () {
    return gulp.src(paths.scss)
        .pipe(sass().on('error', sass.logError))  // Compile SCSS
        .pipe(postcss([autoprefixer()]))  // Apply autoprefixer
        .pipe(cleanCSS().on('error', (err) => console.error(err)))  // Minify using gulp-clean-css
        .pipe(gulp.dest(paths.css));  // Save the compiled CSS
});

// Task to copy Bootstrap JavaScript to the js folder in the root
gulp.task('bootstrapScript', function () {
    return gulp.src(paths.bootstrapJs)  // Source Bootstrap JavaScript
        .pipe(gulp.dest(paths.jsDest));  // Save to root js folder
});

gulp.task('popperScript', function () {
    return gulp.src(paths.popperJs)  // Source Bootstrap JavaScript
        .pipe(gulp.dest(paths.jsDest));  // Save to root js folder
});

// Watch task to automatically recompile on save
gulp.task('watch', function () {
    gulp.watch(paths.scss, gulp.series('styles'));
    // No need to watch JavaScript files since we're copying the same file
});

// Default task that runs both the styles and watch tasks
gulp.task('default', gulp.series('styles', 'bootstrapScript', 'popperScript', 'watch'));