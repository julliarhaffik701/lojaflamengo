<?php
session_start();
include("conecta.php");

if (!isset($_SESSION['id_usuario'])) {
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
    <title>Loja Flamengo</title>
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
            font-size:28px;
            font-weight:bold;
            color:#ff2d2d;
        }
        .menu a{
            color:white;
            text-decoration:none;
            margin-left:20px;
            font-weight:bold;
        }
        .banner{
            background:linear-gradient(to right, #7a0000, #b30000, #111);
            color:white;
            padding:30px;
            text-align:center;
        }
        .banner h2{
            margin-bottom:10px;
        }
        .categorias{
            width:90%;
            margin:20px auto;
            background:white;
            padding:20px;
            border-radius:10px;
        }
        .categorias span{
            display:inline-block;
            background:#111;
            color:white;
            padding:8px 12px;
            margin:5px;
            border-radius:5px;
        }
        .area-produtos{
            width:90%;
            margin:20px auto;
            display:flex;
            flex-wrap:wrap;
            gap:20px;
            justify-content:center;
        }
        .card{
            width:230px;
            background:white;
            border-radius:10px;
            padding:15px;
            text-align:center;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        }
        .card img{
            width:150px;
            height:150px;
            object-fit:cover;
            border-radius:8px;
            margin-bottom:10px;
        }
        .card h3{
            margin-bottom:10px;
            color:#111;
        }
        .card p{
            font-size:14px;
            margin-bottom:10px;
            min-height:40px;
        }
        .preco{
            color:#b30000;
            font-size:22px;
            font-weight:bold;
            margin:10px 0;
        }
        .botao{
            display:inline-block;
            background:#b30000;
            color:white;
            text-decoration:none;
            padding:10px 18px;
            border-radius:6px;
            font-weight:bold;
        }
        .botao:hover{
            background:#870000;
        }
        .rodape{
            background:#111;
            color:white;
            text-align:center;
            padding:15px;
            margin-top:30px;
        }
    </style>
</head>
<body>

<div class="topo">
    <div class="logo">Nação Rubro-Negra Store</div>
    <div class="menu">
        <a href="loja.php">Início</a>

       <?php if($_SESSION['categoria'] == 'administrador'){ ?>
            <a href="painel.php">Painel Admin</a>
        <?php } ?>

        <a href="logout.php">Sair</a>
    </div>
</div>

<div class="banner">
    <h2>Produtos Oficiais do Flamengo</h2>
    <p>Bem-vindo(a), <?php echo $_SESSION['nome']; ?>!</p>
</div>

<div class="categorias">
    <strong>Categorias:</strong><br><br>
    <ul>
        <li>Camisas</li>
        <li>Bonés</li>
        <li>Canecas</li>
        <li>Moletons</li>
        <li>Acessórios</li>
    </ul>

</div>

<div class="area-produtos">

    <?php while($produto = mysqli_fetch_assoc($resultado)) { ?>

        <div class="card">
        <img src="../img/<?php echo $produto['imagem']; ?>" alt=""> 

            <h3><?php echo $produto['nome']; ?></h3>

            <p><?php echo $produto['descricao']; ?></p>

            <div class="preco">
                R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?>
            </div>
            <a href="comprar.php?id=<?php echo $produto['id_produto']; ?>" class="botao">
             Comprar
</a>
        </div>

    <?php } ?>

</div>

<div class="rodape">
    © Loja Flamengo
</div>

</body>
</html>