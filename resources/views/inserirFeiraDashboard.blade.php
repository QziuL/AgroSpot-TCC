<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inserir Feira</title>
    <link rel="stylesheet" href="/css/dashboard.css">
</head>
<body>
    <div id="div-main">
        <div class="center">
            <h1>INSERIR DADOS DA FEIRA</h1>
        </div>
        <div id="div-form">
            <form action="{{route('storeFeira')}}" method="POST">
                @csrf
                <div>
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" required>
                </div>
                
                <div>
                    <label for="CEP">CEP</label>
                    <input type="text" name="cep" id="cep" required>
                </div>
                
                <div>
                    <label for="cidade">Cidade</label>
                    <input type="text" name="cidade" id="cidade" required>
                </div>
 
                <div>
                    <label for="descricao">Descricao</label>
                    <div id="div-textarea">
                        <textarea name="descricao" id="" cols="20" rows="5" required placeholder="Descrição..."></textarea>
                    </div>
                </div>
                <button type="submit" id="btn-submit">Adicionar</button>
            </form>
        </div>
    </div>
</body>
</html>