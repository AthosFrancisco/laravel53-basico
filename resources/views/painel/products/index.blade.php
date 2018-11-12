@extends('painel.templates.template')

@section('content')

<h1 class="title-pg">Listagem dos Produtos</h1>

<a href="{{route('produtos.create')}}" class="btn btn-primary btn-add"> <!--url('/painel/produtos/create')-->
    <span class="glyphicon glyphicon-plus"></span> Cadastrar
</a>

<table class="table table-striped">
    <tr>
        <th>Nome</th>
        <th>Descrição</th>
        <th width='100px'>Ações</th>
    </tr>
    @foreach($products as $product)
    <tr>
        <td>{{$product->name}}</td>
        <td>{{$product->description}}</td>
        <td>
            <a href="{{route('produtos.edit', $product->id)}}" class="actions edit">
                <!--url("/painel/produtos/{$product->id}/edit"-->
                <span class="glyphicon glyphicon-pencil"></span>
            </a>
            <a href="" class="actions delete">
                <span class="glyphicon glyphicon-trash"></span>
            </a>
        </td>
    </tr>
    @endforeach
</table>

@endsection