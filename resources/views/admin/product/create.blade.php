@extends('layouts.master')

@section('title', 'Produtos - Cadastrar')

@section('content_header')
    <div class="row">
        <span style="float: none">
            <a href="{{ route('product.index') }}" class="btn btn-primary">Voltar</a>
        </span>
        <span style="float: inline-start">
            <h1> Cadastrar Produtos</h1>
        </span>
    </div>
@stop

@section('content')
    @include('includes.alerts')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('product.store') }}" method="POST">
                @csrf
                <fieldset class="row">
                    <!-- Campo Descrição -->
                    <div class="mb-3 col-4">
                        <label for="description" class="form-label">Descrição</label>
                        <input type="text" id="description" name="description"
                            class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}"
                            required placeholder="Descrição">
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Campo Preço -->
                    <div class="mb-3 col-4">
                        <label for="price" class="form-label">Preço R$</label>
                        <input type="text" id="price" name="price"
                            class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}"
                            oninput="formatarNumeroAutomaticoDecimal(this)" required placeholder="0,00">
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </fieldset>

                <!-- Botão de Envio -->
                <fieldset>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </fieldset>
            </form>
        </div>
    </div>

@stop
