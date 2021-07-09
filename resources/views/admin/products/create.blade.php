@extends('layouts.app')

@section('content')
    <h1>Criar Produto</h1>

    <form action="{{route('admin.products.store')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" value="{{csrf_token()}}" name="_token">

        <div class="form-group">
            <label for="">Nome do Produto</label>
            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{old('name')}}">

            @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Descrição</label>
            <input class="form-control @error('description') is-invalid @enderror" type="text" name="description" id="description" value="{{old('description')}}">

            @error('description')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Conteúdo</label>
            <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" cols="30" rows="10">{{old('body')}}</textarea>

            @error('body')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Preço</label>
            <input class="form-control @error('price') is-invalid @enderror" type="text" name="price" id="price" value="{{old('price')}}">

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
                    <option value="{{$category->id}}">{{ $category->name }}</option>
                @endforeach

            </select>
        </div>

        <div class="form-group">
            <label for="">Fotos do Produto</label>
            <input type="file" name="photos[]" class="form-control" multiple>
        </div>

        <div class="form-group">
            <label for="">Slug</label>
            <input class="form-control " type="text" name="slug" id="slug" value="{{old('slug')}}">
        </div>

        <div class="form-group">
            <button type="submit" class="btn-success btn-lg">
                Cadastrar Produto
            </button>
        </div>
    </form>
@endsection
