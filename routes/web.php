<?php

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

Route::get('/login', function () {
    return view('auth.login');
});


Route::get('/', 'MainController@index');
Route::get('/news', 'newsController@index')->name('news.index');
Route::get('/contactus', 'contactController@index')->name('contact.index');
Route::get('/project', 'pageController@project')->name('project.index');
Route::get('/publicnews', 'pageController@news')->name('publicnews.index');
Route::get('/publicChat', 'pageController@chating');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('dashboard', function () {
   return view('layouts.master');
});



Route::group(['prefix' => '/login', 'middleware' => 'auth'], function(){
    Route::resource('news','CategoryController');
    Route::get('/newsindex','CategoryController@index')->name('api.index');
    Route::get('/apiNews','CategoryController@apiNews')->name('api.news');
    Route::post('/newsStore/store','CategoryController@store')->name('news.store');
    Route::patch('/newsUpdate/{id}','CategoryController@update')->name('news.update');
    Route::delete('/newsDelete/{id}','CategoryController@destroy')->name('news.delete');
    Route::get('/newsEdit/{id}','CategoryController@edit')->name('news.edit');
    Route::get('/exportCategoriesAll','CategoryController@exportCategoriesAll')->name('exportPDF.categoriesAll')->middleware('role:admin');
    Route::get('/exportCategoriesAllExcel','CategoryController@exportExcel')->name('exportExcel.categoriesAll')->middleware('role:admin');


    Route::resource('customers','CustomerController');
    Route::get('/apiCustomers','CustomerController@apiCustomers')->name('api.customers');
    Route::post('/importCustomers','CustomerController@ImportExcel')->name('import.customers');
    Route::get('/exportCustomersAll','CustomerController@exportCustomersAll')->name('exportPDF.customersAll')->middleware('role:admin');
    Route::get('/exportCustomersAllExcel','CustomerController@exportExcel')->name('exportExcel.customersAll')->middleware('role:admin');

    Route::resource('sales','SaleController');
    Route::get('/apiSales','SaleController@apiSales')->name('api.sales');
    Route::post('/importSales','SaleController@ImportExcel')->name('import.sales');
    Route::get('/exportSalesAll','SaleController@exportSalesAll')->name('exportPDF.salesAll');
    Route::get('/exportSalesAllExcel','SaleController@exportExcel')->name('exportExcel.salesAll');

    Route::resource('testimonials','SupplierController');
    Route::get('/TestimonialsView','SupplierController@index')->name('index.testimonials');
    Route::get('/apiTestimonials','SupplierController@apiSuppliers')->name('api.testimonials');
    Route::post('/Storetestimonials','SupplierController@store')->name('store.testimonials');
    Route::get('/Edittestimonials/{id}','SupplierController@edit')->name('edit.testimonials');
    Route::patch('/Updatetestimonials/{id}','SupplierController@update')->name('update.testimonials');
    Route::delete('/Deletetestimonials/{id}','SupplierController@destroy')->name('delete.testimonials');
    Route::post('/importSuppliers','SupplierController@ImportExcel')->name('import.suppliers');
    Route::get('/exportSupplierssAll','SupplierController@exportSuppliersAll')->name('exportPDF.suppliersAll')->middleware('role:admin');
    Route::get('/exportSuppliersAllExcel','SupplierController@exportExcel')->name('exportExcel.suppliersAll')->middleware('role:admin');

    Route::resource('products','ProductController');
    Route::get('/apiProducts','ProductController@apiProducts')->name('api.products');
    Route::get('/ProductViews','ProductController@index')->name('index.products');
    Route::post('/StoreProduct','ProductController@store')->name('store.products');
    Route::get('/EditProducts/{id}','ProductController@edit')->name('edit.products');
    Route::patch('/UpdateProducts/{id}','ProductController@update')->name('update.products');
    Route::delete('/DeleteProducts/{id}','ProductController@destroy')->name('delete.products');

    Route::resource('productsOut','ProductKeluarController');
    Route::get('/apiProductsOut','ProductKeluarController@apiProductsOut')->name('api.productsOut');
    Route::get('/exportProductKeluarAll','ProductKeluarController@exportProductKeluarAll')->name('exportPDF.productKeluarAll');
    Route::get('/exportProductKeluarAllExcel','ProductKeluarController@exportExcel')->name('exportExcel.productKeluarAll');
    Route::get('/exportProductKeluar/{id}','ProductKeluarController@exportProductKeluar')->name('exportPDF.productKeluar');

    Route::resource('productsIn','ProductMasukController');
    Route::get('/apiProductsIn','ProductMasukController@apiProductsIn')->name('api.productsIn');
    Route::get('/exportProductMasukAll','ProductMasukController@exportProductMasukAll')->name('exportPDF.productMasukAll')->middleware('role:admin');
    Route::get('/exportProductMasukAllExcel','ProductMasukController@exportExcel')->name('exportExcel.productMasukAll')->middleware('role:admin');
    Route::get('/exportProductMasuk/{id}','ProductMasukController@exportProductMasuk')->name('exportPDF.productMasuk')->middleware('role:admin');

    Route::resource('Chating','ChatController');
    Route::get('/chatApi', 'ChatController@index')->name('chat.index');
    Route::get('/chatingAction', 'ChatController@apiChat')->name('api.chat');
    Route::get('/EditChat/{id}','ChatController@edit')->name('Chating.edit');
    Route::patch('/updateChat/{id}','ChatController@update')->name('Chating.update');
    Route::post('/chatStore','ChatController@store')->name('chat.store');
    Route::delete('/DeleteChat/{id}','ChatController@destroy')->name('chat.destroy');
});

