@extends('layouts.app')
@section('content')
    <a href="{{route('admin.stores.create')}}" class="btn btn-success btl-lg">Criar Produto</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Loja</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>
                        <a href="{{route('admin.stores.edit',['store'=>$product->id])}}" class="btn btn-sm btn-info">Editar</a>
                        <a href="{{route('admin.stores.destroy',['store'=>$product->id])}}" class="btn btn-sm btn-danger">Deletar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

{{$products->links()}}
@endsection
