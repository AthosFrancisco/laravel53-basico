@extends('painel.templates.template')

@section('content')
<h1 class="title-pg">Gestão Produto</h1>

@if(isset($errors) && count($errors) > 0)
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
</div>
@endif

@if(isset($product))
<form class="form" method="post" action="{{route('produtos.update', $product->id)}}">
    {!! method_field('PUT') !!}
@else
<form class="form" method="post" action="{{route('produtos.store')}}">
@endif


    {!! csrf_field() !!}
    <div class="form-group">
        <input type="text" name="name" placeholder="Nome:" class="form-control" value="{{$product->name ?? old('name')}}"/>
    </div>
    <div class="form-group">
        <label>
            <input type="checkbox" name="active" value="1" @if(isset($product) && $product->active == '1') checked @endif/>Ativo?
        </label>
    </div>
    <div class="form-group">
        <input type="text" name="number" placeholder="Número:" class="form-control" value="{{$product->number ?? old('number')}}"/>
    </div>
    <div class="form-group">
        <select name="category" class="form-control">
            <option value="">Escolha a categoria</option>
            @foreach($categorys as $category)
            <option value="{{$category}}"
                    @if(isset($product) && $product->category == $category)
                        selected
                    @endif
                    >{{$category}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <textarea name="description" placeholder="Descrição" class="form-control">{{$product->description ?? old('description')}}</textarea>
    </div>
    <div class="form-group">
        <button class="btn btn-primary">Enviar</button>
    </div>
</form>

@endsection