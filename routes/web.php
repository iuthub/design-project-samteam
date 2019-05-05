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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Auth::routes(['verify'=>true]);

Route::post('upload', function()
{
echo 'hello';
});
Route::group(['middleware' => 'web'], function () {
    Route::get('/',  [
     'uses'=>'ProductController@getIndex',
     'as'=>'product.main'
    ]);

    Route::get('/user', [
        'uses' => 'UserController@getProfile',
        'as' => 'user',
    ]);

    Route::get('create', [
        'uses'=>'AppController@getAuthorCreate',
        'as'=> 'author.create'
    ]);
    Route::post('create', [
        'uses'=>'AppController@postAuthorCreate',
        'as'=> 'author.create'
    ]);
    
    Route::get('/author', [
        'uses' => 'AppController@getAuthorPage',
        'as' => 'author',
        'middleware' => 'roles',
        'roles' => ['Admin', 'Author']
    ]);

    Route::get('/product/delete/{id}', [
        'uses' => 'AppController@deleteProduct',
        'as' => 'product.delete',
        'middleware' => 'roles',
        'roles' => ['Admin', 'Author']
    ]);

    Route::get('/author/generate-article', [
        'uses' => 'AppController@getGenerateArticle',
        'as' => 'author.article',
        'middleware' => 'roles',
        'roles' => ['Admin', 'Author']
    ]);

    Route::get('/admin', [
        'uses' => 'AppController@getAdminPage',
        'as' => 'admin',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);

    Route::post('/admin/assign-roles', [
        'uses' => 'AppController@postAdminAssignRoles',
        'as' => 'admin.assign',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);
});
Route::get('/shop', [
        'uses'=>'ProductController@getProductIndex',
        'as'=>'product.main',
    ]);
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/add-to-cart/{id}',[
        'uses'=>'ProductController@getAddToCart',
        'as'=>'product.addToCart',
]);
Route::get('/reduce/{id}', [
    'uses'=>'ProductController@getReduceByOne',
    'as'=>'product.reduceByOne'
]);
Route::get('/remove/{id}', [
    'uses'=>'ProductController@getRemoveItem',
    'as'=>'product.remove'
]);

Route::get('/shopping-cart',[
    'uses'=>'ProductController@getCart',
    'as'=>'product.shoppingCart',
]);

Route::get('/checkout', [
    'uses'=>'ProductController@getCheckout',
    'as'=>'checkout',
    'middleware'=>'auth'
]);
Route::post('/checkout', [
    'uses'=> 'ProductController@postCheckout',
    'as'=>'checkout',
    'middleware'=>'auth'
]);
Route::get('about', function () {
    return view('other.about');
})->name('other.about');
