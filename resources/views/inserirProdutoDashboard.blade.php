<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AgroSpot - Dashboard</title>
    <link rel="stylesheet" href="/css/dashboard.css">
</head>
<body>
    <div id="div-content-main">
        <div class="center"><h1>Registrar Produto</h1></div>
        <div id="div-form-produto">
            <form action="{{ route('storeProduto.cadastro') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="div-dados">
                    <label for="image">Imagem do produto: </label>
                    <input type="file" name="image" id="image" accept="image/*">
                </div>
                <div class="div-dados">
                    <label for="nome">Nome: </label>
                    <input type="text" name="nome" id="nome">
                </div>
                <div class="div-dados">
                    <label for="descricao">Descrição: </label>
                    <input type="textarea" name="descricao" id="descricao">
                </div>
                <div class="div-dados">
                    <label for="codigo">Código: </label>
                    <input type="number" name="codigo" id="codigo">
                </div>
                <div class="div-dados">
                    <span>Produto</span>
                    <div class="div-btn-radio">
                        <span>Disponível</span>
                        <input type="radio" name="bt_radio_disponibilidade" id="bt-radio-sim" value="1">
                    </div>
                    <div class="div-btn-radio">
                        <span>Indisponível</span>
                        <input type="radio" name="bt_radio_disponibilidade" id="bt-radio-nao" value="0">
                    </div>
                </div>
    
                <div class="div-dados">
                    <input type="submit" value="Cadastrar">
                </div>
            </form>
        </div>
    </div>
</body>
</html>