var gulp = require('gulp');//asocia el directiorio gulp a la variable gulp
var sass = require('gulp-sass');//asocia el directioro gulp-sass a la variable sass


//tarea compilación archivo css
gulp.task('sass', function () {
  return gulp.src('scss/*.scss')//origen del scss
    .pipe(sass()) //compilación
    .pipe(gulp.dest('./')); //destino del css
});
//tarea automatización watch
gulp.task('watch', function () {
  gulp.watch('scss/*.scss', ['sass']);
} );

//tarea por defecto
gulp.task('default', function(){
    //console.log('Hola mundo');
    gulp.watch('scss/*.scss', ['watch']);
});