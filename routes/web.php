<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ConstructorController;
use App\Http\Controllers\AdditionallyController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UrgentlyController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Profile\StatusController;
use App\Http\Controllers\Profile\OrdersController;
use App\Http\Controllers\Profile\FavoriteController;
use App\Http\Controllers\Profile\BallsController;
use App\Http\Controllers\Profile\NotificationsController;
use App\Http\Controllers\Profile\EventController;
use App\Http\Controllers\Profile\StockController;
use App\Http\Controllers\Profile\DonatController;
use App\Http\Controllers\Profile\HistoryController;
use App\Http\Controllers\Profile\OfferController;
use App\Http\Controllers\Profile\PolicyController;
use App\Http\Controllers\Profile\SettingsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Profile\LogoutController;
use App\Http\Controllers\Admin\Catalog\TagsController;
use App\Http\Controllers\Admin\Catalog\ColorController;
use App\Http\Controllers\Admin\Catalog\SizeController;
use App\Http\Controllers\Admin\Locations\CountryController;
use App\Http\Controllers\Admin\Locations\RegionController;
use App\Http\Controllers\Admin\Locations\AdminCityController;
use App\Http\Controllers\Admin\Catalog\CategoryController;
use App\Http\Controllers\Admin\SubscribeController;
use App\Http\Controllers\Admin\Catalog\ProductController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\Path\PathProductController;
use App\Http\Controllers\Admin\Path\PathCategoryController;
use App\Http\Controllers\Admin\Path\PathSizeController;
use App\Http\Controllers\Admin\Path\PathBannerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\NotificatonController;
use App\Http\Controllers\API\SberController;
use App\Http\Controllers\SubscribeViewController;

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

Auth::routes();
Route::get('/city', [CityController::class, 'index'])->name('city');
Route::get('/set-city/{id}', [CityController::class, 'setCity'])->name('set.city');
Route::get('/change-city/{name}', [CityController::class, 'changeCity'])->name('change.city');
Route::post('/city/find', [CityController::class, 'cityFind'])->name('city.find');


Route::get('/order', [OrderController::class, 'order']);
Route::post('/order', [OrderController::class, 'order.save']);
Route::get('/fast-order', [OrderController::class, 'order.fast']);
Route::post('/fast-order', [OrderController::class, 'order.fast.save']);


Route::middleware(['isUserCity'])->group(function () {
    Route::get('/', [CatalogController::class, 'index'])->name('home');
    Route::get('/product/{id}', [CatalogController::class, 'product']);
    Route::get('/{id}', [CatalogController::class, 'category'])->where('id', '[0-9]+')->name('product.cat');

    Route::get('/category/middle/{title}', [AdditionallyController::class, 'category_middle'])->name('category.middle');
    Route::get('/additionally/product/{id}', [AditionalyController::class, 'product']);
    Route::get('/additionally/{id}', [AdditionallyController::class, 'category'])->name('addit.cat');

    Route::get('/constructor', [ConstructorController::class, 'index'])->name('constructor');
    Route::get('/constructor/{id}', [ConstructorController::class, 'category']);

    Route::get('/urgently', [UrgentlyController::class, 'index'])->name('urgently');

    //NEWS
    Route::get('/news', [NewsController::class, 'index'])->name('news.index');
    Route::get('/news/{id}', [NewsController::class, 'single'])->name('news.single');
    Route::post('/news/sort/{sort}', [NewsController::class, 'sort'])->name('news.sort');
    //QUIZ
    Route::get('/quiz', [QuizController::class, 'index'])->name('quiz.index');
    //NEWS ADD COMMENT
    Route::post('/news/add/comment/{news_id}', [NewsController::class, 'add_comment'])->name('news.add.comment');
    //SUBSCRIBE
    Route::get('/subscribe', [SubscribeViewController::class, 'index'])->name('subscribe.index');

    //ACCOUNT
    Route::group(['prefix' => 'account', 'middleware' => ['profileCheck']], function(){
        Route::get('/', [StatusController::class, 'index'])->name('profile.index');
        Route::get('/orders', [OrdersController::class, 'index'])->name('profile.orders');
        Route::get('/favorite', [FavoriteController::class, 'index'])->name('profile.favorite');
        Route::get('/balls', [BallsController::class, 'index'])->name('profile.balls');
        Route::get('/notifications', [NotificationsController::class, 'index'])->name('profile.notifications');
        Route::get('/events', [EventController::class, 'index'])->name('profile.event');
        Route::post('/event/create', [EventController::class, 'create'])->name('profile.event.create');
        Route::post('/event/edit/{id}', [EventController::class, 'edit'])->name('profile.event.edit');
        Route::post('/event/date/edit/', [EventController::class, 'edit_date'])->name('profile.event.date.update');
        Route::get('/stock', [StockController::class, 'index'])->name('profile.stock');
        Route::get('/donat', [DonatController::class, 'index'])->name('profile.donat');
        Route::post('/donat/submit', [DonatController::class, 'submit'])->name('profile.manager.donat');
        Route::get('/history', [HistoryController::class, 'index'])->name('profile.history');
        Route::get('/offer', [OfferController::class, 'index'])->name('profile.offer');
        Route::get('/policy', [PolicyController::class, 'index'])->name('profile.policy');
        Route::get('/settings', [SettingsController::class, 'index'])->name('profile.settings');
        //EDIT
        Route::post('/settings', [SettingsController::class, 'edit'])->name('profile.edit');
        //LOGOUT
        Route::get('/logout', [App\Http\Controllers\Profile\LogoutController::class, 'logout'])->name('logout.perform');
    });

    //ADMIN ROUTS
    Route::group(['prefix' => 'admin','middleware' => ['role:admin']], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.index');
        Route::resource('admin_news', AdminNewsController::class);
        Route::get('/settings', [SettingController::class, 'index'])->name('admin.settings.index');
        Route::post('/settings', [SettingController::class, 'min_order'])->name('admin.settings.min.order');
        Route::post('/settings/add-who', [SettingController::class, 'add_who'])->name('admin.settings.add.who');
        Route::post('/settings/update/block', [SettingController::class, 'block_update'])->name('admin.settings.block.update');
        Route::post('/settings/delete/block', [SettingController::class, 'block_delete'])->name('admin.settings.block.delete');
        //CATALOG TAGS
        Route::get('/catalog/tags', [TagsController::class, 'index'])->name('admin.catalog.tags');
        Route::post('/catalog/tags/create', [TagsController::class, 'create'])->name('admin.catalog.tags.create');
        Route::post('/catalog/tags/edit/{id}', [TagsController::class, 'edit'])->name('admin.catalog.tags.edit');
        Route::post('/catalog/tags/{id}', [TagsController::class, 'delete'])->name('admin.catalog.tags.delete');
        //CATALOG COLORS
        Route::get('/catalog/colors', [ColorController::class, 'index'])->name('admin.catalog.color');
        Route::post('/catalog/color/create', [ColorController::class, 'create'])->name('admin.catalog.color.create');
        Route::post('/catalog/color/edit/{id}', [ColorController::class, 'edit'])->name('admin.catalog.color.edit');
        Route::post('/catalog/color/{id}', [ColorController::class, 'delete'])->name('admin.catalog.color.delete');
        //CATALOG SIZES
        Route::get('/catalog/sizes', [SizeController::class, 'index'])->name('admin.catalog.size');
        Route::post('/catalog/size/create', [SizeController::class, 'create'])->name('admin.catalog.size.create');
        Route::post('/catalog/size/edit/{id}', [SizeController::class, 'edit'])->name('admin.catalog.size.edit');
        Route::post('/catalog/size/{id}', [SizeController::class, 'delete'])->name('admin.catalog.size.delete');
        //LOCATIONS COUNTRY
        Route::get('/country', [CountryController::class, 'index'])->name('admin.country');
        Route::post('/country/create', [CountryController::class, 'create'])->name('admin.country.create');
        Route::post('/country/edit/{id}', [CountryController::class, 'edit'])->name('admin.country.edit');
        Route::post('/country/{id}', [CountryController::class, 'delete'])->name('admin.country.delete');
        //LOCATIONS REGION
        Route::get('/region', [RegionController::class, 'index'])->name('admin.region');
        Route::post('/region/create', [RegionController::class, 'create'])->name('admin.region.create');
        Route::post('/region/edit/{id}', [RegionController::class, 'edit'])->name('admin.region.edit');
        Route::post('/region/{id}', [RegionController::class, 'delete'])->name('admin.region.delete');
        //LOCATIONS CITY
        Route::get('/city', [AdminCityController::class, 'index'])->name('admin.city');
        Route::post('/city/create', [AdminCityController::class, 'create'])->name('admin.city.create');
        Route::post('/city/edit/{id}', [AdminCityController::class, 'edit'])->name('admin.city.edit');
        Route::post('/city/{id}', [AdminCityController::class, 'delete'])->name('admin.city.delete');
        Route::get('/city/search', [AdminCityController::class, 'search'])->name('admin.city.search');
        //CATEGORY
        Route::get('/category', [CategoryController::class, 'index'])->name('admin.category');
        Route::post('/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::post('/category/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
        //SUB CATEGORY
        Route::get('/category/{id}', [CategoryController::class, 'sub_index'])->name('admin.sub.category');
        Route::post('/category/{id}/create', [CategoryController::class, 'sub_create'])->name('admin.sub.create');
        Route::post('/sub-category/edit/{id}', [CategoryController::class, 'sub_edit'])->name('admin.subcategory.edit');
        //SUBSCRIBE
        Route::get('/subscribe', [SubscribeController::class, 'index'])->name('admin.subscribe');
        Route::post('/subscribe/create', [SubscribeController::class, 'create'])->name('admin.subscribe.create');
        Route::post('/subscribe/{id}/update', [SubscribeController::class, 'update'])->name('admin.subscribe.update');
        //PRODUCTS
        Route::get('/products', [ProductController::class, 'index'])->name('admin.products');
        Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('admin.products.edit');
        Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('admin.products.update');
        Route::get('/product/search/', [ProductController::class, 'search'])->name('admin.product.search');
        Route::get('/product/filter/{id}', [ProductController::class, 'filter'])->name('admin.product.filter');
        Route::get('/product/create/', [ProductController::class, 'create'])->name('admin.product.create');
        Route::post('/product/store/', [ProductController::class, 'store'])->name('admin.product.store');
        //USERS
        Route::get('/users', [UsersController::class, 'index'])->name('admin.users');
        Route::get('/users/create', [UsersController::class, 'create'])->name('admin.users.create');
        Route::get('/users/edit/{id}', [UsersController::class, 'edit'])->name('admin.users.edit');
        Route::post('/users/update/{id}', [UsersController::class, 'update'])->name('admin.users.update');
        Route::post('/users/delete/{id}', [UsersController::class, 'delete'])->name('admin.users.delete');

        //PATH PRODUCT
        Route::get('/path/product', [PathProductController::class, 'index'])->name('admin.path.product');
        Route::post('/path/product/edit/{id}', [PathProductController::class, 'edit'])->name('admin.path.product.edit');
        Route::post('/path/product/delete/{id}', [PathProductController::class, 'delete'])->name('admin.path.product.delete');
        Route::post('/path/product/create/', [PathProductController::class, 'create'])->name('admin.path.product.create');

        //PATH CATEGORY
        Route::get('/path/category', [PathCategoryController::class, 'index'])->name('admin.path.category');
        Route::post('/path/category/edit/{id}', [PathCategoryController::class, 'edit'])->name('admin.path.category.edit');
        Route::post('/path/category/delete/{id}', [PathCategoryController::class, 'delete'])->name('admin.path.category.delete');
        Route::post('/path/category/create/', [PathCategoryController::class, 'create'])->name('admin.path.category.create');

        //PATH SIZE
        Route::get('/path/size', [PathSizeController::class, 'index'])->name('admin.path.size');
        Route::post('/path/size/edit/{id}', [PathSizeController::class, 'edit'])->name('admin.path.size.edit');
        Route::post('/path/size/delete/{id}', [PathSizeController::class, 'delete'])->name('admin.path.size.delete');
        Route::post('/path/size/create/', [PathSizeController::class, 'create'])->name('admin.path.size.create');

        //PATH BANNER
        Route::get('/path/banner', [PathBannerController::class, 'index'])->name('admin.path.banner');
        Route::post('/path/banner/edit/{id}', [PathBannerController::class, 'edit'])->name('admin.path.banner.edit');
        Route::post('/path/banner/delete/{id}', [PathBannerController::class, 'delete'])->name('admin.path.banner.delete');
        Route::post('/path/banner/create/', [PathBannerController::class, 'create'])->name('admin.path.banner.create');

        //ORDERS
        Route::get('/orders', [AdminOrderController::class, 'index'])->name('admin.orders');
        Route::post('/orders/photo/create', [AdminOrderController::class, 'photo_create'])->name('admin.orders.photo.create');

        //NOTIFICATIONS
        Route::get('/notifications', [NotificatonController::class, 'index'])->name('admin.notifications.index');
        Route::get('/notifications/create', [NotificatonController::class, 'create'])->name('admin.notifications.create');
        Route::post('/notifications/store', [NotificatonController::class, 'store'])->name('admin.notifications.store');
        Route::get('/notifications/edit/{id}', [NotificatonController::class, 'edit'])->name('admin.notifications.edit');
        Route::post('/notifications/update/{id}', [NotificatonController::class, 'update'])->name('admin.notifications.update');
        Route::post('/notifications/destroy/{id}', [NotificatonController::class, 'destroy'])->name('admin.notifications.destroy');

        //EVENTS
        Route::post('/settings/event/edit/{id}', [SettingController::class, 'event_edit'])->name('settings.event.edit');
        Route::get('/settings/event/delete/{id}', [SettingController::class, 'event_delete'])->name('settings.event.delete');
        Route::post('/settings/event/create', [SettingController::class, 'event_create'])->name('settings.event.create');
    });

    //ABOUT US
    Route::get('/about', [AboutController::class, 'index'])->name('about');

    //CONTACT
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');

    //Public offer
    Route::get('/offer', [OffersController::class, 'offer'])->name('offer');
    Route::get('/policy', [OffersController::class, 'policy'])->name('policy');
    Route::get('/payment', [OffersController::class, 'payment'])->name('payment');

    //CART
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::get('/add-to-cart', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart-edit/{cookie}/{sign}/{count}', [CartController::class, 'edit'])->name('cart.edit');

    //CHECKOUT
    Route::post('/checkout/{id}/{sum}',[SberController::class, 'checkout'])->name('checkout');
    Route::post('/checkout/delivery',[SberController::class, 'delivery'])->name('delivery.checkout');
});
