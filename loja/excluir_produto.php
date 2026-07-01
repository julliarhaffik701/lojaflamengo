<?php
session_start();
include("conecta.php");

if (!isset($_SESSION['id_usuario']) || $_SESSION['categoria'] != 'administrador') {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

$sql = "DELETE FROM produtos WHERE id_produto = '$id'";
mysqli_query($conexao, $sql);

header("Location: listar_produtos.php");
?>