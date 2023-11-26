@extends('layouts.mainDashboardAgricultor')

@section('title', 'Dashboard - Adicionar Produto')

@section('content')
    <div id="div-titulo">
        <h1>Produtos disponíveis no sistema:</h1>
    </div>
    @foreach ($produtos as $produto)
    <div class="div-produtos-card-bd">
        <div class="div-card-img">
            <img class="card-img" src="/img/produtos/{{$produto->image}}" alt="">
        </div>
        <div class="card-details">
            <h3 class="card-nome">{{$produto->nome}}</h3>
            <p class="descricao-produto">{{$produto->descricao}}</p>
            @if(count($produtosAdicionado)>0)
                @if ($aux<count($produtosAdicionado))
                    @if ($produto->id != $produtosAdicionado[$aux] )
                        <form action="/dashboard/agricultor/addProduto/{{$produto->id}}" method="POST">
                            @csrf
                            <button type="submit" value="{{$produto->id}}" id="btn_id">Adicionar</button>
                        </form>
                    @else
                        <button type="submit" disabled>ADICIONADO</button>
                        @php
                            $aux++;
                        @endphp
                    @endif
                @else
                    <form action="/dashboard/agricultor/addProduto/{{$produto->id}}" method="POST">
                        @csrf
                        <button type="submit" value="{{$produto->id}}" id="btn_id">Adicionar</button>
                    </form>
                @endif    
            @else
                <form action="/dashboard/agricultor/addProduto/{{$produto->id}}" method="POST">
                    @csrf
                    <button type="submit" value="{{$produto->id}}" id="btn_id">Adicionar</button>
                </form>
            @endif
        </div>
    </div>
    @endforeach
@endsection