<?php

namespace App\Http\Controllers\Admin;

use App\Category;
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
        $userStore = auth()->user()->store;
        $products = $userStore->products()->paginate(10);

        return view('admin.products.index',compact('products'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all(['id','name']);
        return view('admin.products.create',compact('categories'));
    }

    /**
     * @param ProductRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();

        $store = auth()->user()->store;
        /** @var Product $product */
        $product = $store->products()->create($data);

        $product->categories()->sync($data['categories']);

        if($request->hasFile('photos')){
            $images = $this->imageUpload($request,'image');

            $product->photos()->createMany($images);
        }

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
        $categories = Category::all(['id','name']);

        $product = Product::findOrFail($id);
        $stores = Store::all();
        return view('admin.products.edit',compact('product','categories'));
    }

    /**
     * @param ProductRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProductRequest $request, $id)
    {
        $data = $request->all();

        $product = Product::findOrFail($id);
        $product->update($data);
        $product->categories()->sync($data['categories']);

        if($request->hasFile('photos')){
            $images = $this->imageUpload($request,'image');

            $product->photos()->createMany($images);
        }

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

    public function imageUpload(Request $request,$imageColumn){
        $images = $request->file('photos');

        $uploadsImages = [];
        foreach ($images as $image){
            $uploadsImages[] =[$imageColumn => $image->store('products','public')];
        }
        return $uploadsImages;
    }
}
