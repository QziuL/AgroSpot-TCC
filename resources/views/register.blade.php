<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/css/registerStyle.css">

    <title>AgroSpot - Cadastrar</title>
</head>
<body>
    <div class="background"></div>
    <div id="div-form">
        <form action="">
            
            <label for="nome" >Nome</label>
            <input type="text" name="nome" placeholder="digite seu nome..." required>
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" placeholder="Digite seu e-mail..." required>
            <label for="telefone">Telefone</label>
            <input type="tel" id="telefone" name="phone" pattern="[0-9]{2}-[0-9]{5}-[0-9]{4}" placeholder="Digite seu telefone..." required>
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" placeholder="Digite sua senha..." required>
            <input type="password" name="password" id="confirm_password" placeholder="Confirme sua senha" required>

            <label for="cpf" >CPF</label>
            <input type="text" name="cpf" placeholder="Digite seu CPF" @disabled(true) required>
            <label for="cep">CEP</label>
            <input type="text" name="cep" id="cep" placeholder="Digite seu CEP" @disabled(true) required>
            <label for="city">Cidade</label>
            <input type="text" id="city" name="city" placeholder="Nome da cidade"  @disabled(true) required>
            <label for="nomePropriedade" >Nome da propriedade</label>
            <input type="text" name="nomePropriedade" placeholder="Propriedade..." @disabled(true) required>
            
            <label class="form-control">
                <input type="radio" name="radio" />
                Agricultor
            </label>

            <label class="form-control">
                <input type="radio" name="radio" />
                Usuário
            </label>

            <input type="submit" value="Cadastrar" id="input-register">
        </form>

    </div>
</body>
</html>