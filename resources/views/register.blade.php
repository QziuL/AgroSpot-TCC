@extends('layouts.mainRegister')

@section('title', 'AgroSpot - Cadastro')

@section('content')
    <div class="background"></div>
    <div id="div-form">
        <h1>Cadastro</h1>
        <form action="{{ route('register.store') }}" id="div-form-content" method="POST">
            @csrf()
            <div id="div-form-user-comum">
                <label for="name" >Nome</label >
                <input type="text" name="name" id="name" placeholder="Digite seu nome..." required>
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" placeholder="Digite seu e-mail..." required>
                <label for="phone">Telefone</label>
                <input type="tel" id="phone" name="phone"  placeholder="(xx) 123456789" required> <!-- pattern="\([0-9]{2})\[0-9]{4,5}[0-9]{4}" -->
                <label for="password">Senha</label>
                <input type="password" name="password" id="password" placeholder="Digite sua senha..." required>
                {{-- <input type="password" name="password" id="confirm_password" placeholder="Confirme sua senha" required> --}}
                    
                
                <div id="div-radio-buttons">
                    <h3>Tipo de perfil:</h3>
                    <label class="form-control">
                        <input id="radio-user" type="radio" name="button_radio" value="0" onClick="check()" required/>Usuário
                    </label>
                    
                    <label class="form-control">
                        <input id="radio-agricultor" type="radio" name="button_radio" value="1" onClick="check()" required/>Agricultor
                    </label>                   
                </div>
            </div>

            <div id="div-form-user-agricultor">
                <label for="cpf" disabled >CPF</label >
                <input id="cpf" type="text" name="cpf" placeholder="Digite seu CPF"  @disabled(true) required>
                <label for="cep">CEP</label>
                <input id="cep" type="text" name="cep" id="cep" placeholder="Digite seu CEP" @disabled(true) required>
                <label for="city">Cidade</label>
                <input id="city" type="text" id="city" name="city" placeholder="Nome da cidade"  @disabled(true) required>
                <label for="nomePropriedade" >Nome da propriedade</label>
                <input id="nomePropriedade" type="text" name="nomePropriedade" placeholder="Propriedade..." @disabled(true) required>                   
            </div>

            <input type="submit" value="Cadastrar" id="input-register" class ="button">
        </form>

    </div>
    <script>
        function check(){
            if(document.getElementById('radio-agricultor').checked == true)
            {
                document.getElementById('cpf').disabled = false;
                document.getElementById('cep').disabled = false;
                document.getElementById('city').disabled = false;
                document.getElementById('nomePropriedade').disabled = false;
            } 
            else
            {
                document.getElementById('cpf').disabled = true;
                document.getElementById('cep').disabled = true;
                document.getElementById('city').disabled = true;
                document.getElementById('nomePropriedade').disabled = true;
            }
        }
    </script>
@endsection