@extends('layouts.app')
@section('content')
    <a href="{{route('admin.products.create')}}" class="btn btn-success btl-lg">Criar Produto</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Produto</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>R$ {{ number_format($product->price,2,',','.') }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{route('admin.products.edit',['product'=>$product->id])}}" class="btn btn-sm btn-info">Editar</a>
                            <form action="{{route('admin.products.destroy',['product'=>$product->id])}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                            </form>
                        </div>


                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

{{$products->links()}}
@endsection
