@extends('layouts.app')

@section('content')
    <h1>Criar Loja</h1>

    <form action="{{route('admin.products.store')}}" method="post">
        <input type="hidden" value="{{csrf_token()}}" name="_token">

        <div class="form-group">
            <label for="">Nome do Produto</label>
            <input class="form-control" type="text" name="name" id="name">
        </div>

        <div class="form-group">
            <label for="">Descrição</label>
            <input class="form-control" type="text" name="description" id="description">
        </div>

        <div class="form-group">
            <label for="">Conteúdo</label>
            <textarea class="form-control" name="body" id="body" cols="30" rows="10"></textarea>
        </div>

        <div class="form-group">
            <label for="">Preço</label>
            <input class="form-control" type="text" name="price" id="price">
        </div>

        <div class="form-group">
            <label for="">Slug</label>
            <input class="form-control" type="text" name="slug" id="slug">
        </div>

        <div class="form-group">
            <label for="">Lojas</label>
            <select class="form-control" name="store" id="store">
                @foreach($stores as $store)
                    <option value="{{$store->id}}">{{$store->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn-success btn-lg">
                Cadastrar Produto
            </button>
        </div>
    </form>
@endsection
