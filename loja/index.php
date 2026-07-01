
<?php
session_start();

if (isset($_SESSION['id_usuario'])) {
    if ($_SESSION['categoria'] == 'administrador') {
        header("Location: admin/painel.php");
    } else {
        header("Location: loja.php");
    }
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - Loja Flamengo</title>
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
        .login-box{
            width:400px;
            background:#fff;
            border:2px solid #999;
            padding:30px;
            border-radius:10px;
            box-shadow:0 0 15px rgba(0,0,0,0.2);
        }
        .login-box h1{
            text-align:center;
            margin-bottom:20px;
            color:#b30000;
        }
        .campo{
            margin-bottom:15px;
        }
        .campo label{
            display:block;
            margin-bottom:6px;
            font-weight:bold;
        }
        .campo input{
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
        .botao:hover{
            background:#870000;
        }
        .mensagem{
            margin-top:15px;
            text-align:center;
            color:red;
            font-weight:bold;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h1>Login da Loja</h1>

    <form action="login.php" method="POST">
        <div class="campo">
            <label>E-mail</label>
            <input type="email" name="email" required>
        </div>

        <div class="campo">
            <label>Senha</label>
            <input type="password" name="senha" required>
        </div>

        <button type="submit" class="botao">Entrar</button>
    </form>

    <?php
    if (isset($_GET["erro"])) {
        echo "<p class='mensagem'>E-mail ou senha inválidos.</p>";
    }
    ?>
</div>

</body>
</html>