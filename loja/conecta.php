<?php
$servidor = "localhost:3307";
$usuario  = "root";
$senha    = "";
$banco    = "loja";

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

if (!$conexao) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}
?>