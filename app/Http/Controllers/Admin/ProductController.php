<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Store;
use Illuminate\Http\Request;
use \App\Product;
use App\Http\Requests\ProductRequest;

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
     * @param ProductRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();

        /** @var Store $store */
        $store = Store::find($data['store']);
        $store->products()->create($data);

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
        $product = Product::findOrFail($id);
        $stores = Store::all();
        return view('admin.products.edit',compact('product','stores'));
    }

    /**
     * @param ProductRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProductRequest $request, $id)
    {
        $data = $request->all();

        $products = Product::findOrFail($id);
        $products->update($data);

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

        $products = $this->product->findOrFail($id);
        $products->delete();

        flash('Produto Excluido com Sucesso')->success();
        return redirect()->route('admin.products.index');
    }
}
