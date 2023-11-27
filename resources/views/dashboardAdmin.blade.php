@extends('layouts.mainDashboard')

@section('title', 'Dashboard - Admin')

@section('content')
    <div id="content-main-admin">
        <div id="div-titulo">
            <h1>Painel - Admin</h1>
        </div>
        <div class="div-content">
            <table class="table">
                <thead>
                    <tr>
                        <th class="th-admin">Registrar</th>
                        <td><a href="{{ route('showProduto.cadastro') }}">Produtos</a></td>
                        <td><a href="{{ route('showFeira.cadastro') }}">Feiras</a></td>
                    </tr>
                </thead>
            </table>
            <table class="table">
                <thead>
                    <tr>
                        <th class="th-admin">Remover</th>
                        <td><a href="{{ route('show.removerProduto') }}">Produtos</a></td>
                        {{-- <td><a href="{{ route('show.removerFeira') }}">Feiras</a></td> --}}
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection