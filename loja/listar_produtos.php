<?php
session_start();
include("conecta.php");

if (!isset($_SESSION['id_usuario']) || $_SESSION['categoria'] != 'administrador') {
    header("Location: index.php");
    exit;
}

$sql = "SELECT * FROM produtos ORDER BY id_produto DESC";
$resultado = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listar Produtos</title>
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
            width:95%;
            margin:30px auto;
            background:white;
            padding:20px;
            border-radius:10px;
        }
        .caixa h1{
            color:#b30000;
            margin-bottom:20px;
        }
        .botao{
            display:inline-block;
            background:#b30000;
            color:white;
            text-decoration:none;
            padding:10px 15px;
            border-radius:6px;
            font-weight:bold;
            margin-right:10px;
            margin-bottom:15px;
        }
        table{
            width:100%;
            border-collapse:collapse;
        }
        table th, table td{
            border:1px solid #999;
            padding:10px;
            text-align:center;
        }
        table th{
            background:#111;
            color:white;
        }
        .editar{
            color:blue;
            text-decoration:none;
            font-weight:bold;
        }
        .excluir{
            color:red;
            text-decoration:none;
            font-weight:bold;
        }
    </style>
</head>
<body>

<div class="caixa">
    <h1>Produtos Cadastrados</h1>

    <a class="botao" href="painel.php">Voltar</a>
    <a class="botao" href="cadastrar_produto.php">Novo Produto</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Imagem</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Ações</th>
        </tr>

        <?php while($produto = mysqli_fetch_assoc($resultado)) { ?>
        <tr>
            <td><?php echo $produto['id_produto']; ?></td>
            <td><img src="../img/<?php echo $produto['imagem']; ?>" width="70"></td>
            <td><?php echo $produto['nome']; ?></td>
            <td><?php echo $produto['descricao']; ?></td>
            <td>R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></td>
            <td>
                <a class="editar" href="editar_produto.php?id=<?php echo $produto['id_produto']; ?>">Editar</a> |
                <a class="excluir" href="excluir_produto.php?id=<?php echo $produto['id_produto']; ?>" onclick="return confirm('Deseja excluir?')">Excluir</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>