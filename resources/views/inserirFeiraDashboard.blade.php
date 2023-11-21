<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inserir Feira</title>
</head>
<body>
    <div>
        <h1>INSERIR DADOS DA FEIRA</h1>
        <div>
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
                    <textarea name="descricao" id="" cols="30" rows="10" required>
                        Descrição....
                    </textarea>
                </div>
                <button type="submit">Adicionar</button>
            </form>
        </div>
    </div>
</body>
</html>