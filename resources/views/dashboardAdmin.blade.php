@extends('layouts.mainDashboard')

@section('title', 'Dashboard - Admin')

@section('content')
    <div id="content-main-admin">
        <div id="div-titulo">
            <h1>Painel - Admin</h1>
        </div>
        <div class="div-content">
            <table class="table-register">
                <thead>
                    <tr>
                        <th>Registrar</th>
                        <td><a href="{{ route('showProduto.cadastro') }}">Produtos</a></td>
                        <td><a href="{{ route('showFeira.cadastro') }}">Feiras</a></td>
                    </tr>
                </thead>
            </table>
            <table class="table-produtos">
                <thead>
                    <tr>
                        <th>Produtos pendentes</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><hr></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection