@extends('layouts.mainRegister')

@section('title', 'AgroSpot - Cadastro Agricultor')

@section('content')
    <div id="div-form">
        <h1>Cadastro de Agricultor</h1>

        <form action="{{ route('register.storeAgricultor') }}" id="div-form-content" method="POST">
            @csrf()
            <div id="div-form-user-comum">
                <label class="label-form" for="cpf" >CPF</label >
                <input class="input-form" type="text" name="cpf" id="cpf" placeholder="Digite seu CPF..." required>
                <label class="label-form" for="CEP">CEP</label>
                <input class="input-form" type="cep" name="cep" id="cep" placeholder="Digite seu CEP..." required>
                <label class="label-form" for="cidade">Cidade</label>
                <input class="input-form" type="text" id="cidade" name="cidade"  placeholder="Cidade..." required> <!-- pattern="\([0-9]{2})\[0-9]{4,5}[0-9]{4}" -->
                <label class="label-form" for="nomePropriedade">Nome da propriedade</label>
                <input class="input-form" type="text" name="nomePropriedade" id="nomePropriedade" placeholder="Nome da propriedade..." required>
            </div>
            <input type="text" name="user_id" value="{{ $user_id }}" hidden>
            <input type="submit" value="Finalizar" id="input-register" class ="button">
        </form>
    </div>
@endsection