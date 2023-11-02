@extends('layouts.main')

@section('title', 'AgroSpot')

@section('content')
    <h1>Listagem de Produtos</h1>    

    @foreach ($produtos as $produto)
        <p> 
            {{ $produto->nome }} -- {{ $produto->descricao }} -- 
            @if ( $produto->disponibilidade == 1 )
                Disponivel ( {{ $produto->disponibilidade }} )
            @endif
        </p>
    @endforeach
@endsection