<?php
session_start();
include("conecta.php");

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuario WHERE email='$email' AND senha='$senha'";

$resultado = mysqli_query($conexao, $sql);

if(mysqli_num_rows($resultado) == 1){

    $usuario = mysqli_fetch_assoc($resultado);

    $_SESSION['id_usuario'] = $usuario['id_usuario'];
    $_SESSION['nome'] = $usuario['nome'];
    $_SESSION['categoria'] = $usuario['categoria'];

    if($usuario['categoria'] == 'administrador'){
        header("Location: painel.php");
    }else{
        header("Location: loja.php");
    }

}else{
    header("Location: index.php?erro=1");
}
?>