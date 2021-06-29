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
        $stores = \App\Store::paginate(10);
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

        /** @var User $user */
        $user = auth()->user();
        $user->store()->create($data);

        flash('Loja Criada com Sucesso')->success();
        return redirect()->route('admin.stores.index');
    }

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
        $store->update($data);

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
