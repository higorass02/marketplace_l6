<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Store;
use Illuminate\Http\Request;
use \App\Product;

class ProductController extends Controller
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = $this->product->paginate(10);

        return view('admin.products.index',compact('products'));

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $stores = Store::all(['id','name']);
        return view('admin.products.create',compact('stores'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $store = Store::find($data['store']);

        $new_prod= new Store();
        $new_prod->name = $data['name'];
        $new_prod->description = $data['description'];
        $new_prod->body = $data['body'];
        $new_prod->price = $data['price'];
        $new_prod->slug = $data['slug'];

        $store = $store->product()->save($new_prod);

        flash('Produto Criado com Sucesso')->success();
        return redirect()->route('admin.products.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('admin.products.edit',compact('product'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $store = Store::find($data['store']);

        $new_prod= Product::find($id);

        $new_prod->name = $data['name'];
        $new_prod->description = $data['description'];
        $new_prod->body = $data['body'];
        $new_prod->price = $data['price'];
        $new_prod->slug = $data['slug'];

        $store = $store->product()->save($new_prod);

        flash('Produto Alterado com Sucesso')->success();
        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
