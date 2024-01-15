<?php

use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\QuizController;
use Illuminate\Http\Request;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Covid19Controller;
use App\Http\Controllers\ProductController;
use App\Models\Staff;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/page1', function () {
    return "<h1>This is page1!!!</h1>";
});

Route::get('/page2', function () {
    return "<h1>Domain Expantion!!!</h1>";
});

Route::get('/bootstrap', function () {
    return view('bootstrap');
});

Route::get("/blog/{id}", function($id) {
    return "<h1>This is blog page : {$id} </h1>" ;
});

Route::get( "/blog/{id}/edit" , function($id) {
    return "<h1>This is blog page : {$id} for edit</h1>" ;
});

Route::get("/hello", function () {	
    return view("hello");
});

 Route::get('/hello', function () {
    return view('hello');
 });

Route::get('/greeting', function () {

	$name = 'James';
$last_name = 'Mars';

return view('greeting', compact('name','last_name') );
});

Route::get( "/gallery" , function(){
	$ant = "https://cdn3.movieweb.com/i/article/Oi0Q2edcVVhs4p1UivwyyseezFkHsq/1107:50/Ant-Man-3-Talks-Michael-Douglas-Update.jpg";
$bird = "https://images.indianexpress.com/2021/03/falcon-anthony-mackie-1200.jpg"; 
$cat = "http://www.onyxtruth.com/wp-content/uploads/2017/06/black-panther-movie-onyx-truth.jpg";
$god = "https://www.blackoutx.com/wp-content/uploads/2021/04/Thor.jpg"; 
$spider = "https://insomniac.games/wp-content/uploads/2018/09/Swing_Day_Legal.jpg"; 

return view("test/index", compact("ant","bird","cat","god","spider") );
});

Route::get("/gallery/ant", function () {
    $ant = "https://cdn3.movieweb.com/i/article/Oi0Q2edcVVhs4p1UivwyyseezFkHsq/1107:50/Ant-Man-3-Talks-Michael-Douglas-Update.jpg";
    return view("test/ant", compact("ant"));
});

Route::get("/gallery/bird", function () {
    $bird = "https://images.indianexpress.com/2021/03/falcon-anthony-mackie-1200.jpg";
    return view("test/bird", compact("bird"));
});

Route::get("/gallery/cat", function () {
    $cat = "http://www.onyxtruth.com/wp-content/uploads/2017/06/black-panther-movie-onyx-truth.jpg";
    return view("test/cat", compact("cat"));
});

Route::middleware(['auth', 'role:admin,teacher,student'])->group(function () {
Route::get("/teacher" , function (){
	return view("teacher");
});
});


Route::get("/student" , function (){
	return view("student");
})->middleware('auth');


Route::get("/theme" , function (){
	return view("theme");
});

// Route Template Inheritance
Route::get("/teacher/inheritance", function () {
    return view("teacher-inheritance");
});
Route::get("/student/inheritance", function () {
    return view("student-inheritance");
});

// Route Template Component
Route::get("/teacher/component", function () {
    return view("teacher-component");
});
Route::get("/student/component", function () {
    return view("student-component");
});

Route::get('/tables', function () {
    return view('tables');
});

Route::get("/myprofile/create",[ MyProfileController::class , "create" ]);

Route::get("/myprofile/{id}/edit", [ MyProfileController::class , "edit" ] );

Route::get("/myprofile/{id}", [ MyProfileController::class , "show" ]);

Route::get( "/coronavirus" ,[ MyProfileController::class , "coronavirus" ] );


// qiuz_2
// Route::get('study-question', function () {
//     $questions = json_decode(file_get_contents("https://raw.githubusercontent.com/arc6828/cs/master/json/sci-mbti.json"));    
//     return view("study/question", compact('questions'));
// })->name('study-question');

// Route::post('study-match', function (Request $request) {
//     $summary = [ "CS" => 0, "IT" => 0, "DISE" => 0, "HE" => 0, "NU" => 0, "FB" => 0, "SET" => 0, "OHS" => 0 ];
//     $majors = [
//         "CS" => "วิทยาการคอมพิวเตอร์ (CS)",
//         "IT" => "เทคโนโลยีสารสนเทศ (IT)",
//         "DISE" => "นวัตกรรมดิจิทัลและวิศวกรรมซอฟต์แวร์ (DISE)",
//         "HE" => "คหกรรมศาสตร์ (HE)",
//         "NU" => "โภชนาการและการกำหนดอาหาร (NU)",
//         "FB" => "นวัตกรรมอาหารและเครื่องดื่มเพื่อสุขภาพ (FB)",
//         "SET" => "วิทยาศาสตร์และเทคโนโลยีสิ่งแวดล้อม (SET)",
//         "OHS" => "อาชีวอนามัยและความปลอดภัย (OHS)",
//     ];
//     foreach ($_POST as $key => $value) {
//         if(!str_contains($key, "flexRadioDefault")) continue;
//         [$code, $answer] = explode("-", $value);
//         if ($answer == "yes") {            // if-yes
//             $summary[$code] = isset($summary[$code]) ? $summary[$code] + 1 : 1;
//         } else {            // if-no
//             $summary[$code] = isset($summary[$code]) ? $summary[$code] + 0 : 0;
//         }
//     }
//     $codes = array_keys($summary);
//     $values = array_values($summary);

//     return view("study/match", compact('codes','values','majors'));
// })->name('study-match');

Route::get("study-question", [ QuizController::class, "question" ])->name("study-question");
Route::post("study-match", [ QuizController::class, "match" ])->name("study-match");
Route::get('/covid19', [ Covid19Controller::class,"index" ]);

// Route::resource('/product', ProductController::class );
Route::get("/product", [ProductController::class, "index"])->name('product.index');
Route::get("/product/create", [ProductController::class, "create"])->name('product.create');
Route::post("/product", [ProductController::class, "store"])->name('product.store');
Route::get('/product/{id}', [ProductController::class, "show"])->name('product.show');
Route::get("/product/{id}/edit", [ProductController::class, "edit"])->name('product.edit');
Route::patch("/product/{id}", [ProductController::class, "update"])->name('product.update');
Route::delete("/product/{id}", [ProductController::class, "destroy"])->name('product.destroy');

// Route::resource('/staff', StaffController::class );
Route::get("/staff", [StaffController::class, "index"])->name('staff.index');
Route::get("/staff/create", [StaffController::class, "create"])->name('staff.create');
Route::post("/staff", [StaffController::class, "store"])->name('staff.store');
Route::get('/staff/{id}', [StaffController::class, "show"])->name('staff.show');
Route::get("/staff/{id}/edit", [StaffController::class, "edit"])->name('staff.edit');
Route::patch("/staff/{id}", [StaffController::class, "update"])->name('staff.update');
Route::delete("/staff/{id}", [StaffController::class, "destroy"])->name('staff.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

