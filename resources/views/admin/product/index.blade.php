@extends('layouts.master')

@section('title', 'Produtos')

@section('content_header')
    <div class="row">
        <span style="float: none">
            <a href="{{ route('product.create') }}" class="btn btn-success">Novo</a>
        </span>
        <span style="float: inline-start">
            <h1>Produtos Cadastrados</h1>
        </span>
    </div>
@stop

@section('content')
    @include('includes.alerts')
    <div class="card">
        <table class="table table-houver table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Descrição</th>
                    <th>Slug</th>
                    <th class="text-center">Preço</th>
                    <th class="text-center">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->slug }}</td>
                        <td style="text-align: right;">{{ formatQtd($product->price) }}</td>
                        <td class="text-center">
                            <a class="btn btn-primary" href="{{ route('product.edit', $product->id) }}">
                                Editar
                            </a>
                            <button class="btn btn-danger">
                                Excluir
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
