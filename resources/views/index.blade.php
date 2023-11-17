@extends('layouts.main')

@section('title', 'AgroSpot')

@section('content')
    <input type="checkbox" id="check">
    <label for="check">
        <i class="fas fa-bars" id="btn"></i>
        <i class="fas fa-times" id="cancel"></i>
    </label>
    <div id="div-sidebar">
        <header>HEADER</header>
        <ul>
            <li><a href="#">BOTÃO 1</a></li>
            <li><a href="#">BOTÃO 2</a></li>
            <li><a href="#">BOTÃO 3</a></li>
            <li><a href="#">BOTÃO 4</a></li>
            <li><a href="#">BOTÃO 5</a></li>
        </ul>
    </div>
    <section></section>

@endsection