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
use App\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/model', function () {
    //$products = App\Product::all();//select * from products
    //$user = new \App\User();

//    $user = User::find(7);
//    $user->name = 'higor santos';
//    $user->email = 'higor.santos@email.com';
//    $user->password = bcrypt('root');
//
//    $user->save();

//    $user = User::create([
//        'name'      => 'higor',
//        'email'     => 'higor@email.com',
//        'password'  => bcrypt('12345')
//    ]);
//
//    dd($user);

//    $user = User::find(8);
//    $user->update(
//        [
//        'name'      => 'higor santos',
//        'email'     => 'higor.santos@email.com',
//    ]);
//    $loja = \App\Store::find(1);
//    //dd($loja->products);
//
//    $categoria = \App\Category::find(1);
//    $categoria->products;

//---------------------------------------------------------//

//    $user = User::find(1);
//
//    $store = new \App\Store();
//    $store->name = 'Loja Teste';
//    $store->description = 'minha Loja Teste';
//    $store->phone = '(xx) xxxx-xxxx';
//    $store->mobile_phone = '(xx) 9xxxx-xxxx';
//    $store->slug = 'minha loja minha vida';
//    $newStore = $user->store()->save($store);
//
//    dd($newStore);

//---------------------------------------------------------//

//    $store = \App\Store::find(1);
//
//    $produto = new \App\Product();
//    $produto->name = 'Produto 1';
//    $produto->description = 'desc product 1';
//    $produto->body = 'teste teste';
//    $produto->price = 1000.00;
//    $produto->slug = 'esse é massa';
//
//    $newProduct = $store->products()->save($produto);

//---------------------------------------------------------//

//$category = \App\Category::find(1);

//$category = new \App\Category();
//$category->name = 'Games';
//$category->description = null;
//$category->slug = 'games';
//$category->save();
//
//$category = new \App\Category();
//$category->name = 'Notebooks';
//$category->description = null;
//$category->slug = 'informatica';
//$category->save();

//---------------------------------------------------------//

    $product = \App\Product::find(2);
//    dd($product->categories()->attach([2]));
//    dd($product->categories()->detach([2]));
//    dd($product->categories()->sync([1,2]));
//    dd($product->categories()->sync([2]));

    return $product->categories;
});

Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function (){

    Route::prefix('stores')->name('stores.')->group(function (){
        Route::get('/','StoreController@index')->name('index');;
        Route::get('/create','StoreController@create')->name('create');;
        Route::post('/create','StoreController@store')->name('store');;
        Route::get('/{store}/edit','StoreController@edit')->name('edit');
        Route::post('/update/{store}','StoreController@update')->name('update');;
        Route::get('/destroy/{store}','StoreController@destroy')->name('destroy');;;
    });

    Route::prefix('products')->name('products.')->group(function (){
        Route::get('/','ProductController@index')->name('index');;
        Route::get('/create','ProductController@create')->name('create');;
        Route::post('/create','ProductController@store')->name('store');;
        Route::get('/{product}/edit','ProductController@edit')->name('edit');
        Route::post('/update/{product}','ProductController@update')->name('update');;
        Route::get('/destroy/{product}','ProductController@destroy')->name('destroy');;;
    });

});
