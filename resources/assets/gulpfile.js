var gulp = require('gulp'),
    sass = require('gulp-sass'),
    browserSync = require('browser-sync'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglifyjs'),
    cssnano = require('gulp-cssnano'),
    rename = require('gulp-rename'),
    imagemin = require('gulp-imagemin'),
    filesize = require('gulp-size'),
    image = require('gulp-image'),
    cache = require('gulp-cache'),
    pngquant = require('imagemin-pngquant'),
    del = require('del'),
    cssconcat = require('gulp-concat-css'),
    autoprefixer = require('gulp-autoprefixer'),
    jade = require('gulp-jade');


// gulp jade
gulp.task('jade', function() {
    gulp.src('app/jade/*.jade')
        .pipe(jade({
            pretty: true
        }))
        .on('error', console.log) // Если есть ошибки, выводим и продолжаем
        .pipe(gulp.dest('app/')); // Записываем собранные файлы
});

/*	sass => css, добавление префиксов, вывод в css */
gulp.task('sass', function () {
    return gulp.src('app/sass/*.+(sass|scss)')
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer(['last 15 versions', '> 1%', 'ie 8', 'ie 7'], {cascade: true}))
        .pipe(gulp.dest('app/css'))
        .pipe(browserSync.reload({stream: true}))
});

/*  сборка CSS библиотек и минификация    */
gulp.task('css-libs', function () {
    return gulp.src(
        'app/css/vendor/*.css'
    ) // Выбираем файл для сборки
        .pipe(cssconcat('./libs.min.css'))
        .pipe(filesize({
            title: 'CSS->',
            showFiles: true
        }))
        .pipe(gulp.dest('app/css')); // Выгружаем в папку app/css
});

/*  сборка, сжатие и минификация скриптов   */
gulp.task('scripts', function () {
    return gulp.src([ // Берем все необходимые библиотеки

    ])
        .pipe(concat('libs.min.js'))
        .pipe(uglify())
        .pipe(filesize({
            title: 'JS-libs.min ->',
            showFiles: true
        }))
        .pipe(gulp.dest('app/js'));
});

/*	Удаляем папку dist перед сборкой, не было дублей	*/
gulp.task('clean', function () {
    return del.sync('dist');
});

/*	Оптимизация изображений	*/
gulp.task('img', function () {
    gulp.src('app/img/**/*')
        .pipe(cache(image({
            pngquant: true,
            optipng: false,
            zopflipng: true,
            advpng: true,
            jpegRecompress: false,
            jpegoptim: true,
            mozjpeg: true,
            gifsicle: true,
            svgo: true
        })))
        .pipe(gulp.dest('dist/img'));
});

/*	Livereload	*/
gulp.task('browser-sync', function () {
    browserSync({
        server: {
            baseDir: 'app'
        },
        notify: false
    });
});

/*  Синхронизация   */
gulp.task('watch', ['browser-sync', 'jade', 'css-libs', 'scripts'], function () {
    gulp.watch('app/sass/**/*.+(sass|scss)', ['sass']);
    gulp.watch('app/css/**/*.css');
    gulp.watch('app/css/libs/*.sass', ['css-libs']);
    gulp.watch('app/*.html', browserSync.reload);
    gulp.watch('app/jade/**/*.jade', ['jade']);
    gulp.watch('app/js/*.js', browserSync.reload);
});

/*	Сборка проекта	*/
gulp.task('build', ['clean', 'img', 'jade', 'sass', 'scripts'], function () {

    // Переносим библиотеки в продакшен
    var buildCss = gulp.src([
        'app/css/main.css',
        'app/css/media.css',
        'app/css/libs.min.css'
    ])
        .pipe(cssnano()) // Минификация
        .pipe(filesize({
            showFiles: true
        })) // Размер файла
        .pipe(gulp.dest('dist/css'));

    // Переносим шрифты в продакшен
    var buildFonts = gulp.src('app/fonts/**/*')
        .pipe(gulp.dest('dist/fonts'));

    // Переносим стандарт библиотеки
    var buildLibsJs = gulp.src('app/libs/**/*')
        .pipe(gulp.dest('dist/libs'));
    // Переносим скрипты в продакшен
    var buildJs = gulp.src('app/js/**/*')
        .pipe(gulp.dest('dist/js'));
    // Переносим HTML в продакшен
    var buildHtml = gulp.src('app/*.html')
        .pipe(gulp.dest('dist'));
});

/*очистка кеша*/
gulp.task('clear', function () {
    return cache.clearAll();
});

gulp.task('default', ['watch']);