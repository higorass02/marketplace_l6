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
Route::get('/', function (){
    return view('welcome');
})->name('home');

Route::group(['middleware' => ['auth']],function (){
    Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function () {
        Route::resource('stores', 'StoreController');
        Route::resource('products', 'ProductController');
        Route::resource('categories', 'CategoryController');

        Route::post('photos/remove','ProductPhotoController@removePhoto')->name('photo.remove');
    });
});

Auth::routes();

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/model', function () {
//    //$products = App\Product::all();//select * from products
//    //$user = new \App\User();
//
////    $user = User::find(7);
////    $user->name = 'higor santos';
////    $user->email = 'higor.santos@email.com';
////    $user->password = bcrypt('root');
////
////    $user->save();
//
////    $user = User::create([
////        'name'      => 'higor',
////        'email'     => 'higor@email.com',
////        'password'  => bcrypt('12345')
////    ]);
////
////    dd($user);
//
////    $user = User::find(8);
////    $user->update(
////        [
////        'name'      => 'higor santos',
////        'email'     => 'higor.santos@email.com',
////    ]);
////    $loja = \App\Store::find(1);
////    //dd($loja->products);
////
////    $categoria = \App\Category::find(1);
////    $categoria->products;
//
////---------------------------------------------------------//
//
////    $user = User::find(1);
////
////    $store = new \App\Store();
////    $store->name = 'Loja Teste';
////    $store->description = 'minha Loja Teste';
////    $store->phone = '(xx) xxxx-xxxx';
////    $store->mobile_phone = '(xx) 9xxxx-xxxx';
////    $store->slug = 'minha loja minha vida';
////    $newStore = $user->store()->save($store);
////
////    dd($newStore);
//
////---------------------------------------------------------//
//
////    $store = \App\Store::find(1);
////
////    $produto = new \App\Product();
////    $produto->name = 'Produto 1';
////    $produto->description = 'desc product 1';
////    $produto->body = 'teste teste';
////    $produto->price = 1000.00;
////    $produto->slug = 'esse é massa';
////
////    $newProduct = $store->products()->save($produto);
//
////---------------------------------------------------------//
//
////$category = \App\Category::find(1);
//
////$category = new \App\Category();
////$category->name = 'Games';
////$category->description = null;
////$category->slug = 'games';
////$category->save();
////
////$category = new \App\Category();
////$category->name = 'Notebooks';
////$category->description = null;
////$category->slug = 'informatica';
////$category->save();
//
////---------------------------------------------------------//
//
//    $product = \App\Product::find(2);
////    dd($product->categories()->attach([2]));
////    dd($product->categories()->detach([2]));
////    dd($product->categories()->sync([1,2]));
////    dd($product->categories()->sync([2]));
//
//    return $product->categories;
//});

//Route::get('/teste',function (){
//    /** @var User $user */
//    $user = User::find(1);
//    $store = $user->store()->create([
//        'name' => 'Loja Teste',
//        'description' => 'asda',
//        'mobile_phone' => '1231',
//        'phone' => '321',
//        'slug' => 'asd'
//    ]);
//    dd($store);

//    /** @var \App\Store $store */
//    $store = \App\Store::find(6);
//    $product = $store->products()->create([
//        'name' => 'produto Teste',
//        'description' => 'asda',
//        'body' => '1231',
//        'price' => 10.90,
//        'slug' => 'asd'
//    ]);
//    dd($product);

//    $category = \App\Category::create([
//        'name'=>'categoria 1',
//        'description'=>'asd',
//        'slug'=>'qwe',
//    ]);
//
//    $category = \App\Category::create([
//        'name'=>'categoria 2',
//        'description'=>'asd2',
//        'slug'=>'qwe2',
//    ]);

//    return \App\Category::all();
//    /** @var \App\Product $product */
//    $product = \App\Product::find(6);
//    //dd($product->categories()->detach([1]));
//    dd($product->categories()->sync([1]));
//
//    exit();
//})->name('teste');

//    Route::prefix('stores')->name('stores.')->group(function (){
//        Route::get('/','StoreController@index')->name('index');;
//        Route::get('/create','StoreController@create')->name('create');;
//        Route::post('/create','StoreController@store')->name('store');;
//        Route::get('/{store}/edit','StoreController@edit')->name('edit');
//        Route::post('/update/{store}','StoreController@update')->name('update');;
//        Route::get('/destroy/{store}','StoreController@destroy')->name('destroy');;;
//    });

//    Route::prefix('products')->name('products.')->group(function (){
//        Route::get('/','ProductController@index')->name('index');
//        Route::get('/create','ProductController@create')->name('create');
//        Route::post('/create','ProductController@store')->name('store');
//        Route::get('/{product}/edit','ProductController@edit')->name('edit');
//        Route::put('/update/{product}','ProductController@update')->name('update');
//        Route::delete('/destroy/{product}','ProductController@destroy')->name('destroy');
//    });



//Route::get('/home', 'HomeController@index')->name('home');
