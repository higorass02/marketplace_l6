@extends('layouts.app')

@section('content')
    <h1>Editar Produto</h1>

    <form action="{{route('admin.products.update',['product'=>$product->id])}}/" method="post" enctype="multipart/form-data">
{{--        <input type="hidden" value="{{csrf_token()}}" name="_token">--}}
{{--        <input type="hidden" name="_method" value="PUT">--}}
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Nome do Produto</label>
            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{$product->name}}">

            @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Descrição</label>
            <input class="form-control @error('description') is-invalid @enderror" type="text" name="description" id="description" value="{{$product->description}}">

            @error('description')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Conteúdo</label>
            <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" cols="30" rows="10">{{$product->body}}</textarea>
        </div>

        <div class="form-group">
            <label for="">Preço</label>
            <input class="form-control @error('price') is-invalid @enderror" type="text" name="price" id="price" value="{{$product->price}}">

            @error('price')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Categorias</label>
            <select name="categories[]" id="categories" class="form-control" multiple>
                @foreach($categories as $category)
                    <option @if($product->categories->contains($category)) selected @endif value="{{$category->id}}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="">Fotos do Produto</label>
            <input type="file" name="photos[]" class="form-control" multiple>
        </div>

        <div class="form-group">
            <label for="">Slug</label>
            <input class="form-control" type="text" name="slug" id="slug" value="{{$product->slug}}">
        </div>

{{--        <div class="form-group">--}}
{{--            <label for="">Lojas</label>--}}
{{--            <select class="form-control" name="store" id="store">--}}
{{--                @foreach($stores as $store)--}}
{{--                    <option--}}
{{--                        @if ($product->stores == $store) {{'seleted'}} @endif --}}
{{--                        value="{{$store->id}}">{{$store->name}}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}

        <div class="form-group">
            <button type="submit" class="btn-success btn-lg">
                Atualizar Produto
            </button>
        </div>
    </form>

    <hr>

    <div class="row">
        @foreach($product->photos as $photo)
            <div class="col-4">
                <img src="{{ asset('storage/'.$photo->image) }}" alt="" class="img-fluid">
            </div>
        @endforeach
    </div>
@endsection
