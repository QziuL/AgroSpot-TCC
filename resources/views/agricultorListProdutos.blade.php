@extends('layouts.mainDashboardAgricultor')

@section('title', 'Dashboard - Listar Produtos')

@section('content')
    <div>
        <h1>Seus produtos:</h1>
    </div>

    @if (count($produtos)==0)
        <h3>Nenhum produto adicionado!!</h3>
        <p style="font-weight: bold;">
            Clique <a class="link-redirect" href="{{route('showAddProduto')}}">aqui</a> para adicionar.                
        </p>
    @else
        @foreach ($produtos as $produto)
            <div class="div-produtos-card-bd">
                <div class="div-card-img">
                    <img class="card-img" src="/img/produtos/{{$produto->image}}" alt="">
                </div>
                <div class="card-details">
                    {{-- <span class="card-span">Tag 1</span>
                    <span class="card-span">Tag 2</span> --}}
                    <h3 class="card-nome">{{$produto->nome}}</h3>
                    <p class="descricao-produto">{{$produto->descricao}}</p>
                    <form action="/dashboard/agricultor/removeProduto/{{$produto->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" value="{{$produto->id}}" id="btn_id">Remover</button>
                    </form>
                </div>
            </div>
        @endforeach
    @endif
@endsection