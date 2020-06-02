const { src, dest, parallel } = require('gulp');
const concat = require('gulp-concat'); 
const uglify = require('gulp-uglify');
const minifyCSS = require('gulp-csso');
var concatCss = require('gulp-concat-css');

function js(){
  return src(['resources/assets/vendor/jquery/jquery.min.js','resources/assets/vendor/bootstrap/js/bootstrap.bundle.min.js',
    'resources/assets/vendor/bootstrap/js/bootstrap.min.js','resources/assets/vendor/jquery-easing/jquery.easing.min.js',
    'resources/assets/js/sb-admin-2.min.js','resources/assets/vendor/datatables/jquery.dataTables.min.js',
    'resources/assets/vendor/datatables/dataTables.bootstrap4.min.js','resources/assets/js/demo/datatables-demo.js'])
    
    .pipe(concat('libs.js'))
    .pipe(uglify())
    .pipe(dest('public/js')
  );
};


function css() {
  return src(['resources/assets/vendor/fontawesome-free/css/all.min.css','resources/assets/css/sb-admin-2.min.css',
    'resources/assets/vendor/datatables/dataTables.bootstrap4.min.css'])
    //.pipe(less())
    .pipe(concatCss("libs.css"))
    .pipe(dest('public/css'))
}

exports.js = js;
exports.css = css;
exports.default = parallel( css, js);

//File path variables

//const files = {
  //scssPath: 'app/scss/**/*.scss',
  //jsPath:'app/js/**/*.js'
//}

/*function jsTask(){

  return src(files.jsPath)
      .pipe(concat('all.js'))
      .pipe(uglify())
      .pipe(dest('dist')
    );

}
*/