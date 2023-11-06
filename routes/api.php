<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
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
Route::group(
    ['prefix' => 'categories', 'namespace' => 'App\Http\Controllers\Categories', 'as' => 'categories.'],
    function () {
        Route::get('list', 'GetAllCategoriesController');
        Route::get('detail/{category_id}', 'GetDetailCategoryController');
        Route::post('create', 'CreateCategoryController')->middleware('jwt.auth');
        Route::put('update', 'UpdateCategoryController')->middleware('jwt.auth');
        Route::delete('delete', 'DeleteCategoryController')->middleware('jwt.auth');
    }
);

#accounts
Route::group(
    ['prefix' => 'accounts', 'namespace' => 'App\Http\Controllers\Accounts', 'as' => 'accounts.',],
    function () {
        Route::get('list', 'GetAllAccountsController');
        Route::post('create', 'CreateAccountController');
        Route::put('update', 'UpdateAccountController')->middleware('jwt.auth');
        Route::delete('delete', 'DeleteAccountController')->middleware('jwt.auth');
    }
);

#suppliers
Route::group(
    ['prefix' => 'suppliers', 'namespace' => 'App\Http\Controllers\Suppliers', 'as' => 'suppliers.'],
    function () {
        Route::get('list', 'GetAllSuppliersController');
        Route::post('create', 'CreateSupplierController')->middleware('jwt.auth');
        Route::put('update', 'UpdateSupplierController')->middleware('jwt.auth');
        Route::delete('delete', 'DeleteSupplierController')->middleware('jwt.auth');
    }
);

#customers
Route::group(
    ['prefix' => 'customers', 'namespace' => 'App\Http\Controllers\Customers', 'as' => 'customers.', 'middleware' => 'jwt.auth'],
    function () {
        Route::get('list', 'GetAllCustomersController');
        Route::post('create', 'CreateCustomerController');
        Route::put('update', 'UpdateCustomerController');
        Route::delete('delete', 'DeleteCustomerController');
    }
);

#products
Route::group(['prefix' => 'products', 'namespace' => 'App\Http\Controllers\Products', 'as' => 'products.'], function () {
    Route::get('list', 'GetAllProductsController');
    Route::post('create', 'CreateProductController')->middleware('jwt.auth');
    Route::put('update', 'UpdateProductController')->middleware('jwt.auth');
    Route::delete('delete', 'DeleteProductController')->middleware('jwt.auth');
    Route::delete('delete_all', 'DeleteAllProductController')->middleware('jwt.auth');
});

#detail_products
Route::group(
    ['prefix' => 'detail_products', 'namespace' => 'App\Http\Controllers\DetailProducts', 'as' => 'detail_products.'],
    function () {
        // Route::get('list', 'GetAllDetailProductController');
        Route::post('create', 'CreateDetailProductController')->middleware('jwt.auth');
        Route::put('update', 'UpdateDetailProductController')->middleware('jwt.auth');
        Route::delete('delete', 'DeleteDetailProductController')->middleware('jwt.auth');
    }
);

#vouchers
Route::group(['prefix' => 'vouchers', 'namespace' => 'App\Http\Controllers\Vouchers', 'as' => 'vouchers.'], function () {
    Route::get('list', 'GetAllVouchersController');
    Route::post('create', 'CreateVoucherController')->middleware('jwt.auth');
    Route::put('update', 'UpdateVoucherController')->middleware('jwt.auth');
    Route::delete('delete', 'DeleteVoucherController')->middleware('jwt.auth');
});

#slides
Route::group(['prefix' => 'slides', 'namespace' => 'App\Http\Controllers\Slides', 'as' => 'slides.'], function () {
    Route::get('list', 'GetAllSlidesController');
    Route::post('create', 'CreateSlideController')->middleware('jwt.auth');
    Route::put('update', 'UpdateSlideController')->middleware('jwt.auth');
    Route::delete('delete', 'DeleteSlideController')->middleware('jwt.auth');
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

#order
Route::group(['prefix' => 'orders', 'namespace' => 'App\Http\Controllers\Orders', 'as' => 'orders.'], function () {
    Route::get('list', 'GetListOrderController');
    Route::get('details/{id}', 'GetOrderByIdController');
    Route::put('update', 'UpdateOrderController')->middleware('jwt.auth');
    Route::delete('delete', 'DeleteOrderController')->middleware('jwt.auth');
    Route::post('search', 'SearchOrderController');
});

#clients
Route::group(['prefix' => 'clients', 'namespace' => 'App\Http\Controllers\Clients', 'as' => 'clients.'], function () {
    Route::get('list_product_group', 'GetAllProductGroupController');
    Route::get('category/{id}', 'GetProductByCategoryIdController');
    Route::get('product/{id}', 'GetProductByIdController');
    Route::get('details/list', 'GetAllDetailProductController');
    Route::get('search/{key_word}', 'SearchProductByKeyWordController');
    Route::group(['prefix' => 'orders', 'namespace' => 'Orders', 'as' => 'orders.'], function () {
        Route::post('create', 'CreateOrderController');
    });
    Route::put('info/update', 'UpdateInfoController')->middleware('jwt.auth');
    #checkout
    Route::group(['prefix' => 'checkouts', 'namespace' => 'Checkouts', 'as' => 'checkouts.'], function () {
        Route::post('/vnpay', 'CheckOutVnpayController');
    });
});

#auth
Route::group(
    ['prefix' => 'authentications', 'namespace' => 'App\Http\Controllers\Authentications', 'as' => 'authentications.'],
    function () {
        Route::post('login', 'LoginController');
        Route::post('logout', 'LogoutController')->middleware('jwt.auth');
        Route::post('change_password', 'ChangePasswordController')->middleware('jwt.auth');
        Route::group(['prefix' => 'socials', 'namespace' => 'Socials', 'as' => 'socials.'], function () {
            Route::post('login', 'SocialLoginController');
        });
        Route::post('reset_password', 'ResetPasswordController');
    }
);

#comments
Route::group(['prefix' => 'comments', 'namespace' => 'App\Http\Controllers\Comments', 'as' => 'comments.'], function () {
    Route::get('list', 'GetAllCommentsController');
    Route::post('create', 'CreateCommentController')->middleware('jwt.auth');
    Route::put('update', 'UpdateCommentController')->middleware('jwt.auth');
    Route::delete('delete', 'DeleteCommentController')->middleware('jwt.auth');
});

#shipments
Route::group(['prefix' => 'shipments', 'namespace' => 'App\Http\Controllers\Shipments', 'as' => 'shipments.'], function () {
    Route::get('list', 'GetAllShipmentController');
    Route::post('create', 'CreateShipmentController')->middleware('jwt.auth');
    Route::put('update', 'UpdateShipmentController')->middleware('jwt.auth');
    Route::delete('delete', 'DeleteShipmentController')->middleware('jwt.auth');
});

#statistics
Route::group(['prefix' => 'statistics', 'namespace' => 'App\Http\Controllers\Statistics', 'as' => 'statistics.'], function () {
    Route::get('revenue', 'GetRevenueByMonthController');
});

Route::group(['prefix' => 'execute'], function () {
    Route::get('/migrate', function () {
        Artisan::call('migrate:refresh --seed');
    });
    // Route::get('/queue', function () {
    //     Artisan::call('queue:work');
    // });
});
