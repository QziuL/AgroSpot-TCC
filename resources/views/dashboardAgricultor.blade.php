@extends('layouts.mainDashboardAgricultor')

@section('title', 'Dashboard - Agricultor')

@section('content')
    <div id="div-titulo">
        <h1>Painel - Agricultor</h1>
    </div>

    <div id="div-content">
        <div class="div-options">
            <h3>Veja seus produtos</h3>
            <a href="{{route('listProdutos')}}">Produtos</a>
        </div>
        <span class="clear"></span>
        <div class="div-options">
            <h3>Adicione um novo produto</h3>
            <a href="{{route('showAddProduto')}}">Adicionar</a>
        </div>
        <span class="clear"></span>
    </div>
@endsection