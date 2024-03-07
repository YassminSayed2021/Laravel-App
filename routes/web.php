<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShippedController;
use App\Http\Middleware\CheckAge;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::get('/test', function () {
    echo "Hello World";
});

Route::get('categories/mobile', function () {
    return 'Hello from Mobile';
});

// Route::get('/user/edit/{name}', function ($name) {
//     return "<h2>Updated User $name</h2>";
// });

// Route::get('/user/delete/{id}', function ($id) {
//     return "<h2>Deleted User $id</h2>";
// });

Route::get('user/{name}/profile/{id}', function ($name, $id) {
    return "User $name profile $id";
});

Route::get('/car/{id?}/{name}', function ($id = 0, $name) {  //id is optional parameter
    return 'The id is: ' . $id . " " . $name;
})->where(['id' => '[0-9]+', 'name' => '[a-zA-Z]+']);  //Constraints to parmeters


Route::prefix('cars')->group(function () {
    Route::get('bmw', function () {
        return 'BMW page';
    });
    Route::get('mercedes', function () {
        return 'Mercedes page';
    });
});

// Route::fallback(function () {
//     return redirect('/');
// });

// Route::get('/getform', function () {
//     return view('form');
// });
Route::view('/getform', 'form');

//Route::view('/gethome', 'home');
//alias(named route)

Route::post('receive', function () {
    return view('form2');
})->name('receive');

Route::get('/gethome', [HomeController::class, 'home'])->name('home');

Route::post('/gethome', [HomeController::class, 'home'])->name('home');

Route::get('/contact/{age}', [HomeController::class, 'contact'])->name('contact')->middleware(CheckAge::class);
Route::get('/about/{role}', [HomeController::class, 'about'])->name('about')->middleware(CheckRole::class);

//Customer Controller
Route::get('/data', [CustomerController::class, 'custdata']);
Route::get('/customers', [CustomerController::class, 'index'])->name('customers');
Route::get('/custCreate', [CustomerController::class, 'create']);
Route::post('/custStore', [CustomerController::class, 'store'])->name('custStore');

Route::get("edit/{id}", [CustomerController::class, "edit"])->name('editCust');
Route::post('/update/{id}', [CustomerController::class, "update"])->name('update');

Route::get('/show/{id}', [CustomerController::class, 'show']);
Route::get('/delete/{id}', [CustomerController::class, 'deleteCust']);
Route::delete('/delete', [CustomerController::class, 'destroy'])->name('delete');


Route::get('/test', TestController::class);

//Photo Controller
Route::resource('/photos', PhotoController::class);
//Route::post('/photos/store', [PhotoController::class, 'store'])->name('store');


//User Controller

//Route::resource('users', UserController::class);
Route::get('/users/phone', [UserController::class, 'index']);
Route::get('/user/data', [UserController::class, 'user_phone']);
Route::get('/admin', function () {
    return view('admin.users');
})->middleware('auth')->name('users');

Route::get('/categories', function () {
    return view('admin.categories');
})->name('categories');


//Orders Controller

Route::get('/orders', [OrdersController::class, 'cust_orders']);

Route::get('/customer_order', [OrdersController::class, 'order']);

//Role Controller

Route::get('/user_roles', [RoleController::class, 'user_roles']);
Route::get('/role_users', [RoleController::class, 'role_users']);

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified')
    ->name('home');

//Post Controller
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/postCreate', [PostController::class, 'create'])->middleware('auth');
Route::post('/postStore', [PostController::class, 'store'])->name('postStore');

Route::get("post/edit/{id}", [PostController::class, "edit"])->name('editPost');
Route::post('post/update/{id}', [PostController::class, "update"])->name('updatePost');

Route::get('post/show/{id}', [PostController::class, 'show']);
Route::get('post/delete/{id}', [PostController::class, 'deletePost']);
Route::delete('post/delete', [PostController::class, 'destroy'])->name('deletePost');
Route::get('/user/posts/{id}', [PostController::class, 'user_posts']);

//sendMail
Route::get('/send_mail', [ContactController::class, 'send_mail']);
