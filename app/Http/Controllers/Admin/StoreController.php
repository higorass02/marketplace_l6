<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Store;
use App\User;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $stores = \App\Store::paginate(4);
        //return $store;
        return view('admin.stores.index',compact('stores'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $users = User::all(['id','name']);
        return view('admin.stores.create',compact('users'));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $user = User::find($data['user']);

        $new_store= new Store();
        $new_store->name = $data['name'];
        $new_store->description = $data['description'];
        $new_store->phone = $data['phone'];
        $new_store->mobile_phone = $data['mobile_phone'];
        $new_store->slug = $data['slug'];

        $store = $user->store()->save($new_store);
        flash('Loja Criada com Sucesso')->success();
        return redirect()->route('admin.stores.index');

    }

//    /**
//     * Display the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function show($id)
//    {
//        //
//    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $store = Store::find($id);

        return view('admin.stores.edit',compact('store'));
    }

    /**
     * @param Request $request
     * @param $store
     * @return mixed
     */
    public function update(Request $request, $store)
    {
        $data = $request->all();

        $store = Store::find($store);
        $store->name = $data['name'];
        $store->description = $data['description'];
        $store->phone = $data['phone'];
        $store->mobile_phone = $data['mobile_phone'];
        $store->slug = $data['slug'];
        $store->update();

        flash('Loja Atualizada com Sucesso')->success();
        return redirect()->route('admin.stores.index');
    }

    /**
     * @param $store
     * @return mixed
     */
    public function destroy($store)
    {
        $store = Store::find($store);
        $store->delete();
        flash('Loja Deletada com Sucesso')->success();
        return redirect()->route('admin.stores.index');
    }
}
