/*eslint no-unused-vars:0, no-console:0*/
var gulp = require('gulp'),
	watch = require('gulp-watch'),
	source = require('vinyl-source-stream'),
	buffer = require('vinyl-buffer'),

// Javascript linting and minification
	browserify = require('browserify'),
	stringify = require('stringify'),
	eslint = require('gulp-eslint'),
	sourcemaps = require('gulp-sourcemaps'),
	uglify = require('gulp-uglify'),

// SCSS
	compass = require('gulp-compass'),
	sass = require('gulp-sass'),
	autoprefixer = require('gulp-autoprefixer'),

// ImageMin
	imagemin = require('gulp-imagemin'),

// directory variables
	sourceDir = 'src/',
	buildDir = 'public/';

//var browserSync = require('browser-sync').create();

gulp.task('scss', function () {
	"use strict";

	return gulp.src(sourceDir + 'scss/**/*.scss')
		.pipe(sourcemaps.init())
		.pipe(sass({
			outputStyle: 'compressed',
			includePaths: require('bourbon-neat').includePaths
		}))
		.pipe(autoprefixer({
			browsers: ['last 2 versions', 'Explorer >= 9'],
			cascade: false
		}))
		.pipe(sourcemaps.write())
		.on('error', function (error) {
			console.log(error);
			this.emit('end');
		})
		.pipe(gulp.dest('./'));
		//.pipe(browserSync.stream());
});

gulp.task('fonts', function () {
	"use strict";

	return gulp.src(sourceDir + 'fonts/**/*')
		.pipe(gulp.dest(buildDir + 'fonts'));
});

gulp.task('svg', function () {
	"use strict";

	return gulp.src(sourceDir + 'svg/**/*')
		.pipe(gulp.dest(buildDir + 'svg'));
});

gulp.task('img', function () {
	"use strict";

	return gulp.src(sourceDir + 'img/**/*')
		.pipe(imagemin())
		.pipe(gulp.dest(buildDir + 'img'));
});

gulp.task('compile_js', function () {
	var b = browserify({
		entries: [sourceDir + 'js/main.js'],
		debug: true
	});

	var bundle = function () {
		return b
			.transform(stringify(['.html']))
			.bundle()
			.pipe(source('main.js'))
			.pipe(buffer())
			.pipe(sourcemaps.init({loadMaps: true}))
			.pipe(sourcemaps.write('./'))
			.pipe(gulp.dest(buildDir + 'js/'));
	};

	return bundle();
});

gulp.task('js', ['compile_js'], function() {
	return gulp.src(buildDir + 'js/main.js')
		.pipe(uglify({
			mangle: true,
			compress: true,
			preserveComments: false
		}))
		.pipe(gulp.dest(buildDir + 'js/'));
});

// Single-use Gulp build task
gulp.task('build', ['fonts', 'scss', 'js', 'img', 'svg']);

// Watch build task
gulp.task('watch', function () {
	"use strict";
	/*browserSync.init({
        proxy: "spire2017.dev",
		open: "external",
		host: "spire2017.dev"
    });*/

	// minify and move JavaScript
	gulp.watch([sourceDir + 'js/**/*', sourceDir + 'templates/**/*'], ['js']);

	// move fonts
	gulp.watch(sourceDir + 'fonts/**/*', ['fonts']);

	// compile and move SCSS
	gulp.watch(sourceDir + 'scss/**/*', ['scss']);

	// optimize and move images
	gulp.watch(sourceDir + 'images/**/*', ['img']);

	// optimize and move svg
	gulp.watch(sourceDir + 'svg/**/*', ['svg']);
});
