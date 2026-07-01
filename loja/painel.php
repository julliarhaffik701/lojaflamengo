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
    <title>Painel do Administrador</title>
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
        .topo{
            background:#111;
            color:white;
            padding:20px;
            display:flex;
            justify-content:space-between;
            align-items:center;
        }
        .logo{
            font-size:26px;
            font-weight:bold;
            color:#ff2d2d;
        }
        .menu a{
            color:white;
            text-decoration:none;
            margin-left:20px;
            font-weight:bold;
        }
        .caixa{
            width:80%;
            margin:40px auto;
            background:white;
            padding:30px;
            border-radius:10px;
            text-align:center;
        }
        .caixa h1{
            color:#b30000;
            margin-bottom:20px;
        }
        .botao{
            display:inline-block;
            margin:10px;
            background:#b30000;
            color:white;
            text-decoration:none;
            padding:12px 20px;
            border-radius:6px;
            font-weight:bold;
        }
    </style>
</head>
<body>

<div class="topo">
    <div class="logo">Painel Admin</div>
    <div class="menu">
        <a href="loja.php">Loja</a>
        <a href="cadastrar_produto.php">Cadastrar Produto</a>
        <a href="listar_produtos.php">Listar Produtos</a>
        <a href="logout.php">Sair</a>
    </div>
</div>

<div class="caixa">
    <h1>Área do Administrador</h1>
    <p>Bem-vindo(a), <?php echo $_SESSION['nome']; ?>!</p>
    <br>
    <a class="botao" href="cadastrar_produto.php">Cadastrar Produto</a>
    <a class="botao" href="listar_produtos.php">Listar Produtos</a>
</div>

</body>
</html>