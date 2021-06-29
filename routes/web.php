<?php
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\lacontrol;
use App\Http\Controllers\bookController;
use App\Http\Controllers\authorController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\UserAuth;
use App\Http\Controllers\UserController;
use Illuminate\Auth\AuthenticationException;
use Laravel\Fortify\Fortify;

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
Route::get('/home',[TemplateController::class,'index']);//

Route::get('/index.blade.php',[TemplateController::class,'index']);//
Route::get('/',[TemplateController::class,'index']);//
Route::get('/contactus.blade.php',[TemplateController::class,'contactus']);//
Route::get('/404error.blade.php',[TemplateController::class,'r404error']);//
Route::get('/405footer.blade.php',[TemplateController::class,'r405footer']);//
Route::get('/topSell',[TemplateController::class,'topSell']);//
Route::get('/aboutus.blade.php',[TemplateController::class,'aboutus']);//
Route::get('/authors.blade.php',[TemplateController::class,'authors']);//
Route::get('/authordetail.blade.php',[TemplateController::class,'authordetail']);//
Route::get('/book_detail.blade.php',[TemplateController::class,'book_detail']);
Route::get('/category_book.blade.php{id}',[TemplateController::class,'category']);
// Route::get('/category_book?idCategory={id}',[TemplateController::class,'category_id']);
Route::post('/book_detail.blade.php?idBook={id}',[TemplateController::class,'updateRate']);
//Auth
Route::get('redirects',[TemplateController::class,'getAuth']);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');


//Using veritification email
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::resource('book','bookController');
Route::resource('author','authorController');
Route::resource('category','categoryController');
Route::resource('template','templateController');
Route::post('book/search',[bookController::class,'search']);
Route::post('author/search',[authorController::class,'search']);
Route::post('category/search',[categoryController::class,'search']);
//Send email form user to admin
Route::get('/email', 'EmailController@create');
Route::post('/email', 'EmailController@sendEmail')->name('send.email');
//new sesstion


//Search
Route::get('/search',[TemplateController::class,'new_book']);
//Cart

Route::get('/cart/add/{id}',[cartController::class,'addItem']);

Route::get('/cart.blade.php',[cartController::class,'index']);
Route::get('/cart/remove/{id}',[cartController::class,'removeItem']);
Route::get('/cart/increase/{id}',[cartController::class,'inceaseItem']);
Route::get('/cart/decrease/{id}',[cartController::class,'deceaseItem']);
//add to cart to historu
Route::get('/test', function () {
    return App\Models\User::with('orders')->get();
});
//check out
Route::get('/checkout',[cartController::class,'checkout']);
//History cart
Route::get('/historycart',[cartController::class,'historycart']);
//History detail
Route::get('/historydetail{id}',[cartController::class,'historydetail']);
//profile
Route::get('/profile{id}',[TemplateController::class,'profileUser']);
Route::post('/edit',[TemplateController::class,'updateProfile']);
//logout
Route::get('/logout',[TemplateController::class,'logoutUser']);


//ManageUser
Route::get('/manageusers',[UserController::class,'index']);
Route::get('/getuser/{id}',[UserController::class,'getUser']);
Route::post('/updateuser',[UserController::class,'updateUser']);
Route::get('/deleteuser/{id}',[UserController::class,'deleteUser']);
Route::get('/searchUser',[UserController::class,'searchUsers']);
//Manage cart
Route::get('/managecarts',[cartController::class,'manageCarts']);
Route::get('/detailorder/{id}',[cartController::class,'detailOrder']);
Route::post('/updateorder',[cartController::class,'updateorder']);
Route::post('/updateorderuser',[cartController::class,'updateorderuser']);
Route::get('/searchorder',[cartController::class,'searchOrders']);

//sort in manageCart
Route::get('/sortByPending',[cartController::class,'sortByPending']);
Route::get('/sortByTrasport',[cartController::class,'sortByTrasport']);
Route::get('/sortByConfirm',[cartController::class,'sortByConfirm']);
Route::get('/sortByCancel',[cartController::class,'sortByCancel']);




