@extends('layouts.mainDashboard')

@section('title', 'Dashboard - Admin')

@section('content')
    <div id="content-main-admin">
        <div id="div-titulo">
            <h1>Admin - Remover produto</h1>
        </div>
        <div class="div-content">
            <table class="table-removerProduto">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome do produto</th>
                        <th>Código</th>
                        <th>Disponiv.</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $produto)
                        <tr>
                            <td>{{ $produto->id }}</td>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->codigo }}</td>
                            <td>{{ $produto->disponibilidade }}</td>
                            @if ($produto->disponibilidade == 1)
                                <form action="/dashboard/removerProduto/{{$produto->id}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <td><input type="submit" value="Remover"></td>
                                </form>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection