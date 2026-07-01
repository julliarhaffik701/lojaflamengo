<?php
session_start();
include("conecta.php");

if (!isset($_SESSION['id_usuario'])) {
    header("Location: index.php");
    exit;
}

if (!isset($_GET['id'])) {
    header("Location: loja.php");
    exit;
}

$id_produto = intval($_GET['id']);
$id_usuario = $_SESSION['id_usuario'];

$sql = "INSERT INTO compras (id_usuario, id_produto) VALUES ($id_usuario, $id_produto)";
mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Compra realizada</title>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family: Arial, Helvetica, sans-serif;
        }
        body{
            background: linear-gradient(to right, #111, #7a0000, #b30000);
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }
        .caixa{
            width:420px;
            background:#fff;
            border:2px solid #999;
            padding:30px;
            border-radius:10px;
            text-align:center;
        }
        .caixa h1{
            color:#b30000;
            margin-bottom:15px;
        }
        .caixa p{
            margin-bottom:20px;
        }
        .botao{
            display:inline-block;
            text-decoration:none;
            background:#b30000;
            color:white;
            padding:10px 18px;
            border-radius:6px;
            font-weight:bold;
        }
        .botao:hover{
            background:#870000;
        }
    </style>
</head>
<body>

<div class="caixa">
    <h1>Compra realizada!</h1>
    <p>Seu produto foi registrado com sucesso.</p>
    <a href="loja.php" class="botao">Voltar para a loja</a>
</div>

</body>
</html>