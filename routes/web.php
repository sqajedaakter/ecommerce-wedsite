<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

// Route::get('/', function () {
//     return view('welcome');
// });
//FrontendController Start
Route::get('/', [FrontendController::class, 'index']);
Route::get('/category/product/', [FrontendController::class, 'ProductCategoryPage']);
Route::post('add/to/cart/{id}', [FrontendController::class, 'addToCart']);

Route::get('/cart/products', [FrontendController::class, 'cartProducts']);
Route::get('/delete/product/from/cart/{id}', [FrontendController::class, 'deletecartProducts']);
Route::post('/update/product/from/cart/{id}', [FrontendController::class, 'updatecartProducts']);
Route::get('/registration', [FrontendController::class, 'registration']);
Route::get('/shipping', [FrontendController::class, 'shipping']);
Route::post('/shipping/store', [FrontendController::class, 'shippingStore']);


//FrontendController End


//AdminController Start
Route::get('/admin/login', [AdminController::class, 'loginview']);
Route::post('/admin/login', [AdminController::class, 'login']);
Route::group(['middleware' => 'admin'], function () {

    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard']);
    Route::get('/admin/logout', [AdminController::class, 'adminLogout']);
    //AdminController End




    //categoriesController Start
    Route::resource('/category', CategoryController::class);
    //categoriesController End



    //ProductsController Start
    Route::get('/product/manage', [ProductController::class, 'ProductManage']);
    Route::get('/product/create', [ProductController::class, 'ProductCreate']);
    Route::post('/product/store', [ProductController::class, 'ProductStore']);
    Route::get('/product/edit/{id}', [ProductController::class, 'ProductEdit']);
    Route::post('/product/update/{id}', [ProductController::class, 'ProductUpdate']);
    Route::get('/product/delete/{id}', [ProductController::class, 'ProductDeleted']);

    //ProductsController End


    //brandController Start
    Route::resource('/brands', BrandController::class);
    //brandController End





    //productController Start



    //productController End
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
