@extends('layouts.main')

@section('title', 'AGRICULTORES - PRODUTO')

@section('content')
    <section>            
        <div id="produtos-agricultor">
            @foreach ($produtos as $produto)
            <div class="produto-agricultor">
                <img class="produto-img" src="/img/produtos/{{ $produto->image }}" alt="{{$produto->nome}}">
                <div class="produto-info">
                    <h3>{{$produto->nome}}</h3>
                    <p>{{$produto->descricao}}</p>
                    <p>Disponibilidade: {{$produto->disponibilidade ? 'Disponivel' : 'Indisponivel'}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </section>
@endsection