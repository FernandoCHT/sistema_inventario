<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\HomeController;


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

Route::get('sales/reports_day', [ReportController::class, 'reports_day']);
Route::get('sales/reports_date', [ReportController::class, 'reports_date']);

Route::post('sales/report_results', [ReportController::class, 'reports_results']);



Route::resource('business', BusinessController::class)->names('business');

#Rutas de clientes
#-----------------------------------#
Route::resource('clients', ClientController::class)->names('clients');
#-----------------------------------#

#Rutas de categorías 
#-----------------------------------#
Route::resource('categories', CategoryController::class)->names('categories');
#-----------------------------------#

#Rutas de proveedores
#-----------------------------------#
Route::resource('providers', ProviderController::class)->names('providers');
#-----------------------------------#

#Rutas de productos
#-----------------------------------#
Route::resource('products', ProductController::class)->names('products');
Route::get('/get_products_by_id', [ProductController::class, 'get_products_by_id']);
#-----------------------------------#

#Rutas de compras
#-----------------------------------#
Route::resource('purchases', PurchaseController::class)->names('purchases');

Route::get('purchases/pdf/{purchase}', [PurchaseController::class, 'pdf']);
Route::get('/purchases/upload', [PurchaseController::class, 'upload']);
#-----------------------------------#

#Rutas de ventas
#-----------------------------------#
Route::resource('sales', SaleController::class)->names('sales');
Route::get('sales/pdf/{sale}', [SaleController::class, 'pdf']);
#-----------------------------------#

#Rutas de empresa
#-----------------------------------#
Route::get('/business', [BusinessController::class, 'index']);
Route::put('/business/update/{Business}', [BusinessController::class, 'update']);

#-----------------------------------#

Route::get('/purchases/upload/{purchase}', [PurchaseController::class, 'upload']);

Route::get('change_status/products/{product}', [ProductController::class, 'change_status']);
Route::get('change_status/purchases/{purchase}', [PurchaseController::class, 'change_status']);
Route::get('change_status/sales/{sale}', [SaleController::class, 'change_status']);


Route::post('users/{id}', [ReportController::class, 'report_results']);


Route::resource('users', UserController::class)->names('users');
Route::resource('roles', RoleController::class)->names('roles');

Route::resource('home', HomeController::class)->names('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
