<?php

/*
|--------------------------------------------------------------------------
| Web Routes For System
|--------------------------------------------------------------------------
*/

                        /*Vista principal del proyecto*/

Route::get('/','HomeController@index')->name('home');

/*-------------------------------------------------------------------------------------*/

/*+++++++++++++++++++++++++ Inicio Rutas de  paypal++++++++++++++++++++++++++++++++++++*/


Route::get('/checkout', 'PaymentController@index')->middleware('auth');
Route::post('/checkout', 'PaymentController@createPayment')->name('create-payment');
Route::get('/confirm', 'PaymentController@confirmPayment')->name('confirm-payment');

/*+++++++++++++++++++++++++ fin de rutas de paypal++++++++++++++++++++++++++++++++++++++*/

/*---------------------------------------------------------------------------------------*/

/*+++++++++++++++ inicio de rutas mostar productos el cliente+++++++++++++++++++++++*/

Route::get('/productos/{category?}','ProductController@show_products')->name('main.productos');
Route::get('/ver/{product?}','ProductController@show_product')->name('showProduct');
Route::get('/nosotros','ProductController@nosotros')->name('main.nosotros');
Route::get('/politicas','ProductController@politicas')->name('politicas.politicas');
Route::get('/condiciones','ProductController@condiciones')->name('politicas.condiciones');
Route::get('/como_comprar','ProductController@como_comprar')->name('politicas.como_comprar');
/*+++++++++++++++++++++++++ Inicio Rutas de  paypal++++++++++++++++++++++++++++++++++++*/

/*--------------------------------------------------------------------------------------*/

/*+++++++++++++++++++++++++ Inicio de rutas para el carrito++++++++++++++++++++++++++++++++++++*/
Route::get('/carrito', 'cartController@cart')->name('cart.index');
Route::post('/add', 'cartController@add')->name('cart.store');
Route::post('/update', 'cartController@update')->name('cart.update');
Route::post('/remove', 'cartController@remove')->name('cart.remove');
Route::post('/clear', 'cartController@clear')->name('cart.clear');

/*+++++++++++++++++++++++++ fin de rutas de carrito++++++++++++++++++++++++++++++++++++*/

/*+++++++++++++++++++++++++ Rutas del login++++++++++++++++++++++++++++++++++++++++++++*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/*+++++++++++++++++++++++++ fin de rutas de login++++++++++++++++++++++++++++++++++++++*/

/*---------------------------------------------------------------------------------------*/
/*------------------------------- inicio de rutas administrador----------------------------------*/
/*-----------------------------------------------------------------------------------------------*/

//Administrador and usuario
Route::get('/mystore','HomeController@dashboard')->name('mystore.home')->middleware('auth');

/*+++++++++++++++++++++++++ Inicio Rutas de  proveedores administrador+++++++++++++++++++++++++*/
Route::get('/mystore/proveedor','SupplierController@index')->name('suplier.index');
Route::get('/mystore/proveedor/n','SupplierController@create')->name('suplier.create')->middleware('auth');
Route::post('/mystore/proveedor/nuevo','SupplierController@store')->name('suplier.store')->middleware('auth');
Route::get('/mystore/proveedor/{supplier}','SupplierController@edit')->name('suplier.edit')->middleware('auth');
Route::put('/mystore/proveedor/{supplier}','SupplierController@update')->name('suplier.update')->middleware('auth');


Route::delete('/mystore/proveedor/{supplier}','SupplierController@destroy')->name('suplier.destroy')->middleware('auth');
/*---------------------fin de rutas de proveedores administrador---------------------------*/

/*-----------------------------------------------------------------------------------------*/

/*+++++++++++++++++++++++ Inicio Routas de  productos administrador++++++++++++++++++++++++++++++*/
Route::get('/mystore/productos','ProductController@index')->name('product.index')->middleware('auth');
Route::get('/mystore/productos/nuevo','ProductController@create')->name('product.create')->middleware('auth');

Route::post('/mystore/productos/nuevo','ProductController@store')->name('product.store')->middleware('auth');
Route::get('/mystore/productos/{product}','ProductController@edit')->name('product.edit')->middleware('auth');

Route::put('/mystore/productos/{product}','ProductController@update')->name('product.update')->middleware('auth');


Route::delete('/mystore/productos/{product}','ProductController@destroy')->name('product.destroy')->middleware('auth');
/*---------------------fin de rutas de productos administrador----------------------------*/

/*----------------------------------------------------------------------------------------*/

/*---------------------Inicio de rutas de  Ventas administrador----------------------------*/

Route::get('/mystore/ventas','SalesController@index')->name('sales.sales_index')->middleware('auth');
Route::get('/mystore/ventas/{sale}','SalesController@show')->name('sales.show')->middleware('auth');

/*---------------------Inicio de rutas de  Ventas Reportes administrador----------------------------*/

Route::get('/mystore/reporte','DetalleVentaController@index')->name('reporte.reporte_venta')->middleware('auth');
Route::get('/mystore/fecha','DetalleVentaController@create')->name('reportes.reporte_fecha')->middleware('auth');
Route::post('/mystore/fecha','DetalleVentaController@store')->name('reportes.store')->middleware('auth');

/**
 * ROUTE OF USER
 *
 */
Route::get('/mystore/usuarios','UsersController@index')->name('user.index');
Route::get('/mystore/usuarios/registrar','UsersController@create')->name('user.create');

Route::get('/mystore/usuarios/edit/{user}','UsersController@edit')->name('user.edit');
Route::put('/mystore/usuarios/{user}','UsersController@update')->name('user.update');

Route::delete('/mystore/usuarios/{user}','UsersController@destroy')->name('user.destroy');

/**
 * ROUTE OF ROLES
 *
 */
Route::get('/mystore/roles','RolsController@index')->name('rol.index');
Route::get('/mystore/roles/registrar','RolsController@create')->name('rol.create');

Route::post('/mystore/roles','RolsController@store')->name('rol.store');

Route::get('/mystore/roles/edit/{rol}','RolsController@edit')->name('rol.edit');
Route::put('/mystore/roles/{rol}','RolsController@update')->name('rol.update');
 
Route::delete('/mystore/roles/{rol}','RolsController@destroy')->name('rol.destroy');

/**
 * ROUTE OF INVENTARIO
 *
 */
Route::get('/mystore/inventario','InventoriesController@index')->name('inventario.index');


Route::get('/mystore/inventario/edit/{inventario}','InventoriesController@edit')->name('inventario.edit');
Route::put('/mystore/inventario/{inventario}','InventoriesController@update')->name('inventario.update');



/**
 * ROUTE OF category
 *
 */

Route::get('/mystore/categorias','CategoryController@index')->name('category.index_category')->middleware('auth');
Route::get('/mystore/categoria/n','CategoryController@create')->name('category.create_category')->middleware('auth');
Route::post('/mystore/categoria/n','CategoryController@store')->name('category.store')->middleware('auth');
Route::get('/mystore/categoria/{category}','CategoryController@edit')->name('category.edit')->middleware('auth');
Route::put('/mystore/categoria/{category}','CategoryController@update')->name('category.update')->middleware('auth');
Route::delete('/mystore/categoria/{category}','CategoryController@destroy')->name('category.destroy')->middleware('auth');
/**
 * ROUTE OF brands
 *
 */
Route::get('/mystore/marcas','BrandsController@index')->name('brands.index_brands')->middleware('auth');
Route::get('/mystore/marcas/n','BrandsController@create')->name('brands.create_brands')->middleware('auth');
Route::post('/mystore/marcas/n','BrandsController@store')->name('brands.store')->middleware('auth');
Route::get('/mystore/marcas/{brand}','BrandsController@edit')->name('brands.edit')->middleware('auth');
Route::put('/mystore/marcas/{brand}','BrandsController@update')->name('brands.update')->middleware('auth');
Route::delete('/mystore/marcas/{brand}','BrandsController@destroy')->name('brands.destroy')->middleware('auth');

/*ROUTES ADD PDF GENERADOR*/

Route::get('factura','generatorPDFController@factura')->name('factura');

//Rutas de perfil
Route::get('mi-perfil','PerfilController@index')->name("perfil.index");
Route::put('mi-perfil/{id}','PerfilController@update')->name("perfil.update");

//Reporte de compras de cliente

Route::get('facturas-compras','ComprasController@index')->name("reporte.index");
//Ruta para generar facturas desde su historial de compra
Route::get('factura-de-compra/{sale}','generatorPDFController@compra')->name("factura.compra");

//Envio de correo

Route::post('contact','MessagesSendController@contact')->name("contact");
//Prueba
Route::get('test','MessagesSendController@test')->name("email.test");

//RESETEO DE CONTRASEÑA

Route::post('password-reset','ResetPasswordController@password_reset')->name("password.reset");
Route::get('password/update','ResetPasswordController@password_update')->name("password.edit");
Route::post('password','ResetPasswordController@new_password')->name("pass.update");