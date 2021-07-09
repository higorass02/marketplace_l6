<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Store;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    use UploadTrait
        ;
    public function __construct()
    {
        $this->middleware('user.has.store')->only(['create','store']);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //$stores = \App\Store::paginate(10);
        $store = auth()->user()->store;

        //return $store;
        return view('admin.stores.index',compact('store'));
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
     * @param StoreRequest $request
     * @return mixed
     */
    public function store(StoreRequest $request)
    {
        $data = $request->all();

        /** @var User $user */
        $user = auth()->user();

        if($request->hasFile('logo')){
            $data['logo'] = $this->imageUpload($request->file('logo'));
        }

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
     * @param StoreRequest $request
     * @param $store
     * @return mixed
     */
    public function update(StoreRequest $request, $store)
    {
        $data = $request->all();

        $store = Store::find($store);

        if($request->hasFile('logo')){
            if(Storage::disk('public')->exists($store->logo)){
                Storage::disk('public')->delete($store->logo);
            }
            $data['logo'] = $this->imageUpload($request->file('logo'));
        }

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
