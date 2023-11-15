@extends('layouts.main')

@section('title', 'AgroSpot')

@section('content')
    <div id="div-content-main">
        <div class="div-recent-products">
            <h3>Adicionados recentemente</h3>
            @foreach ($produtosRecentes as $produto)
                <div class="div-content-produtosRecentes">
                    <div class="div-left-content-produtosRecentes">
                        <p>{{ $produto->nome }}</p>

                        @if (($produto->disponibilidade)==1)
                            <span class="span-produto-disponivel">Produto disponível</span>
                        @endif
                        
                        <div id="div-produtosRecentes-img">
                            <img src="/img/produtos/{{ $produto->image }}">
                        </div>
                    </div>

                    <a href="{{ route('produtos') }}"><input class="bt-recenteProduto-saibaMais" type="button" value="Saiba mais..."></a>
                    <span class="clear-float"></span>
                </div>
            @endforeach
        </div>
        <div class="div-content-frase">
            <p id="frase-efeito">Conecte-se ao <span>campo</span>, transforme sua <span>alimentação</span>.</p>
        </div>
    </div>
@endsection