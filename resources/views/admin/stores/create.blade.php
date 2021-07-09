@extends('layouts.app')

@section('content')
    <h1>Criar Loja</h1>

    <form action="{{route('admin.stores.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="">Nome da Loja</label>
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
            <label for="">Telefone</label>
            <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" id="phone" value="{{old('phone')}}">

            @error('phone')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Celular/Whattsup</label>
            <input class="form-control @error('mobile_phone') is-invalid @enderror" type="text" name="mobile_phone" id="mobile_phone" value="{{old('mobile_phone')}}">

            @error('mobile_phone')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Fotos do Produto</label>
            <input type="file" name="logo" class="form-control  @error('logo') is-invalid @enderror" multiple>

            @error('logo')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Slug</label>
            <input class="form-control" type="text" name="slug" id="slug" value="{{old('slug')}}">
        </div>

        <div class="form-group">
            <button type="submit" class="btn-success btn-lg">
                Cadastrar Loja
            </button>
        </div>
    </form>
@endsection
