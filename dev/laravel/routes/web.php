<?php
//Clear Cache facade value:
// Route::get('/now/clear-cache', function() {
//     $exitCode = Artisan::call('cache:clear');
//     return '<h1>Cache facade value cleared</h1>';
// });


// //Clear Route cache:
// Route::get('/route-clear', function() {
//     $exitCode = Artisan::call('route:clear');
//     return '<h1>Route cache cleared</h1>';
// });

// //Clear View cache:
// Route::get('/view-clear', function() {
//     $exitCode = Artisan::call('view:clear');
//     return '<h1>View cache cleared</h1>';
// });
// //Clear View cache:
Route::get('/quick-clean', function () {
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('cache:clear');
    // $exitCode = Artisan::call('config:cache');
    return '<h1>Cleared</h1>';
});
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
// Route::get('/test', function () {
//     return count(App\User::find(1)->products);
// });
// Route
Route::get('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::get('/', [
    'uses' => 'FrontEndController@index',
    'as' => 'index'
]);
/////////Blog Posts
Route::get('/blogs', [
    'uses' => 'FrontEndController@blogs',
    'as' => 'blogs'
]);
//post page url slug
Route::get('/post/{slug}', [
    'uses' => 'FrontEndController@blog_page',
    'as' => 'post_page'
]);
////////////////////////////////////////////
//Products
Route::get('/products', [
    'uses' => 'ProductsController@products',
    'as' => 'products'
]);

Route::get('/products/download_images/{id}', [
    'uses' => 'ProductsController@download_images',
    'as' => 'products.download_images'
]);
//Product Link url //from product page
Route::post('/link', [
    'uses' => 'ProductsController@link',
    'as' => 'link'
]);
//product page url slug
Route::get('/{slug}-{id}', [
    'uses' => 'ProductsController@product_page',
    'as' => 'product_page'
]);
//from product page

///////////////////////////////////////////
//category page url slug
Route::get('/category/{slug}', [
    'uses' => 'FrontEndController@category_page',
    'as' => 'category_page'
]);
//merchant url slug
Route::get('/merchant/{slug}', [
    'uses' => 'FrontEndController@merchant_page',
    'as' => 'merchant_page'
]);
//merchants
Route::get('/merchants', [
    'uses' => 'FrontEndController@merchants',
    'as' => 'merchants'
]);
Route::get('/page/{slug}', [
    'uses' => 'FrontEndController@single_page',
    'as' => 'single_page'
]);
//Search
Route::get('/search', [
    'uses' => 'ProductsController@search',
    'as' => 'search'
]);

Route::get('/feed', [
    'uses' => 'FrontEndController@feed',
    'as' => 'feed'
]);
//contact page
Route::get('/contact', [
    'uses' => 'FrontEndController@contact',
    'as' => 'contact'
]);
Route::post('/contact/send', [
    'uses' => 'FrontEndController@contact_send',
    'as' => 'contact.send'
]);
Route::get('register/verify/{token}', [
    'uses' => 'Auth\RegisterController@verifyUser',
    'as' => 'verifyUser'
]);
//////////Cart////////////
Route::post('/cart/add', [
    'uses' => 'CartController@add_to_cart',
    'as' => 'cart.add'
]);
Route::get('/cart/delete/{id}', [
    'uses' => 'CartController@delete',
    'as' => 'cart.delete'
]);
Route::get('/cart/empty', [
    'uses' => 'CartController@empty_cart',
    'as' => 'cart.empty'
]);
Route::get('/cart/checkout', [
    'uses' => 'CartController@checkout',
    'as' => 'cart.checkout'
]);
Route::post('/cart/update', [
    'uses' => 'CartController@update',
    'as' => 'cart.update'
]);
Route::get('/cart', [
    'uses' => 'CartController@cart',
    'as' => 'cart'
]);
//////////Cart////////////
//////////Coupons////////////
Route::post('/coupon/add', [
    'uses' => 'CartController@add_coupon',
    'as' => 'coupon.add'
]);
Route::get('/coupon/delete', [
    'uses' => 'CartController@delete_coupon',
    'as' => 'coupon.delete'
]);
// Route::get('/coupon/empty', [
//     'uses' => 'CartController@empty_coupon',
//     'as' => 'coupon.empty'
// ]);
// Route::post('/coupon/update', [
//     'uses' => 'CartController@update_coupon',
//     'as' => 'coupon.update'
// ]);
//////////Coupons/////////////
/*
|--------------------------------------------------------------------------
| Application Public Environment
|--------------------------------------------------------------------------
|
| This value determines the public features of the application is currently
| running in. This may determine how you prefer to configure various
| services your application utilizes.
|
*/
////////////////////////////////////////////////////////////////////////////
Route::get('/osx', function () {
    return view('osx');
});

Auth::routes();

// Route::get('/work/app', function () {
//     return view('work.layouts.app');
// });
Route::get('/work/login', [
    'uses' => 'Auth\AdminLoginController@showLoginForm',
    'as' => 'work.login'
]);
Route::post('/work/login/submit', [
    'uses' => 'Auth\AdminLoginController@login',
    'as' => 'work.login.submit'
]);
Route::get('/work', [
    'uses' => 'work\AdminsController@index',
    'as' => 'work.index'
]);
Route::post('/work/logout', [
    'uses' => 'Auth\AdminLoginController@adminLogout',
    'as' => 'work.logout'
]);


//////////////////CRAWLER///////////////////////////////////
Route::post('/work/crawl/aliexpress_run', [
    'uses' => 'work\crawler\AliexpressController@aliexpress_run',
    'as' => 'work.crawl.aliexpress_run'
]);
Route::get('/work/crawl/aliexpress', [
    'uses' => 'work\crawler\AliexpressController@index',
    'as' => 'work.crawl.aliexpress'
]);
Route::get('/work/edit/aliexpress', [
    'uses' => 'work\crawler\AliexpressController@edit_aliexpress',
    'as' => 'work.edit.aliexpress'
]);
Route::post('/work/save/aliexpress', [
    'uses' => 'work\crawler\AliexpressController@save_aliexpress',
    'as' => 'work.save.aliexpress'
]);
///////
Route::post('/work/crawl/ebay_run', [
    'uses' => 'work\crawler\EbayController@ebay_run',
    'as' => 'work.crawl.ebay_run'
]);
Route::get('/work/crawl/ebay', [
    'uses' => 'work\crawler\EbayController@index',
    'as' => 'work.crawl.ebay'
]);
Route::post('/work/save/ebay', [
    'uses' => 'work\crawler\EbayController@save_ebay',
    'as' => 'work.save.ebay'
]);
Route::get('/work/edit/ebay', [
    'uses' => 'work\crawler\EbayController@edit_ebay',
    'as' => 'work.edit.ebay'
]);
//////////////////CRAWLER//////////////////////////////////////
Route::post('/work/get_admins_data', [
    'uses' => 'work\AdminsController@get_admins_data',
    'as' => 'work.get_admins_data'
]);
Route::get('/work/admin/create', [
    'uses' => 'work\AdminsController@create',
    'as' => 'work.admin.create'
]);
Route::post('/work/admin/store', [
    'uses' => 'work\AdminsController@store',
    'as' => 'work.admin.store'
]);
Route::get('/work/admins', [
    'uses' => 'work\AdminsController@view_admins',
    'as' => 'admins'
]);
Route::get('/work/admin/edit/{id}', [
    'uses' => 'work\AdminsController@edit',
    'as' => 'work.admin.edit'
]);
Route::get('/work/admin/csv/{id}', [
    'uses' => 'work\AdminsController@csv',
    'as' => 'work.admin.csv'
]);
Route::get('/work/admin/delete/{id}', [
    'uses' => 'work\AdminsController@destroy',
    'as' => 'work.admin.delete'
]);
Route::post('/work/admin/update/{id}', [
    'uses' => 'work\AdminsController@update',
    'as' => 'work.admin.update'
]);
Route::get('/work/profile', [
    'uses' => 'work\AdminsController@admin_profile',
    'as' => 'work.admin.profile'
]);
Route::get('/work/password', [
    'uses' => 'work\AdminsController@password',
    'as' => 'work.admin.password'
]);
Route::post('/work/store_password', [
    'uses' => 'work\AdminsController@store_password',
    'as' => 'work.admin.store_password'
]);
// Route::get('user/deactivatework/{id}',[
//     'uses'=>'UsersController@deactivatework',
//     'as'=>'user.deactivatework'
// ]);
// Route::get('user/activatework/{id}',[
//     'uses'=>'UsersController@activatework',
//     'as'=>'user.activatework'
// ]);
//
////////Admins//////////////////
//////////Suppliers/////////////
Route::get('/work/get_suppliers_data', [
    'uses' => 'work\SuppliersController@get_suppliers_data',
    'as' => 'work.get_suppliers_data'
]);

Route::get('/work/supplier/create', [
    'uses' => 'work\SuppliersController@create',
    'as' => 'work.supplier.create'
]);
Route::post('/work/supplier/store', [
    'uses' => 'work\SuppliersController@store',
    'as' => 'work.supplier.store'
]);
Route::get('/work/suppliers', [
    'uses' => 'work\SuppliersController@view_suppliers',
    'as' => 'work.suppliers'
]);
Route::get('/work/supplier/edit/{id}', [
    'uses' => 'work\SuppliersController@edit',
    'as' => 'work.supplier.edit'
]);
Route::get('/work/supplier/delete/{id}', [
    'uses' => 'work\SuppliersController@destroy',
    'as' => 'work.supplier.delete'
]);
Route::get('/work/supplier/{id}/delete_products', [
    'uses' => 'work\SuppliersController@supplier_products_delete',
    'as' => 'work.supplier.products_delete'
]);
Route::post('/work/supplier/update/{id}', [
    'uses' => 'work\SuppliersController@update',
    'as' => 'work.supplier.update'
]);
Route::get('/work/supplier/csv/{id}', [
    'uses' => 'work\SuppliersController@csv',
    'as' => 'work.supplier.csv'
]);
Route::get('/work/supplier/profile/{id}', [
    'uses' => 'work\SuppliersController@profile',
    'as' => 'work.supplier.profile'
]);
Route::get('/work/supplier/profile/update/{id}', [
    'uses' => 'work\SuppliersController@profile_update',
    'as' => 'work.supplier.profile_update'
]);
Route::get('/work/supplier/activate/{id}', [
    'uses' => 'work\SuppliersController@activate',
    'as' => 'work.supplier.activate'
]);
Route::get('/work/supplier/deactivate/{id}', [
    'uses' => 'work\SuppliersController@deactivate',
    'as' => 'work.supplier.deactivate'
]);
Route::get('/work/supplier/update_products/{id}', [
    'uses' => 'work\SuppliersController@update_products',
    'as' => 'work.supplier.update_products'
]);
//////////Suppliers/////////////
///////Users////////////////////
Route::get('/work/get_users_data', [
    'uses' => 'work\UsersController@get_users_data',
    'as' => 'work.get_users_data'
]);

Route::get('/work/user/create', [
    'uses' => 'work\UsersController@create',
    'as' => 'work.user.create'
]);
Route::post('/work/user/store', [
    'uses' => 'work\UsersController@store',
    'as' => 'work.user.store'
]);
Route::get('/work/users', [
    'uses' => 'work\UsersController@view_users',
    'as' => 'users'
]);
Route::get('/work/user/edit/{id}', [
    'uses' => 'work\UsersController@edit',
    'as' => 'work.user.edit'
]);
Route::get('/work/user/delete/{id}', [
    'uses' => 'work\UsersController@destroy',
    'as' => 'work.user.delete'
]);
Route::post('/work/user/update/{id}', [
    'uses' => 'work\UsersController@update',
    'as' => 'work.user.update'
]);
Route::get('/work/user/csv/{id}', [
    'uses' => 'work\UsersController@csv',
    'as' => 'work.user.csv'
]);
Route::get('/work/user/profile/{id}', [
    'uses' => 'work\UsersController@profile',
    'as' => 'work.user.profile'
]);
Route::get('/work/user/profile/update/{id}', [
    'uses' => 'work\UsersController@profile_update',
    'as' => 'work.user.profile_update'
]);
Route::get('/work/user/activate/{id}', [
    'uses' => 'work\UsersController@activate',
    'as' => 'work.user.activate'
]);
Route::get('/work/user/deactivate/{id}', [
    'uses' => 'work\UsersController@deactivate',
    'as' => 'work.user.deactivate'
]);
Route::get('/work/user/update_products/{id}', [
    'uses' => 'work\UsersController@update_products',
    'as' => 'work.user.update_products'
]);
//////Users/////////////////////////
////////////Categories//////////////
Route::get('/work/get_categories_data', [
    'uses' => 'work\CategoriesController@get_categories_data',
    'as' => 'work.get_categories_data'
]);

Route::get('/work/category/create', [
    'uses' => 'work\CategoriesController@create',
    'as' => 'work.category.create'
]);
Route::post('/work/category/store', [
    'uses' => 'work\CategoriesController@store',
    'as' => 'work.category.store'
]);
Route::get('/work/categories', [
    'uses' => 'work\CategoriesController@view_categories',
    'as' => 'categories'
]);
Route::get('/work/category/edit/{id}', [
    'uses' => 'work\CategoriesController@edit',
    'as' => 'work.category.edit'
]);
Route::get('/work/category/delete/{id}', [
    'uses' => 'work\CategoriesController@destroy',
    'as' => 'work.category.delete'
]);
Route::post('/work/category/update/{id}', [
    'uses' => 'work\CategoriesController@update',
    'as' => 'work.category.update'
]);
////////////Categories//////////////
////////// Start Add Products  //////
Route::get('/work/get_products_data', [
    'uses' => 'work\ProductsController@get_products_data',
    'as' => 'work.get_products_data'
]);

Route::get('/work/product/create', [
    'uses' => 'work\ProductsController@create',
    'as' => 'work.product.create'
]);
Route::get('/work/products/export', [
    'uses' => 'work\ProductsController@csv_export',
    'as' => 'work.product.csv_export'
]);
Route::post('/work/product/store', [
    'uses' => 'work\ProductsController@store',
    'as' => 'work.product.store'
]);
Route::get('/work/products', [
    'uses' => 'work\ProductsController@index',
    'as' => 'products'
]);
Route::get('/work/product/edit/{id}', [
    'uses' => 'work\ProductsController@edit',
    'as' => 'work.product.edit'
]);
Route::get('/work/product/delete/{id}', [
    'uses' => 'work\ProductsController@destroy',
    'as' => 'work.product.delete'
]);
Route::post('/work/product/update/{id}', [
    'uses' => 'work\ProductsController@update',
    'as' => 'work.product.update'
]);
Route::get('/work/product/update_product/{id}', [
    'uses' => 'work\ProductsController@update_product',
    'as' => 'work.product.update_product'
]);
Route::get('/work/product/import', [
    'uses' => 'work\ProductsController@import',
    'as' => 'work.product.import'
]);
Route::post('/work/product/csv_upload', [
    'uses' => 'work\ProductsController@csv_upload',
    'as' => 'work.product.csv_upload'
]);
Route::post('/work/product/csv_gz_unzip', [
    'uses' => 'work\ProductsController@csv_gz_unzip',
    'as' => 'work.product.csv_gz_unzip'
]);
Route::post('/work/product/csv_import', [
    'uses' => 'work\ProductsController@csv_import',
    'as' => 'work.product.csv_import'
]);
Route::get('/work/product/delete_all', [
    'uses' => 'work\ProductsController@delete_all',
    'as' => 'work.product.delete_all'
]);
/////////////  Varied Product Start /////////////
//View Variant
Route::get('/work/product/{id}/variants/', [
    'uses' => 'work\ProductVariantController@variants',
    'as' => 'work.product.variants'
]);
Route::get('/work/product/{id}/create/variant/', [
    'uses' => 'work\ProductVariantController@create',
    'as' => 'work.product.create.variant'
]);
Route::post('/work/product/store/variant/', [
    'uses' => 'work\ProductVariantController@store',
    'as' => 'work.product.store.variant'
]);
Route::get('/work/product/edit/variant/{id}', [
    'uses' => 'work\ProductVariantController@edit',
    'as' => 'work.product.edit.variant'
]);
Route::post('/work/product/update/variant/{id}', [
    'uses' => 'work\ProductVariantController@update',
    'as' => 'work.product.update.variant'
]);
/////////////  Varied Product End   /////////////
/////////////Variation Categories /////////////////
Route::get('/work/variations', [
    'uses' => 'work\VariantController@index',
    'as' => 'variations'
]);
Route::get('/work/get_variations_data', [
    'uses' => 'work\VariantController@get_variations_data',
    'as' => 'work.get_variations_data'
]);

Route::get('/work/variation/create', [
    'uses' => 'work\VariantController@create',
    'as' => 'work.variation.create'
]);
Route::post('/work/variation/store', [
    'uses' => 'work\VariantController@store',
    'as' => 'work.variation.store'
]);
Route::get('/work/variation/edit/{id}', [
    'uses' => 'work\VariantController@edit',
    'as' => 'work.variation.edit'
]);
Route::get('/work/variation/delete/{id}', [
    'uses' => 'work\VariantController@destroy',
    'as' => 'work.variation.delete'
]);
Route::post('/work/variation/update/{id}', [
    'uses' => 'work\VariantController@update',
    'as' => 'work.variation.update'
]);


//////////// Variation Categories /////////////////
////////// End Add Product   ////////

////////// Invoices   //////////
Route::get('/work/get_invoice_data/{filter?}', [
    'uses' => 'work\InvoicesController@get_invoice_data',
    'as' => 'work.get_invoice_data'
]);
Route::post('/work/finance/store', [
    'uses' => 'work\InvoicesController@store',
    'as' => 'work.invoice.store'
]);
Route::get('/work/finance/invoices', [
    'uses' => 'work\InvoicesController@index',
    'as' => 'work.invoices'
]);
Route::get('/work/finance/delete/{id}', [
    'uses' => 'work\InvoicesController@destroy',
    'as' => 'work.invoice.delete'
]);
Route::get('/work/finance/create_invoice', [
    'uses' => 'work\InvoicesController@create',
    'as' => 'work.invoice.create'
]);
Route::get('/work/finance/csv/{id}', [
    'uses' => 'work\InvoicesController@csv',
    'as' => 'work.invoice.csv'
]);
Route::get('/work/finance/pdf/{id}', [
    'uses' => 'work\InvoicesController@pdf',
    'as' => 'work.invoice.pdf'
]);
Route::get('/work/finance/view/{id}', [
    'uses' => 'work\InvoicesController@view',
    'as' => 'work.invoice.view'
]);
Route::get('/work/finance/approve/{id}', [
    'uses' => 'work\InvoicesController@approve',
    'as' => 'work.invoice.approve'
]);
Route::get('/work/finance/disapprove/{id}', [
    'uses' => 'work\InvoicesController@disapprove',
    'as' => 'work.invoice.disapprove'
]);
Route::get('/work/finance/invoice/details/{id}', [
    'uses' => 'work\InvoicesController@disapprove',
    'as' => 'work.invoice.details'
]);
Route::get('/work/finance/invoice/process/{id}', [
    'uses' => 'work\InvoicesController@process',
    'as' => 'work.invoice.process'
]);

Route::get('/work/invoice/edit/{id}', [
    'uses' => 'work\InvoicesController@edit',
    'as' => 'work.invoice.edit'
]);
Route::post('/work/invoice/save', [
    'uses' => 'work\InvoicesController@save',
    'as' => 'work.invoice.save'
]);
Route::post('/work/invoice/tracking/send', [
    'uses' => 'work\InvoicesController@send',
    'as' => 'work.invoice.tracking.send'
]);
//Income
Route::get('/work/get_income_data', [
    'uses' => 'work\InvoicesController@get_income_data',
    'as' => 'work.get_income_data'
]);
Route::get('/work/finance/income', [
    'uses' => 'work\InvoicesController@income',
    'as' => 'work.income'
]);
Route::get('/work/finance/income/sub/csv/{id}', [
    'uses' => 'work\InvoicesController@sub_csv',
    'as' => 'work.income.sub.csv'
]);
//Income

///////// End Credits   ////////

////Pages Start////
Route::get('/work/page/view/{id}', [
    'uses' => 'work\PagesController@view',
    'as' => 'work.page.view'
]);
Route::get('/work/get_pages_data', [
    'uses' => 'work\PagesController@get_pages_data',
    'as' => 'work.get_pages_data'
]);

Route::get('/work/page/create', [
    'uses' => 'work\PagesController@create',
    'as' => 'work.page.create'
]);
Route::post('/work/page/store', [
    'uses' => 'work\PagesController@store',
    'as' => 'work.page.store'
]);
Route::get('/work/pages', [
    'uses' => 'work\PagesController@index',
    'as' => 'work.pages'
]);
Route::get('/work/page/edit/{id}', [
    'uses' => 'work\PagesController@edit',
    'as' => 'work.page.edit'
]);
Route::get('/work/page/delete/{id}', [
    'uses' => 'work\PagesController@destroy',
    'as' => 'work.page.delete'
]);
Route::post('/work/page/update/{id}', [
    'uses' => 'work\PagesController@update',
    'as' => 'work.page.update'
]);
////Pages End////
////Posts Start////
Route::get('/work/post/view/{id}', [
    'uses' => 'work\PostsController@view',
    'as' => 'work.post.view'
]);
Route::get('/work/get_posts_data', [
    'uses' => 'work\PostsController@get_posts_data',
    'as' => 'work.get_posts_data'
]);

Route::get('/work/post/create', [
    'uses' => 'work\PostsController@create',
    'as' => 'work.post.create'
]);
Route::post('/work/post/store', [
    'uses' => 'work\PostsController@store',
    'as' => 'work.post.store'
]);
Route::get('/work/posts', [
    'uses' => 'work\PostsController@index',
    'as' => 'work.posts'
]);
Route::get('/work/post/edit/{id}', [
    'uses' => 'work\PostsController@edit',
    'as' => 'work.post.edit'
]);
Route::get('/work/post/delete/{id}', [
    'uses' => 'work\PostsController@destroy',
    'as' => 'work.post.delete'
]);
Route::post('/work/post/update/{id}', [
    'uses' => 'work\PostsController@update',
    'as' => 'work.post.update'
]);
////Posts End////
///////////////////////regex////////////////////////
// Route::get('/work/regex/ali',[
//     'uses'=>'work\RegexController@ali',
//     'as'=>'work.regex.ali'
// ]);
// Route::get('/work/regex/ebay',[
//     'uses'=>'work\RegexController@ebay',
//     'as'=>'work.regex.ebay'
// ]);
Route::get('/work/regex/run', [
    'uses' => 'work\RegexController@run',
    'as' => 'work.regex.run'
]);
Route::get('/work/regex', [
    'uses' => 'work\RegexController@index',
    'as' => 'work.regex'
]);

Route::post('/work/settings/run_regex', [
    'uses' => 'work\RegexController@run_regex',
    'as' => 'work.settings.run_regex'
]);
///////////////////////regex////////////////////////
/////////////////Slider//////////////////
Route::get('/work/get_slides_data', [
    'uses' => 'work\SliderController@get_slides_data',
    'as' => 'work.get_slides_data'
]);
Route::get('/work/slide/create', [
    'uses' => 'work\SliderController@create',
    'as' => 'work.slide.create'
]);
Route::post('/work/slide/store', [
    'uses' => 'work\SliderController@store',
    'as' => 'work.slide.store'
]);
Route::get('/work/slides', [
    'uses' => 'work\SliderController@index',
    'as' => 'work.slides'
]);
Route::get('/work/slide/delete/{id}', [
    'uses' => 'work\SliderController@destroy',
    'as' => 'work.slide.delete'
]);
////////////////slider///////////////////
/////////////////Settings////////////////
Route::get('/work/settings', [
    'uses' => 'work\SettingsController@index',
    'as' => 'work.settings'
]);
Route::get('work/generate/sitemap', [
    'uses' => 'work\SettingsController@sitemap',
    'as' => 'work.sitemap'
]);
Route::post('work/settings/update/', [
    'uses' => 'work\SettingsController@update',
    'as' => 'work.settings.update'
]);

/////////////////Settings////////////////
////CouponsController Start////
Route::get('/work/get_coupons_data', [
    'uses' => 'work\CouponsController@get_coupons_data',
    'as' => 'work.get_coupons_data'
]);

Route::get('/work/coupon/create', [
    'uses' => 'work\CouponsController@create',
    'as' => 'work.coupon.create'
]);
Route::post('/work/coupon/store', [
    'uses' => 'work\CouponsController@store',
    'as' => 'work.coupon.store'
]);
Route::get('/work/coupons', [
    'uses' => 'work\CouponsController@index',
    'as' => 'work.coupons'
]);
Route::get('/work/coupon/edit/{id}', [
    'uses' => 'work\CouponsController@edit',
    'as' => 'work.coupon.edit'
]);
Route::get('/work/coupon/delete/{id}', [
    'uses' => 'work\CouponsController@destroy',
    'as' => 'work.coupon.delete'
]);
Route::post('/work/coupon/update/{id}', [
    'uses' => 'work\CouponsController@update',
    'as' => 'work.coupon.update'
]);
////CouponsController End////

////////////////////Admin End //////////////////////
/*
====================================================
*/
////////////////////Admin End //////////////////////


/*//////////////////////////////////////////////////



////////////////////User Start //////////////////////
/*
====================================================
*/
////////////////////User Start //////////////////////
//root page of Merchant = Account Dashboard
Route::get('/account', 'account\AccountController@index');
Route::get('/account/logout', [
    'uses' => 'Auth\LoginController@userLogout',
    'as' => 'accout.logout'
]);
Route::get('/account/user/edit/', [
    'uses' => 'account\AccountController@edit',
    'as' => 'account.user.edit'
]);
Route::post('/account/user/update/', [
    'uses' => 'account\AccountController@update',
    'as' => 'account.user.update'
]);
Route::get('/account/profile', [
    'uses' => 'account\AccountController@profile',
    'as' => 'account.user.profile'
]);

/////////////////// Invoices   /////////////////////
Route::get('/account/get_invoice_data', [
    'uses' => 'account\InvoicesController@get_invoice_data',
    'as' => 'account.get_invoice_data'
]);

Route::get('/account/invoices/', [
    'uses' => 'account\InvoicesController@index',
    'as' => 'account.invoices'
]);

Route::get('/account/invoice/csv/{id}', [
    'uses' => 'account\InvoicesController@csv',
    'as' => 'account.invoice.csv'
]);
Route::get('/account/invoice/view/{id}', [
    'uses' => 'account\InvoicesController@view',
    'as' => 'account.invoice.view'
]);

///////// End Invoices   ////////
////// Payment GateWays   //////////
Route::post('/account/gateway/stripe', [
    'uses' => 'account\gateway\StripeController@payment',
    'as' => 'account.gateway.stripe'
]);

Route::post('/account/gateway/cod', [
    'uses' => 'account\gateway\CODController@cod_payment',
    'as' => 'account.gateway.cod'
]);

Route::post('/account/gateway/voguepay_success', [
    'uses' => 'account\gateway\VoguePayController@success',
    'as' => 'account.gateway.voguepay_success'
]);
Route::post('/account/gateway/voguepay_fail', [
    'uses' => 'account\gateway\VoguePayController@fail',
    'as' => 'account.gateway.voguepay_fail'
]);

Route::post('/account/gateway/paypal', [
    'uses' => 'account\gateway\PayPalController@payment',
    'as' => 'account.gateway.paypal'
]);
Route::get('/account/gateway/paypal_status', [
    'uses' => 'account\gateway\PayPalController@paypal_status',
    'as' => 'account.gateway.paypal_status'
]);
////// Payment GateWays   //////////





















////////////////////User End //////////////////////
/*
====================================================
*/
////////////////////Userdmin End //////////////////////
