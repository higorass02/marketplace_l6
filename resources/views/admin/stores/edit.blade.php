@extends('layouts.app')

@section('content')
    <h1>Editar Loja</h1>

    <form action="{{route('admin.stores.update',['store'=>$store->id])}}/" method="post">
        <input type="hidden" value="{{csrf_token()}}" name="_token">

        <div class="form-group">
            <label for="">Nome da Loja</label>
            <input class="form-control" type="text" name="name" id="name" value="{{$store->name}}">
        </div>

        <div class="form-group">
            <label for="">Descrição</label>
            <input class="form-control" type="text" name="description" id="description" value="{{$store->description}}">
        </div>

        <div class="form-group">
            <label for="">Telefone</label>
            <input class="form-control" type="text" name="phone" id="phone" value="{{$store->phone}}">
        </div>

        <div class="form-group">
            <label for="">Celular/Whattsup</label>
            <input class="form-control" type="text" name="mobile_phone" id="mobile_phone" value="{{$store->mobile_phone}}">
        </div>


        <div class="form-group">
            <label for="">Slug</label>
            <input class="form-control" type="text" name="slug" id="slug" value="{{$store->slug}}">
        </div>

{{--        <div class="form-group">--}}
{{--            <label for="">Usuário</label>--}}
{{--            <select class="form-control" name="user" id="">--}}
{{--                @foreach($users as $user)--}}
{{--                    <option value="{{$user->id}}">{{$user->name}}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}

        <div class="form-group">
            <button type="submit" class="btn-success btn-lg">
                Atualizar Loja
            </button>
        </div>
    </form>
@endsection
