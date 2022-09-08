<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

#categories
Route::group(['prefix' => 'categories', 'namespace' => 'App\Http\Controllers\Categories', 'as' => 'categories.'], function () {
    Route::get('list', 'GetAllCategoriesController');
    Route::post('create', 'CreateCategoryController');
    Route::put('update', 'UpdateCategoryController');
    Route::delete('delete', 'DeleteCategoryController');
});

#accounts
Route::group(['prefix' => 'accounts', 'namespace' => 'App\Http\Controllers\Accounts', 'as' => 'accounts.'], function () {
    Route::get('list', 'GetAllAccountsController');
    Route::post('create', 'CreateAccountController');
    Route::put('update', 'UpdateAccountController');
    Route::delete('delete', 'DeleteAccountController');
});

#suppliers
Route::group(['prefix' => 'suppliers', 'namespace' => 'App\Http\Controllers\Suppliers', 'as' => 'suppliers.'], function () {
    Route::get('list', 'GetAllSuppliersController');
    Route::post('create', 'CreateSupplierController');
    // Route::put('update', 'UpdateSupplierController');
    // Route::delete('delete', 'DeleteSupplierController');
});
