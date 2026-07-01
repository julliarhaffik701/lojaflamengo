<?php
session_start();

if (!isset($_SESSION['id_usuario']) || $_SESSION['categoria'] != 'administrador') {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Produto</title>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }
        body{
            background:#f3f3f3;
        }
        .caixa{
            width:500px;
            margin:40px auto;
            background:white;
            padding:30px;
            border-radius:10px;
        }
        .caixa h1{
            text-align:center;
            color:#b30000;
            margin-bottom:20px;
        }
        .campo{
            margin-bottom:15px;
        }
        .campo label{
            display:block;
            margin-bottom:5px;
            font-weight:bold;
        }
        .campo input, .campo textarea{
            width:100%;
            padding:10px;
            border:1px solid #999;
            border-radius:5px;
        }
        .botao{
            width:100%;
            background:#b30000;
            color:white;
            border:none;
            padding:12px;
            border-radius:6px;
            font-size:16px;
            cursor:pointer;
            font-weight:bold;
        }
        .voltar{
            display:block;
            text-align:center;
            margin-top:15px;
            color:#b30000;
            text-decoration:none;
            font-weight:bold;
        }
    </style>
</head>
<body>

<div class="caixa">
    <h1>Cadastrar Produto</h1>

    <form action="salvar_produto.php" method="POST">
        <div class="campo">
            <label>Nome</label>
            <input type="text" name="nome" required>
        </div>

        <div class="campo">
            <label>Descrição</label>
            <textarea name="descricao" rows="4" required></textarea>
        </div>

        <div class="campo">
            <label>Preço</label>
            <input type="text" name="preco" required>
        </div>

        <div class="campo">
            <label>Imagem</label>
            <input type="text" name="imagem" placeholder="ex: camisa1.jpg" required>
        </div>

        <button type="submit" class="botao">Salvar Produto</button>
    </form>

    <a class="voltar" href="painel.php">Voltar</a>
</div>

</body>
</html>