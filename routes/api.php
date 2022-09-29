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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

#Admin

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
    Route::put('update', 'UpdateSupplierController');
    Route::delete('delete', 'DeleteSupplierController');
});

#customers
Route::group(['prefix' => 'customers', 'namespace' => 'App\Http\Controllers\Customers', 'as' => 'customers.'], function () {
    Route::get('list', 'GetAllCustomersController');
    Route::post('create', 'CreateCustomerController');
    Route::put('update', 'UpdateCustomerController');
    Route::delete('delete', 'DeleteCustomerController');
});

#products
Route::group(['prefix' => 'products', 'namespace' => 'App\Http\Controllers\Products', 'as' => 'products.'], function () {
    Route::get('list', 'GetAllProductsController');
    Route::post('create', 'CreateProductController');
    Route::put('update', 'UpdateProductController');
    Route::delete('delete', 'DeleteProductController');
});

#detail_products
Route::group(['prefix' => 'detail_products', 'namespace' => 'App\Http\Controllers\DetailProducts', 'as' => 'detail_products.'], function () {
    // Route::get('list', 'GetAllProductsController');
    Route::post('create', 'CreateDetailProductController');
    Route::put('update', 'UpdateDetailProductController');
    Route::delete('delete', 'DeleteDetailProductController');
});

#vouchers
Route::group(['prefix' => 'vouchers', 'namespace' => 'App\Http\Controllers\Vouchers', 'as' => 'vouchers.'], function () {
    Route::get('list', 'GetAllVouchersController');
    Route::post('create', 'CreateVoucherController');
    Route::put('update', 'UpdateVoucherController');
    Route::delete('delete', 'DeleteVoucherController');
});

#slides
Route::group(['prefix' => 'slides', 'namespace' => 'App\Http\Controllers\Slides', 'as' => 'slides.'], function () {
    Route::get('list', 'GetAllSlidesController');
    Route::post('create', 'CreateSlideController');
    Route::put('update', 'UpdateSlideController');
    Route::delete('delete', 'DeleteSlideController');
});

#colors
Route::group(['prefix' => 'colors', 'namespace' => 'App\Http\Controllers\Colors', 'as' => 'colors.'], function () {
    Route::get('list', 'GetAllColorsController');
});

#sizes
Route::group(['prefix' => 'sizes', 'namespace' => 'App\Http\Controllers\Sizes', 'as' => 'sizes.'], function () {
    Route::get('list', 'GetAllSizesController');
});


#upload image
Route::group(['prefix' => 'uploads', 'namespace' => 'App\Http\Controllers\Uploads', 'as' => 'uploads.'], function () {
    Route::post('image', 'UploadImageController');
});

#clients
Route::group(['prefix' => 'clients', 'namespace' => 'App\Http\Controllers\Clients', 'as' => 'clients.'], function () {
    Route::get('list_product_group', 'GetAllProductGroupController');
    Route::get('category/{id}', 'GetProductByCategoryIdController');
    Route::get('product/{id}', 'GetProductByIdController');
    Route::get('details/list', 'GetAllDetailProductController');
    Route::get('search/{key_word}', 'SearchProductByKeyWordController');
    // Route::post('check_out', 'CheckOutController');
    Route::group(['prefix' => 'orders', 'namespace' => 'Orders', 'as' => 'orders.'], function () {
        Route::post('create', 'CreateOrderController');
    });
});

#token
Route::group(['prefix' => 'authentications', 'namespace' => 'App\Http\Controllers\Authentications', 'as' => 'authentications.'], function () {
    Route::post('login', 'LoginController');
    Route::post('change_password', 'ChangePasswordController');
});
