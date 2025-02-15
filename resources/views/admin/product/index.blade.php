@extends('layouts.master')

@section('title', 'Meu Painel')

@section('content_header')
    <div class="row">
        <span style="float: none">
            <button class="btn btn-success" type="button">
                Novo
            </button>
        </span>
        <span style="float: inline-start">
            <h1>Produtos Cadastrados</h1>
        </span>
    </div>
@stop

@section('content')
    <div class="card">
        <table class="table table-houver table-bordered">
            <tr>
                <th>#</th>
                <th>Descrição</th>
                <th>Slug</th>
                <th>Preço</th>
            </tr>
        </table>
    </div>

@stop
