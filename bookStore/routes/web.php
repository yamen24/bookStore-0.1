<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FrontendController;

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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/contact-page', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Auth::routes();

// FrontendController
Route::get('/' , [FrontendController::class , 'homepage']);
Route::get('product/details/{slug}' , [FrontendController::class , 'productdetails'])->name('productdetails');

// Customer Login Registration & Home Page
Route::get('login/registration' , [FrontendController::class , 'loginregistration'])->name('loginregistration');
Route::post('customer/registration' , [FrontendController::class , 'customerregistration'])->name('customer.registration');
Route::get('customer/loginpage' , [FrontendController::class , 'customerloginpage'])->name('customer.loginpage');

//BookController Router
Route::resource('book' , BookController::class)->only(['index', 'store', 'edit', 'update' , 'destroy']);
Route::get('books-all' , [BookController::class , 'bookviewall'])->name('book.viewall');

//CartController Router
Route::post('cart/store' , [CartController::class , 'cartstore'])->name('cart.store');
Route::get('card' , [CartController::class , 'cardindex'])->name('card.index');
Route::post('cart/destroy/{cart_id}' , [CartController::class , 'cartdestroy'])->name('cart.destroy');
Route::get('checkout' , [CartController::class , 'checkout'])->name('checkout');
Route::post('checkoutpost' , [CartController::class , 'checkoutpost'])->name('checkoutpost');

//OrderController Router
Route::get('order-page' , [OrderController::class , 'orderpage'])->name('order.index');
Route::get('order-delete/{id}' , [OrderController::class , 'orderdelete'])->name('order.delete');
