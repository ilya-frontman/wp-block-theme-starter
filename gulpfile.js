const gulp = require('gulp'),
	clean = require('gulp-clean'),
	concatCss = require('gulp-concat-css'),
	cssnano = require('gulp-cssnano'),
	rename = require('gulp-rename'),
	sass = require('gulp-sass')(require('sass')),
	ttf2woff = require('gulp-ttf2woff');

gulp.task('watch', function () {
	gulp.watch(['assets/scss/**/*.scss']).on(
		'change',
		gulp.series(
			'clean-shared',
			'clean-blocks',
			'clean-custom-fonts',
			'minify-shared',
			'minify-blocks',
			'minify-custom-fonts'
		)
	);
});

gulp.task('clean-shared', function () {
	return gulp
		.src('assets/css/style-shared.min.css', {
			read: false,
			allowEmpty: true,
		})
		.pipe(clean());
});

gulp.task('clean-blocks', function () {
	return gulp
		.src('assets/css/blocks/*.min.css', {
			read: false,
			allowEmpty: true,
		})
		.pipe(clean());
});

gulp.task('ttf2woff', function () {
	return gulp
		.src(['assets/fonts/*.ttf'])
		.pipe(ttf2woff())
		.pipe(gulp.dest('assets/fonts/'));
});

gulp.task('minify-shared', function () {
	return gulp
		.src('assets/scss/*.scss')
		.pipe(sass())
		.pipe(concatCss('style-shared.min.css'))
		.pipe(cssnano())
		.pipe(gulp.dest('assets/css/'));
});

gulp.task('clean-custom-fonts', function () {
	return gulp
		.src('assets/css/fonts.min.css', {
			read: false,
			allowEmpty: true,
		})
		.pipe(clean());
});

gulp.task('minify-custom-fonts', function () {
	return gulp
		.src('assets/fonts/*.scss')
		.pipe(sass())
		.pipe(concatCss('fonts.min.css'))
		.pipe(cssnano({ discardUnused: false }))
		.pipe(gulp.dest('assets/css/'));
});

gulp.task('minify-blocks', function () {
	return gulp
		.src('assets/scss/blocks/*.scss')
		.pipe(sass())
		.pipe(cssnano())
		.pipe(rename({ suffix: '.min' }))
		.pipe(gulp.dest('assets/css/blocks'));
});

gulp.task(
	'default',
	gulp.series(
		'ttf2woff',
		'clean-shared',
		'clean-blocks',
		'clean-custom-fonts',
		'minify-shared',
		'minify-blocks',
		'minify-custom-fonts'
	)
);
