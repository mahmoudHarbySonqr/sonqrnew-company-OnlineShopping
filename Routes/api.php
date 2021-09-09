<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the onlineShoppingProvider within a group which
| is assigned the "api/onlineShopping" middleware group.
|
*/
Route::namespace( 'App\OnlineShopping\Controllers\Api' ) -> group ( fn ( ) : array => [
    Route::name( 'Product.' ) -> prefix( 'Product' ) -> group( fn ( ) : array => [
        Route::get( 'collection'                          , 'ProductController@collection' ) -> name( 'collection' ) ,
        Route::get( '{product_id}'                        , 'ProductController@show'       ) -> name( 'show'       ) ,
    ]),
    Route::name( 'Category.' ) -> prefix( 'Category' ) -> group( fn ( ) : array => [
        Route::get( '/all'                                 , 'CategoryController@all'       ) -> name( 'all'        )
    ]),
    Route::name( 'Cart.'    ) -> prefix( 'Cart'    ) -> group( fn ( ) : array => [
        Route::put( '/addProduct/{product_id}/{quantity?}' , 'CartController@addProduct'    ) -> name( 'addProduct' ) -> middleware ( 'UserAuth' ) ,
        Route::get( '/Products'                            , 'CartController@getProducts'   ) -> name( 'Products'   ) -> middleware ( 'UserAuth' )
    ])
]) ;