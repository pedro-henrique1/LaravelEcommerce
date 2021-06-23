<?php

use App\Http\Livewire\Admin\AdminSaleComponent;
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminEditHomeSliderComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
use App\Http\Livewire\Admin\AdminHomeCategoryComponent;
use App\Http\Livewire\Admin\AdminHomeSliderComponent;
use App\Http\Livewire\Admin\AdminProductComponent;


use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;

//Route::get('/', function () {
//    return view('welcome');
//});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


Route::get("/", HomeComponent::class)->name('home');

Route::get("/shop", ShopComponent::class)->name('shop');

Route::get("/about")->name('home.about');

Route::get("/contact")->name('home.contact');

Route::get("/cart", CartComponent::class)->name('product.cart');
Route::get("/checkout", CheckoutComponent::class)->name('product.checkout');
Route::get("/product/{slug}", DetailsComponent::class)->name('product.details');
Route::get("/product-category/{category_slug}", CategoryComponent::class)->name('product.category');
Route::get('/search', SearchComponent::class)->name('product.search');

Route::middleware(["auth:sanctum", "verified"])->prefix('user')->group(
    function () {
        Route::get("/dashboard", UserDashboardComponent::class)->name(
            "user.dashboard"
        );
    }
);

//['auth:sanctum', 'verified']
//["auth:sanctum", "verified", ""]
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->prefix('admin/')->group(
    function () {
        Route::get("dashboard", AdminDashboardComponent::class)->name(
            "admin.dashboard"
        );
        Route::get("categories", AdminCategoryComponent::class)->name(
            "admin.categories"
        );
        Route::get('category/add', AdminAddCategoryComponent::class)->name('admin.category.add');
        Route::get('admin/category/edit/{category_slug}', AdminEditCategoryComponent::class)->name(
            'admin.category.edit'
        );
        Route::get('products', AdminProductComponent::class)->name('admin.products');
        Route::get('products/add', AdminAddProductComponent::class)->name('admin.products.add');
        Route::get('products/edit/{product_slug}', AdminEditProductComponent::class)->name('admin.products.edit');


        //? slider
        Route::get('slider', AdminHomeSliderComponent::class)->name('admin.slider');
        Route::get('slider/add', AdminAddHomeSliderComponent::class)->name('admin.slider.add');
        Route::get('slider/edit/{slide_id}', AdminEditHomeSliderComponent::class)->name('admin.slider.edit');

        Route::get('home-categories', AdminHomeCategoryComponent::class)->name('admin.add.categories.home');

        Route::get('sale', AdminSaleComponent::class)->name('admin.sale');
    }
);
