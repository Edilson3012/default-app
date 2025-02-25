@extends('layouts.master')

@section('title', 'Produto - Editar')

@section('content_header')
    <div class="row">
        <span style="float: none">
            <a href="{{ route('product.index') }}" class="btn btn-primary">Voltar</a>
        </span>
        <span style="float: inline-start">
            <h1> Detalhes do Produto</h1>
        </span>
    </div>
@stop

@section('content')
    @include('includes.alerts')

    <div class="card card-body">
        <div class="card-body">
            <h5 class="card-title"><strong>Produto: </strong> {{ $product->description }}</h5>
            <p class="card-text"><strong>Preço:</strong> R$ {{ formatQtd($product->price) }}</p>
        </div>
    </div>
@endsection
