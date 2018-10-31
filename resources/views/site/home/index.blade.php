@extends('site.template.template1')

@section('content')

<h1>Home Page do site!</h1>

{{$xss}}

<!--{!! $xss !!}-->

@if($var1 == '123')
    <p>É igual</p>
@else
    <p>Não é igual</p>
@endif

@unless($var1 == '12345')
<p>Não é igual (unless)</p>
@endunless

@for($i = 0; $i <= 10; $i++)
<p>For: {{$i}}</p>
@endfor

{{-- comentário
@if(count($arrayData) > 0)
    @foreach($arrayData as $array)
        <p>Foreach: {{$array}}</p>
    @endforeach
@else
    <p>Não há itens</p>
@endif
--}}

@forelse($arrayData as $array)
    <p>Forelse: {{$array}}</p>
@empty
    <p>Não há itens</p>
@endforelse

@php

@endphp

@include('site.includes.sidebar', compact('var1'))

@endsection

@push('scripts')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
@endpush