@extends('layouts.main')

@section('title', 'AgroSpot')

@section('content')
    <input type="checkbox" id="check">
    <label for="check">
        <i class="fas fa-bars" id="btn"></i>
        <i class="fas fa-times" id="cancel"></i>
    </label>
    <div id="div-sidebar">
        @guest
            <header><a href="{{ route('login') }}">Fazer login</a></header>
        @endguest
        @auth
            <header>Olá, {{ Str::title($user->name) }}</header>
        @endauth
        <ul>
            <li><a href="#">AGRICULTORES</a></li>
            <li><a href="#">FEIRAS</a></li>
        </ul>
    </div>
    <section></section>

@endsection