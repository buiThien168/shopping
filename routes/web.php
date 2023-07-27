<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminSliderController;
use App\Http\Controllers\AdminSettingController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminRolesController;
use App\Http\Controllers\AdminPermissionController;
use App\Http\Controllers\User\CategoryUserController;
use App\Http\Controllers\User\Product_detailUserController;
use App\Http\Controllers\User\Product_cartController;
//
use App\Http\Controllers\User\UserController;
//user
Route::prefix('/')->group(function () {
    Route::prefix('/')->group(function () {
        Route::get('/', [UserController::class, 'loginUser'])->name('user.login');
        Route::post('/', [UserController::class, 'postLoginUser']);
        Route::get('/home', [UserController::class, 'home'])->name('home.user')->middleware('auth');
        Route::get('/logout', [UserController::class, 'logout'])->name('logout.user');
        Route::get('/category/{id}', [CategoryUserController::class, 'index'])->name('category.user');
        Route::post('/store', [Product_detailUserController::class, 'store'])->name('order.store');
        Route::get('/product_detail/{id}', [Product_detailUserController::class, 'index'])->name('product_detail.user');
        Route::get('/cart', [Product_cartController::class, 'index'])->name('cart.user');
        Route::get('/delete/{id}', [Product_cartController::class, 'delete'])->name('cart.delete.user');
        Route::get('/update', [Product_cartController::class, 'update'])->name('cart.update.user');
        Route::get('/checkout', [Product_cartController::class, 'checkout'])->name('cart.checkout.user');
    });
});
//admin
Route::prefix('admin')->group(function () {
    Route::prefix('/')->group(function () {
        Route::get('/', [AdminController::class, 'loginAdmin'])->name('admin.login');
        Route::post('/', [AdminController::class, 'postLoginAdmin']);
        Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
        Route::get('/homeUser', [AdminController::class, 'homeUser'])->name('admin.home');
        // Route::get('/home', function () {
        //     return view('admins.home');
        // });
    });
    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('categories.index')->middleware('can:category-list');
        Route::get('/create', [CategoryController::class, 'create'])->name('categories.create')->middleware('can:category-add');
        Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit')->middleware('can:category-edit');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete')->middleware('can:category-delete');
    });
    Route::prefix('menus')->group(function () {
        Route::get('/', [MenuController::class, 'index'])->name('menus.index')->middleware('can:menu-list');
        Route::get('/create', [MenuController::class, 'create'])->name('menus.create')->middleware('can:menu-add');
        Route::post('/store', [MenuController::class, 'store'])->name('menus.store');
        Route::get('/edit/{id}', [MenuController::class, 'edit'])->name('menus.edit')->middleware('can:menu-edit');
        Route::post('/update/{id}', [MenuController::class, 'update'])->name('menus.update');
        Route::get('/delete/{id}', [MenuController::class, 'delete'])->name('menus.delete');
    });
    Route::prefix('product')->group(function () {
        Route::get('/', [AdminProductController::class, 'index'])->name('product.index')->middleware('can:product-list');
        Route::get('/create', [AdminProductController::class, 'create'])->name('product.create')->middleware('can:product-add');
        Route::post('/store', [AdminProductController::class, 'store'])->name('product.store');
        Route::get('/edit/{id}', [AdminProductController::class, 'edit'])->name('product.edit')->middleware('can:product-edit');
        Route::post('/update/{id}', [AdminProductController::class, 'update'])->name('product.update');
        Route::get('/delete/{id}', [AdminProductController::class, 'delete'])->name('product.delete')->middleware('can:product-delete');
    });
    Route::prefix('slider')->group(function () {
        Route::get('/', [AdminSliderController::class, 'index'])->name('slider.index')->middleware('can:product-list');
        Route::get('/create', [AdminSliderController::class, 'create'])->name('slider.create')->middleware('can:product-add');
        Route::post('/store', [AdminSliderController::class, 'store'])->name('slider.store');
        Route::get('/edit/{id}', [AdminSliderController::class, 'edit'])->name('slider.edit')->middleware('can:product-edit');
        Route::post('/update/{id}', [AdminSliderController::class, 'update'])->name('slider.update');
        Route::get('/delete/{id}', [AdminSliderController::class, 'delete'])->name('slider.delete')->middleware('can:product-delete');
    });
    Route::prefix('settings')->group(function () {
        Route::get('/', [AdminSettingController::class, 'index'])->name('settings.index')->middleware('can:setting-list');
        Route::get('/create', [AdminSettingController::class, 'create'])->name('settings.create')->middleware('can:setting-add');
        Route::post('/store', [AdminSettingController::class, 'store'])->name('settings.store');
        Route::get('/edit/{id}', [AdminSettingController::class, 'edit'])->name('settings.edit')->middleware('can:setting-edit');
        Route::post('/update/{id}', [AdminSettingController::class, 'update'])->name('settings.update');
        Route::get('/delete/{id}', [AdminSettingController::class, 'delete'])->name('settings.delete')->middleware('can:setting-delete');
    });
    Route::prefix('user')->group(function () {
        Route::get('/', [AdminUserController::class, 'index'])->name('user.index')->middleware('can:user-list');
        Route::get('/create', [AdminUserController::class, 'create'])->name('user.create')->middleware('can:user-add');
        Route::post('/store', [AdminUserController::class, 'store'])->name('user.store');
        Route::get('/edit/{id}', [AdminUserController::class, 'edit'])->name('user.edit')->middleware('can:user-edit');
        Route::post('/update/{id}', [AdminUserController::class, 'update'])->name('user.update');
        Route::get('/delete/{id}', [AdminUserController::class, 'delete'])->name('user.delete')->middleware('can:user-delete');
    });
    Route::prefix('roles')->group(function () {
        Route::get('/', [AdminRolesController::class, 'index'])->name('roles.index')->middleware('can:role-list');
        Route::get('/create', [AdminRolesController::class, 'create'])->name('roles.create')->middleware('can:role-add');
        Route::post('/store', [AdminRolesController::class, 'store'])->name('roles.store');
        Route::get('/edit/{id}', [AdminRolesController::class, 'edit'])->name('roles.edit')->middleware('can:role-edit');
        Route::post('/update/{id}', [AdminRolesController::class, 'update'])->name('roles.update');
        Route::get('/delete/{id}', [AdminRolesController::class, 'delete'])->name('roles.delete')->middleware('can:role-delete');
    });
    Route::prefix('permissions')->group(function () {
        Route::get('/create', [AdminPermissionController::class, 'create'])->name('permissions.create');
        Route::post('/store', [AdminPermissionController::class, 'store'])->name('permissions.store');
        Route::get('/edit/{id}', [AdminPermissionController::class, 'edit'])->name('permissions.edit');
        Route::post('/update/{id}', [AdminPermissionController::class, 'update'])->name('permissions.update');
        Route::get('/delete/{id}', [AdminPermissionController::class, 'delete'])->name('permissions.delete');
    });
});
