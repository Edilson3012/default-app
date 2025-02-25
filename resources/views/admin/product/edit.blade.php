@extends('layouts.master')

@section('title', 'Produto - Editar')

@section('content_header')
    <div class="row">
        <span style="float: none">
            <a href="{{ route('product.index') }}" class="btn btn-primary">Voltar</a>
        </span>
        <span style="float: inline-start">
            <h1> Editar Produto</h1>
        </span>
    </div>
@stop

@section('content')
    @include('includes.alerts')

    <div class="card card-body">
        <form action="{{ route('product.update', $product->id) }}" method="POST" class="form">
            @csrf
            @method('PUT')

            @include('admin.product._partials.form')

            <!-- Botão de Envio -->
            <fieldset>
                <button type="submit" class="btn btn-success">Salvar</button>
            </fieldset>
        </form>
    </div>
@endsection
